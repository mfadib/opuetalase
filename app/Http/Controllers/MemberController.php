<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Libs\UserQuery;

use Auth;
use Validator;
use Mail;
use URL;

use App\User;

class MemberController extends Controller
{
    private $query;
    public function __construct(UserQuery $query)
    {
        $this->query = $query;
    }

    public function index()
    {
    	return "this index";
    }

    public function memberarea()
    {
        $query = $this->query;
        return view('auth.members.contents.home',compact('query'));
    }

    public function signin()
    {
        $query = $this->query;
        return view('contents.members.signin',compact('query'));
    }

    public function login(){
        //post method for login
        
        $rules = [
        'email' => 'required|email',
        'password'  => 'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $email = \Request::input('email');
            $pass = \Request::input('password');
            $remember = (\Request::has('remember'))? true : false;

            $master = User::whereEmail($email);
            if($master->count() == 1){
                foreach($master->get() as $item);
                if(\Hash::check($pass,$item->password)){
                    if($item->status == 0){
                        if(Auth::attempt(['email'=>$email,'password'=>$pass,'status'=>0,'actived'=>1],$remember)){
                            return \Redirect::action('MemberController@memberarea');
                        }
                    }elseif($item->status == 1){
                        if(Auth::attempt(['email'=>$email,'password'=>$pass,'status'=>1,'actived'=>1],$remember)){
                            return \Redirect::action('AdminController@home');
                        }
                    }

                    return \Redirect::action('MemberController@signin')->with('message_error','Email or password not found');
                }else{
                    return \Redirect::action('MemberController@signin')->with('message_error','Email or password not found');
                }
            }else{
                return \Redirect::action('MemberController@signin')->with('message_error','Email or password not found');
            }
        }else{
            return \Redirect::action('MemberController@signin')->withErrors($valid);
        }
    }

    public function signup()
    {
        $query = $this->query;
        return view('contents.members.signup',compact('query'));
    }

    public function register()
    {
        $rules = [
        'email' => 'required|email|unique:users,email',
        'name'  => 'required',
        'confirm'=> 'required|same:password',
        'password'  => 'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $email = \Request::input('email');
            $name = \Request::input('name');
            $password = \Request::input('password');
            $confirm = \Request::input('confirm');

            $insert = [
                'email'     => $email,
                'name'      => $name,
                'password'  => \Hash::make($password),
                'status'    => 0,
                'confirm'   => str_random(10),
                'actived'   => 0
            ];
            $mail = Mail::send(['html'=>'emails.registered'],$insert, function($message){
                $message->to(\Request::input('email'),ucwords(\Request::input('name')));
                $message->subject('Thanks registered');
            });
            if($mail){
                $new = User::insert($insert);
                if($new){
                    return \Redirect::action('MemberController@signup')->with('message_success','your account successfully registered, please check your email confirmation');
                }else{
                    return \Redirect::action('MemberController@signup')->with('message_error','failed to register, please check your forms');
                }
            }else{
                return \Redirect::action('MemberController@signup')->with('message_error','failed to sent link confirmation, please register again');
            }
        }else{
            return \Redirect::action('MemberController@signup')->withErrors($valid);
        }
    }

    public function confirm($confirm)
    {
        $where = ['confirm'=>$confirm,'status'=>0,'actived'=>0];
        $user = User::where($where);
        if($user->count() == 1){
            $update = User::where($where)->update(['confirm'=>'','actived'=>1]);
            if($update){
                return \Redirect::action('MemberController@signin')->with('message_success','Your account has successfully actived');
            }else{
                return \Redirect::action('MemberController@signin')->with('message_error','Your code not found');
            }
        }else{
            return \Redirect::action('MemberController@signin')->with('message_error','Code confirmations not found');
        }
    }

    public function signout()
    {
        Auth::logout();
        return \Redirect::action('MemberController@signin')->with('message_success','Successfully sign out');
    }

    // PAGE STORE
    
    public function reviews()
    {
        $query = $this->query;
        $reviews = $query->get_data('reviews',['user_id'=>Auth::user()->id]);
        return view('auth.members.reviews.index',compact('query','reviews'));
    }

    public function wishlist()
    {
        $query = $this->query;
        $wishlist = $query->get_data('product_wishlist',['user_id'=>Auth::user()->id]);
        return view('auth.members.wishlist.index',compact('query','wishlist'));
    }

    public function remove_wishlist()
    {
        $valid = \Validator(\Request::all(), ['product_id'=>'required|exists:product_wishlist,product_id']);
        if($valid->passes())
        {
            $id = \Request::input('product_id');
            $where = ['product_id'=>$id,'user_id'=>Auth::user()->id];
            $cek = $this->query->get_data('product_wishlist',$where);
            if($cek->count() == 1){
                $delete = $this->query->delete_data('product_wishlist',$where);
                if($delete){
                    return \Redirect::action('MemberController@wishlist')->with('message_success','Successfully remove product form your wishlist');
                }else{
                    return \Redirect::action('MemberController@wishlist')->with('message_error','Failed remove product form your wishlist');
                }
            }else{
                return \Redirect::action('MemberController@wishlist')->with('message_error','Your product ID not found from your wishlist');
            }
        }else{
            return \Redirect::action('MemberController@wishlist')->with('message_error','Your product ID not found from your wishlist');
        }
    }

    public function setting()
    {
        $query = $this->query;
        return view('auth.members.setting.index',compact('query'));
    }

    public function change_password()
    {
        $rules = [
            'old'   => 'required',
            'new'   => 'required',
            'confirm'=>'required|same:new'
        ];
        $valid = \Validator::make(\Request::all(), $rules);
        if($valid->passes()){
            $old = \Request::input('old');
            $new = \Hash::make(\Request::input('new'));
            $query = $this->query;
            $cek = $query->get_data('users',['email'=>Auth::user()->email]);
            if($cek->count() == 1){
                foreach($cek->get() as $item);
                if(\Hash::check($old,$item->password)){
                    $query->update_data('users',['email'=>Auth::user()->email],['password'=>$new]);
                    return \Redirect::action('MemberController@signout')->with('message_success','Password successfully updated, please signin again');
                    // if(Auth::attempt(['email'=>$email,'password'=>$pass,'status'=>0,'actived'=>1],$remember)){
                    //     return \Redirect::action('MemberController@memberarea');
                    // }else{
                    //     return \Redirect::action('MemberController@signin')->with('message_error','Email or password not found');
                    // }
                }else{
                    return \Redirect::action('MemberController@setting')->with('message_error','Your old password wrong!');
                }
            }else{
                return \Redirect::action('MemberController@signout')->with('message_error','Not found your accout');
            }
        }else{
            return \Redirect::action('MemberController@setting')->withErrors($valid);
        }
    }

    public function subscribe()
    {
        $rules = ['email'=>'required|email|unique:subscribes,email'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $unique = str_random(15);
            $url = URL::action('MemberController@subscribe_status',['unique_code'=>$unique]);
            $mail = Mail::send(['html'=>'emails.subscribe'],['url'=>$url], function($message){
                $message->to(\Request::input('email'))->subject('Thanks registered');
            });
            if($mail){
                $this->query->insert_data('subscribes',['email'=>\Request::input('email'),'unique_code'=>$unique,'status'=>1]);
                return \Redirect::action('HomeController@index')->with('message_success','Your email successfully registered, please check your email');
            }else{
                return \Redirect::action('HomeController@index')->with('message_error','Failed to sent link info, please try again');
            }
        }else{
            return \Redirect::action('HomeController@index')->with('message_error','Error to send verification code, please try again');
        }
    }

    public function subscribe_status($unique)
    {
        $query = $this->query;
        $check = $query->get_data('subscribes',['unique_code'=>$unique]);
        if($check->count() ==1){
            foreach($check->get() as $item);
            $data = [
                'unique_code'=>'',
                'status'=>0
            ];
            $query->update_data('subscribes',['unique_code'=>$unique],$data);
            return \Redirect::action('HomeController@index')->with('message_success','You successfully stoped subscribe');
        }else{
            return \Redirect::action('HomeController@index')->with('message_error','Code not found');
        }
    }

    public function testimony(){
        $query = $this->query;
        $testi = $query->get_data('testimonials',['user_id'=>Auth::user()->id]);
        if($testi->count() == 1){
            return view('auth.members.testimonials.edit',compact('query','testi'));
        }else{
            return view('auth.members.testimonials.add',compact('query','testi'));
        }
    }

    public function testimony_commit()
    {
        $rules = ['testimony'=>'required'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $query = $this->query;
            $check = $query->get_data('testimonials',['user_id'=>Auth::user()->id]);
            $data = [
                'testimony'=>\Request::input('testimony'),
                'user_id'=>Auth::user()->id
                ];
            if($check->count() == 1){
                $query->update_data('testimonials',['user_id'=>Auth::user()->id],$data);
            }else{
                $query->insert_data('testimonials',$data);
            }
            return \Redirect::action('MemberController@testimony')->with('message_success','Data successfully saved');
        }else{
            return \Redirect::action('MemberController@testimony')->withErrors($valid);
        }
    }
}

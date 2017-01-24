<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use Image;
use Auth;
use File;
use Hash;
use URL;
use Mail;
use App\Libs\UserQuery;

// MODEL
use App\Profile;
use App\Category;
use App\Content;
use App\Faq;
use App\News;
use App\Newscategory;
use App\Product;
use App\Productimage;
use App\Review;
use App\Slider;
use App\Subcribe;
use App\User;
use App\Wishlist;

class AdminController extends Controller
{
    private $query;
    public function __construct(UserQuery $query)
    {
        $this->query = $query;
    }

    public function home()
    {
    	return view('auth.admin.contents.home');
    }

    public function signout()
    {
    	Auth::logout();
        return \Redirect::action('MemberController@signin')->with('message_success','Successfully sign out');
    }

    public function news_categories()
    {
        $query = $this->query;
        $categories = $query->get_data('news_categories');
        $cats = $query->get_data_select('news_categories',null,'No Parent');
        return view('auth.admin.news.categories',compact('query','cats','categories'));
    }

    public function news_category_add()
    {
        $rules =['name'=>'required|unique:news_categories,name'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            // $insert = new Newscategory(\Request::except('_token'));
            // $insert->save();
            $data = [
                'parent'=>\Request::input('parent'),
                'name'=> \Request::input('name'),
                'slug'=> str_slug(\Request::input('name'))
            ];
            $insert = $this->query->insert_data('news_categories',$data);
            if($insert){
                return \Redirect::action('AdminController@news_categories')->with('message_success','Data successfully insert');
            }else{
                return \Redirect::action('AdminController@news_categories')->with('message_error','Data failed to insert');
            }                
        }else{
            return \Redirect::action('AdminController@news_categories')->withErrors($valid);
        }
    }

    public function news_category_update()
    {
        $rules =['name'=>'required'];
        // $rules =['name'=>'required|unique:news_categories,name'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $data = [
                'id'=>\Request::input('id'),
                'parent'=>\Request::input('parent'),
                'name'=> \Request::input('name'),
                'slug'=> str_slug(\Request::input('name'))
            ];
            $update = $this->query->update_data('news_categories',['id'=>\Request::input('id')],$data);
            if($update){
                return \Redirect::action('AdminController@news_categories')->with('message_success','Data successfully updated');
            }else{
                return \Redirect::action('AdminController@news_categories')->with('message_error','Data failed to updated');
            }                
        }else{
            return \Redirect::action('AdminController@news_categories')->withErrors($valid);
        }
    }

    public function news_category_delete()
    {
        $rules =['id'=>'required|exists:news_categories,id'];
        // $rules =['name'=>'required|unique:news_categories,name'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $delete = $this->query->delete_data('news_categories',['id'=>\Request::input('id')]);
            if($delete){
                return \Redirect::action('AdminController@news_categories')->with('message_success','Data successfully deleted');
            }else{
                return \Redirect::action('AdminController@news_categories')->with('message_error','Data failed to deleted');
            }                
        }else{
            return \Redirect::action('AdminController@news_categories')->with('message_error','ID not found');
        }
    }

    public function news_add()
    {
        $query = $this->query;
        $cats = $query->get_data_select('news_categories',null,'Uncategories');
        return view('auth.admin.news.add',compact('query','cats'));
    }

    public function news_insert()
    {
        $rules = [
            'category_id'=>'required',
            'title'=>'required|unique:news,title',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
            'brief'=>'required',
            'description'=>'required',
            'image'=>'required|image'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $image = \Request::file('image');
            $slug = str_slug(\Request::input('title'));
            $filename = $slug.'.'.$image->getClientOriginalExtension();
            $url = 'images/news/';
            // if($image->move($url,$filename)){
                $image->move($url,$filename);
                Image::make($url.$filename)->fit(600,400)->save($url.$filename);
                $data =[
                    'category_id'=>\Request::input('category_id'),
                    'title'=>\Request::input('title'),
                    'slug'=>$slug,
                    'meta_description'=>\Request::input('meta_description'),
                    'meta_keywords'=>\Request::input('meta_keywords'),
                    'brief'=>\Request::input('brief'),
                    'description'=>\Request::input('description'),
                    'image'=>$filename
                ];
                $insert = $this->query->insert_data('news',$data);

                /* SUBSCRIBE */
                $subscribe = (\Request::input('subscribe'))? 1:0;
                if($subscribe == 1){ // SUBSCRIBE
                    $url = URL::action('NewsController@detail',['slug'=>$slug]);
                    $emails = $this->query->get_data_field_array('subscribes',['status'=>1],'email');
                    Mail::send(['html'=>'emails.post'],['url'=>$url], function($message) use($emails){
                        $message->to($emails)->subject('New Post');
                    });
                }

                if($insert){
                    return \Redirect::action('AdminController@news_add')->with('message_success','Data successfully insert');
                }else{
                    return \Redirect::action('AdminController@news_add')->with('message_error','Data failed to insert');
                }
            // }else{
            //     return \Redirect::action('AdminController@news_add')->with('message_error','Image failed to upload, please try again');
            // }
        }else{
            return \Redirect::action('AdminController@news_add')->withErrors($valid);
        }
    }

    public function news()
    {
        $query = $this->query;
        $news = $query->get_paginate('news',10);
        return view('auth.admin.news.index',compact('query','news'));
    }

    public function news_delete()
    {
        if(\Validator::make(\Request::all(),['id'=>'required|exists:news,id'])->passes()){
            $id = \Request::input('id');
            $news = $this->query->get_data('news',['id'=>$id]);
            foreach($news->get() as $item){
                unlink('images/news/'.$item->image);
            }
            $this->query->delete_data('news',['id'=>$id]);
            return \Redirect::action('AdminController@news')->with('message_success','Data successfully deleted');
        }else{
            return \Redirect::action('AdminController@news')->with('message_error','ID not found');
        }
    }

    public function news_edit($id)
    {
        $query = $this->query;
        $news = $query->get_data('news',['id'=>$id]);
        $cats = $query->get_data_select('news_categories',null,'Uncategories');
        return view('auth.admin.news.edit',compact('query','news','cats'));
    }

    public function news_update()
    {
        $rules = [
            'id'=>'required|exists:news,id',
            'category_id'=>'required',
            'title'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
            'brief'=>'required',
            'description'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $query = $this->query;
            $id = \Request::input('id');
            $slug = str_slug(\Request::input('title'));
            $url = 'images/news/';
            $filename = $query->get_field_data('news',['id'=>$id],'image');
            if(\Request::hasFile('image')){
                unlink('images/news/'.$filename);
                $image = \Request::file('image');
                $filename = $slug.'.'.$image->getClientOriginalExtension();
                $image->move($url,$filename);
                Image::make($url.$filename)->fit(600,400)->save($url.$filename);
            }
            $data =[
                'category_id'=>\Request::input('category_id'),
                'title'=>\Request::input('title'),
                'slug'=>$slug,
                'meta_description'=>\Request::input('meta_description'),
                'meta_keywords'=>\Request::input('meta_keywords'),
                'brief'=>\Request::input('brief'),
                'description'=>\Request::input('description'),
                'image'=>$filename
            ];
            $update = $this->query->update_data('news',['id'=>$id],$data);
            if($update){
                return \Redirect::action('AdminController@news')->with('message_success','Data successfully updated');
            }else{
                return \Redirect::action('AdminController@news')->with('message_error','Data failed to updated');
            }
        }else{
            return \Redirect::action('AdminController@news_edit',['id'=>\Request::input('id')])->withErrors($valid);
        }
    }

    public function profile()
    {
        $query = $this->query;
        $webprofile = $query->get_data('profile',['id'=>1,'status'=>1]);
        return view('auth.admin.settings.profile',compact('query','webprofile'));
    }

    public function profile_save()
    {
        $rules = [
            'id'=>'required',
            'title'=>'required',
            'subtitle'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
            'about'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $image = \Request::file('icon');
            $url = 'images/';
            $query = $this->query;
            $filename = $query->get_field_data('profile',['id'=>1],'icon');
            if(\Request::hasFile('icon')){
                unlink($url.$filename);
                $filename = 'logo.'.$image->getClientOriginalExtension();
                if($image->move($url,$filename)){
                    $file = $url.$filename;
                    Image::make($file)->fit(400,400)->save($file);
                }else{
                    return \Redirect::action('AdminController@profile')->with('message_error','Failed to upload image, please try again');
                }
            }
            $id = \Request::input('id');
            $data = [
                'author' => \Request::input('author'), 
                'meta_description' => \Request::input('meta_description'), 
                'meta_keywords' => \Request::input('meta_keywords'), 
                'title' => \Request::input('title'), 
                'subtitle' => \Request::input('subtitle'), 
                'about' => \Request::input('about'), 
                'phone' => \Request::input('phone'), 
                'email' => \Request::input('email'), 
                'facebook' => \Request::input('facebook'), 
                'googleplus' => \Request::input('googleplus'), 
                'twitter' => \Request::input('twitter'), 
                'instagram' => \Request::input('instagram'), 
                'linkedin' => \Request::input('linkedin'), 
                'icon' => $filename
            ];
            $update = $query->update_data('profile',['id'=>$id],$data);
            if($update){
                return \Redirect::action('AdminController@profile')->with('message_success','Data successfully updated');
            }else{
                return \Redirect::action('AdminController@profile')->with('message_success','Data failed to update');
            }
        }else{
            return \Redirect::action('AdminController@profile')->withErrors($valid);
        }
    }

    public function product_categories()
    {
        $query = $this->query;
        $categories = $query->get_data('categories');
        $cats = $query->get_data_select('categories',null,'No Parent');
        return view('auth.admin.products.categories',compact('query','cats','categories'));
    }

    public function product_category_insert()
    {
        $rules =['name'=>'required|unique:categories,name'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $data = [
                'parent'=>\Request::input('parent'),
                'name'=> \Request::input('name'),
                'slug'=> str_slug(\Request::input('name'))
            ];
            $insert = $this->query->insert_data('categories',$data);
            if($insert){
                return \Redirect::action('AdminController@product_categories')->with('message_success','Data successfully insert');
            }else{
                return \Redirect::action('AdminController@product_categories')->with('message_error','Data failed to insert');
            }                
        }else{
            return \Redirect::action('AdminController@product_categories')->withErrors($valid);
        }
    }

    public function product_category_update()
    {
        $rules =['name'=>'required'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $data = [
                'id'=>\Request::input('id'),
                'parent'=>\Request::input('parent'),
                'name'=> \Request::input('name'),
                'slug'=> str_slug(\Request::input('name'))
            ];
            $update = $this->query->update_data('categories',['id'=>\Request::input('id')],$data);
            if($update){
                return \Redirect::action('AdminController@product_categories')->with('message_success','Data successfully updated');
            }else{
                return \Redirect::action('AdminController@product_categories')->with('message_error','Data failed to updated');
            }                
        }else{
            return \Redirect::action('AdminController@product_categories')->withErrors($valid);
        }
    }

    public function product_category_delete()
    {
        $rules =['id'=>'required|exists:categories,id'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $delete = $this->query->delete_data('categories',['id'=>\Request::input('id')]);
            if($delete){
                return \Redirect::action('AdminController@product_categories')->with('message_success','Data successfully deleted');
            }else{
                return \Redirect::action('AdminController@product_categories')->with('message_error','Data failed to deleted');
            }                
        }else{
            return \Redirect::action('AdminController@product_categories')->with('message_error','ID not found');
        }
    }

    public function product_add()
    {
        $query = $this->query;
        $cats = $query->get_data_select('categories',null,'Uncategories');
        return view('auth.admin.products.add',compact('query','cats'));
    }

    public function product_insert()
    {
        // return dd(\Request::file('images'));
        $rules = [
            'category_id'=>'required',
            'title'=>'required|unique:news,title',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
            'description'=>'required',
            'how_to_buy'=>'required',
            'price'=>'required',
            'cover'=>'required|image'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $image = \Request::file('cover');
            $slug = str_slug(\Request::input('title'));
            $filename = $slug.'.'.$image->getClientOriginalExtension();
            $url = 'images/products/';
            if($image->move($url,$filename)){
                Image::make($url.$filename)->fit(400,400)->save($url.$filename);
                $recommended = (\Request::has('recommended'))? 1 : 0;
                $special = (\Request::has('special'))? 1 : 0;

                $pro = new Product;
                $pro->category_id = \Request::input('category_id');
                $pro->title = \Request::input('title');
                $pro->slug = $slug;
                $pro->meta_description = \Request::input('meta_description');
                $pro->meta_keywords = \Request::input('meta_keywords');
                $pro->description = \Request::input('description');
                $pro->how_to_buy = \Request::input('how_to_buy');
                $pro->price = \Request::input('price');
                $pro->recommended = $recommended;
                $pro->special = $special;
                $pro->cover = $filename;
                $pro->save();
                $product_id = $pro->id;

                /* SUBSCRIBE */
                $subscribe = (\Request::input('subscribe'))? 1:0;
                if($subscribe == 1){ // SUBSCRIBE
                    $link = URL::action('ProductController@detail',['slug'=>$slug]);
                    $emails = $this->query->get_data_field_array('subscribes',['status'=>1],'email');
                    Mail::send(['html'=>'emails.product'],['url'=>$link], function($message) use($emails){
                        $message->to($emails)->subject('New Product');
                    });
                }

                $images = \Request::file('images');
                $url_images = $url.$slug;
                if(!File::exists($url_images)){
                    File::makeDirectory($url_images,0775,true);
                }
                $no = 1;
                foreach($images as $img){

                    $filethumbnail = 'thumbnail'.$no.'-'.$slug.'-'.time().'.'.$img->getClientOriginalExtension();
                    $img->move($url_images,$filethumbnail);
                    Image::make($url_images.'/'.$filethumbnail)->fit(400,400)->save($url_images.'/'.$filethumbnail);
                    $this->query->insert_data('product_images',[
                        'product_id'=>$product_id,
                        'idx'=>$no,
                        'image'=>$url_images.'/'.$filethumbnail
                        ]);
                    $no++;
                }
                return \Redirect::action('AdminController@product_add')->with('message_success','Data successfully insert');
            }else{
                return \Redirect::action('AdminController@product_add')->with('message_error','Image failed to upload, please try again');
            }
        }else{
            return \Redirect::action('AdminController@product_add')->withErrors($valid);
        }
    }

    public function products()
    {
        $query = $this->query;
        $products = $query->get_paginate('products',10);
        return view('auth.admin.products.index',compact('query','products'));
    }

    public function product_edit($id)
    {
        $query = $this->query;
        $product = $query->get_data('products',['id'=>$id]);
        if($product->count() == 1){
            $cats = $query->get_data_select('categories',null,'Uncategories');
            $images = $query->get_data('product_images',['product_id'=>$id]);
            return view('auth.admin.products.edit',compact('query','cats','product','images'));
        }else{
            return \Redirect::action('AdminController@products')->with('message_error','ID not found');
        }
    }

    public function product_update()
    {
        $rules = [
            'id'=>'required|exists:products,id',
            'category_id'=>'required',
            'title'=>'required|unique:news,title',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
            'description'=>'required',
            'how_to_buy'=>'required',
            'price'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $query = $this->query;
            $id = \Request::input('id');
            $image = \Request::file('cover');
            $recommended = (\Request::has('recommended'))? 1 : 0;
            $special = (\Request::has('special'))? 1 : 0;
            $filename = $query->get_field_data('products',['id'=>$id],'cover');
            $slug = $query->get_field_data('products',['id'=>$id],'slug');
            if(\Request::hasFile('cover')){
                $url = 'images/products/';
                unlink($url.$filename);
                $slug = str_slug(\Request::input('title'));
                $filename = $slug.'.'.$image->getClientOriginalExtension();
                if($image->move($url,$filename)){
                    Image::make($url.$filename)->fit(400,400)->save($url.$filename);
                }
            }
            $data = [
                'category_id'=>\Request::input('category_id'),
                'title'=>\Request::input('title'),
                'slug'=>$slug,
                'meta_description'=>\Request::input('meta_description'),
                'meta_keywords'=>\Request::input('meta_keywords'),
                'description'=>\Request::input('description'),
                'how_to_buy'=>\Request::input('how_to_buy'),
                'price'=>\Request::input('price'),
                'recommended'=>$recommended,
                'special'=>$special,
                'cover'=>$filename
            ];
            $update = $query->update_data('products',['id'=>$id],$data);
            if($update){
                return \Redirect::action('AdminController@product_edit',['id'=>\Request::input('id')])->with('message_success','Data successfully update');
            }else{
                return \Redirect::action('AdminController@product_edit',['id'=>\Request::input('id')])->with('message_error','Data failed to update');
            }
        }else{
            return \Redirect::action('AdminController@product_add')->withErrors($valid);
        }
    }

    public function product_image_delete()
    {
        $rules =['id'=>'required|exists:product_images,id'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $cek = $this->query->get_data('product_images',['id'=>$id]);
            foreach($cek->get() as $item);
                $item->id;
                $item->image;
                if(File::exists($item->image)){
                    unlink($item->image);
                }
                $proid = $item->product_id;
                $this->query->delete_data('product_images',['id'=>$id]);
                return \Redirect::action('AdminController@product_edit',['id'=>$proid])->with('message_success','Dat successfully deleted');
        }else{
            return \Redirect::action('AdminController@products')->with('message_error','Image not found');
        }
    }

    public function product_image_insert()
    {
        $rules =['product_id'=>'required|exists:products,id','images'=>'required'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('product_id');
            $cek = $this->query->get_data('products',['id'=>$id]);
            $url = 'images/products/';
            $slug = $this->query->get_field_data('products',['id'=>$id],'slug');
            $images = \Request::file('images');
            $url_images = $url.$slug;
            // if(!File::exists($url_images)){
            //     File::makeDirectory($url_images,0775,true);
            // }
            $no = Productimage::where(['product_id'=>$id])->max('idx');
            foreach($images as $img){
                $no++;
                $filethumbnail = 'thumbnail'.$no.'-'.$slug.'-'.time().'.'.$img->getClientOriginalExtension();
                $img->move($url_images,$filethumbnail);
                Image::make($url_images.'/'.$filethumbnail)->fit(400,400)->save($url_images.'/'.$filethumbnail);
                $this->query->insert_data('product_images',[
                    'product_id'=>$id,
                    'idx'=>$no,
                    'image'=>$url_images.'/'.$filethumbnail
                    ]);
            }
            return \Redirect::action('AdminController@product_edit',['id'=>\Request::input('product_id')])->with('message_success','Product images successfully added');
        }else{
            return \Redirect::action('AdminController@product_edit',['id'=>\Request::input('product_id')])->with('message_error','Product item not found');
        }
    }

    public function product_reviews()
    {
        $query= $this->query;
        $reviews = $query->get_paginate('reviews',10);
        return view('auth.admin.products.reviews',compact('query','reviews'));
    }

    public function product_review_update()
    {
        $rules = ['id'=>'required|exists:reviews,id','status'=>'required'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $status = 0;
            if(\Request::input('status') == 0){
                $status = 1;
            }
            $this->query->update_data('reviews',['id'=>$id],['status'=>$status]);
            return \Redirect::action('AdminController@product_reviews')->with('message_success','Status successfully updated');
        }else{
            return \Redirect::action('AdminController@product_reviews')->with('message_error','ID not found');
        }
    }

    public function user_add()
    {
        $query = $this->query;
        return view('auth.admin.users.add',compact('query'));
    }

    public function user_insert()
    {
        $rules = [
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'confirm'=>'required|same:password',
            'status'=>'required',
            'actived'=>'required'
        ];
        $valid = \Validator::make(\Request::all(), $rules);
        if($valid->passes()){
            $data = [
                'name'=>\Request::input('name'),
                'email'=>\Request::input('email'),
                'password'=>\Hash::make(\Request::input('password')),
                'status'=>\Request::input('status'),
                'actived'=>\Request::input('actived')
            ];
            $this->query->insert_data('users',$data);
            $mail = [
                'name'=>\Request::input('name'),
                'email'=>\Request::input('email'),
                'password'=>\Request::input('password'),
            ];
            Mail::send(['html'=>'emails.new'],$mail, function($message) {
                $message->to(\Request::input('email'))->subject('New Member');
            });
            return \Redirect::action('AdminController@user_add')->with('message_success','Data successfully insert');
        }else{
            return \Redirect::action('AdminController@user_add')->withErrors($valid);
        }
    }   

    public function users()
    {
        $query = $this->query;
        $users = $query->get_paginate('users',20);
        return view('auth.admin.users.index',compact('query','users'));
    }    

    public function user_actived()
    {
        $rules = ['id'=>'required|exists:users,id','actived'=>'required'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $act = 0;
            if(\Request::input('actived') == 0){
                $act = 1;
            }
            $this->query->update_data('users',['id'=>$id],['actived'=>$act]);
            return \Redirect::action('AdminController@users')->with('message_success','User status successfully changed');
        }else{
            return \Redirect::action('AdminController@users')->with('message_error','ID not found');
        }
    }

    public function user_edit($id)
    {
        $query = $this->query;
        $user = $query->get_data('users',['id'=>$id]);
        if($user->count() == 1){
            return view('auth.admin.users.edit',compact('query','user'));
        }else{
            return \Redirect::action('AdminController@users')->with('message_error','ID not found');
        }
    }

    public function user_update()
    {
        $rules = [
            'id'=>'required|exists:users,id',
            'name'=>'required',
            'status'=>'required',
            'actived'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $old = \Request::input('old_password');
            $new = \Request::input('new_password');
            if(! empty(\Request::input('old_password'))){
                if(! empty(\Request::input('new_password')) && ! empty(\Request::input('confirm')) ){
                    if(\Request::input('new_password') == \Request::input('confirm')){
                        $user = $this->query->get_data('users',['id'=>$id]);
                        foreach($user->get() as $item);
                        if(Hash::check($old,$item->password)){
                            $data = [
                                'name'=>\Request::input('name'),
                                'status'=>\Request::input('status'),
                                'actived'=>\Request::input('actived'),
                                'password'=>Hash::make($new)
                            ];
                            $this->query->update_data('users',['id'=>$id],$data);
                            return \Redirect::action('AdminController@user_edit',['id'=>\Request::input('id')])->with('message_success','Data successfully updated');
                        }else{
                            return \Redirect::action('AdminController@user_edit',['id'=>\Request::input('id')])->with('message_error','Your password old wrong');
                        }
                    }else{
                        return \Redirect::action('AdminController@user_edit',['id'=>\Request::input('id')])->with('message_error','New password and confirm not same');
                    }
                }else{
                    return \Redirect::action('AdminController@user_edit',['id'=>\Request::input('id')])->with('message_error','New password and confirm cannot empty');
                }
            }else{
                $data = [
                    'name'=>\Request::input('name'),
                    'status'=>\Request::input('status'),
                    'actived'=>\Request::input('actived')
                ];
                $this->query->update_data('users',['id'=>$id],$data);
                return \Redirect::action('AdminController@user_edit',['id'=>\Request::input('id')])->with('message_success','Data successfully updated');
            }
        }else{
            return \Redirect::action('AdminController@user_edit',['id'=>\Request::input('id')])->withErrors($valid);
        }
    }

    public function user_delete()
    {
        $rules = ['id'=>'required|exists:users,id'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            User::find($id)->delete();
            return \Redirect::action('AdminController@users')->with('message_success','Data successfully deleted');
        }else{
            return \Redirect::action('AdminController@users')->with('message_error','ID not found');
        }
    }

    public function contents()
    {
        $query = $this->query;
        $contents = $query->get_data('contents',['slug'=>'about-us']);
        return view('auth.admin.settings.contents',compact('query','contents'));
    }

    public function content_update()
    {
        $rules = [
            'id'=>'required|exists:contents,id',
            'title'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
            'description'=>'required',
            'image'=>'image'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $title = \Request::input('title');
            $slug = str_slug($title);
            $meta_description = \Request::input('meta_description');
            $meta_keywords = \Request::input('meta_keywords');
            $description = \Request::input('description');
            $image = \Request::file('image');
            $check = $this->query->get_data('contents',['id'=>$id]);
            foreach($check->get() as $item);
            $filename = $item->image;
            if(\Request::hasFile('image')){
                $url = 'images/pages/';
                if(! empty($filename) && File::exists($url.$filename)){
                    unlink($url.$filename);
                }
                $filename = $slug.'-'.time().'.'.$image->getClientOriginalExtension();
                $image->move($url,$filename);
                Image::make($url.$filename)->fit(700,300)->save($url.$filename);
            }
            $data = [
                'title'=>$title,
                'slug'=>$slug,
                'meta_description'=>$meta_description,
                'meta_keywords'=>$meta_keywords,
                'description'=>$description,
                'image'=>$filename
            ];
            $this->query->update_data('contents',['id'=>$id],$data);
            return \Redirect::action('AdminController@contents')->with('message_success','Data successfully updated');
        }else{
            return \Redirect::action('AdminController@contents')->withErrors($valid);
        }
    }

    public function faqs()
    {
        $query = $this->query;
        $faqs = $query->get_paginate('faqs',10);
        return view('auth.admin.settings.faqs',compact('query','faqs'));
    }

    public function faq_insert()
    {
        $rules= [
            'question'=>'required',
            'answer'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $question = \Request::input('question');
            $answer = \Request::input('answer');
            $status = (\Request::input('status')) ? 1 : 0;
            $data = [
                'question'=>$question,
                'answer'=>$answer,
                'status'=>$status
            ];
            $this->query->insert_data('faqs',$data);
            return \Redirect::action('AdminController@faqs')->with('message_success','Data successfully insert');
        }else{
            return \Redirect::action('AdminController@faqs')->withErrors($valid);
        }
    }

    public function faq_change_status(){
        $rules = [
            'id'=>'required|exists:faqs,id',
            'status'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $status = 0;
            if(\Request::input('status') == 0){
                $status = 1;
            }
            $this->query->update_data('faqs',['id'=>$id],['status'=>$status]);
            return \Redirect::action('AdminController@faqs')->with('message_success','Status successfully updated');
        }else{
            return \Redirect::action('AdminController@faqs')->with('message_error','ID not found');
        }
    }

    public function faq_edit($id)
    {
        $query = $this->query;
        $faqs = $query->get_paginate('faqs',10);
        $faq = $query->get_data('faqs',['id'=>$id]);
        if($faq->count() == 1){
            return view('auth.admin.settings.faq_edit',compact('query','faqs','faq'));
        }else{
            return \Redirect::action('AdminController@faqs')->with('message_error','ID not found');
        }
    }

    public function faq_update()
    {
        $rules= [
            'id'=>'required|exists:faqs,id',
            'question'=>'required',
            'answer'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $question = \Request::input('question');
            $answer = \Request::input('answer');
            $status = (\Request::input('status')) ? 1 : 0;
            $data = [
                'question'=>$question,
                'answer'=>$answer,
                'status'=>$status
            ];
            $this->query->update_data('faqs',['id'=>$id],$data);
            return \Redirect::action('AdminController@faqs')->with('message_success','Data successfully updated');
        }else{
            return \Redirect::action('AdminController@faqs')->withErrors($valid);
        }
    }

    public function faq_delete()
    {
        $rules = ['id'=>'required|exists:faqs,id'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $this->query->delete_data('faqs',['id'=>\Request::input('id')]);
            return \Redirect::action('AdminController@faqs')->with('message_success','Data successfully deleted');
        }else{
            return \Redirect::action('AdminController@faqs')->with('message_error','ID not found');
        }
    }

    public function sliders()
    {
        $query = $this->query;
        $sliders = $query->get_paginate('sliders',10,null,'updated_at');
        return view('auth.admin.settings.sliders',compact('query','sliders'));
    }

    public function slider_insert($value='')
    {
        $rules = ['image'=>'required|image'];
        $valid =\Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $image = \Request::file('image');
            $status = (\Request::input('status')) ? 1 : 0;
            $filename = str_random(15).'-'.time().'.'.$image->getClientOriginalExtension();
            $url = 'images/sliders/';
            $image->move($url,$filename);
            Image::make($url.$filename)->fit(700,300)->save($url.$filename);
            $this->query->insert_data('sliders',['image'=>$filename,'status'=>$status]);
            return \Redirect::action('AdminController@sliders')->with('message_success','Data successfully insert');
        }else{
            return \Redirect::action('AdminController@sliders')->withErrors($valid);
        }
    }

    public function slider_status()
    {
        $rules =['id'=>'required|exists:sliders,id','status'=>'required'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $status = 0;
            if(\Request::input('status') == 0){
                $status =1;
            }
            $this->query->update_data('sliders',['id'=>$id],['status'=>$status]);
            return \Redirect::action('AdminController@sliders')->with('message_success','Status successfully changed');
        }else{
            return \Redirect::action('AdminController@sliders')->with('message_error','ID not found');
        }
    }

    public function slider_delete()
    {
        $rules =['id'=>'required|exists:sliders,id'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $check = $this->query->get_data('sliders',['id'=>$id]);
            foreach($check->get() as $item);
            $url = 'images/sliders/';
            if( ! empty($item->image) && (File::exists($url.$item->image))){
                unlink($url.$item->image);
            }
            $this->query->delete_data('sliders',['id'=>$id]);
            return \Redirect::action('AdminController@sliders')->with('message_success','Data successfully deleted');
        }else{
            return \Redirect::action('AdminController@sliders')->with('message_error','ID not found');
        }
    }

    public function subscribes()
    {
        $query = $this->query;
        $subscribes = $query->get_paginate('subscribes',20,null,'updated_at');
        return view('auth.admin.settings.subscribes',compact('query','subscribes'));
    }

    public function testimonials()
    {
        $query = $this->query;
        $testimonials = $query->get_paginate('testimonials',20,null,'updated_at');
        return view('auth.admin.settings.testimonials',compact('query','testimonials'));
    }

    public function testimony_status()
    {
        $rules = ['id'=>'required|exists:testimonials,id','status'=>'required'];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $id = \Request::input('id');
            $status = 0;
            if(\Request::input('status') == 0){
                $status = 1;
            }
            $this->query->update_data('testimonials',['id'=>$id],['status'=>$status]);
            return \Redirect::action('AdminController@testimonials')->with('message_success','Status successfully updated');
        }else{
            return \Redirect::action('AdminController@testimonials')->withErrors($valid);
        }
    }

    public function setting()
    {
        return view('auth.admin.settings.user');
    }

    public function setting_save()
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
                    return \Redirect::action('AdminController@signout')->with('message_success','Password successfully updated, please signin again');
                }else{
                    return \Redirect::action('AdminController@setting')->with('message_error','Your old password wrong!');
                }
            }else{
                return \Redirect::action('AdminController@signout')->with('message_error','Not found your accout');
            }
        }else{
            return \Redirect::action('AdminController@setting')->withErrors($valid);
        }
    }

    public function contacts()
    {
        $query= $this->query;
        $contacts = $query->get_paginate('contacts',20,null,'updated_at');
        return view('auth.admin.settings.contacts',compact('query','contacts'));
    }

    public function contact_reply($id)
    {
        $query = $this->query;
        $check = $query->get_data('contacts',['id'=>$id]);
        if($check->count() == 1){
            $query->update_data('contacts',['id'=>$id],['status'=>1]);
            return view('auth.admin.settings.reply',compact('query','check'));
        }else{
            return \Redirect::action('AdminController@contacts')->with('message_error','Message not found');
        }
    }

    public function contact_reply_send()
    {
        $rules = [
            'id'=>'required|exists:contacts,id',
            'email'=>'required|exists:contacts,email',
            'name'=>'required',
            'reply'=>'required'
        ];
        $valid = \Validator::make(\Request::all(),$rules);
        if($valid->passes()){
            $insert = [
                'reply'=>\Request::input('reply'),
                'name'=>\Request::input('name'),
                'email'=>\Request::input('email')
            ];
            $mail = Mail::send(['html'=>'emails.reply'],$insert, function($message){
                $message->to(\Request::input('email'),ucwords(\Request::input('name')));
                $message->subject('Reply for your message');
            });
            if($mail){
                $update = $this->query->update_data('contacts',['id'=>\Request::input('id')],['status'=>1,'reply'=>1]);
                if($update){
                    return \Redirect::action('AdminController@contact_reply',['id'=>\Request::input('id')])->with('message_success','reply for this message successfully sent');
                }else{
                    return \Redirect::action('AdminController@contact_reply',['id'=>\Request::input('id')])->with('message_error','failed to send reply, please try again');
                }
            }else{
                return \Redirect::action('AdminController@contact_reply',['id'=>\Request::input('id')])->with('message_error','failed to sent reply, please try again');
            }
        }else{
            return \Redirect::action('AdminController@contact_reply',['id'=>\Request::input('id')])->withErrors($valid);
        }
    }
}

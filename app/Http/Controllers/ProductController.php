<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Product;

use App\Libs\UserQuery;

use Auth;
use URL;
use Share;

class ProductController extends Controller
{
    private $query;
    public function __construct(UserQuery $query)
    {
        $this->query = $query;
    }

    public function index()
    {
        $query = $this->query;
        $categories = Category::all();
        $products = Product::simplePaginate(20);
    	return view('contents.products.index',compact(['categories','products','query']));
    }

    public function detail($slug)
    {
        $query = $this->query;
        $categories = Category::all();
        $product = $query->get_data('products',['slug'=>$slug]);
        if($product->count() == 1){
            $cat_id = $query->get_field_data('products',['slug'=>$slug],'category_id');
            $id = $query->get_field_data('products',['slug'=>$slug]);
            $reviews = $query->get_data('reviews',['product_id'=>$id,'status'=>1]);
            $relations = $query->get_data('products',['category_id'=>$cat_id],['whereNotIn'=>['slug'=>[$slug]],'orderByRaw'=>\DB::raw('RAND()'),'take'=>4]);
            $images = $query->get_data('product_images',['product_id'=>$id]);
            $url = URL::action('ProductController@detail',['slug'=>$slug]);
            $shares = Share::load($url)->services('email','gplus','twitter','facebook');
            return view('contents.products.detail',compact(['categories','product','relations','query','reviews','shares','images','cat_id']));
        }else{
            return \Redirect::action('ProductController@index')->with('message_error','Product not found');
        }
    }

    public function filter()
    {
        $query = $this->query;
        $range = \Request::input('range');
        $brands = \Request::input('brands');
        $cat = \Request::input('categories');
        $query = $this->query;
        $categories = Category::all();
        $products = $query->get_filter($range,$brands,$cat);
        // return $brands;
        return view('contents.products.index',compact(['categories','products','query']));
    }

    public function category($slug)
    {
        $query = $this->query;
        $cat = $this->query->get_field_data('categories',['slug'=>$slug]);
        $categories = Category::all();
        $products = Product::where(['category_id'=>$cat])->simplePaginate(15);
        return view('contents.products.index',compact(['categories','products','query']));
    }

    public function insert_review()
    {
        if((Auth::check()) && (Auth::user()->status == 0 && Auth::user()->actived == 1)){
            $rules = [
                'product_id'    => 'required|exists:products,id',
                'product_slug'    => 'required|exists:products,slug',
                'quality_product'   =>'required',
                'quality_service'   =>'required',
                'message'   =>'required'
            ];
            $valid = \Validator::make(\Request::all(),$rules);
            if($valid->passes()){
                $product_id = \Request::input('product_id');
                $product_slug = \Request::input('product_slug');
                $quality_product = \Request::input('quality_product');
                $quality_service = \Request::input('quality_service');
                $message = \Request::input('message');
                $check = $this->query->get_data('reviews',['product_id'=>$product_id,'user_id'=>Auth::user()->id])->count();
                if($check == 0){
                    $insert = [
                    'product_id'=>$product_id,
                    'user_id'=>Auth::user()->id,
                    'quality_product'=>$quality_product,
                    'quality_service'=>$quality_service,
                    'message'=>$message,
                    'status'=>0,
                    ];
                    $insert = $this->query->insert_data('reviews',$insert);
                    if($insert){
                        return \Redirect::action('ProductController@detail',['slug'=>$product_slug])->with('message_success','Success to sent your review, thanks for your review');
                    }else{
                        return \Redirect::action('ProductController@detail',['slug'=>$product_slug])->with('message_error','Failed to send your review');
                    }
                }else{
                    return \Redirect::action('ProductController@detail',['slug'=>$product_slug])->with('message_warning','Your review has sent');
                }
            }else{
                // $url = URL::route('ProductController@detail',['slug'=>],'#send_review');
                return \Redirect::to('product/detail/'.\Request::input('product_slug').'#send_review')->withErrors($valid);
            }
        }else{
            return \Redirect::action('ProductController@detail',['slug'=>\Request::input('product_slug')])->with('message_error','You dont have access for submit review, please signin member');
        }
    }

    public function wishlist($slug)
    {
    	if((Auth::check()) && (Auth::user()->status == 0 && Auth::user()->actived == 1)){
            $product = $this->query->get_data('products',['slug'=>$slug]);
            if($product->count() == 1){
                $id = $this->query->get_field_data('products',['slug'=>$slug]);
                $check = $this->query->get_data('product_wishlist',['product_id'=>$id,'user_id'=>Auth::user()->id]);
                if($check->count() == 0){
                    $insert = ['user_id'=>Auth::user()->id,'product_id'=>$id];
                    $this->query->insert_data('product_wishlist',$insert);
                }
                return \Redirect::action('ProductController@detail',['slug'=>$slug])->with('message_success','Product successfully saved on wishlist');
            }else{
                return \Redirect::action('ProductController@index')->with('message_error','Product not found');
            }
        }else{
            return \Redirect::action('ProductController@detail',['slug'=>$slug])->with('message_error','You dont have access for submit wishlist, please signin member');
        }
    }

    public function compare()
    {
    	return "compare";
    }
}

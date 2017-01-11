<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Libs\UserQuery;

use App\Product;
class HomeController extends Controller
{
	private $query;
    public function __construct(UserQuery $query)
    {
    	$this->query = $query;
    }

    public function index(){
        $query = $this->query;
        $products = Product::simplePaginate(16);
        $sliders = $query->get_data('sliders',['status'=>1],['take'=>5,'orderBy'=>['updated_at'=>'desc']]);
        $recommendeds = $query->get_data('products',['recommended'=>1],['take'=>4,'orderBy'=>['updated_at'=>'desc']]);
        $specials = $query->get_data('products',['special'=>1],['take'=>3,'orderBy'=>['updated_at'=>'desc']]);
        $testimonials = $query->get_data('testimonials',['status'=>1],['take'=>3,'orderBy'=>['updated_at'=>'desc']]);
    	return view('contents.main.home',compact('query','products','recommendeds','specials','sliders','testimonials'));
    }

    public function page($slug){
    	$query = $this->query;
    	$content = $query->get_data('contents',['slug'=>$slug,'status'=>1]);
    	if($content->count() == 1){
    		return view('contents.main.page',compact('query','content'));
    	}else{
    		return \Redirect::action('HomeController@index')->with('message_error','Page ot found');
    	}
    }

    public function faqs(){
        $query = $this->query;
        $faqs = $query->get_data('faqs',['status'=>1]);
        return view('contents.main.faqs',compact('query','faqs'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Libs\UserQuery;

use Share;
use URL;

class NewsController extends Controller
{
    private $query;
    public function __construct(UserQuery $query)
    {
        $this->query = $query;
    }

    public function index()
    {
        $query = $this->query;
        $categories = $query->get_data('news_categories');
        $news = $query->get_paginate('news',15);
        // return dd($news);
        return view('contents.news.index',compact('query','categories','news'));
    	// return "index";
    }

    public function detail($slug)
    {
        $query = $this->query;
        $news = $query->get_data('news',['slug'=>$slug]);
        if($news->count() == 1){
            $categories = $query->get_data('news_categories');
            $cat_id = $query->get_field_data('news',['slug'=>$slug],'category_id');
            $id = $query->get_field_data('news',['slug'=>$slug]);
            $relations = $query->get_data('news',['category_id'=>$cat_id],['whereNotIn'=>['slug'=>[$slug]],'orderByRaw'=>\DB::raw('RAND()'),'take'=>4]);
            $url = URL::action('NewsController@detail',['slug'=>$slug]);
            $shares = Share::load($url)->services('email','gplus','twitter','facebook');
            return view('contents.news.detail',compact(['categories','news','relations','query','shares']));
        }else{
            return \Redirect::action('ProductController@index')->with('message_error','News not found');
        }
    }

    public function category($slug)
    {
        $query = $this->query;
        $cat = $this->query->get_field_data('news_categories',['slug'=>$slug]);
        $categories = $query->get_data('news_categories');
        $news = $query->get_paginate('news',15,['category_id'=>$cat]);
        return view('contents.news.index',compact(['categories','news','query']));
    }

}

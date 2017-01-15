<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*==== PUBLIC ====*/

Route::get('/','HomeController@index');
Route::get('page/{slug}','HomeController@page');
Route::get('faqs','HomeController@faqs');
Route::post('contact/send','HomeController@contact_send');

Route::get('blogs','NewsController@index');
Route::get('blog/detail/{slug}','NewsController@detail');
Route::get('blog/category/{slug}','NewsController@category');

Route::get('products','ProductController@index');
Route::get('product/category/{slug}','ProductController@category');
Route::get('product/detail/{slug}','ProductController@detail');
Route::post('product/search','ProductController@search');
Route::post('product/review','ProductController@insert_review');
// Route::post('product/filter','ProductController@filter');
Route::match(['get','post'],'product/filter','ProductController@filter');
Route::get('product/wishlist/{slug}','ProductController@wishlist');

Route::get('member/signin','MemberController@signin');
Route::post('member/signin','MemberController@login');
Route::get('member/signup','MemberController@signup');
Route::post('member/signup','MemberController@register');
Route::get('member/confirm/{confirm}','MemberController@confirm');
Route::post('subscribe','MemberController@subscribe');
Route::get('subscribe/{unique_code}','MemberController@subscribe_status');


View::composer('admin','App\Composers\SettingComposer');
View::composer('app','App\Composers\SettingComposer');
View::composer('menus.admin_navbartop','App\Composers\SettingComposer');
View::composer('menus.filter','App\Composers\SettingComposer');
View::composer('menus.header','App\Composers\SettingComposer');
View::composer('menus.footer','App\Composers\SettingComposer');

//member area
Route::group(['middleware'=>['auth']],function(){

	Route::get('member/home','MemberController@memberarea');
	Route::get('member/signout','MemberController@signout');
	Route::get('member/reviews','MemberController@reviews');
	Route::get('member/testimony','MemberController@testimony');
	Route::post('member/testimony','MemberController@testimony_commit');

	Route::get('member/wishlist','MemberController@wishlist');
	Route::post('member/wishlist/remove','MemberController@remove_wishlist');
	Route::post('member/change/password','MemberController@change_password');
	Route::get('member/setting','MemberController@setting');
});

Route::group(['middleware'=>['admin']],function(){
	Route::get('admin/home','AdminController@home');
	Route::get('admin/signout','AdminController@signout');

	// news 
	Route::get('admin/blog/index','AdminController@news');
	Route::get('admin/blog/add','AdminController@news_add');
	Route::get('admin/blog/edit/{id}','AdminController@news_edit');
	Route::post('admin/blog/delete','AdminController@news_delete');
	Route::post('admin/blog/add','AdminController@news_insert');
	Route::post('admin/blog/update','AdminController@news_update');

	Route::get('admin/blog/categories','AdminController@news_categories');
	Route::post('admin/blog/categories','AdminController@news_category_add');
	Route::get('admin/blog/category/edit/{id}','AdminController@news_category_edit');
	Route::post('admin/blog/category/delete','AdminController@news_category_delete');
	Route::post('admin/blog/category/update','AdminController@news_category_update');
	

	// products brands
	Route::get('admin/product/brands','AdminController@brands');
	Route::post('admin/product/brand/insert','AdminController@brand_insert');
	Route::post('admin/product/brand/update','AdminController@brand_update');
	Route::post('admin/product/brand/delete','AdminController@brand_delete');
	// products category
	Route::get('admin/product/categories','AdminController@product_categories');
	Route::post('admin/product/category/insert','AdminController@product_category_insert');
	Route::post('admin/product/category/update','AdminController@product_category_update');
	Route::post('admin/product/category/delete','AdminController@product_category_delete');
	// products
	Route::get('admin/products/index','AdminController@products');
	Route::get('admin/product/add','AdminController@product_add');
	Route::post('admin/product/add','AdminController@product_insert');
	Route::get('admin/product/edit/{id}','AdminController@product_edit');
	Route::post('admin/product/delete','AdminController@product_delete');
	Route::post('admin/product/image/delete','AdminController@product_image_delete');
	Route::post('admin/product/image/insert','AdminController@product_image_insert');
	Route::post('admin/product/update','AdminController@product_update');
	Route::get('admin/product/reviews','AdminController@product_reviews');
	Route::post('admin/product/review/update','AdminController@product_review_update');
	
	// users 
	Route::get('admin/users/index','AdminController@users');
	Route::get('admin/user/add','AdminController@user_add');
	Route::post('admin/user/add','AdminController@user_insert');
	Route::post('admin/user/change/actived','AdminController@user_actived');
	Route::post('admin/user/delete','AdminController@user_delete');
	Route::post('admin/user/update','AdminController@user_update');
	Route::get('admin/user/edit/{id}','AdminController@user_edit');

	// settings 
	Route::get('admin/setting/profile','AdminController@profile');
	Route::post('admin/setting/profile','AdminController@profile_save');
	Route::get('admin/setting/contents','AdminController@contents');
	Route::post('admin/setting/content/update','AdminController@content_update');
	Route::get('admin/setting/faqs','AdminController@faqs');
	Route::get('admin/setting/faq/edit/{id}','AdminController@faq_edit');
	Route::post('admin/setting/faq/insert','AdminController@faq_insert');
	Route::post('admin/setting/faq/update','AdminController@faq_update');
	Route::post('admin/setting/faq/delete','AdminController@faq_delete');
	Route::post('admin/setting/faq/status','AdminController@faq_change_status');
	Route::get('admin/setting/sliders','AdminController@sliders');
	Route::post('admin/setting/slider/insert','AdminController@slider_insert');
	Route::post('admin/setting/slider/delete','AdminController@slider_delete');
	Route::post('admin/setting/slider/status','AdminController@slider_status');
	Route::get('admin/setting/subscribes','AdminController@subscribes');
	Route::get('admin/setting/testimonials','AdminController@testimonials');
	Route::post('admin/setting/testimonial/status','AdminController@testimony_status');
	Route::get('admin/setting/user','AdminController@setting');
	Route::post('admin/setting/user','AdminController@setting_save');

	Route::get('admin/contacts','AdminController@contacts');
	Route::get('admin/contact/reply/{id}','AdminController@contact_reply');
	Route::post('admin/contact/reply','AdminController@contact_reply_send');

});
/*====== END ======*/

/*===== AUTH =====*/

/*===== END =====*/

<?php 

namespace App\Composers;
use Illuminate\View\View;

use DB;
use App\Libs\UserQuery;
use Auth;
/**
* Composer File for Setting Admin
*/
class SettingComposer
{
	private $query;
	function __construct(UserQuery $query)
	{
		$this->query = $query;
	}

	public function compose(View $view)
	{
		$view
		// ->with('userprofile',$this->userprofile())
			->with('webprofile',$this->webprofile())
			->with('getquery',$this->getquery())
			->with('productlatests',$this->productlatests())
			->with('menu_categories',$this->menu_categories())
			->with('contactcount',$this->contactcount())
			->with('news_categories',$this->news_categories());
	}

	public function getquery()
	{
		return $this->query;
	}

	public function webprofile(){
		return DB::table('profile')->where(['id'=>1,'status'=>1])->get();
	}

	public function productlatests()
	{
		return DB::table('products')->take(20)->orderBy('created_at','desc');
	}

	public function menu_categories()
	{
		return DB::table('categories')->where(['parent'=>0]);
	}

	public function news_categories()
	{
		return DB::table('news_categories')->where(['parent'=>0]);
	}

	public function contactcount()
	{
		return DB::table('contacts')->where(['status'=>0])->count();
	}
	// private function userprofile()
	// {
	// 	return DB::table('users')->where([
	// 			'id'	=> Auth::user()->id,
	// 			'email'	=> Auth::user()->email,
	// 			'status'=> Auth::user()->status,
	// 			'actived'=> Auth::user()->actived
	// 		])->get();
	// }
}
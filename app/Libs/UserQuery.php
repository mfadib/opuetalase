<?php namespace App\Libs;

use Illuminate\View\Engines\PhpEngine;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
//use Illuminate\Pagination\Paginator;

use File;
use DB;
use Session;
use Auth;
use Query;
use Currency;


class UserQuery{
	public function get_data($table, $where= null,$opt=null){
		$table = DB::table($table);
		if($where != null){
			$table->where($where);
		}

		if(($opt != null) && (is_array($opt))){
			foreach($opt as $key=>$value){
				if(is_array($value)){
					foreach($value as $field=>$val);
					$table->$key($field,$val);
				}else{
					$table->$key($value);
				}
			}
		}

		return $table;
	}

	public function get_data_multiwhere($table,$where=null,$field='id', $opt = null){
		$table = DB::table($table);
		if($where != null){
			$no = 1;
			foreach($where as $value){
				if($no == 1){
					$table->where($field,'=',$value);
				}else{
					$table->orwhere($field,'=',$value);
				}
				$no++;
			}
		}
		if(($opt != null) && (is_array($opt))){
			foreach($opt as $key=>$value){
				if(is_array($value)){
					foreach($value as $field=>$val);
					$table->$key($field,$val);
				}else{
					$table->$key($value);
				}

				/*foreach($value as $field=>$val){
					if($key == 'order') $table->order($field,$val); if($key == 'take') $table->take($val); if($key == 'limit') $table->limit($val); if($key == 'avg') $table->avg($val);
				}*/

			}
		}
		return $table;
	}


	public function get_like($table, $where= null,$opt=null){
		$table = DB::table($table);
		if($where != null){
			foreach($where as $key=>$value)
				$table->where($key,'like','%'.$value.'%');
		}

		if(($opt != null) && (is_array($opt))){
			foreach($opt as $key=>$value){
				if(is_array($value)){
					foreach($value as $field=>$val);
					$table->$key($field,$val);
				}else{
					$table->$key($value);
				}

				/*foreach($value as $field=>$val){
					if($key == 'order') $table->order($field,$val); if($key == 'take') $table->take($val); if($key == 'limit') $table->limit($val); if($key == 'avg') $table->avg($val);
				}*/

			}
		}

		return $table;
	}

	public function get_query($sql){
		return DB::select(DB::raw($sql));
	}

	public function get_paginate($table,$limit,$where=null,$order='created_at',$type='desc'){
		$table = DB::table($table);
		if($where != null){
			$table->where($where);
		}
		return $table->orderBy($order,$type)->simplePaginate($limit);
	}

	public function get_paginate_multiwhere($table,$limit,$where=null,$field=null,$order='created_at',$type='desc'){
		$table = DB::table($table);
		if($where != null){
			$no = 1;
			foreach($where as $value){
				if($no == 1){
					$table->where($field,'=',$value);
				}else{
					$table->orwhere($field,'=',$value);
				}
				$no++;
			}
		}
		return $table->orderBy($order,$type)->simplePaginate($limit);
	}

	public function get_field_data($table,$where,$field = 'id'){
		$tab = DB::table($table)->where($where);
		foreach($tab->get() as $item);
		return $item->$field;
	}

	public function insert_data($table,$data){
		return DB::table($table)->insert($data);
	}

	public function update_data($table, $where, $data){
		return DB::table($table)->where($where)->update($data);
	}

	public function delete_data($table,$where){
		return DB::table($table)->where($where)->delete();
	}

	public function time_display($date,$time = false,$type = 1){
		$d = strtotime($date);
		$r = date('M d, Y',$d);
		if($type == 2){
			$r = date('d M, Y',$d);
		}
		$return = $r;
		if($time == true){
			$ti = date('H:i:s',$d);
			$return = $r.' at '.$ti;
		}
		return $return;
	}


	public static function currency_format($number,$des = 0,$type='IDR'){
		$price = $number;
		if(Session::has('currency_format')){
			$code = Session::get('currency_format');
			$type = Session::get('currency_type');
			$price = Currency::convert('USD','IDR',$number);
		}

		return $type.'. '.number_format($price,$des,'.',',');
	}

	public function get_unique_code(){
		return rand(10,999);
	}

	public function get_token($limit = 15){
		return str_random($limit);
	}

	public function get_rand(){
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		// generate a pin based on 2 * 7 digits + a random character
		$pin = mt_rand(100, 999)
		    . $characters[rand(0, strlen($characters) - 9)]
		    . mt_rand(1000, 9999);

		// shuffle the result
		$string = str_shuffle($pin);
		return $string;
	}

	public function get_voucher(){
	    $character_set_array = array();
	    $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
	    $character_set_array[] = array('count' => 4, 'characters' => '0123456789');
	    $temp_array = array();
	    foreach ($character_set_array as $character_set) {
	        for ($i = 0; $i < $character_set['count']; $i++) {
	            $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
	        }
	    }
	    shuffle($temp_array);
	    return implode('', $temp_array);

	}

	public function get_password(){
	    $character_set_array = array();
	    $character_set_array[] = array('count' => 2, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
	    $character_set_array[] = array('count' => 2, 'characters' => '0123456789');
	    $temp_array = array();
	    foreach ($character_set_array as $character_set) {
	        for ($i = 0; $i < $character_set['count']; $i++) {
	            $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
	        }
	    }
	    shuffle($temp_array);
	    return implode('', $temp_array);

	}

	public function obfuscate_email($email){
	    $em   = explode("@",$email);
	    $name = implode(array_slice($em, 0, count($em)-1), '@');
	    // $len  = floor(strlen($name)/2);
	    $len  = strlen($name)-3;
	    return substr($name,0, $len) . str_repeat('*', 3) . "@" . end($em);
	}

	public function obfuscate_phone($phone){
		$len = strlen($phone)-3;
		return substr($phone,0,$len).str_repeat('*',3);
	}

	public static function get_data_array($table,$where=null,$field='name',$id='id'){
		// $table = DB::table($table);
		$t = DB::table($table);
		if($where != null){
			$t->where($where);
		}
		$data = array();
		foreach($t->get() as $d){
			$data[$d->$id]		= $d->$field;
		}
		return $data;
	}

	public static function get_data_field_array($table,$where=null,$field='name'){
		// $table = DB::table($table);
		$t = DB::table($table);
		if($where != null){
			$t->where($where);
		}
		$data = array();
		foreach($t->get() as $d){
			$data[]		= $d->$field;
		}
		return $data;
	}

	public static function get_data_select($table,$where=null,$text,$field='name',$id='id'){
		$t = DB::table($table);
		if($where != null){
			$t->where($where);
		}
		$data = array();
		$data[0] = $text;
		foreach($t->get() as $d){
			$data[$d->$id]		= $d->$field;
		}
		return $data;
	}

	public function get_id($table, $where){
		$tab = DB::table($table)->where($where);
		if($tab->count() == 1 ){
			foreach($tab->get() as $item);
			return $item->id;
		}else{
			return null;
		}
	}


	public function status_payment($stts){
		$data = '';
		if($stts == 0){
			$data = 'Belum di verifikasi';
		}elseif($stts == 1){
			$data = 'Terverifikasi';
		}
		return $data;
	}

	public function status_bank($stts){
		$data = '';
		if($stts == 0){
			$data = 'Tidak Aktif';
		}elseif($stts == 1){
			$data = 'Aktif';
		}
		return $data;
	}

	public function status_confirmation($stts){
		$data = '';
		if($stts == 0){
			$data = 'Pending';
		}elseif($stts == 1){
			$data = 'Proses';
		}elseif($stts == 2){
			$data = 'Sukses';
		}elseif($stts == 3){
			$data = 'Gagal';
		}
		return $data;
	}

	public function status_voucher($stts){
		$data = '';
		if($stts == 1){
			$data = 'Terverifikasi';
		}else{
			$data = 'Belum Terverifikasi';
		}
		return $data;
	}

	public function get_review($review)
	{
		$data = 'Unknown';
		if($review == 1){
			$data = 'Very Bed';
		}elseif($review == 2){
			$data = 'Bed';
		}elseif($review == 3){
			$data = 'Netral';
		}elseif($review == 4){
			$data = 'Good';
		}elseif($review == 5){
			$data = 'Very Good';
		}
		return $data;
	}

	public function get_yesno($stts)
	{
		$data = 'No';
		if($stts == 1){
			$data = 'Yes';
		}
		return $data;
	}

	public function get_status($stts)
	{
		$data = 'Non-Active';
		if($stts == 1){
			$data = 'Actived';
		}
		return $data;
	}

	public function get_read($stts)
	{
		$data = 'Unread';
		if($stts == 1){
			$data = 'Read';
		}
		return $data;
	}

	public function get_usertype($type)
	{
		$data = 'User';
		if($type == 1){
			$data = 'Admin';
		}
		return $data;
	}

	public function get_ellipsis($texts, $length = 30,$ellipsis = '...')
	{
		$l = strlen($texts);
		$str = $texts;
		if($l > $length){
			$str = substr($texts, 0, $length).$ellipsis;
		}
		return $str;
	}

}

?>
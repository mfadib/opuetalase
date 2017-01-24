<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 'slug', 'meta_description','meta_keywords','brief','description','image','category_id'
    ];


    public function setNameAttribute($value){
    	$this->attributes('title') = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
    	$this->attributes['slug'] = str_slug($this->title);
    }

    public function setBriefAttribute($value)
    {
    	$this->attributes['brief'] = '<p>'.$value.'</p>'
    }

    public function setDescriptionAttribute($value)
    {
    	$this->attributes['description'] = '<p>'.$value.'</p>'
    }

}

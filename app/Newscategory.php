<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newscategory extends Model
{
    protected $table = 'news_categories';

    protected $fillable = [
        'name', 'slug', 'parent',
    ];


    public function setNameAttribute($value){
    	$this->attributes('name') = ucfirst($value);
    }

    public function setSlugAttribute($value)
    {
    	$this->attributes['slug'] = str_slug($this->name);
    }
}

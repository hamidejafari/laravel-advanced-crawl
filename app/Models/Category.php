<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [

        'title' ,   'status'  , 'parent_id' , 'title_seo' , 'description_seo' , 'url' , 'description' , 'image' ,'schema_code','english_titles'

    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id' , 'id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Category', 'category_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable')->whereNull('parent_id');
    }

}

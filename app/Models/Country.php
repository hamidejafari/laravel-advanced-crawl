<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [

        'title' , 'status' , 'title_seo' , 'description_seo' ,
        'content',
        'title_content',
        'content_more',
        'url',
        'image',
        'show',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'country_id', 'id');
    }



}

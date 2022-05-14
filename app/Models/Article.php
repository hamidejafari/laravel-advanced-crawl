<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
        
        protected $fillable = [

            'title' , 'description' , 'image' ,  'status' , 'articlecat_id' , 'description_seo' , 'title_seo' , 'image_seo' ,
            'url' , 'lid' , 

        ];



    public function articlecat()
    {
        return $this->belongsTo('App\Models\Articlecat', 'articlecat_id', 'id');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articlecat extends Model
{
    protected $table = 'articlecat';
    
    protected $fillable = [

        'title' , 'description' , 'image' ,  'status'  , 'title_seo' , 'image_seo' , 'url' ,
         'description_seo' , 'parent_id' , 'header' , 

    ];

    public function article()
    {
        return $this->hasMany('App\Models\Articlec', 'articlecat_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Articlecat', 'parent_id' , 'id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Articlecat', 'parent_id' , 'id');
    }
}

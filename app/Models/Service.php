<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    
    protected $fillable = [

        'title' , 'description' , 'image' ,  'status' ,'linked' , 'category_id' , 'description_seo' , 'title_seo' , 'image_seo' ,
        'url' , 'lid' , 

    ];
}

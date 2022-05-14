<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = [
        'title' , 'status' ,  'title_seo' ,
        'content',
        'title_content',
        'content_more',
        'url',
        'image','schema_code',
        'show',

    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'language_id', 'id');
    }
}

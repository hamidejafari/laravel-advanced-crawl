<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = [

        'title' , 'description' , 'icon' , 'status' , 'question' , 'response' , 'url' ,
        'title_seo' , 'type' , 'description_seo' , 'image_seo' , 'parent_id' , 'image','schema_code',
'short_text'
    ];

    public function scopeUploader($query)
    {
        $records = $query->whereType('uploader');
        return $records;
    }

    public function scopeQuestions($query)
    {
        $records = $query->whereType('questions');
        return $records;
    }

    public function scopeSloagens($query)
    {
        $records = $query->whereType('sloagens');
        return $records;
    }

    public function scopeArticlecat($query)
    {
        $records = $query->whereType('articlecat');
        return $records;
    }

    public function scopeArticle($query)
    {
        $records = $query->whereType('article');
        return $records;
    }
    public function parent()
    {
        return $this->belongsTo(Content::class, 'parent_id', 'id');
    }
}

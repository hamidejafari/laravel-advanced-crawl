<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products_crawl';

    protected $fillable = [
'old_id',
        'title' , 'status' , 'description' , 'image' , 'language_id' , 'country_id' ,
        'status' , 'url' , 'price' ,'price_dollar', 'category_id' , 'title_seo' , 'description_seo' , 'da' ,'dr', 'subject' ,
'status_id',
        'domain',
        'traffic',
        'domain_level',
        'links',
        'marked_sponsored',
        'info',
        'show_in_list',
        'active',
        'sort_number',
        'content_by_media',
        'max_doffolow_link',
        'max_total_link',
        'activity_hint',
        'requirements',
        'content_requirements',
        'show_before_login','crawled_at','price_convert','unround_price','related','inactive_reason','contact_info','price_updated_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function statusRelationship()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category',
            'product_categories', 'product_id', 'category_id');
    }
     public function statuses()
    {
        return $this->belongsToMany('App\Models\Status',
            'product_statuses', 'product_id', 'status_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language', 'language_id', 'id');
    }
}

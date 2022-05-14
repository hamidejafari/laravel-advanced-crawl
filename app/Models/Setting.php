<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';

    protected $fillable = [
        'pricing_time',
        'current_dollar','precent_dollar_profit','pricing','priced_count','last_priced_id',
        'crawled_page','crawling','crawled_count','crawl_url','crawl_end_count',
        'title' , 'logo' , 'favicon' , 'abouttitle' , 'aboutus' , 'aboutimg' ,
        'maps' , 'rules' , 'email' , 'address' , 'phone' , 'phone2' , 'description', 'title_seo' ,
        'description_seo' , 'image_seo' , 'head' ,
        'sitemap', 'sitemapimg', 'sitemaptime', 'sitemapactive', 'sitemapcat', 'priority' ,'domains_crawl',
        'price_limit','price_max_limit','schema_code','about_us_title','about_us_first','slider_title','slider_description','slider_button','slider_link','enamad','faq','req','blog'
    ];
    public function scopeSet($query)
    {
        $records = $query->whereType(1);
        return $records;
    }
    public function scopeDaily($query)
    {
        $records = $query->whereType('daily');
        return $records;
    }
    public function scopeMonthly($query)
    {
        $records = $query->whereType('monthly');
        return $records;
    }
    public function scopeWeekly($query)
    {
        $records = $query->whereType('weekly');
        return $records;
    }
    public function scopeYearly($query)
    {
        $records = $query->whereType('yearly');
        return $records;
    }


}

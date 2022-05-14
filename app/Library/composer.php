<?php

use App\Models\Content;
use App\Models\Country;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Category;
use App\Models\Social;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

$category_menu=[];
$category_parent=[];
$setting_header=[];
$article_menu=[];
$social_so=[];
$service=[];

$category_menu = Category::whereNull('parent_id')->get();
$category_parent= Category::get();
$article_menu = content::articlecat()->get();
$setting_header = Setting::first();
$social_so= Social::get();


$countries = Country::where('status',1)->whereNotNull('url')->take(12)->get();
$languages = Language::where('status',1)->whereNotNull('url')->get();
$service = Service::all();

$setting = Setting::first();
$profit = ($setting->precent_dollar_profit*$setting->current_dollar) / 100;
$profit_dollar = $profit + $setting->current_dollar;


View::share([
    'profit_dollar_side' => $profit_dollar,
    'price_dollar_side' =>  $setting->current_dollar,
    'category_menu' => $category_menu,
    'category_parent' => $category_parent,
    'setting_header' => $setting_header,
    'article_menu' => $article_menu,
    'social_so' => $social_so,
    'countries2' => $countries,
    'languages2' => $languages,
    'service2' => $service,
]);





?>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Content;
use App\Models\Setting;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $products = Product::get();
        $articles = Content::Article()->get();
        $catart = Content::articlecat()->get();
        $category = Category::get();
        return response()->view('sitemap', [

            'products' => $products,
            'articles' => $articles,
            'catart' => $catart,
            'category' => $category,

        ])->header('Content-Type','text/xml');    
    }
}

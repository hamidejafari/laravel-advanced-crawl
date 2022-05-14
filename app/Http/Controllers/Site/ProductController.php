<?php

namespace App\Http\Controllers\Site;

use App\Models\Country;
use App\Models\Language;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Product;
use App\Models\Redirects;
use App\Models\Setting;
use App\Models\Comment;
use App\Models\Social;
use App\Models\Service;
use App\User;

class ProductController extends Controller
{
    public function getProductList(Request $request){
        $seg = $request->segments();
        $country = Country::where('url',$seg[0])->first();
        $language = Language::where('url',$seg[0])->first();
        $data = null;
        $type = null;
        if($country !== null & $language == null){
            $data = $country;
            $type = 'country';
        }elseif($language !== null & $country == null){
            $data = $language;
            $type = 'language';

        }else{
            return redirect('/');
        }

        return view('site.product.list')
            ->with('type', $type)
            ->with('data', $data);
    }
}

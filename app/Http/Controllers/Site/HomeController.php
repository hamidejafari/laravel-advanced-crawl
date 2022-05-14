<?php

namespace App\Http\Controllers\Site;

use App\Library\CustomCrawler;
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
use App\Models\ProductCategory;
use App\Models\Redirects;
use App\Models\Setting;
use App\Models\Comment;
use App\Models\Social;
use App\Models\Service;
use App\User;
use Auth;
use DOMDocument;
use function Ramsey\Uuid\v1;


class HomeController extends Controller
{


    function crawl_page($url, $depth = 5)
    {
        static $seen = array();
        if (isset($seen[$url]) || $depth === 0) {
            return;
        }
        $seen[$url] = true;
        $dom = new DOMDocument('1.0');



        $context = stream_context_create(array(
            'http' => array(
                'header'  => "Authorization: Basic " . base64_encode("mohsen.unlimited@gmail.com:Siroos90$")
            )
        ));
        $data = file_get_contents($url, false, $context);

        dd($data);
        @$dom->loadHTMLFile($url,$context);
        $anchors = $dom->getElementsByTagName('img');
        dd($dom);
        $arr = [];
        foreach ($anchors as $element) {
            dd($element->nodeValue);
            $arr[] = $element;
//            $href = $element->getAttribute('href');
//            if (0 !== strpos($href, 'http')) {
//                $path = '/' . ltrim($href, '/');
//                if (extension_loaded('http')) {
//                    $href = http_build_url($url, array('path' => $path));
//                } else {
//                    $parts = parse_url($url);
//                    $href = $parts['scheme'] . '://';
//                    if (isset($parts['user']) && isset($parts['pass'])) {
//                        $href .= $parts['user'] . ':' . $parts['pass'] . '@';
//                    }
//                    $href .= $parts['host'];
//                    if (isset($parts['port'])) {
//                        $href .= ':' . $parts['port'];
//                    }
//                    $href .= dirname($parts['path'], 1) . $path;
//                }
//            }
//            crawl_page($href, $depth - 1);
        }
        dd($arr);
    }




    public function testCrawl(){



        self::crawl_page("https://cp.adsy.com/marketer/platform/index?per-page=50&page=3", 2);
    }



    public function convertCat(){

        // $name = " کار و استخدام";
        // $names = "تفریحی و خبری";
        // if(strpos($names, $name)){
        //     dd('وجود دارد');
        // }else{
        //     dd('وجود ندارد');
        // }
        $converting_data = Media::where('id','>',1101)->take(70000)->get();
        $cats = [];
        foreach($converting_data as $row){
            if($row->CategoryFa !== null){
                if(strpos($row->CategoryFa, ',')){
                    $titles = explode(',',$row->CategoryFa);
                    foreach($titles as $item){
                        $title = str_replace('',',',$row->title);
                        $check = Category::where('title',str_replace('',' ',$title))->first();
                        if(!$check){
                            Category::create([
                                'title'=>str_replace('',' ',$title)
                            ]);
                        }
                    }
                }else{
                    $titles = explode(' ',$row->CategoryFa);
                    foreach($titles as $item){
                        $check = Category::where('title',$item)->first();
                        if(!$check){
                            Category::create([
                                'title'=>$item
                            ]);
                        }
                    }
                }
            }
        }

    }
    public function convert(){

        // $name = " کار و استخدام";
        // $names = "تفریحی و خبری";
        // if(strpos($names, $name)){
        //     dd('وجود دارد');
        // }else{
        //     dd('وجود ندارد');
        // }
        $converting_data = Media::where('id','>',11780)->take(1000)->get();
        $main_categories = Category::all();
        $category_ids = [];
        foreach($converting_data as $row){
            if($row->CountryFa !== null){
                $country = Country::where('title','LIKE','%'.$row->CountryFa.'%')->first();
                if($country == null){
                    $country = Country::create([
                        'title'=>$row->CountryFa
                    ]);
                }
            }else{
                $country = null;
            }

            if($row->LanguageFa !== null){
                $language = Language::where('title','LIKE','%'.$row->LanguageFa.'%')->first();
                if($language == null){
                    $language = Language::create([
                        'title'=>$row->LanguageFa
                    ]);
                }
            }else{
                $language = null;
            }

            $product = Product::create([
                'old_id'=>$row->id,
                'domain'=>$row->Domain,
                'language_id'=>@$language->id,
                'country_id'=>@$country->id,
                'da'=>$row->DA,
                'traffic'=>$row->Traffic,
                'domain_level'=>$row->DomainLevel,
                'links'=>$row->Links,
                'marked_sponsored'=>$row->MarkedSponsored,
                'price'=>$row->PriceToman,
                'info'=>$row->Info,
                'show_in_list'=>$row->ShowInList,
                'active'=>$row->Active,
                'content_by_media'=>$row->ContentByMedia,
                'max_doffolow_link'=>$row->MaxDoffolowLink,
                'max_total_link'=>$row->MaxTotalLink,
                'activity_hint'=>$row->ActivityHint,
                'requirements'=>$row->Requirements,
                'content_requirements'=>$row->ContentRequirements,
                'sort_number'=>$row->SortNumber,
            ]);

            if($row->CategoryFa !== null){
                foreach($main_categories as $item){
                    if(strpos($row->CategoryFa, $item->title)){
                        $category_ids[] = [
                            'category_id'=>$item->id,
                            'product_id'=>$product->id,
                        ];
                    }
                }
            }
        }
        ProductCategory::insert($category_ids);
    }
    public function getIndex(){
        $categories = Category::wherenull('parent_id')->get();
        $contacts = Contact::get();
        $sloagens = Content::sloagens()->where('status','1')->take(4)->get();
        $articles = Content::orderby('id','desc')->article()->get();
        $questions = Content::questions()->where('status','1')->where('status','1')->take(6)->get();
        $service = Service::take(6)->where('status','1')->get();
        $articlecats = Content::orderby('id','desc')->articlecat()->get();
        $uploaders = Content::uploader()->get();
        $products = Product::get();
        $redirects = Redirects::get();
        $settings = Setting::first();
        $socials = Social::get();

        return view('site.index')
        ->with('categories' , $categories)
        ->with('contacts' , $contacts)
        ->with('articles' , $articles)
        ->with('sloagens' , $sloagens)
        ->with('questions' , $questions)
        ->with('service' , $service)
        ->with('articlecats' , $articlecats)
        ->with('uploaders' , $uploaders)
        ->with('products' , $products)
        ->with('redirects' , $redirects)
        ->with('settings' , $settings)
        ->with('socials' , $socials);
    }
    public function getCategory(Request $request)
    {
        $seg = $request->segments();
        $category = Category::where('url',$seg[1])->first();
        $pro = Product::where('category_id' , $category->id)->get();
        $row = Service::get();


        return view('site.reportage')
        ->with('pro', $pro)
        ->with('category' , $category)
        ->with('row' , $row);


    }
    public function getService(){

        $row = Service::get();
        return view('site.services')
        ->with('row' , $row);

    }
    public function getProductDetails(Request $request)
    {
        $seg = $request->segments();
        $product = Product::where('url',$seg[1])->first();
        return view('site.reportage')
        ->with('product', $product);

    }
    public function getServiceDetails(Request $request)
    {
        $seg = $request->segments();
        $service = Service::where('url',$seg[1])->first();
        return view('site.servicesdetails')
        ->with('service' , $service);
    }


    public function getArticle(){

        $cats = Content::Article()->get();
        return view('site.article')
        ->with('cats' , $cats);

    }
    public function getArticleCat(Request $request){
        $seg = $request->segments();
        $category = Content::where('url',$seg[0])->first();
        $articles = Content::where('parent_id',$category->id)->get();
        return view('site.articlecat')
            ->with('category' , $category)
            ->with('articles' , $articles);
    }

    public function getArticleDetails(Request $request)
    {
        $seg = $request->segments();
        $article = Content::Article()->where('url',$seg[1])->first();
        return view('site.articledetails')
        ->with('article' , $article);
    }


    public function getAboutus(){

        return view('site.aboutus');

    }
    public function getRules(){

        return view('site.rules');

    }
    public function getContactus(){
        return view('site.contactus');
    }
    public function postContactus(Request $request){

        $input = $request->all();
        //dd($request->all());

        $input = Contact::create($input);
        return redirect()->back()->with('success', 'پیام تماس باما با موفقیت ارسال شد ');

    }
    public function getFaq(){
        $data = Content::questions()->get();
        $row = Service::get();
        return view('site.faq')
        ->with('data' , $data)
        ->with('row' , $row);
    }
    public function postcomment(Request $request){

        $product = Category::find($request->get('commentable_id'));


        $comment = Comment::create([
            'text'=>$request->get('text'),
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'status'=> 0 ,
            'read_at'=> 0 ,
            'commentable_id'=>$request->get('commentable_id'),
            'commentable_type'=>$request->get('commentable_type'),
        ]);

            //dd($comment);


            return redirect()->back()->with('success', 'نظر با موفقیت ثبت شد');
    }
    public function postReply(Request $request){

        $product = Category::find($request->get('commentable_id'));


        $comment = Comment::create([
            'text'=>$request->get('text'),
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'parent_id'=>$request->get('id'),
            'status'=> 0 ,
            'read_at'=> 0 ,
            'commentable_id'=>$request->get('commentable_id'),
            'commentable_type'=>$request->get('commentable_type'),
        ]);

            //dd($comment);


            return redirect()->back()->with('success', 'پاسخ با موفقیت ثبت شد');
    }
}

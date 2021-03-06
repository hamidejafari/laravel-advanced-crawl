<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\CrawledDomains;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Profit;
use App\Models\Setting;
use Auth;
use Carbon\Carbon;
use DOMDocument;
use Exception;
use function Ramsey\Uuid\v1;
use DomXPath;
use App\Library\WebClientCustom;

class CrawlController extends Controller
{
    public function fixDrs(){
        $drs_fix = Product::where('dr','N/A')->get();
        foreach ($drs_fix as $row){
            $x = Product::find($row->id);
            $x->update([
                'dr'=>null
            ]);
        }
    }
    public function fixExcel(){
        $drs_fix = Product::where('show_in_list',0)->get();
        foreach ($drs_fix as $row){
            $x = Product::find($row->id);
            $x->update([
                'show_in_list'=>1
            ]);
        }
    }
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
    public function _testCrawl(){
        self::crawl_page("https://cp.adsy.com/marketer/platform/index?per-page=50&page=3", 2);
    }
    public static function readPages($url_page){
        $url = 'https://cp.adsy.com'.$url_page; //url page
        $wc = new WebClientCustom();
        $page = $wc->Navigate($url);
//        dd($url);

        if ($page === FALSE) {
            dd('Failed to load');
        }
        $dom = new DOMDocument('1.0');
        $html_code = $page;
        $searchPage = mb_convert_encoding($html_code, 'HTML-ENTITIES', "UTF-8");
        @$dom->loadHtml($searchPage);
        $data = null;
        $finder = new DomXPath($dom);
        $spaner = $finder->query("//*[contains(@class, 'table--block__url')]");

        $elems = $dom->getElementsByTagName('td');
        $date_child = [];

        foreach($elems as $row){
            $date_child[] = $row->nodeValue;
        }


        $date_child['page'] = $page;
        return $date_child;
    }
    public static function persianCategory($name){
        $name =  str_replace("For Women"," ???????? ",$name);
        $name =  str_replace("For Men"," ?????????? ",$name);
        $name =  str_replace("Beauty"," ???????????? ",$name);
        $name =  str_replace("Health"," ?????????? ",$name);
        $name =  str_replace("Construction a..."," ???????? ?? ?????? ?????????????? ",$name);
        $name =  str_replace("Startups"," ???????????????? ",$name);
        $name =  str_replace("Public Service"," ?????????? ?????????? ",$name);
        $name =  str_replace("Home and Family"," ???????? ?? ?????????????? ",$name);
        $name =  str_replace("Technology"," ???????????????? ",$name);
        $name =  str_replace("Travelling"," ?????????????? ",$name);
        $name =  str_replace("News and Media"," ???????? ",$name);
        $name =  str_replace("Lifestyle"," ?????????? ",$name);
        $name =  str_replace("Shopping"," ???????? ",$name);
        $name =  str_replace("Business"," ?????????? ",$name);
        $name =  str_replace("Fashion"," ???? ",$name);
        $name =  str_replace("Food"," ???????????? ",$name);
        $name =  str_replace("Sports"," ?????????? ",$name);
        $name =  str_replace("Art "," ?????? ",$name);
        $name =  str_replace("Education"," ???????????? ",$name);
        $name =  str_replace("E-commerce"," ?????????? ?????????????????? ",$name);
        $name =  str_replace("Internet"," ?????????????? ",$name);
        $name =  str_replace("Construction"," ???????? ?? ?????? ",$name);
        $name =  str_replace("Software devel..."," ?????? ?????????? ",$name);
        $name =  str_replace("Hardware devel..."," ?????? ?????????? ",$name);
        $name =  str_replace("Hardware"," ?????? ?????????? ",$name);
        $name =  str_replace("Computers"," ???????????????? ",$name);
        $name =  str_replace("Software"," ?????? ?????????? ",$name);
        $name =  str_replace("Transport"," ?????? ?? ?????? ",$name);
        $name =  str_replace("Entertainment"," ???????????? ",$name);
        $name =  str_replace("Music"," ???????????? ",$name);
        $name =  str_replace("Nature"," ?????????? ",$name);
        $name =  str_replace("Marketing and ..."," ?????????????????? ",$name);
        $name =  str_replace("Marketing"," ?????????????????? ",$name);
        $name =  str_replace("Agriculture"," ?????????????? ",$name);
        $name =  str_replace("Culture"," ???????????? ",$name);
        $name =  str_replace("Society"," ?????????????? ",$name);
        $name =  str_replace("Real Estate"," ?????????? ",$name);
        $name =  str_replace("Places"," ?????????? ?????????? ",$name);
        $name =  str_replace("Career and Emp..."," ?????????? ",$name);
        $name =  str_replace("Career and Employment"," ?????????? ",$name);
        $name =  str_replace("Law"," ?????????? ",$name);
        $name =  str_replace("Science"," ???????? ",$name);
        $name =  str_replace("Marketing and Advertising"," ?????????????????? ?????????????? ",$name);
        $name =  str_replace("Marketing and Advertising"," ?????????????????? ?????????????? ",$name);
        $name =  str_replace("and Advertising"," ?????????????? ",$name);
        $name =  str_replace("Automobiles"," ?????????? ",$name);
        $name =  str_replace("Manufacturing"," ???????? ?? ?????????? ",$name);
        $name =  str_replace("Gadgets"," ?????? ",$name);
        $name =  str_replace("Mobile"," ???????????? ",$name);
        $name =  str_replace("Politics"," ?????????? ",$name);
        $name =  str_replace("Literature"," ?????? ?? ?????? ",$name);
        $name =  str_replace("Marketing and ..."," ?????????????????? ?? ?????????????? ",$name);
        $name =  str_replace("Books"," ???????? ",$name);
        $name =  str_replace("Leisure and Ho..."," ???????????? ",$name);
        $name =  str_replace("Leisure and Hobbies"," ???????????? ",$name);
        $name =  str_replace("Games"," ???????? ",$name);
        $name =  str_replace("Movies"," ???????? ",$name);
        $name =  str_replace("Web-development"," ???????????? ?????????? ?????? ???? ",$name);
        $name =  str_replace("Animals and Pets"," ?????????????? ",$name);
        $name =  str_replace("Humor"," ?????? ",$name);
        $name =  str_replace("Finance"," ?????????????? ",$name);
        $name =  str_replace("Personal Blogs"," ???????? ???????? ",$name);
        $name =  str_replace("For ?hildren"," ???????????? ",$name);
        $name =  str_replace("For Children"," ???????????? ",$name);
        $name =  str_replace("Equipment"," ?????????????? ",$name);
        $name =  str_replace("Photography"," ?????????? ",$name);
        $name =  str_replace("Programming"," ???????????? ?????????? ",$name);
        $name =  str_replace("Miscellaneous"," ???????????? ",$name);
        $name =  str_replace("Environment"," ???????? ???????? ",$name);
        $name =  str_replace("Art"," ?????? ",$name);
        $name =  str_replace("E-Magazine"," ???????? ???????????????? ",$name);
        $name =  str_replace("Religious"," ?????????? ",$name);
        $name =  str_replace("   "," ",$name);
        $name =  str_replace("  "," ",$name);
        return $name;
    }
    public static function persianCategoryDynamic($names){
        $cat_persian_names = Category::whereNotNull('english_titles')->get();
        $cat_ids = [];
        $cat_english_names = explode(', ',$names);
        foreach($cat_english_names as $key=>$row){

            $search_name = Category::where('english_titles','LIKE','%'.$row.'%')->first();

            if($search_name !== null){
                $cat_ids[] = $search_name->id;
            }
        }
        return array_unique($cat_ids);
    }
    public static function persianCountry($name){
        $name =  str_replace("United States","???????????? ?????????? ????????????",$name);
        $name =  str_replace("Germany","??????????",$name);
        $name =  str_replace("India","??????",$name);
        $name =  str_replace("Turkey","??????????",$name);
        $name =  str_replace("France","????????????",$name);
        $name =  str_replace("Belgium","??????????",$name);
        $name =  str_replace("Malaysia","??????????",$name);
        $name =  str_replace(".co.uk","????????????",$name);
        $name =  str_replace("N/A","?????? ????????????",$name);
        $name =  str_replace("Ukraine","????????????",$name);
        $name =  str_replace("Russian Federation","??????????",$name);
        $name =  str_replace("Netherlands","????????",$name);
        $name =  str_replace("Germany","??????????",$name);
        $name =  str_replace("Mexico","??????????",$name);
        $name =  str_replace("Hungary","????????????????",$name);
        $name =  str_replace("Romania","????????????",$name);
        $name =  str_replace("Ghana","??????",$name);
        $name =  str_replace("Brazil","??????????",$name);
        $name =  str_replace("Pakistan","??????????????",$name);
        $name =  str_replace("South Africa","?????????????? ??????????",$name);
        $name =  str_replace("Morocco","??????????",$name);
        $name =  str_replace("Spain","??????????????",$name);
        $name =  str_replace("Czech Republic","???????????? ????",$name);
        $name =  str_replace("Germany","??????????",$name);
        $name =  str_replace("Indonesia","??????????????",$name);
        $name =  str_replace("Bangladesh","??????????????",$name);
        $name =  str_replace("Denmark","??????????????",$name);
        $name =  str_replace("Poland","????????????",$name);
        $name =  str_replace("United Arab Emirates","???????????? ?????????? ????????",$name);
        $name =  str_replace("Myanmar","??????????????",$name);
        $name =  str_replace("Belarus","????????????",$name);
        $name =  str_replace("Virgin Islands, British","?????????? ???????????? ????????????",$name);
        $name =  str_replace("Sri Lanka","?????? ??????????",$name);
        $name =  str_replace("Mongolia","????????????????",$name);
        $name =  str_replace("Uganda","??????????????",$name);
        $name =  str_replace("Yemen","??????",$name);
        $name =  str_replace("Portugal","????????????",$name);
        $name =  str_replace("Greece","??????????",$name);
        $name =  str_replace("Indonesia","??????????????",$name);
        $name =  str_replace("Philippines","??????????????",$name);
        $name =  str_replace("Sweden","????????",$name);
        $name =  str_replace("Saudi Arabia","??????????????",$name);
        $name =  str_replace("Slovakia","??????????????",$name);
        $name =  str_replace("Singapore","??????????????",$name);
        $name =  str_replace("Venezuela","??????????????",$name);
        $name =  str_replace("Guyana","???????????? ??????????",$name);
        $name =  str_replace("Nepal","????????",$name);
        $name =  str_replace("Costa Rica","??????????????????",$name);
        $name =  str_replace("Nigeria","????????????",$name);
        $name =  str_replace("Chad","??????",$name);
        $name =  str_replace("Lithuania","??????????????",$name);
        $name =  str_replace("Croatia","????????????",$name);
        $name =  str_replace("Japan","????????",$name);
        $name =  str_replace("Tajikistan","??????????????????",$name);
        $name =  str_replace("Mexico","??????????",$name);
        $name =  str_replace("Ecuador","??????????????",$name);
        $name =  str_replace("Switzerland","??????????",$name);
        $name =  str_replace("Norway","????????",$name);
        $name =  str_replace("Thailand","????????????",$name);
        $name =  str_replace("Iran, Islamic Republic of","??????????",$name);
        $name =  str_replace("Finland","????????????",$name);
        $name =  str_replace("Chile","????????",$name);
        $name =  str_replace("Guatemala","????????????????",$name);
        $name =  str_replace("Italy","??????????????",$name);
        $name =  str_replace("Burkina Faso","?????????????? ????????",$name);
        $name =  str_replace("Estonia","????????????",$name);
        $name =  str_replace("Ireland","????????????",$name);
        $name =  str_replace("Qatar","??????",$name);
        $name =  str_replace("Zambia","????????????",$name);
        $name =  str_replace("Northern Mariana Islands","?????????? ???????????????? ??????????",$name);
        $name =  str_replace("Egypt","??????",$name);
        $name =  str_replace("Kuwait","????????",$name);
        $name =  str_replace("Canada","????????????",$name);
        $name =  str_replace("Slovenia","??????????????",$name);
        $name =  str_replace("Austria","??????????",$name);
        $name =  str_replace("Mauritius","??????????",$name);
        $name =  str_replace("Bulgaria","??????????????????",$name);
        $name =  str_replace("Zimbabwe","??????????????",$name);
        $name =  str_replace("Kenya","????????",$name);
        $name =  str_replace("Cambodia","????????????",$name);
        $name =  str_replace("Azerbaijan","??????????????????",$name);
        $name =  str_replace("Romania","????????????",$name);
        $name =  str_replace("Malawi","????????????",$name);
        $name =  str_replace("Guam","????????",$name);
        $name =  str_replace("Germany","??????????",$name);
        $name =  str_replace("China","??????",$name);
        $name =  str_replace("Afghanistan","??????????????????",$name);
        $name =  str_replace("Argentina","????????????????",$name);
        $name =  str_replace("Lithuania","????????????????",$name);
        $name =  str_replace("Slovakia","??????????????",$name);
        $name =  str_replace("Finland","????????????",$name);
        $name =  str_replace("Slovenia","??????????????",$name);
        return $name;
    }
    public static function persianLang($name){
        $name =  str_replace("Chinese","????????",$name);
        $name =  str_replace("Ukrainian","??????????????",$name);
        $name =  str_replace("Bulgarian","????????????",$name);
        $name =  str_replace("Hrvatski","????????????????",$name);
        $name =  str_replace("Polish","??????????????",$name);
        $name =  str_replace("Hindi","????????",$name);
        $name =  str_replace("Norwegian","??????????",$name);
        $name =  str_replace("Greek","????????????",$name);
        $name =  str_replace("Romanian","??????????????????",$name);
        $name =  str_replace("Swedish","??????????",$name);
        $name =  str_replace("Indonesian","????????????????????",$name);
        $name =  str_replace("Dutch","??????????",$name);
        $name =  str_replace("Portuguese","??????????????",$name);
        $name =  str_replace("Arabic","????????",$name);
        $name =  str_replace("Turkish","????????",$name);
        $name =  str_replace("French","??????????????",$name);
        $name =  str_replace("Italian","??????????????????",$name);
        $name =  str_replace("German","????????????",$name);
        $name =  str_replace("Spanish","??????????????????",$name);
        $name =  str_replace("English","??????????????",$name);
        $name =  str_replace("Slovenian","??????????????",$name);
        $name =  str_replace("Slovak","??????????????",$name);
        $name =  str_replace("Persian","??????????",$name);
        $name =  str_replace("Thai","??????????????",$name);
        $name =  str_replace("Lithuanian","????????????????????",$name);
        $name =  str_replace("Finnish","??????????????",$name);
        $name =  str_replace("Czech","??????",$name);
        $name =  str_replace("Danish","????????????????",$name);

        return $name;
    }
    public static function priceReplace($price){
        $price = str_replace("$","",$price);
        $price = str_replace(' (one-time payment for LIFETIME post)',"",$price);
        $price = str_replace(',',"",$price);


        return $price;
    }
    public static function convertPrice($price){
        $setting = Setting::first();
        $profit = ($setting->precent_dollar_profit*$setting->current_dollar) / 100;
        $profit_dollar = $profit + $setting->current_dollar;
        $price_dollar = floatval($price);
        $profit_x2 = Profit::where('type',0)->where('from_price','<=',floatval($price_dollar))->where('to_price','>=',floatval($price_dollar))->first();
        $profit_x3 = Profit::where('type',1)->where('from_price','<=',floatval($price_dollar))->where('to_price','>=',floatval($price_dollar))->first();
        if($profit_x2){
            $price_dollar = $price_dollar  +  @$profit_x2->profit_price;
        }



        $unprice_toman = floatval($price_dollar) * floatval($profit_dollar);

        if($profit_x3){
            $unprice_toman =  $unprice_toman  +  @$profit_x3->profit_price;
        }


        $price_toman = floatval($price_dollar) * floatval($profit_dollar);




        $round = round($unprice_toman,-4,PHP_ROUND_HALF_UP);
        if($unprice_toman > $round){
            $x = $unprice_toman - $round;
            if($x < 10000){
                $round = $round+10000;
            }
        }


        return ['price'=>$round,'unround_price'=>$unprice_toman];

    }
    public function testCrawl(){



        $url = 'https://cp.adsy.com/marketer/platform/index?page=1&per-page=30'; //url page
        $wc = new WebClientCustom();
        $page = $wc->Navigate($url);
        if ($page === FALSE) {
            dd('Failed to load');
        }

        $dom = new DOMDocument('1.0');
        $html_code = $page;
        $searchPage = mb_convert_encoding($html_code, 'HTML-ENTITIES', "UTF-8");
        @$dom->loadHtml($searchPage);
        $data = null;
        $finder = new DomXPath($dom);
        $spaner = $finder->query("//*[contains(@class, 'table--block__url')]");
        $main_categories = Category::all();
        $category_ids = [];

        $cat_pro_ids = [];

        foreach ($spaner as $element) {
            $my_elems = self::readPages($element->getElementsByTagName('a')[1]->attributes->getNamedItem('href')->nodeValue);
//            $data[] = [
//                'domain'=>@$my_elems[0],
//                'DA'=>@$my_elems[1],
//                'DR'=>@$my_elems[2],
//                'Country'=>self::persianCountry(@$my_elems[8]),
//                'Categories'=>self::persianCategory(@$my_elems[9]),
//                'Language'=>self::persianLang(@$my_elems[10]),
//                'price'=>self::priceReplace(@$my_elems[11]),
//                'marked_sponsored'=>@$my_elems[16],
//                'links'=>@$my_elems[17],
//                'content_requirements'=>@$my_elems[18],
//                'traffic'=>@$my_elems[3],
//            ];

            $persian_country = self::persianCountry(@$my_elems[8]);
            $persian_lang = self::persianLang(@$my_elems[10]);
            $persian_cats = self::persianCategory(@$my_elems[9]);
            dd('ffffff');
            dd($persian_cats);
            $info = 'https://cp.adsy.com'.$element->getElementsByTagName('a')[1]->attributes->getNamedItem('href')->nodeValue;
            $domain = @$my_elems[0];
            $da = @$my_elems[1];
            $dr = @$my_elems[2];
            $price_dollar = self::priceReplace(@$my_elems[11]);
            $traffic = @$my_elems[3];
            $domain_level = @$my_elems[7];

            if(strpos( strval(@$my_elems['page']),'Maximum number of links in the article provided by the buyer')){
                $marked_sponsored = @$my_elems[17];
                $links = @$my_elems[18];
                $content_requirements = @$my_elems[19];
            }else{
                $marked_sponsored = @$my_elems[16];
                $links = @$my_elems[17];
                $content_requirements = @$my_elems[18];
            }

            $product = null;
            $product_exit = Product::where('domain',@$my_elems[0])->first();
            if($product_exit !== null){
                $product = $product_exit->update([
                    'info'=>$info,
                    'domain'=>$domain,
                    'da'=>$da,
                    'dr'=>$dr,
                    'price_dollar'=>$price_dollar,
                    'marked_sponsored'=>$marked_sponsored,
                    'links'=>$links,
                    'content_requirements'=>$content_requirements,
                    'traffic'=>$traffic,
                    'domain_level'=>$domain_level,
                    'crawled_at'=>date('Y-m-d H:i:s'),
                    'price_convert'=>0
                ]);
            }else{
                if($persian_country !== null){
                    $country = Country::where('title','LIKE','%'.$persian_country.'%')->first();
                    if($country == null){
                        $country = Country::create([
                            'title'=>$persian_country
                        ]);
                    }
                }else{
                    $country = null;
                }
                if($persian_lang !== null){
                    $language = Language::where('title','LIKE','%'.$persian_lang.'%')->first();
                    if($language == null){
                        $language = Language::create([
                            'title'=>$persian_lang
                        ]);
                    }
                }else{
                    $language = null;
                }
                $product = Product::create([
                    'info'=>$info,
                    'domain'=>$domain,
                    'language_id'=>@$language->id,
                    'country_id'=>@$country->id,
                    'da'=>$da,
                    'dr'=>$dr,
                    'price_dollar'=>$price_dollar,
                    'marked_sponsored'=>$marked_sponsored,
                    'links'=>$links,
                    'content_requirements'=>$content_requirements,
                    'traffic'=>$traffic,
                    'domain_level'=>$domain_level,
                    'crawled_at'=>date('Y-m-d H:i:s'),
                    'price_convert'=>0
                ]);
                if($persian_cats !== null){
                    foreach($main_categories as $item){
                        if(strpos($persian_cats, $item->title)){
                            $category_ids[] = [
                                'category_id'=>$item->id,
                                'product_id'=>$product->id,
                            ];
                        }
                    }
                }
            }

        }

        ProductCategory::insert($category_ids);
    }
    public static function siteCrawl(){
        $setting = Setting::first();

        $url = $setting->crawl_url. '&per-page=30&page='.$setting->crawled_page; //url page
        \Log::info('crawling');
        \Log::info($url);
        \Log::info('crawling');
        try {
            $wc = new WebClientCustom();
            $page = $wc->Navigate($url);
            if ($page === FALSE) {
                \Log::info($url);
                \Log::info('Failed to load');
                \Log::info($url);
            }
            $dom = new DOMDocument('1.0');
            $html_code = $page;
            $searchPage = mb_convert_encoding($html_code, 'HTML-ENTITIES', "UTF-8");
            @$dom->loadHtml($searchPage);
            $data = null;
            $finder = new DomXPath($dom);
            $spaner = $finder->query("//*[contains(@class, 'table--block__url')]");
            $main_categories = Category::all();
            $category_ids = [];
            $cat_pro_ids = [];
            foreach ($spaner as $element) {
                $my_elems = self::readPages($element->getElementsByTagName('a')[1]->attributes->getNamedItem('href')->nodeValue);

                $persian_country = self::persianCountry(@$my_elems[8]);
                $persian_lang = self::persianLang(@$my_elems[10]);
                $persian_cats = self::persianCategoryDynamic(@$my_elems[9]);
                $info = 'https://cp.adsy.com'.$element->getElementsByTagName('a')[1]->attributes->getNamedItem('href')->nodeValue;
                $domain = @$my_elems[0];
                $da = @$my_elems[1];
                $dr = @$my_elems[2];
                $price_dollar = self::priceReplace(@$my_elems[11]);
                $traffic = @$my_elems[3];
                $domain_level = @$my_elems[7];

                if(strpos( strval(@$my_elems['page']),'Maximum number of links in the article provided by the buyer')){
                    $marked_sponsored = @$my_elems[17];
                    $links = @$my_elems[18];
                    $content_requirements = @$my_elems[19];
                }else{
                    $marked_sponsored = @$my_elems[16];
                    $links = @$my_elems[17];
                    $content_requirements = @$my_elems[18];
                }


                $price_toman = self::convertPrice(@$price_dollar)['price'];
                $price_unround = self::convertPrice(@$price_dollar)['unround_price'];


                $product = null;
                $product_exit = Product::where('domain',@$my_elems[0])->first();
                $y = CrawledDomains::create(['domain'=>@$my_elems[0]]);
                if($product_exit !== null){
                    $product = $product_exit->update([
                        'info'=>$info,
                        'domain'=>$domain,
                        'da'=>is_numeric($da) ? $da : null ,
                        'dr'=>is_numeric($dr) ? $dr : null ,
                        'price_dollar'=>$price_dollar,
                        'marked_sponsored'=>$marked_sponsored,
                        'links'=>$links,
                        'content_requirements'=>$content_requirements,
                        'traffic'=>$traffic,
                        'domain_level'=>$domain_level,
                        'crawled_at'=>date('Y-m-d H:i:s'),
                        'price_updated_at'=>date('Y-m-d H:i:s'),
                        'price_convert'=>1,
                        'price'=>$price_toman,
                        'unround_price'=>$price_unround,
                        'related'=>'adsy',
                        'active'=>1,
                        'show_in_list'=>1
                    ]);
                }else{
                    if($persian_country !== null){
                        $country = Country::where('title','LIKE','%'.$persian_country.'%')->first();
                        if($country == null){
                            $country = Country::create([
                                'title'=>$persian_country
                            ]);
                        }
                    }else{
                        $country = null;
                    }
                    if($persian_lang !== null){
                        $language = Language::where('title','LIKE','%'.$persian_lang.'%')->first();
                        if($language == null){
                            $language = Language::create([
                                'title'=>$persian_lang
                            ]);
                        }
                    }else{
                        $language = null;
                    }
                    $product = Product::create([
                        'info'=>$info,
                        'domain'=>$domain,
                        'language_id'=>@$language->id,
                        'country_id'=>@$country->id,
                        'da'=>is_numeric($da) ? $da : null ,
                        'dr'=>is_numeric($dr) ? $dr : null ,
                        'price_dollar'=>$price_dollar,
                        'price'=>$price_toman,
                        'unround_price'=>$price_unround,
                        'marked_sponsored'=>$marked_sponsored,
                        'links'=>$links,
                        'content_requirements'=>$content_requirements,
                        'traffic'=>$traffic,
                        'domain_level'=>$domain_level,
                        'crawled_at'=>date('Y-m-d H:i:s'),
                        'price_updated_at'=>date('Y-m-d H:i:s'),
                        'price_convert'=>1,
                        'related'=>'adsy',
                       'active'=>1,
                        'show_in_list'=>1
                    ]);
                    if($persian_cats !== null){
                        foreach($persian_cats as $item){
                            $category_ids[] = [
                                'category_id'=>$item,
                                'product_id'=>$product->id,
                            ];
                        }
                    }
                }

            }
            ProductCategory::insert($category_ids);
            if($setting->crawl_end_count == intval($setting->crawled_count) +  count(@$spaner)){
                $setting->update([
                    'crawled_page'=>0,
                    'crawled_count'=>0,
                    'crawl_end_count'=>0,
                    'crawling'=>0,
                    'pricing'=>0,
                    'domains_crawl'=>1
                ]);
            }else{
                $setting->update([
                    'crawled_page'=>intval($setting->crawled_page) + 1,
                    'crawled_count'=>intval($setting->crawled_count) + count(@$spaner),
                ]);
            }
        } catch (Exception $e) {
            \Log::info($url);
            \Log::info($e);
            \Log::info($url);
        }
    }
    public static function sitePrice(){
        $setting = Setting::first();
        $products = Product::where('related','adsy')->where('id','>',$setting->last_priced_id)->take(500)->orderBy('id','ASC')->get();
        if(count($products) > 0){
             $p_count = Product::where('related','adsy')->count();
        $id = $setting->last_priced_id;
//        $products_count = Product::where('price',0.00)->count();
        foreach($products as $row){

            $product = Product::find($row->id);
            $price_dollar = floatval($product->price_dollar);
            $price_toman = self::convertPrice(@$price_dollar)['price'];
            $price_unround = self::convertPrice(@$price_dollar)['unround_price'];
            $product->update([
                'price'=>$price_toman,
                'unround_price'=>$price_unround
            ]);

            $id = $row->id;
        }
        $setting->update([
            'last_priced_id'=>$id,
            'priced_count'=>$setting->priced_count+500
        ]);
        if($p_count <= $setting->priced_count){
            $setting->update([
                'pricing'=>0,
                'last_priced_id'=>0,
                'priced_count'=>0
            ]);
        }
        
        }else{
            $setting->update([
                'pricing'=>0,
                'last_priced_id'=>0,
                'priced_count'=>0
            ]);
        }
    }
    public static function domainsCrawlCheck(){
        $domains = CrawledDomains::pluck('domain');
        $products = Product::whereNotIn('domain',$domains)->where('related','adsy')->get();
        foreach($products as $row){
            $x = Product::find($row->id);
            $x->update([
                'active'=>0,
                'inactive_reason'=>$x->inactive_reason.' | removed in adsy',
            ]);
        }
        CrawledDomains::whereNotNull('id')->delete();
        $setting = Setting::first();
        $setting->update([
            'domains_crawl'=>0
        ]);
    }



    public function priceDollarCrawl(){
        $url = "https://tejaratnews.com/%D9%82%DB%8C%D9%85%D8%AA-%D8%AF%D9%84%D8%A7%D8%B1"; //url page
        \Log::info('crawling price dollar');
        \Log::info($url);
        \Log::info('crawling price dollar');
        try {
            $wc = new WebClientCustom();
            $page = $wc->Navigate($url);
            if ($page === FALSE) {
                \Log::info($url);
                \Log::info('Failed to load');
                \Log::info($url);
            }
            $dom = new DOMDocument('1.0');
            $html_code = $page;
            $searchPage = mb_convert_encoding($html_code, 'HTML-ENTITIES', "UTF-8");
            @$dom->loadHtml($searchPage);
            $data = null;
            $finder = new DomXPath($dom);

            $setting  = Setting::first();
            $setting->update([
                'pricing'=>1,
                'priced_count'=>0,
                'last_priced_id'=>0,
                'current_dollar'=>intval(str_replace(',','',$dom->getElementsByTagName('td')[1]->nodeValue))
            ]);

        } catch (Exception $e) {
            \Log::info($url);
            \Log::info($e);
            \Log::info($url);
        }
    }
}

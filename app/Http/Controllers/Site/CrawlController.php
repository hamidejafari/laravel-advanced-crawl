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
        $name =  str_replace("For Women"," زنان ",$name);
        $name =  str_replace("For Men"," مردان ",$name);
        $name =  str_replace("Beauty"," زیبایی ",$name);
        $name =  str_replace("Health"," سلامت ",$name);
        $name =  str_replace("Construction a..."," ساخت و ساز تعمیرات ",$name);
        $name =  str_replace("Startups"," استارتاپ ",$name);
        $name =  str_replace("Public Service"," خدمات عمومی ",$name);
        $name =  str_replace("Home and Family"," خانه و خانواده ",$name);
        $name =  str_replace("Technology"," تکنولوژی ",$name);
        $name =  str_replace("Travelling"," گردشگری ",$name);
        $name =  str_replace("News and Media"," خبری ",$name);
        $name =  str_replace("Lifestyle"," زندگی ",$name);
        $name =  str_replace("Shopping"," خرید ",$name);
        $name =  str_replace("Business"," تجارت ",$name);
        $name =  str_replace("Fashion"," مد ",$name);
        $name =  str_replace("Food"," خوراکی ",$name);
        $name =  str_replace("Sports"," ورزشی ",$name);
        $name =  str_replace("Art "," هنر ",$name);
        $name =  str_replace("Education"," آموزشی ",$name);
        $name =  str_replace("E-commerce"," تجارت الکترونیک ",$name);
        $name =  str_replace("Internet"," اینترنت ",$name);
        $name =  str_replace("Construction"," ساخت و ساز ",$name);
        $name =  str_replace("Software devel..."," نرم افزار ",$name);
        $name =  str_replace("Hardware devel..."," سخت افزار ",$name);
        $name =  str_replace("Hardware"," سخت افزار ",$name);
        $name =  str_replace("Computers"," کامپیوتر ",$name);
        $name =  str_replace("Software"," نرم افزار ",$name);
        $name =  str_replace("Transport"," حمل و نقل ",$name);
        $name =  str_replace("Entertainment"," تفریحی ",$name);
        $name =  str_replace("Music"," موسیقی ",$name);
        $name =  str_replace("Nature"," طبیعت ",$name);
        $name =  str_replace("Marketing and ..."," بازاریابی ",$name);
        $name =  str_replace("Marketing"," بازاریابی ",$name);
        $name =  str_replace("Agriculture"," کشاورزی ",$name);
        $name =  str_replace("Culture"," فرهنگی ",$name);
        $name =  str_replace("Society"," اجتماعی ",$name);
        $name =  str_replace("Real Estate"," املاک ",$name);
        $name =  str_replace("Places"," جاهای دیدنی ",$name);
        $name =  str_replace("Career and Emp..."," مشاغل ",$name);
        $name =  str_replace("Career and Employment"," مشاغل ",$name);
        $name =  str_replace("Law"," حقوقی ",$name);
        $name =  str_replace("Science"," علمی ",$name);
        $name =  str_replace("Marketing and Advertising"," بازاریابی تبلیغات ",$name);
        $name =  str_replace("Marketing and Advertising"," بازاریابی تبلیغات ",$name);
        $name =  str_replace("and Advertising"," تبلیغات ",$name);
        $name =  str_replace("Automobiles"," خودرو ",$name);
        $name =  str_replace("Manufacturing"," ساخت و تولید ",$name);
        $name =  str_replace("Gadgets"," گجت ",$name);
        $name =  str_replace("Mobile"," موبایل ",$name);
        $name =  str_replace("Politics"," سیاسی ",$name);
        $name =  str_replace("Literature"," ادب و هنر ",$name);
        $name =  str_replace("Marketing and ..."," بازاریابی و تبلیغات ",$name);
        $name =  str_replace("Books"," کتاب ",$name);
        $name =  str_replace("Leisure and Ho..."," سرگرمی ",$name);
        $name =  str_replace("Leisure and Hobbies"," سرگرمی ",$name);
        $name =  str_replace("Games"," بازی ",$name);
        $name =  str_replace("Movies"," فیلم ",$name);
        $name =  str_replace("Web-development"," برنامه نویسی تحت وب ",$name);
        $name =  str_replace("Animals and Pets"," حیوانات ",$name);
        $name =  str_replace("Humor"," طنز ",$name);
        $name =  str_replace("Finance"," اقتصادی ",$name);
        $name =  str_replace("Personal Blogs"," سایت شخصی ",$name);
        $name =  str_replace("For ?hildren"," کودکان ",$name);
        $name =  str_replace("For Children"," کودکان ",$name);
        $name =  str_replace("Equipment"," تجهیزات ",$name);
        $name =  str_replace("Photography"," عکاسی ",$name);
        $name =  str_replace("Programming"," برنامه نویسی ",$name);
        $name =  str_replace("Miscellaneous"," متفرقه ",$name);
        $name =  str_replace("Environment"," محیط زیست ",$name);
        $name =  str_replace("Art"," هنر ",$name);
        $name =  str_replace("E-Magazine"," مجله اینترنتی ",$name);
        $name =  str_replace("Religious"," مذهبی ",$name);
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
        $name =  str_replace("United States","ایالات متحده آمریکا",$name);
        $name =  str_replace("Germany","آلمان",$name);
        $name =  str_replace("India","هند",$name);
        $name =  str_replace("Turkey","ترکیه",$name);
        $name =  str_replace("France","فرانسه",$name);
        $name =  str_replace("Belgium","بلژیک",$name);
        $name =  str_replace("Malaysia","مالزی",$name);
        $name =  str_replace(".co.uk","انگلیس",$name);
        $name =  str_replace("N/A","بین المللی",$name);
        $name =  str_replace("Ukraine","اکراین",$name);
        $name =  str_replace("Russian Federation","روسیه",$name);
        $name =  str_replace("Netherlands","هلند",$name);
        $name =  str_replace("Germany","آلمان",$name);
        $name =  str_replace("Mexico","مکزیک",$name);
        $name =  str_replace("Hungary","مجارستان",$name);
        $name =  str_replace("Romania","رومانی",$name);
        $name =  str_replace("Ghana","غنا",$name);
        $name =  str_replace("Brazil","برزیل",$name);
        $name =  str_replace("Pakistan","پاکستان",$name);
        $name =  str_replace("South Africa","آفریقای جنوبی",$name);
        $name =  str_replace("Morocco","مراکش",$name);
        $name =  str_replace("Spain","اسپانیا",$name);
        $name =  str_replace("Czech Republic","جمهوری چک",$name);
        $name =  str_replace("Germany","آلمان",$name);
        $name =  str_replace("Indonesia","اندونزی",$name);
        $name =  str_replace("Bangladesh","بنگلادش",$name);
        $name =  str_replace("Denmark","دانمارک",$name);
        $name =  str_replace("Poland","لهستان",$name);
        $name =  str_replace("United Arab Emirates","امارات متحده عربی",$name);
        $name =  str_replace("Myanmar","میانمار",$name);
        $name =  str_replace("Belarus","بلاروس",$name);
        $name =  str_replace("Virgin Islands, British","جزیره ویرجین انگلیس",$name);
        $name =  str_replace("Sri Lanka","سری لانکا",$name);
        $name =  str_replace("Mongolia","مغولستان",$name);
        $name =  str_replace("Uganda","اوگاندا",$name);
        $name =  str_replace("Yemen","یمن",$name);
        $name =  str_replace("Portugal","پرتغال",$name);
        $name =  str_replace("Greece","یونان",$name);
        $name =  str_replace("Indonesia","اندونزی",$name);
        $name =  str_replace("Philippines","فیلیپین",$name);
        $name =  str_replace("Sweden","سوئد",$name);
        $name =  str_replace("Saudi Arabia","عربستان",$name);
        $name =  str_replace("Slovakia","اسلواکی",$name);
        $name =  str_replace("Singapore","سنگاپور",$name);
        $name =  str_replace("Venezuela","ونزوئلا",$name);
        $name =  str_replace("Guyana","جمهوری گویان",$name);
        $name =  str_replace("Nepal","نپال",$name);
        $name =  str_replace("Costa Rica","کاستاریکا",$name);
        $name =  str_replace("Nigeria","نیجریه",$name);
        $name =  str_replace("Chad","چاد",$name);
        $name =  str_replace("Lithuania","لیتوانی",$name);
        $name =  str_replace("Croatia","کرواسی",$name);
        $name =  str_replace("Japan","ژاپن",$name);
        $name =  str_replace("Tajikistan","تاجیکستان",$name);
        $name =  str_replace("Mexico","مکزیک",$name);
        $name =  str_replace("Ecuador","اکوادور",$name);
        $name =  str_replace("Switzerland","سوئیس",$name);
        $name =  str_replace("Norway","نروژ",$name);
        $name =  str_replace("Thailand","تایلند",$name);
        $name =  str_replace("Iran, Islamic Republic of","ایران",$name);
        $name =  str_replace("Finland","فنلاند",$name);
        $name =  str_replace("Chile","شیلی",$name);
        $name =  str_replace("Guatemala","گواتمالا",$name);
        $name =  str_replace("Italy","ایتالیا",$name);
        $name =  str_replace("Burkina Faso","بورکینا فاسو",$name);
        $name =  str_replace("Estonia","استونی",$name);
        $name =  str_replace("Ireland","ایرلند",$name);
        $name =  str_replace("Qatar","قطر",$name);
        $name =  str_replace("Zambia","زامبیا",$name);
        $name =  str_replace("Northern Mariana Islands","جزایر ماریانای شمالی",$name);
        $name =  str_replace("Egypt","مصر",$name);
        $name =  str_replace("Kuwait","کویت",$name);
        $name =  str_replace("Canada","کانادا",$name);
        $name =  str_replace("Slovenia","اسلوونی",$name);
        $name =  str_replace("Austria","اتریش",$name);
        $name =  str_replace("Mauritius","موریس",$name);
        $name =  str_replace("Bulgaria","بلغارستان",$name);
        $name =  str_replace("Zimbabwe","زیمباوه",$name);
        $name =  str_replace("Kenya","کنیا",$name);
        $name =  str_replace("Cambodia","کلمبیا",$name);
        $name =  str_replace("Azerbaijan","آذربایجان",$name);
        $name =  str_replace("Romania","رومانی",$name);
        $name =  str_replace("Malawi","مالاوی",$name);
        $name =  str_replace("Guam","گوام",$name);
        $name =  str_replace("Germany","آلمان",$name);
        $name =  str_replace("China","چین",$name);
        $name =  str_replace("Afghanistan","افغانستان",$name);
        $name =  str_replace("Argentina","آرژانتین",$name);
        $name =  str_replace("Lithuania","لیتوانیا",$name);
        $name =  str_replace("Slovakia","اسلواکی",$name);
        $name =  str_replace("Finland","فنلاند",$name);
        $name =  str_replace("Slovenia","اسلوانی",$name);
        return $name;
    }
    public static function persianLang($name){
        $name =  str_replace("Chinese","چینی",$name);
        $name =  str_replace("Ukrainian","اکراینی",$name);
        $name =  str_replace("Bulgarian","بلغاری",$name);
        $name =  str_replace("Hrvatski","هرواتسکی",$name);
        $name =  str_replace("Polish","لهستانی",$name);
        $name =  str_replace("Hindi","هندی",$name);
        $name =  str_replace("Norwegian","نروژی",$name);
        $name =  str_replace("Greek","یونانی",$name);
        $name =  str_replace("Romanian","رومانیایی",$name);
        $name =  str_replace("Swedish","سوئدی",$name);
        $name =  str_replace("Indonesian","اندونزیایی",$name);
        $name =  str_replace("Dutch","هلندی",$name);
        $name =  str_replace("Portuguese","پرتغالی",$name);
        $name =  str_replace("Arabic","عربی",$name);
        $name =  str_replace("Turkish","ترکی",$name);
        $name =  str_replace("French","فرانسوی",$name);
        $name =  str_replace("Italian","ایتالیایی",$name);
        $name =  str_replace("German","آلمانی",$name);
        $name =  str_replace("Spanish","اسپانیایی",$name);
        $name =  str_replace("English","انگلیسی",$name);
        $name =  str_replace("Slovenian","اسلوانی",$name);
        $name =  str_replace("Slovak","اسلواکی",$name);
        $name =  str_replace("Persian","فارسی",$name);
        $name =  str_replace("Thai","تایلندی",$name);
        $name =  str_replace("Lithuanian","لیتوانیایی",$name);
        $name =  str_replace("Finnish","فنلاندی",$name);
        $name =  str_replace("Czech","چکی",$name);
        $name =  str_replace("Danish","دانمارکی",$name);

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

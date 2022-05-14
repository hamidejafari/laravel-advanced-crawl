<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Library\WebClientCustom;
use DOMDocument;
use DomXPath;
use function Ramsey\Uuid\v1;

class CrawlController extends Controller
{
    public function crawlSetting(){
        return view('admin.crawl-setting');
    }
    public function postCrawlSetting(Request $request){
        $input = $request->all();
        $base_url = "https://cp.adsy.com/marketer/platform/index?";
        if($request->get('from_da') !== null && $request->has('to_da') !== null){
            $base_url = $base_url."SiteSearch%5BsiteDaMin%5D=".$input['from_da']."&SiteSearch%5BsiteDaMax%5D=".$input['to_da'];
        }
        if($request->has('from_dr') !== null && $request->has('to_dr') !== null){
            $base_url = $base_url."&SiteSearch%5BsiteDrMin%5D=".$input['from_dr']."&SiteSearch%5BsiteDrMax%5D=".$input['to_dr'];
        }
        if($request->has('from_price') !== null && $request->has('to_price') !== null){
            $base_url = $base_url."&SiteSearch%5BsitePriceMin%5D=".$input['from_price']."&SiteSearch%5BsitePriceMax%5D=".$input['to_price'];
        }
        if($request->has('traffic') !== null){
            $base_url = $base_url."&SiteSearch%5Bsite_traffic%5D=".$input['traffic'];
        }
        if($request->has('links') !== null){
            $base_url = $base_url."&SiteSearch%5Bsite_linktype_id%5D=".$input['links'];
        }
        if($request->has('country') !== null){
            $base_url = $base_url."&SiteSearch%5Bsite_country_id%5D=&SiteSearch%5Bsite_country_id%5D%5B%5D=".$input['country'];
        }
        if($request->has('language') !== null){
            $base_url = $base_url."&SiteSearch%5Bsite_language_id%5D=".$input['language'];
        }
        if($request->has('last_active') !== null){
            $base_url = $base_url."&SiteSearch%5Bsite_activity%5D=".$input['last_active'];
        }
        if($request->has('service_type') !== null){
            $base_url = $base_url."&SiteSearch%5BsiteServiceType%5D=".$input['service_type'];
        }
        if($request->has('marked_sponsored') !== null){
            $base_url = $base_url."&SiteSearch%5Bsite_disclosuretype_id%5D=".$input['marked_sponsored'];
        }
        if($request->has('category') !== null){
            $base_url = $base_url."&SiteSearch%5BsiteCategory%5D=&SiteSearch%5BsiteCategory%5D%5B%5D=".$input['category'];
        }

        if($request->has('category') !== null){
            $base_url = $base_url."&SiteSearch%5BsiteCategory%5D=&SiteSearch%5BsiteCategory%5D%5B%5D=".$input['category'];
        }

        if($request->has('show') !== null){
            $base_url = $base_url."&SiteSearch%5BsiteWorkedWith%5D=".$input['show'];
        }

        if($request->has('domain') !== null){
            $base_url = $base_url."&SiteSearch%5Bsite_url%5D=".$input['domain'];
        }

        $base_url_test = $base_url."&per-page=30&page=4000";
        $base_url_pass = $base_url;

        $url = $base_url_test; //url page
        $wc = new WebClientCustom();
        $page = $wc->Navigate($url);
        if ($page === FALSE) {
           return \redirect()->back()->with('error','خظا صفحه لود نشد');
        }

        $dom = new DOMDocument('1.0');
        $html_code = $page;
        $searchPage = mb_convert_encoding($html_code, 'HTML-ENTITIES', "UTF-8");
        @$dom->loadHtml($searchPage);
        $data = null;
        $finder = new DomXPath($dom);
        $spaner = $finder->query('//li[@class="active"]');
        $spaner_2 = $finder->query("//*[contains(@class, 'table--block__url')]");






        return view('admin.cal-crawl')
            ->with('cal_crawl',@$spaner[0]->nodeValue ? intval(@$spaner[0]->nodeValue) - 1 : 0)
            ->with('last_count',count(@$spaner_2))
            ->with('base_url_pass',$base_url_pass);
    }
    public function startCrawling(Request $request){
        $setting = Setting::first();
        $setting->update([
            'crawled_page'=>1,
            'crawling'=>1,
            'crawled_count'=>0,
            'crawl_url'=>$request->url,
            'crawl_end_count'=>$request->count
        ]);
        return redirect('/admin/crawl-info')->with('success','کرول کردن با موفقیت شروع شد.');
    }
    public function crawlInfo(){
        $setting = Setting::first();
        return view('admin.crawl-info')->with('setting',$setting);
    }
}

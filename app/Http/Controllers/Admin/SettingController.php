<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Setting;


class SettingController extends Controller
{

    public function getEditSitemap()
    {
        $data = Setting::first();
        return View('admin.sitemap.edit')
            ->with('data', $data);
    }
    public function postEditSitemap(Request $request)
    {
        $input = $request->all();
       

        $input['sitemapactive'] = $request->has('sitemapactive');
        $sitemap = Setting::first();

        $sitemap->update($input);
        return Redirect::action('Admin\SettingController@getEditSitemap')->with('success', 'آیتم مورد نظر با موفقیت ویرایش شد.');    }






    public function getEditSetting(){

        $data = Setting::first();
        
        return view('admin.setting.edit')
    
        ->with('data', $data);
    }   

    public function postEditSetting(Request $request){
    
        $setting = Setting::first();
        $input = $request->all();
             $input['faq'] = $request->has('faq');
             $input['req'] = $request->has('req');
               $input['blog'] = $request->has('blog');
        $input ['status'] = $request->has('status');
        if($request->hasFile('logo')){
            $pathMain = "assets/uploads/setting/";
            $extension = $request->file('logo')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('logo')->move($pathMain , $fileName);
            $input['logo'] = $fileName;
        }
        if($request->hasFile('aboutimg')){
            $pathMain = "assets/uploads/setting/";
            $extension = $request->file('aboutimg')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('aboutimg')->move($pathMain , $fileName);
            $input['aboutimg'] = $fileName;
        }
        if($request->hasFile('favicon')){
            $pathMain = "assets/uploads/setting/";
            $extension = $request->file('favicon')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('favicon')->move($pathMain , $fileName);
            $input['favicon'] = $fileName;
        }
        
        $setting -> update($input);
        
        return Redirect::action('Admin\SettingController@getEditSetting')
        ->with('success', 'تنظیمات ویرایش شد');
    
    
    }

}

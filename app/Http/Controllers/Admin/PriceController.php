<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use App\Models\Setting;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function priceSetting(){
        $setting = Setting::first();
        $profits = Profit::all();
        return view('admin.price-setting')
            ->with('setting',$setting)
            ->with('profits',$profits);
    }
    public function postPriceSetting(Request $request){
        $input = $request->all();
        $setting = Setting::first();
        if(@$input['pricing']){
            $setting->update([
                'current_dollar'=>$input['current_dollar'],
                'precent_dollar_profit'=>$input['precent_dollar_profit'],
                'pricing_time'=>"none",
                'pricing'=>1,
                'priced_count'=>0,
                'last_priced_id'=>0,
            ]);
        }else{
            $setting->update([
                'current_dollar'=>$input['current_dollar'],
                'precent_dollar_profit'=>$input['precent_dollar_profit'],
                'pricing_time'=>$input['pricing_time'],
            ]);
        }

        return redirect()->back()->with('success','با موفقیت ذخیره شد.');
    }

    public function postAddProfit(Request $request){

        $setting = Setting::first();
        $setting->update([
            'pricing'=>1
        ]);

        Profit::create($request->all());
        return redirect()->back()->with('success','با موفقیت اضافه شد.');
    }

    public function deleteProfit($id){
        $setting = Setting::first();
        $setting->update([
            'pricing'=>1
        ]);

        $profit = Profit::find($id);
        $profit->delete();
        return redirect()->back()->with('success','با موفقیت حذف شد.');
    }
}

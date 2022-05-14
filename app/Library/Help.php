<?php

namespace App\Library;
use App\Models\Product;
use App\Models\Profit;
use App\Models\Setting;

class Help
{

    public static function randomString($length = 10){
        $characters = '0123456789abcdefghijklmnoqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function persian2LatinDigit($string)
    {
        $persian_digits = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_digits = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $english_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

        $string = str_replace($persian_digits, $english_digits, $string);
        $string = str_replace($arabic_digits, $english_digits, $string);

        return $string;
    }

    public static function convertPrice($price_dollar){
        $setting = Setting::first();
        $profit = ($setting->precent_dollar_profit*$setting->current_dollar) / 100;
        $profit_dollar = $profit + $setting->current_dollar;
        $price_dollar = floatval($price_dollar);
        $profit_x2 = Profit::where('from_price','<=',floatval($price_dollar))->where('to_price','>=',floatval($price_dollar))->first();
        $price_dollar = $price_dollar  +  @$profit_x2->profit_price;
        $unprice_toman = floatval($price_dollar) * floatval($profit_dollar);


        $round = round($unprice_toman,-4,PHP_ROUND_HALF_UP);
        if($unprice_toman > $round){
            $x = $unprice_toman - $round;
            if($x < 10000){
                $round = $round+10000;
            }
        }


        return ['price'=>$round,'unround_price'=>$unprice_toman];
    }

}

<?php

namespace App\Imports;

use App\Library\Help;
use App\Models\Product;
use App\Models\Category;
use App\Models\Language;
use App\Models\Country;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\Status;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Product|null
     */

    public function model(array $row)
    {

        if(@$row['0'] !== 'دامنه'){
            $language = Language::where('title',$row['7'])->first();
            $country = Country::where('title', $row['8'])->first();

            $input = [];
            if(@$row['1'] !== null){
                @$input['price'] = intval($row['1']);
                @$input['unround_price'] = 0.00;

                @$input['price_dollar'] = intval($row['2']);

                @$input['price_convert'] = 0;
                @$input['price_updated_at'] = date('Y-m-d H:i:s');
            }else{
                if(@$row['2'] != null){
                    $price = Help::convertPrice($input['price_dollar']);
                    @$input['price'] = $price['price'];
                    @$input['unround_price'] = $price['unround_price'];
                    @$input['price_convert'] = 1;
                    @$input['price_updated_at'] = date('Y-m-d H:i:s');
                }
            }

            $product = Product::create([
                'domain' => @$row['0'],
                'active' => @$row['3'] == 'فعال' ? 1 : 0,
                'inactive_reason' => @$row['4'],
                'show_before_login' => @$row['5']  == 'فعال' ? 1 : 0,
                'show_in_list' => @$row['5']  == 'فعال' ? 1 : 0,
                'language_id' => @$language->id,
                'country_id' => @$country->id,
                'da' => @$row['9'],
                'dr' => @$row['10'],
                'related' => @$row['11'],
                'sort_number' => @$row['12'],
                'max_doffolow_link' => @$row['15'],
                'max_total_link' => @$row['16'],
                'requirements' => @$row['17'],
                'content_requirements' => @$row['18'],
                'contact_info' => @$row['19'],
                'price' => @$input['price'],
                'price_dollar' => @$input['price_dollar'],
                'price_convert' => @$input['price_convert'],
                'price_updated_at' => @$input['price_updated_at'],
                'unround_price' => @$input['unround_price'],
            ]);


            $cat_names = explode('|',@$row['13']);
            $cat_ids = [];
            foreach($cat_names as $item){
                $cat = Category::where('title',$item)->first();
                $cat_ids[] = [
                    'product_id'=>$product->id,
                    'category_id'=>@$cat->id
                ];
            }
            ProductCategory::insert($cat_ids);


            $status_names = explode('|',@$row['14']);
            $status_ids = [];
            foreach($status_names as $item){
                $status = Status::where('title',$item)->first();
                $status_ids[] = [
                    'product_id'=>$product->id,
                    'status_id'=>@$status->id
                ];
            }
            ProductStatus::insert($status_ids);
            return $product;
        }else{
            return [];
        }

    }
}

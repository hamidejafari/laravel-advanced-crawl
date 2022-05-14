<?php

namespace App\Exports;


use App\Models\Product;
use App\Models\Category;
use App\Models\Country;
use App\Models\Language;

use App\Models\ProductCategory;
use App\Models\ProductStatus;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportProduct implements FromArray
{
    function __construct($request2) {
        $this->request2 = $request2;
    }
    public function array(): array
    {
        $data = Product::get();
        $request = $this->request2;

        $query = Product::query();
        if($request->get('domain')){
            $query->where('domain' , $request->get('domain'));

        }
        if($request->get('id_rep')){
            $query->where('id' , $request->get('id_rep'));

        }

        if($request->get('from_price_dollar')){
            $query->whereBetween('price_dollar' ,[intval($request->get('from_price_dollar')),intval($request->get('to_price_dollar'))]);
        }

        if($request->get('from_price')){
            $query->whereBetween('price' ,[intval($request->get('from_price')),intval($request->get('to_price'))]);
        }

        if($request->get('active')){
            $query->where('active' , $request->get('active'));
        }
        if($request->get('inactive_reason')){
            $query->where('inactive_reason', 'LIKE', '%' . $request->get('inactive_reason') . '%');
        }
        if($request->get('show_in_list')){
            $query->where('show_in_list' , $request->get('show_in_list'));
        }
        if($request->get('show_before_login')){
            $query->where('show_before_login' , $request->get('show_before_login'));
        }

        if($request->get('language_id')){
            $query->where('language_id' , $request->get('language_id'));
        }
        if($request->get('country_id')){
            $query->where('country_id' , $request->get('country_id'));
        }
        if($request->get('from_da')){
            $query->whereBetween('da' ,[intval($request->get('from_da')),intval($request->get('to_da'))]);
        }


        if($request->get('from_dr')){
            $query->whereBetween('dr' ,[intval($request->get('from_dr')),intval($request->get('to_dr'))]);
        }



        if($request->get('from_sort_number')){
            $query->whereBetween('sort_number' ,[intval($request->get('from_sort_number')),intval($request->get('to_sort_number'))]);
        }


        if($request->get('related')){
            $query->where('related' , $request->get('related'));
        }


        if($request->get('from_max_doffolow_link')){
            $query->whereBetween('max_doffolow_link' ,[intval($request->get('from_max_doffolow_link')),intval($request->get('to_max_doffolow_link'))]);
        }

        if($request->get('from_max_total_link')){
            $query->whereBetween('max_max_total_link' ,[intval($request->get('from_max_total_link')),intval($request->get('to_max_total_link'))]);
        }


        if($request->get('requirements')){
            $query->where('requirements', 'LIKE', '%' . $request->get('requirements') . '%');
        }

        if($request->get('content_requirements')){
            $query->where('content_requirements', 'LIKE', '%' . $request->get('content_requirements') . '%');
        }
        if($request->get('contact_info')){
            $query->where('contact_info', 'LIKE', '%' . $request->get('contact_info') . '%');
        }

        if($request->get('category_id2')){
            $pro_ids = ProductCategory::where('category_id',$request->get('category_id2'))->pluck('product_id');
            $query->whereIn('id' , $pro_ids);
        }

        if($request->has('status_id2')){
            $pro_ids = ProductStatus::where('status_id',$request->get('status_id2'))->pluck('product_id');
            $query->whereIn('id' , $pro_ids->toArray());
        }




        $data = $query->get();

        $data_array = [];
        foreach ($data as $product) {

            $cats = null;
            foreach($product->categories as $item){
                $cats = @$item->title . '|';
            }

            $statuses = null;
            foreach($product->statuses as $item){
                $statuses = @$item->title . '|';
            }


            $data_array[] = [
                "دامنه" =>$product->domain,
                " (تومان) قیمت" =>intval(@$product->price),
                " (دلار) قیمت" =>@$product->price_dollar,
                "وضعیت" =>$product->active ? 'فعال' : 'غیرفعال',
                "دلیل غیرفعالی" =>$product->inactive_reason ? $product->inactive_reason : '',
                "نمایش در سایت" =>$product->show_before_login ? 'فعال' : 'غیرفعال',
                "نمایش در پنل" =>$product->show_in_list ? 'فعال' : 'غیرفعال',
                "زبان" =>@$product->language->title,
                "کشور" =>@$product->country->title,
                "DA" =>$product->da,
                "DR" =>$product->dr,
                "Related" =>$product->related,
                "Sort" =>$product->sort_number,
                "دسته رسانه" =>$cats,
                "وضعیت درکی" =>$statuses,
                "تعداد لینک فالو" =>$product->max_doffolow_link,
                "تعداد کل لینک ها" =>$product->max_total_link,
                "Requirements" =>$product->requirements,
                "Content Requirements" =>$product->content_requirements,
                "Contact Info" =>$product->contact_info,
            ];
        }
        return [
            [
                'دامنه' ,
                ' (تومان) قیمت',
                '(دلار) قیمت',
                'وضعیت',
                'دلیل غیرفعالی',
                'نمایش در سایت',
                'نمایش در پنل',
                'زبان',
                'کشور',
                'DA',
                'DR',
                'Related',
                'Sort',
                'دسته رسانه',
                'وضعیت درکی',
                'تعداد لینک فالو',
                'تعداد کل لینک ها',
                'Requirements',
                'Content Requirements',
                'Contact Info',
            ],
            $data_array
        ];
    }
}

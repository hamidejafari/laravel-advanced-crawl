<?php

namespace App\Http\Controllers\Admin;

use App\Library\Help;
use App\Models\ProductCategory;

use App\Models\Status;
use App\Models\ProductStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Product;
use App\Models\Language;
use App\Models\Country;
use App\Models\Comment;
use App\Http\Requests\ProductRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportProduct;
use App\Imports\ProductImport;





class ProductController extends Controller
{
    public function getProduct(Request  $request){

        $query = Product::query();
        if($request->get('domain')){
             $query->where('domain', 'LIKE', '%' . $request->get('domain') . '%');


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

        if($request->get('language_id')  && @$request->get('language_id')[0] !== null){
            $query->whereIn('language_id' , $request->get('language_id'));
        }
        if($request->get('country_id') && @$request->get('country_id')[0] !== null){
            $query->whereIn('country_id' , $request->get('country_id'));
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
                         $query->where('related', 'LIKE', '%' . $request->get('related') . '%');

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




        $data = $query->orderBy('id','DESC')->paginate(20);
        $cat = Category::all();
        $lan = Language::all();
        $coun = Country::orderBy('id','ASC')->get();
        $status = Status::get();


        //dd($query);
        return view('admin.product.index')
        ->with('status' , $status)
        ->with('data' , $data)
        ->with('cat' , $cat)
        ->with('lan' , $lan)
        ->with('coun' , $coun)
        ->with('query' , $query);
    }

    public function getProductAdd(){

        $cat = Category::get();
        $lan = Language::all();
        $coun = Country::all();

        $status = Status::get();

        return view('admin.product.add')
        ->with('status' , $status)
        ->with('cat' , $cat)
        ->with('lan' , $lan)
        ->with('coun' , $coun);

    }

    public function postProductAdd(Request $request){
        $input = $request->all();
         @$input['show_in_list'] = $request->has('show_in_list');
        @$input['sort_number'] = $request->get('sort_number') ? $request->get('sort_number') : 1;
         @$input['show_before_login'] = $request->has('show_before_login');
         @$input['content_by_media'] = $request->has('content_by_media');
        if($request->get('price') !== null){
            @$input['price'] = $request->get('price');
            @$input['price_dollar'] = $request->get('price_dollar');
            @$input['price_convert'] = 0;
            @$input['price_updated_at'] = date('Y-m-d H:i:s');
        }else{
            if(!$request->get('price_dollar') != null){
                return \redirect()->back()->with('error','فیلد قیمت دلار اجباری است');
            }
            $price = Help::convertPrice($input['price_dollar']);
            @$input['price'] = $price['price'];
            @$input['unround_price'] = $price['unround_price'];
            @$input['price_convert'] = 1;
            @$input['price_updated_at'] = date('Y-m-d H:i:s');
        }

        $product = Product::create($input);


        if($request->has('category_id2')){
                ProductCategory::where('product_id',$product->id)->delete();
            $arr = [];
            foreach($input['category_id2'] as $row){
                $arr[] = [
                    'category_id'=>$row,
                    'product_id'=>$product->id
                ];
            }
            ProductCategory::insert($arr);
        }

        if($request->has('status_id2')) {
            ProductStatus::where('product_id',$product->id)->delete();
            $arr2 = [];
            foreach ($input['status_id2'] as $row2) {
                $arr2[] = [
                    'status_id' => $row2,
                    'product_id' => $product->id
                ];
            }
            ProductStatus::insert($arr2);
        }

        return Redirect::action('Admin\ProductController@getProduct')
        ->with('success', 'با موفقیت اضافه شد');
    }

    public function getProductEdit($id){

        $data = Product::findOrFail($id);
        $cat = Category::get();
        $lan = Language::all();
        $coun = Country::all();

        $status = Status::get();


        return view('admin.product.edit')
            ->with('status' , $status)
            ->with('data', $data)
        ->with('cat' , $cat)
        ->with('lan' , $lan)
        ->with('coun' , $coun);
    }


    public function postProductEdit($id ,Request  $request){
        $input = $request->all();

        $product = Product::find($id);

        @$input['sort_number'] = $request->get('sort_number') ? $request->get('sort_number') : 1;
        @$input['show_in_list'] = $request->has('show_in_list');
        @$input['show_before_login'] = $request->has('show_before_login');
        @$input['content_by_media'] = $request->has('content_by_media');
        if($request->get('price_change') !== null){
            @$input['price'] = Help::persian2LatinDigit($request->get('price_change'));
            @$input['price_dollar'] = Help::persian2LatinDigit($request->get('price_dollar'));
            @$input['price_convert'] = 0;
            @$input['price_updated_at'] = date('Y-m-d H:i:s');

        }else{
            if(!$request->get('price_dollar') != null){
                return \redirect()->back()->with('error','فیلد قیمت دلار اجباری است');
            }
            $price = Help::convertPrice(Help::persian2LatinDigit($input['price_dollar']));
            @$input['price'] = $price['price'];
            @$input['unround_price'] = $price['unround_price'];
            @$input['price_convert'] = 1;
            @$input['price_updated_at'] = date('Y-m-d H:i:s');

        }

        $product->update($input);



       if($request->has('category_id2')){
                ProductCategory::where('product_id',$product->id)->delete();
            $arr = [];
            foreach($input['category_id2'] as $row){
                $arr[] = [
                    'category_id'=>$row,
                    'product_id'=>$product->id
                ];
            }
            ProductCategory::insert($arr);
        }


        if($request->has('status_id2')) {

            if(in_array(0,$request->get('status_id2'))){
                ProductStatus::where('product_id',$product->id)->delete();

            }else{
                ProductStatus::where('product_id',$product->id)->delete();
                $arr2 = [];
                foreach ($input['status_id2'] as $row2) {
                    $arr2[] = [
                        'status_id' => $row2,
                        'product_id' => $product->id
                    ];
                }
                ProductStatus::insert($arr2);
            }

        }



        return Redirect::action('Admin\ProductController@getProduct')
        ->with('success', 'محصول ویرایش شد');

    }

    public function getproductDelete($id){


        $product = Product::find($id);
        ProductCategory::where('product_id',$product->id)->delete();
        ProductStatus::where('product_id',$product->id)->delete();
        $product->delete();
        return Redirect::action('Admin\ProductController@getProduct')
        ->with('success', 'با موفقیت حذف شد');

    }

    public function getProductComment($id){

        $comment = Comment::find($id);

        dd($comment);


    }

    public function export(Request $request2)
    {
        return Excel::download(new ExportProduct($request2), 'Reportage.xlsx');
    }

    public function importAdd()
    {
        return view('admin.product.importadd');
    }

    public function import()
    {

        Excel::import(new ProductImport,request()->file('file'));
        return Redirect::action('Admin\ProductController@getProduct')
        ->with('success', 'با موفقیت اضافه شد');


    }


}

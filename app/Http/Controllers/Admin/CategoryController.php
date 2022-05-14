<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CategoryImport;
use App\Imports\ProductImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public function getCategory(Request  $request){

        $data = Category::get();

        return View('admin.category.index')
        ->with('data', $data);
    }

    public function getCategoryAdd(){

        $data = Category::where('parent_id' , null)->get();
        return view('admin.category.add')
        -> with('data', $data);

    }

    public function postCategoryAdd(CategoryRequest  $request){

        $input = $request->all();
        $input ['status'] = $request->has('status');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/category/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }

    $data = Category::create($input);
    return Redirect::action('Admin\CategoryController@getCategory')
    ->with('success', 'دسته بندی اضافه شد');


    }

    public function getCategoryEdit($id){

        $categories = Category::where('parent_id' , null)->get();
        $data = Category::findOrFail($id);
        return view('admin.category.edit')
        ->with('data' , $data)
        -> with('categories', $categories);

    }

    public function postcategoryEdit($id,CategoryRequest  $request){

        $input = $request->all();
        $input ['status'] = $request->has('status');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/category/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }

    $data = Category::find($id) -> update($input);
    return Redirect::action('Admin\CategoryController@getCategory')
    ->with('success', 'دسته بندی اضافه شد');


    }

    public function getcategoryDelete($id){

        Category::findOrFail($id)->delete();

        return Redirect::action('Admin\CategoryController@getCategory')
        ->with('success', 'دسته بندی حذف شد');

    }


    public function importAdd()
    {
        return view('admin.category.importadd');
    }

    public function import()
    {
        Excel::import(new CategoryImport(),request()->file('file'));
        return Redirect::action('Admin\CategoryController@getCategory')
            ->with('success', 'با موفقیت اضافه شد');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Language;


class LanguageController extends Controller
{
    public function getLanguage(Request  $request){

        $data = Language::get();
        return View('admin.language.index')
        ->with('data', $data);
    }

    public function getLanguageAdd(){

        return view('admin.language.add');
    }

    public function postLanguageAdd(Request  $request){
        $input = $request->all();
        @$input ['status'] = $request->has('status');
        @$input ['show'] = $request->has('show');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/language/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
        $data = Language::create($input);
        return Redirect::action('Admin\LanguageController@getLanguage')
        ->with('success', 'زبان اضافه شد');
    }

    public function getLanguageEdit($id){

        $data = Language::findOrFail($id);
        return view('admin.language.edit')
        ->with('data' , $data);

    }

    public function postLanguageEdit($id,Request  $request){

        $input = $request->all();
        @$input ['status'] = $request->has('status');
        @$input ['show'] = $request->has('show');
        $data = Language::find($id) -> update($input);

        if($request->hasFile('image')){
            $pathMain = "assets/uploads/language/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
        return Redirect::action('Admin\LanguageController@getLanguage')
        ->with('success', 'زبان ویرایش شد');

    }

    public function getLanguageDelete($id){

        Language::findOrFail($id)->delete();
        return Redirect::action('Admin\LanguageController@getLanguage')
        ->with('success', 'زبان حذف شد');

    }
}

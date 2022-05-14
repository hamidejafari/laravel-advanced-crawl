<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;

class CountryController extends Controller
{
    public function getCountry(Request  $request){

        $data = Country::get();

        return View('admin.country.index')

        ->with('data', $data);
    }

    public function getCountryAdd(){


        return view('admin.country.add');


    }

    public function postCountryAdd(Request  $request){

    $input = $request->all();
    @$input['show'] = $request->has('show');
    @$input['status'] = $request->has('status');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/country/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
    $data = Country::create($input);
    return Redirect::action('Admin\CountryController@getCountry')
    ->with('success', 'کشور اضافه شد');


    }

    public function getCountryEdit($id){

        $data = Country::findOrFail($id);
        return view('admin.country.edit')
        ->with('data' , $data);

    }

    public function postCountryEdit($id,Request  $request){

    $input = $request->all();
    @$input ['status'] = $request->has('status');
    @$input ['show'] = $request->has('show');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/country/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }

        $data = Country::find($id) -> update($input);

    return Redirect::action('Admin\CountryController@getCountry')
    ->with('success', 'کشور ویرایش شد');


    }

    public function getCountryDelete($id){


        Country::findOrFail($id)->delete();

        return Redirect::action('Admin\CountryController@getCountry')
        ->with('success', 'کشور حذف شد');

    }
}

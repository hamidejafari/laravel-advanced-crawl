<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{

    public function getService(){

        $data = Service::get();
        //dd($data);
        return view('admin.service.index')
        ->with('data' , $data);
    }

    public function getServiceAdd(){

        return view('admin.service.add');
    }

    public function postServiceAdd(ServiceRequest  $request){

        //dd($input = $request->all());
        $input = $request->all();
        $input ['status'] = $request->has('status');
        $input ['linked'] = $request->has('linked');

//        $input['url']=str_replace(' ', '-',$input['url']);
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/service/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }

        $redirect = Service::create($input);
        return Redirect::action('Admin\ServiceController@getService')
        ->with('success', 'خدمات اضافه شد');

    }

    public function getServiceEdit($id){
        $data = Service::findOrFail($id);
        return view('admin.service.edit')
        ->with('data', $data);
    }


    public function postServiceEdit($id ,ServiceRequest  $request){

        //dd($input = $request->all());
        $input = $request->all();
        $input ['linked'] = $request->has('linked');
        $input ['status'] = $request->has('status');
//        $input['url']=str_replace(' ', '-',$input['url']);
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/service/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }

        $data = Service::find($id) -> update($input);
        return Redirect::action('Admin\ServiceController@getService')
        ->with('success', 'ویژگی ویرایش شد');

    }

    public function getServiceDelete($id){


        Service::findOrFail($id)->delete();

        return Redirect::action('Admin\ServiceController@getService')
        ->with('success', 'ویژگی حذف شد');

    }

}

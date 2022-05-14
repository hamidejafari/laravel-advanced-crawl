<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Social;

class SocialController extends Controller
{
    public function getSocial(){

        $data = Social::paginate(100);
        return view('admin.social.index')
        ->with('data' , $data);
    }

    public function getSocialAdd(){

        return view('admin.social.add');
    }

    public function postSocialAdd(Request  $request){

        //dd($input = $request->all());
        $input = $request->all();
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/social/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
        
    
        $social = Social::create($input);
        return Redirect::action('Admin\SocialController@getSocial')
        ->with('success', 'social اضافه شد');


    }

    public function getSocialEdit($id){
        $data = Social::findOrFail($id);
        return view('admin.social.edit')
        ->with('data', $data);       
    }


    public function postSocialEdit($id , Request  $request){

        //dd($input = $request->all());
        $input = $request->all();
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/social/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }

        $data = Social::find($id) -> update($input);
        return Redirect::action('Admin\SocialController@getSocial')
        ->with('success', 'social ویرایش شد');

    }

    public function getSocialDelete($id){


        Social::findOrFail($id)->delete();
        
        return Redirect::action('Admin\SocialController@getSocial')
        ->with('success', 'social حذف شد');   
    
    }
}

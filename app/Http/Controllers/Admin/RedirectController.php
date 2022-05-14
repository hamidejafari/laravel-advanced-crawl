<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Redirects;


class RedirectController extends Controller
{
    public function getRedirect(){

        $data = Redirects::paginate(100);
        return view('admin.redirect.index')
        ->with('data' , $data);
    }

    public function getRedirectAdd(){

        return view('admin.redirect.add');
    }

    public function postRedirectAdd(Request  $request){

        //dd($input = $request->all());
        $input = $request->all();
        //dd($input);
        $remove = array(url('/'.@$input->old_address).'/');
        $remove2 = array(url('/'.@$input->new_address).'/');
        $input['old_address']=str_replace($remove, "", $input['old_address']);
        $input['new_address']=str_replace($remove2, "", $input['new_address']);
        $redirect = Redirects::create($input);
        return Redirect::action('Admin\RedirectController@getRedirect')
        ->with('success', 'آدرس اضافه شد');


    }

    public function getRedirectEdit($id){
        $data = Redirects::findOrFail($id);
        return view('admin.redirect.edit')
        ->with('data', $data);       
    }


    public function postRedirectEdit($id , Request  $request){

        //dd($input = $request->all());
        $input = $request->all();
        $remove = array(url('/'.@$input->old_address).'/');
        $remove2 = array(url('/'.@$input->new_address).'/');
        $input['old_address']=str_replace($remove, "", $input['old_address']);
        $input['new_address']=str_replace($remove2, "", $input['new_address']);
        $data = Redirects::find($id) -> update($input);
        return Redirect::action('Admin\RedirectcController@getRedirect')
        ->with('success', 'آدرس ویرایش شد');

    }

    public function getRedirectDelete($id){


        Redirects::findOrFail($id)->delete();
        
        return Redirect::back()
        ->with('success', 'آدرس حذف شد');   
    
    }
}

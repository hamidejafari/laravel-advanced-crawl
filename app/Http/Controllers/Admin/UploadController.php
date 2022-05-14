<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Content;

class UploadController extends Controller
{
    public function getUpload(){
        $data = Content::uploader()->paginate(100);
        return view('admin.upload.index')
        ->with('data' , $data);
    }

    public function getUploadAdd(){

        return view('admin.upload.add');
        
    }

    public function postUploadAdd(Request $request){

        $input = $request->all();
        //dd($input);
        $input ['status'] = $request->has('status');
        $input['url']=str_replace(' ', '-',$input['url']);
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/content/upload/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
    
        $input ['type']= 'uploader';
        $upload = Content::create($input);
        return Redirect::action('Admin\UploadController@getUpload')
        ->with('success', 'عکس اضافه شد');
        
        }


        public function getUploadEdit($id){
            $data = Content::findOrFail($id);
            return view('admin.upload.edit')
            ->with('data', $data);
        
            
        }
        public function postUploadEdit($id,Request $request){

            $input = $request->all();
            //dd($input);
            $input ['status'] = $request->has('status');
            $data = Content::uploader()->find($id);
            $input['url']=str_replace(' ', '-',$input['url']);
            if($request->hasFile('image')){
                $pathMain = "assets/uploads/content/upload/";
                $extension = $request->file('image')->getClientOriginalName();
                $fileName = mt_rand(100,900) . ".$extension";
                $request->file('image')->move($pathMain , $fileName);
                $input['image'] = $fileName;
            }
        
            

            $data = Content::find($id) -> update($input);
           
            return Redirect::action('Admin\UploadController@getUpload')
            ->with('success', 'عکس ویرایش شد');
            
            }

            public function getUploadDelete($id){


                Content::findOrFail($id)->delete();
                
                return Redirect::action('Admin\UploadController@getUpload')
                ->with('success', 'عکس حذف شد');   
            
            }
    

}

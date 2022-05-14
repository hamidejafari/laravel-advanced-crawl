<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use App\Models\Articlecat;
use App\Models\Content;

class ArticlecatController extends Controller
{
    public function getArticlecat(){
        
        $articlecat = Articlecat::Articlecat()->get();
        //dd($articlecatContent
        return View('admin.articlecat.index')
        ->with('articlecat' , $articlecat);
    }

    public function getArticlecatAdd(){

        $categories = Content::Articlecat()->get();
        return view('admin.articlecat.add')
        -> with('categories', $categories);

    }

    public function postArticlecatAdd(Request  $request){

        $input = $request->all();
        $input ['status'] = $request->has('status');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/Articlecat/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
        if($request->hasFile('header')){
            $pathMain = "assets/uploads/Articlecat/";
            $extension = $request->file('header')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('header')->move($pathMain , $fileName);
            $input['header'] = $fileName;
        }

   
   $input['type'] = "articlecat";
    $categories = Content::create($input);
    return Redirect::action('Admin\ArticlecatController@getArticlecat')
    ->with('success', 'دسته بندی اضافه شد');
    

    }

    public function getArticlecatEdit($id){

        $categories = Content::Articlecat()->where('parent_id' , null)->get();
        $data = Content::findOrFail($id);
        return view('admin.articlecat.edit')
        ->with('data' , $data)
        -> with('categories', $categories);

    }

    public function postArticlecatEdit($id,CategoryRequest  $request){

        $input = $request->all();
        $input ['status'] = $request->has('status');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/Articlecat/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
        if($request->hasFile('header')){
            $pathMain = "assets/uploads/Articlecat/";
            $extension = $request->file('header')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('header')->move($pathMain , $fileName);
            $input['header'] = $fileName;
        }

   
    $data = Content::find($id) -> update($input);
    return Redirect::action('Admin\ArticlecatController@getArticlecat')
    ->with('success', 'دسته بندی اضافه شد');
    

    }

    public function getArticlecatDelete($id){


        Content::findOrFail($id)->delete();
        
        return Redirect::action('Admin\ArticlecatController@getArticlecat')
        ->with('success', 'دسته بندی حذف شد');
    
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ServiceRequest;
use App\Models\Content;

class ArticleController extends Controller
{
    
    public function getArticlecat(){

       $cat = Content::Articlecat()->get();
        return view('admin.articlecat.index')
       ->with('cat' , $cat);
        
    }   

    public function getArticlecatAdd(){

        return view('admin.articlecat.add');
        
    }

    public function postArticlecatAdd(Request $request){

        $input = $request->all();
        //dd($input);
        $input ['status'] = $request->has('status');
        $input['url']=str_replace(' ', '-',$input['url']);
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/content/article/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }
    
        $input ['type']= 'articlecat';
        $category = Content::create($input);
        return Redirect::action('Admin\ArticleController@getArticlecat')
        ->with('success', 'دسته بندی اضافه شد');
        
        }


        public function getArticlecatEdit($id){
            $data = Content::findOrFail($id);
            return view('admin.articlecat.edit')
            ->with('data', $data);
        
            
        }
        public function postArticlecatEdit($id,Request $request){

            $input = $request->all();
            //dd($input);
            $input ['status'] = $request->has('status');
            $data = Content::articlecat()->find($id);
            $input['url']=str_replace(' ', '-',$input['url']);
            if($request->hasFile('image')){
                $pathMain = "assets/uploads/content/article/";
                $extension = $request->file('image')->getClientOriginalName();
                $fileName = mt_rand(100,900) . ".$extension";
                $request->file('image')->move($pathMain , $fileName);
                $input['image'] = $fileName;
            }
        
            $input ['type']= 'articlecat';

            $data -> update($input);
           
            return Redirect::action('Admin\ArticleController@getArticlecat')
            ->with('success', 'دسته بندی ویرایش شد');
            
            }

            public function getArticlecatDelete($id){


                Content::findOrFail($id)->delete();
                
                return Redirect::action('Admin\ArticleController@getArticlecat')
                ->with('success', 'دسته بندی حذف شد');   
            
            }


    
        public function getArticle(){
        
        $data = Content::article()->paginate(100);
        
        return view('admin.article.index')
        ->with('data' , $data);
    
    }
    public function getArticleAdd(){
        
        $category = Content::articlecat()->get();
        
        return view('admin.article.add')
        ->with('category' , $category);
    
    }

    
    public function postArticleAdd(Request $request){

    $input = $request->all();
    $input ['status'] = $request->has('status');
    $input['url']=str_replace(' ', '-',$input['url']);
    if($request->hasFile('image')){
        $pathMain = "assets/uploads/content/article/";
        $extension = $request->file('image')->getClientOriginalName();
        $fileName = mt_rand(100,900) . ".$extension";
        $request->file('image')->move($pathMain , $fileName);
        $input['image'] = $fileName;
    }

    $input ['type']= 'Article';
    $article = Content::create($input);
    return Redirect::action('Admin\ArticleController@getArticle')
    ->with('success', 'مقاله اضافه شد');
    
    }

    public function getArticleEdit($id){
        $data = Content::findOrFail($id);
        $category = Content::articlecat()->get();
        return view('admin.article.edit')
        ->with('data', $data)
        ->with('category' , $category);        
    }

    public function postArticleEdit($id,Request $request){

        $input = $request->all();
        //dd($input);
        $input ['status'] = $request->has('status');
        $data = Content::article()->find($id);
        $input['url']=str_replace(' ', '-',$input['url']);
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/content/article/";
            $extension = $request->file('image')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('image')->move($pathMain , $fileName);
            $input['image'] = $fileName;
        }

        $data -> update($input);
       
        return Redirect::action('Admin\ArticleController@getArticle')
        ->with('success', 'مقاله ویرایش شد');
        
        }
    
        public function getArticleDelete($id){


            Content::findOrFail($id)->delete();
            
            return Redirect::action('Admin\ArticleController@getArticle')
            ->with('success', 'مقاله حذف شد');   
        
        }


        public function getcropper(){

            return view('cropper');

        }
    

}

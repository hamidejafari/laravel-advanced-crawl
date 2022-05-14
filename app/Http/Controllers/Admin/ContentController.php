<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Content;

class ContentController extends Controller
{
    public function getQuestion(){

        $data = Content::questions()->get();
        //dd($data);
        return view('admin.question.index')
        ->with('data' , $data);

    }

    public function getQuestionAdd(){

        return view('admin.question.add');

    }

    public function postQuestionAdd(Request $request){

        $input = $request->all();
        $input ['status'] = $request->has('status');
        if($request->hasFile('image')){
            $pathMain = "assets/uploads/content/question/";
            $extension = $request->file('icon')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('icon')->move($pathMain , $fileName);
            $input['icon'] = $fileName;
        }

        $input ['type']= 'questions';
        $article = Content::create($input);
        return Redirect::action('Admin\ContentController@getQuestion')
        ->with('success', 'سوال اضافه شد');

        }

        public function getQuestionEdit($id){
            $data = Content::findOrFail($id);

            return view('admin.question.edit')
            ->with('data', $data);
        }

        public function postQuestionEdit($id,Request $request){

            $input = $request->all();
            //dd($input);
            $input ['status'] = $request->has('status');
            $data = Content::questions()->find($id);
            if($request->hasFile('icon')){
                $pathMain = "assets/uploads/content/question/";
                $extension = $request->file('icon')->getClientOriginalName();
                $fileName = mt_rand(100,900) . ".$extension";
                $request->file('icon')->move($pathMain , $fileName);
                $input['icon'] = $fileName;
            }

            $data -> update($input);

            return Redirect::action('Admin\ContentController@getQuestion')
            ->with('success', 'سوال ویرایش شد');

            }

            public function getQuestionDelete($id){


                Content::findOrFail($id)->delete();

                return Redirect::action('Admin\ContentController@getQuestion')
                ->with('success', 'سوال حذف شد');

            }





    public function getSloagens(){

    $data = Content::sloagens()->get();
    //dd($data);
    return view('admin.sloagens.index')
    ->with('data' , $data);

    }

    public function getSloagensAdd(){

    return view('admin.sloagens.add');

    }

    public function postSloagensAdd(Request $request){

    $input = $request->all();
    $input ['status'] = $request->has('status');
//    $input['url']=str_replace(' ', '-',$input['url']);
    if($request->hasFile('icon')){
        $pathMain = "assets/uploads/content/sloagens/";
        $extension = $request->file('icon')->getClientOriginalName();
        $fileName = mt_rand(100,900) . ".$extension";
        $request->file('icon')->move($pathMain , $fileName);
        $input['icon'] = $fileName;
    }

    $input ['type']= 'sloagens';
    $article = Content::create($input);
    return Redirect::action('Admin\ContentController@getSloagens')
    ->with('success', 'سوال اضافه شد');

    }

    public function getSloagensEdit($id){
        $data = Content::findOrFail($id);

        return view('admin.sloagens.edit')
        ->with('data', $data);
    }

    public function postSloagensEdit($id,Request $request){

        $input = $request->all();
        //dd($input);
        $input ['status'] = $request->has('status');
        $data = Content::sloagens()->find($id);
        if($request->hasFile('icon')){
            $pathMain = "assets/uploads/content/sloagens/";
            $extension = $request->file('icon')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('icon')->move($pathMain , $fileName);
            $input['icon'] = $fileName;
        }

        $data -> update($input);

        return Redirect::action('Admin\ContentController@getSloagens')
        ->with('success', 'سوال ویرایش شد');

        }

        public function getSloagensDelete($id){


            Content::findOrFail($id)->delete();

            return Redirect::action('Admin\ContentController@getSloagens')
            ->with('success', 'سوال حذف شد');

        }

        public function getcropper(){

            return view('cropper');

        }


}


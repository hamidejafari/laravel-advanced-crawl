<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportComment;


class CommentController extends Controller
{
    public function getComment(Request  $request){
        $query = Comment::query();
        if($request->get('commentable_type')){
            $query->where('commentable_type' , $request->get('commentable_type'));
        }
        $comments = $query->get();
        
        return view('admin.comment.index')

        ->with('comments' , $comments);
    
    }
    
    public function getCommentEdit($id){
    
        $data = Comment::findorfail($id);
        
        return view('admin.comment.edit')

        ->with('data' , $data);
     
    
    }
    
    public function postCommentRead($id,Request $request){
        $input = $request->all();
        //dd($input);
        $read = Comment::find($id);
        $input['read_at'] = '1';
        $input ['status'] = $request->has('status');
        $read ->update($input); 
        return Redirect::action('Admin\CommentController@getComment')
        ->with('success', 'پیغام مشاهده شد');
    
    
    }
    
    public function getCommentDelete($id){
    
    
        Comment::find($id)->delete();
        
        return Redirect::action('Admin\CommentController@getComment')
        ->with('success', 'پیغام حذف شد');   
    
    }

    public function export()
    {
        //dd('b');
        return Excel::download(new ExportComment, 'Comment.xlsx');
    }

    
    
}

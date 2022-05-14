<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Language;


class StatusController extends Controller
{
    public function getIndex(Request  $request){

        $data = Status::get();
        return View('admin.status.index')
            ->with('data', $data);
    }

    public function postAdd(Request  $request){
        $input = $request->all();
        Status::create($input);
        return Redirect::action('Admin\StatusController@getIndex')
            ->with('success', 'ایتم اضافه شد');
    }

    public function getDelete($id){
        Status::findOrFail($id)->delete();
        return Redirect::action('Admin\StatusController@getIndex')
            ->with('success', 'ایتم حذف شد');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Language;


class TransactionController extends Controller
{
    public function getIndex(Request  $request){
        $data = Transaction::orderBy('id','DESC')->get();
        return View('admin.transaction.index')
            ->with('data', $data);
    }
}

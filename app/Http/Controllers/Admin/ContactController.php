<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportContact;


class ContactController extends Controller
{
    public function getContact(){

        $data = Contact::paginate(100);
        return view('admin.contact.index')
        ->with('data' , $data);
    
    }
    
    public function getContactEdit($id){
    
        $data = Contact::findorfail($id);
        
        return view('admin.contact.edit')

        ->with('data' , $data);
     
    
    }
    
    public function postContactRead($id,Request $request){
        $input = $request->all();
        //dd($input);
        $read = Contact::find($id);
        $input['read_at'] = '1';
        $read ->update($input); 
        return Redirect::action('Admin\ContactController@getContact')
        ->with('success', 'پیغام مشاهده شد');
    
    
    }
    
    public function getDeleteContact($id){
    
    
        Contact::find($id)->delete();
        
        return Redirect::action('Admin\ContactController@getcontact')
        ->with('success', 'پیغام حذف شد');   
    
    }


    public function export()
    {
        //dd('b');
        return Excel::download(new ExportContact, 'Contact.xlsx');
    }
    
    

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Sms;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function getIndex(Request  $request){
        $data = Ticket::whereNull('reply_id')->get();
        return View('admin.ticket.index')
            ->with('data', $data);
    }
    public function detail($id){
        $ticket = Ticket::find($id);
        return view('admin.ticket.detail')->with('ticket',$ticket);
    }
    public function postReply(Request $request){
        $input = $request->all();
        $ticket = Ticket::find($input['reply_id']);
        $ticket->update([
            'status'=>1
        ]);
        Ticket::create([
            'user_id'=>null,
            'reply_id'=>$input['reply_id'],
            'content'=>$input['content']
        ]);
        Sms::ticketUser($ticket->id);
        return redirect()->back()->with('success','پاسخ شما با موفقیت ثبت شد');
    }
}

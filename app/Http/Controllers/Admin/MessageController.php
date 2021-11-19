<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactResponseMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $data['messages']=Message::orderBy('id','DESC')->paginate(10);
        return view('admin.messages.index')->with($data);
    }
    public function show(Message $message)
    {
        $data['message']=$message;
        return view('admin.messages.show')->with($data);
    }
    public function response(Message $message,Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string',
        ]);
        $receiverMail=$message->email;
        $receiverName=$message->name;
        Mail::to($receiverMail)->send(new ContactResponseMail($receiverName,$request->title,$request->body));
        return redirect(url('dashboard/messages'));
    }
}

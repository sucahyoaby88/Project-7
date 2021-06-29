<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;


class MessageController extends Controller
{
    public function messagedb()
    {
        if(Session()->get('level') == 'admin'){
            $halaman = 'message';
            $message_list = Message::orderBy('id', 'asc')->paginate(5);
            $message_count = Message::count(); 
            return view ('adminpage.message_db', compact('halaman', 'message_list', 'message_count'));
        }else{
            return abort(404);
        }
    }
    
    public function message()
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            return view ('memberpage.message');
        }else{
            return abort(404);
        }
    }

    public function store(Request $req)
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium'){
            Message::create([
                'user_id' => Session()->get('id'),
                'text' => $req->text,
            ]);
            return redirect('memberpage');
        }else{
            return abort(404);
        }
    }

    public function delete($id){
        if(Session()->get('level') == 'admin'){
            $message = Message::findOrFail($id);
            $message->delete();
            return redirect('messagedb');
        }else{
            return abort(404);
        }
    }
}

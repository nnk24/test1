<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messages;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id) {
        $message = Messages::find($id);
        if(isset($message)) {
            if ($message->status == 1) {
                $message->status = 0;
                $message->save();
            }
        } else {
            return redirect()->route('dashboard');
        }
        $ip = $message->ip;
        $messages = Messages::orderby('status', 'DESC')->orderby('id', 'DESC')->get();
        $count_inbox = Messages::Where('ip',$ip)->count();
        $count_inbox_new = Messages::Where([['ip', '=',$ip], ['status', '<>',1]])->count();
        return view('backends.messages.index', compact('messages', 'message', 'count_inbox_new', 'count_inbox'));
    }

    public function deleteAll() {
        Messages::truncate();
        return redirect()->route('dashboard');
    }
    public function delete($id) {
        Messages::find($id)->delete();
        return redirect()->back();
    }
}

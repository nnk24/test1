<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messages;

class FaqController extends Controller
{
    //
    public function index()
    {
        return view('frontends.faq');
    }

    public function submit(Request $request)
    {
        $content = $request->content_;
        if (isset($content)) {
            if (strlen($request->content_) <= 800) {
                $count_messages = Messages::where([['ip', '=', $request->ip()],
                    ['ip', '=', $request->ip()],
                    ['updated_at', '<=', date("Y-m-d", strtotime(date("Y-m-d")) + (3600 * 24))],
                    ['updated_at', '>=', date('Y-m-d', strtotime(date("Y-m-d")))]])->count();
                if ($count_messages < 10) {
                    $messages = new Messages();
                    $messages->inbox = $content;
                    $messages->ip = $request->ip();
                    $messages->save();
                    return [
                        'status' => 200,
                        'message' => 'Lời nhắn đã được gửi. Cảm ơn bạn!',
                    ];
                } else {
                    return [
                        'status' => 403,
                        'message' => 'Lời nhắn của địa chỉ IP này đã vượt quá giới hạn.!',
                    ];
                }
            } else {
                return [
                    'status' => 205,
                    'message' => 'Ký tự của lời nhắn lơn hơn 800 ký tự.!',
                ];
            }
        }
        return [
            'status' => 500,
            'message' => 'Bạn đã thay đổi thứ gì đó!',
        ];
    }
}

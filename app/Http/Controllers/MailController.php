<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Collection;
use Session;


class MailController extends Controller
{
    public function contactMail(Request $request){
        $mail_data = new \stdClass();
        $mail_data->phone = $request->phone;
        $mail_data->name = $request->name;
        $mail_data->email = $request->email;
        $mail_data->address = $request->address;
        $mail_data->content = $request->content;
        // dd($mail_data);
        Mail::to('phuongtha27@gmail.com')->send(new ContactMail($mail_data));
        // nguyenvanhieulabo@gmail.com
        Session::put('status', 'Gửi liên hệ thành công');
        return back();
    }
}

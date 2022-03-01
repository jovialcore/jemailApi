<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function email(Request $request){
        $body = $request->body; 
        $from_email = $request->email;
        $from_name = $request->name;       
        Mail::send([], [], function($message) use($body, $from_email, $from_name){
            $message->to(env('MAIL_USERNAME'))->subject('Message from Contact Form')->setBody()->html(
                "<p>".$from_name." will like to contact you</p><p><b>".$body."</b></p><p>".$from_name." can be reached on <a href='mailto:".$from_email."'>".$from_email."</a>"
            );
        });
        return ([
            "status"=>"200",
            "message"=>"successfully delivered"
        ]);
    }
}

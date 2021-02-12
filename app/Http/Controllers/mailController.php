<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function send() {
        Mail::send(['text'=>'mail'],['name','Online Store'], function ($message){
            $message->to('uttam29mittal@gmail.com', 'To Uttam')->subject('Test Email');
            $message->from('uttam29mittal@gmail.com');
        });
    }
}

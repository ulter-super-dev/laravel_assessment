<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\BlogPostedMail;


class MailController extends Controller
{
    //

    public function sendEmailTest() {
        $email = "patrick.dev.0417@gmail.com";
        Mail::to($email)->send(new BlogPostedMail());
        
    }
}

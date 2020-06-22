<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\MailtoAdmin;
use Illuminate\Http\Request;

class MailController extends Controller
{

    public function basic_email(Request $request) {
    	Mail::to($request->emaildestination)->send(new MailtoAdmin($request)); 
      return redirect()->back();
   }
}

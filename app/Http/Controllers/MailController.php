<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function create()
    {
        return view('mail');
    }

    public function sendmail()
    {
       $data = $request = Request()->all();
        request()->validate([
            'email_id' => 'required|email',
            'subject' => 'required',
            'message' => 'required|string',
        ]);
        Mail::to('testmail@mail.com')->send(new ContactMail($data));
        //dd($request);
        Session::flash('success');
        return back();
    }
}

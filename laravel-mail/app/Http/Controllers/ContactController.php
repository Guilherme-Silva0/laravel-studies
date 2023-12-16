<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $sent = Mail::to('guilhermesilvadev0@gmail.com')
            ->send(new Contact([
                'fromName' => $request->input('name'),
                'fromEmail' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]));
        
        dd('Email sent', $sent);
    }
}

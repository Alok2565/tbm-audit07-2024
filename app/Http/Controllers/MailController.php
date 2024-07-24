<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

       // Mail::to('techsupp.nracbi@gmail.com')->send(new DemoMail($mailData));
        Mail::to('web.aloksingh8190@gmail.com')->send(new DemoMail($mailData));
        dd("Email is sent successfully.");
    }
}
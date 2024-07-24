<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('frontend.pages.aboutus');
    }

    public function contact()
    {
        return view('frontend.pages.contactus');
    }
}

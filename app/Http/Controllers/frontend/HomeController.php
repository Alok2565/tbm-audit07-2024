<?php

namespace App\Http\Controllers\frontend;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
//use Session;
class HomeController extends Controller
{
    public function index()
    {


        Session::flush('name');
        Session::flush('designation');
        Session::flush('roll');
        Session::flush('email');
        Session::flush('key');
        Session::flush('iec_code');
        Session::flush('id');

        $front_banner = HomeBanner::all();
        return view('index',compact('front_banner'));
    }
}

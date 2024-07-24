<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function qrCodeIcmr()
    {
      return view('icmr.qr_code');
    }
}

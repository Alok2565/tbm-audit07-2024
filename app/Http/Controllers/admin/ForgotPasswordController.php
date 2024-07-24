<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{

    public function showForgetPasswordForm()
    {
        return view('auth.admin.forgetPassword');
    }


    public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);

          $token = Str::random(64);
          //dd($token);
          DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);
            // $user_name= User::all();
            // print_r($user_name);
                //dd($request->email);
          Mail::send('auth.admin.email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);

              $message->subject('Reset Password');
          });
          $welocme_msg= "<h3>Please check your email</h3> A email has been send to .'$request->email'. Please check for an email from company and click on the included link to reset your password.";
          return back()->with('message', $welocme_msg);
      }

      public function showResetPasswordForm($token) {
        return view('auth.admin.forgetPasswordLink', ['token' => $token]);
     }

     public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
            //   'password' => 'required|string|min:8|confirmed',
            //   'password_confirmation' => 'required'

              'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirm_password' => 'required_with:password|same:password|min:8'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
          return redirect('admin/login')->with('success', 'Your password has been changed!');
      }
}

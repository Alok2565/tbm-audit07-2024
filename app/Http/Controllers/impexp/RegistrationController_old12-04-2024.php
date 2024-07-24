<?php

namespace App\Http\Controllers\impexp;

use Redirect;
use Carbon\Carbon;
use App\Mail\ImpexpMail;
use App\Models\ImpExpUse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\EmailForgotPassword;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{


    public function registrationImpExp()
    {

        return view('auth/imp_exp/registration');
    }

    // public function registrationIcmr()
    // {

    // return view('auth.icmr.registration');
    //}
    // public function registrationAprComOff()
    // {

    // return view('auth.icmr.registration');
    //}

    // public function loginicmr(){


    //return view('auth.icmr.login');

    // }

    public function login_impexp()
    {


        return view('auth/imp_exp/login');
    }

    public function impexppi(Request $request)
    {
        $attt = $request->all();
        //print_r($attt);
        $iec = $attt['sending_iec_number'];
        $user =  ImpExpUse::where('iec_code', $iec)->first();
        if (!$user) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://apisetu.gov.in/dgft/v2/iec/$iec",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'X-APISETU-CLIENTID: in.gov.dhr',
                    'X-APISETU-APIKEY: DX8EBPqrZCjyldUoPoaROfQpllk1WQMQ',
                    'accept: application/json',
                    'Cookie: Path=/'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        } else {
            $data = array(
                'error' => 'record_exist'
            );
            $response = json_encode($data);
        }
        echo $response;
    }

    // public function impexppi(Request $request)
    // {
    //     $attt = $request->all();
    //     //print_r($attt);
    //     $iec = $attt['sending_iec_number'];

    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://apisetu.gov.in/dgft/v1/iec/$iec",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //         CURLOPT_HTTPHEADER => array(
    //             'X-APISETU-CLIENTID: in.gov.dhr',
    //             'X-APISETU-APIKEY: DX8EBPqrZCjyldUoPoaROfQpllk1WQMQ',
    //             'accept: application/json',
    //             'Cookie: Path=/'
    //         ),
    //     ));
    //     $response = curl_exec($curl);
    //     curl_close($curl);
    //     echo $response;
    // }

    function validate_registration(Request $request)
    {
        $request->validate([
            'iec_code'          => 'required|unique:imp_exp_user',
            'name'              => 'required',
            'address'           => 'required',
            'address2'           => 'required',
            'city'           => 'required',
            'states'           => 'required',
            'pincode'           => 'required',
            'department'           => 'required',
            'designation'           => 'required',
            'email'             => 'required',
            'mobile_number'     => 'required|max:12',
        ],
        [],
        [
            'name' => 'name',
            'designation' =>'designation'
        ]);
		
		$clientIpAddress = $request->getClientIp();
		//$clientIpAddress = $request->ip();
        $data = $request->all();

        ImpExpUse::create([
            'roll'  =>  'imp-exp',
            'iec_code'  =>  $data['iec_code'],
            'name' =>  $data['name'],
            'address'  =>  $data['address'],
            'address2'  =>  $data['address2'],
            'city'  =>  $data['city'],
            'states'  =>  $data['states'],
            'pincode'  =>  $data['pincode'],
            'department'  =>  $data['department'],
            'designation'  =>  $data['designation'],
            'email'  =>  $data['email'],
            'mobile_number'  =>  $data['mobile_number'],
            'ip_address'  =>  $clientIpAddress,
            'status'  =>  '1',
        ]);
        // $mailData = [
        //     'title' => '',
        //     'body' => '',
        //     'iec_code' => $data['iec_code']
        // ];

        // Mail::to($data['email'])->cc(['thbm.hq@icmr.gov.in'])->send(new ImpexpMail($mailData));
        // // Mail::to($record->email)->cc([$emails])->send(new ExporterMailSubmit($mailData));
        // return redirect('imp-exp/thankyou')->with('success', 'Please click the password generation link sent to your email Id to complete the registration process');
        return redirect('imp-exp/generate-password')->with('success', 'Registration Completed, now you can login');
    }

    public function reloadCaptchaimportexportReg()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
    public function generatePassword(Request $request)
    {
        if (isset($request['id'])) {
            $iec_code['iec_code']  = decrypt($request['id']);
        } else {
            $iec_code['iec_code']  = '';
        }

        return view('auth.imp_exp.generate_password', $iec_code);
    }

    public function thankyouMessage()
    {
        return view('auth/imp_exp/thnakyou_message');
    }

    public function createPassword(Request $request)
    {
        //echo 'done'; exit;
        $request->validate([
            'iec_code' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirm_password' => 'required_with:password|same:password|min:8'
        ]);
        $test = now();
        //dd($test);
        $data = $request->all();
        $user =  ImpExpUse::where('iec_code', $data['iec_code'])->first();

        $user->password = Hash::make($data['password']);
        $user->save();
        return Redirect('imp-exp/thankyou-password')->with('success', 'Password has been generated successfully.');
        // return Redirect::back()->with('success', 'Your password has been generated succssefully.');
        // return Redirect::back()->withErrors(['success' => 'Password has been Generated Succseefuly.']);
    }

    public function thankyouPassword()
    {
        return view('auth/imp_exp/thnakyou_password');
    }

    private function myDecrypt($value, $key, $iv){
        $value = base64_decode($value);
        $data = openssl_decrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        if(empty($data)){
            $data = rand();
        }
        return $data;
    }
    public function loginimportexport(Request $request)
    {
		//echo "dgsdg"; die;
        $request->validate(
            [
                'iec_code' => 'required',
                'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
               'captcha' => 'required|captcha',
            ],
            [],
            [
             'captcha' => 'captcha',
          ]);

        $iec_code = $request->input('iec_code');
        $password1 = $request->input('password');
		$password = base64_decode($password1);
        $result = ImpExpUse::where(['iec_code' => $iec_code])->first();

        //$User_type = DB::table('imp_exp_user')->select('id','roll')->where('iec_code', '=', $iec_code)->where('password', '=', $password)->get();
        //print_r($User_type); die;
        $key="01234567890123456789012345678901"; // 32 bytes
        $vector="1234567890123412"; // 16 bytes
        $decrypted = $this->myDecrypt($password, $key, $vector);
        //dd($decrypted);
        $decrypted1= explode(':',$decrypted);
        //dd($decrypted1);
		$storedPassword = $decrypted1[0];
        //dd($storedPassword);

        if ($result) {
            if (Hash::check($storedPassword, $result->password)) {

                $request->session()->put('iec_code', $result->iec_code);
                $request->session()->put('roll', $result->roll);
                $request->session()->put('id', $result->id);
                //print_r($request); die;
                return redirect('imp-exp/dashboard');
            } else {
                return redirect('imp-exp/login')->with('msg', 'The IEC Code or Password is Incorrect. Please try again.');
            }
        } else {
            return redirect('imp-exp/login')->with('msg', 'The IEC Code or Password is Incorrect. Please try again.');
            //return redirect('imp-exp/login');
        }
    }
    public function reloadCaptchaExpImp()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function logoutimpexp(Request $request)
    {

        if (empty(Session::get('roll') == 'imp-exp')) {
            return redirect('imp-exp/login');
        }
        $request->session()->flush();

        return redirect('imp-exp/login');
    }

    public function changePassword()
    {
        return view('auth.imp_exp.chnage_Password');
    }
    public function updatePassword(Request $request)
    {
        if (empty(Session::get('roll') == 'imp-exp')) {
            return redirect('imp-exp/login');
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirm_password' => 'required|same:new_password',

        ]);
        $current_password = $request->input('current_password');
        $iec_code = Session::get('iec_code');
        //dd($iec_code );
        $user = ImpExpUse::where('iec_code', $iec_code)->where('roll', 'like', 'imp-exp')->first();
        //dd($user);
        if ($user) {
            if (Hash::check($current_password, $user->password)) {
                //dd($user->password);
                $user->password = Hash::make($request->new_password);
                //dd($request->new_password);
                $user->update();
                //dd($user);
                //return redirect()->back()->with('success', 'Password changed successfully!');
                return redirect()->route('impexp.change-password')->with('success', 'Password changed successfully!');
            } else {
                //return redirect()->back()->with("error", "Old password doesn't match!");
                return redirect()->route('impexp.change-password')->with('success', 'Password changed successfully!');
            }
        }
    }

    public function showForgetPwdForm()
    {
        return view('auth.imp_exp.forget_password');
    }

    public function submitForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:imp_exp_user', // Assuming table name is 'imp_exp-user'
            'captcha' => 'required|captcha',
        ],
        [], 
        [     
         'captcha' => 'captcha',
      ]);
        //dd($validator);
        if ($validator->fails()) {
            return back()->withErrors($validator); // Redirect back with validation errors
        }
        $user = ImpExpUse::where('email', $request->email)->first(); // Fetch user by email
        //dd($user);
        if (!$user) {
            return back()->with('status', 'We couldn\'t find an account associated with that email.');
        }
        $token = Str::random(64);
        $user->forceFill([
            'remember_token' => $token, // Assuming password reset token field
            'updated_at' => Carbon::now()->addMinute(2),
        ])->save();
        $forgotEmailLink = [
            'title' => '',
            'body' => '',
            'email' => $user['email'],
        ];
        //echo "xdg"; die;
        Mail::to($user->email)->cc(['thbm.hq@icmr.gov.in'])->send(new EmailForgotPassword($forgotEmailLink, ['remember_token' => $token]));
        //dd('Mail sent successfully');
         return redirect('imp-exp/forgot-email-message')->with('status', 'Password reset link has been sent your email address. Please check the email and reset the password.');

    }
        public function reloadCaptchaImpexpForget()
        {
            return response()->json(['captcha' => captcha_img()]);
        }
    public function forgetEmailMessage()
    {
        return view('auth.imp_exp.forgot_email_message');
    }
    public function showResetPwdForm()
    {
        return view('auth.imp_exp.reset_password');
    }
    public function submitResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:imp_exp_user',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],  // Separate rules
            'password_confirmation' => 'required|same:password',
            'captcha' => 'required|captcha',
        ],
        [], 
        [     
         'captcha' => 'captcha',
      ]);

        $user = ImpExpUse::where('email', $request->email, 'remember_token',$request->remember_token)->first();
       // dd($user);
        if(!$user){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = ImpExpUse::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
        return redirect('imp-exp/reset-message')->with('success', 'Your password has been changed successfully.');
    }

    public function thankyouResetPassword()
    {
        return view('auth.imp_exp.reset_password_message');
    }

    public function reloadCaptchaIemrReset()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}

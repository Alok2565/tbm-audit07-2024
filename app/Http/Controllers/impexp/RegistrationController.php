<?php

namespace App\Http\Controllers\impexp;

use Redirect;
use App\Mail\ImpexpMail;
use App\Models\ImpExpUse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\ExporterMailSubmit;
use App\Mail\ImpExpSendEmailOtp;
use App\Mail\EmailForgotPassword;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function login_impexp()
    {
        $randomBytes = random_bytes(8); // 8 bytes will give you 16 hexadecimal characters
        $randomString = bin2hex($randomBytes);
		Session::put('bsrandom', $randomString);
        Session::put('userlogin', 'No');

    return view('auth/imp_exp/login');
    }

    public function impexppi(Request $request)
    {
        $attt = $request->all();
        //print_r($attt);
        $iec = $attt['sending_iec_number'];
        $user =  ImpExpUse::where('iec_code', $iec)->first();
        if(!$user){
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
    }else{
        $data = array(
            'error' => 'record_exist'
        );
        $response = json_encode($data);
    }
        echo $response;
    }

    function validate_registration(Request $request)
    {
         $request->validate([
            'iec_code'          => 'required|unique:imp_exp_user',
            'name'              => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'address'           => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            //'address2'           => 'required',
            'city'           => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'states'           => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'pincode'           => 'required|regex:/[0-9]{6}(?:-[0-9]{4})?/',
            'department'           => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
			'designation'           => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'email'             => 'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',
            'mobile_number'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:12',
        ]);

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
            'ip_address'  =>  '10.23.25.5',
            'status'  =>  '1',
        ]);
        $mailData = [
            'title' => '',
            'body' => '',
            'iec_code' => $data['iec_code']
        ];

        Mail::to($data['email'])->cc('thbm.hq@icmr.gov.in')->send(new ImpexpMail($mailData));
        return redirect('imp-exp/thankyou')->with('success', 'Please click the password Generation link sent to your email Id to Complete the Registation Process');
        ///return redirect('imp-exp/generate-password')->with('success', 'Registration Completed, now you can login');
    }

    public function reloadCaptchaimportexportReg()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function reloadCaptchaimportexportemailotp()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function generatePassword(Request $request)
    {
        if(isset($request['id'])){
            $iec_code['iec_code']  = decrypt($request['id']);
        }else{
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
        //$test = now();
        //dd($test);
        $data = $request->all();
        $user =  ImpExpUse::where('iec_code', $data['iec_code'])->first();
		$plainText = $data['password'];
            $hashedValue = hash('sha256', $plainText);
            $user->password = $hashedValue;
       // $user->password = Hash::make($data['password']);
        $user->save();
        return Redirect('imp-exp/thankyou-password')->with('success', 'Password has been generated successfully.');

    }

    public function thankyouPassword()
    {
        return view('auth/imp_exp/thnakyou_password');
    }

    // private function myDecrypt($value, $key, $iv){
    //     $value = base64_decode($value);
    //     $data = openssl_decrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    //     if(empty($data)){
    //         $data = rand();
    //     }
    //     return $data;
    // }

	 public function cryptoJsAesDecrypt($passphrase, $jsonString){
		$jsondata = json_decode($jsonString, true);
		$salt = hex2bin($jsondata["s"]);
		$ct = base64_decode($jsondata["ct"]);
		$iv  = hex2bin($jsondata["iv"]);
		$concatedPassphrase = $passphrase.$salt;
		$md5 = array();
		$md5[0] = md5($concatedPassphrase, true);
		$result = $md5[0];
		for ($i = 1; $i < 3; $i++) {
			$md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
			$result .= $md5[$i];
		}
		$key = substr($result, 0, 32);
		$data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
		return json_decode($data, true);
	}


    public function loginimportexport(Request $request)
    {
		$request->validate([
            'iec_code' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'captcha' => 'required|captcha',
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.'
        ]);

			$iec_code=$request->input('iec_code');
			$password=$request->input('password');
			$key=$request->session()->get('bsrandom');
		    $result=ImpExpUse::where(['iec_code'=>$iec_code])->first();
			$haskey = $key;
			$plainText = $this->cryptoJsAesDecrypt($haskey, $password);
			
            $hashedValue = hash('sha256', $plainText);
            Session::forget('bsrandom');
			$email = (!empty($result->email))?$result->email:null;
			if($email== null){
			return redirect('imp-exp/login')->with('msg', 'The IEC or Password is Incorrect. Please try again.');
            }
		// 	$dates = '2024-06-11 16:04:20';
			
		//  if ($result) { 
    
		// 	$dateToCompare = new Carbon($dates);
		// 	$createdAt = new Carbon($result->created_at);

		// 	if ($createdAt > $dateToCompare) {
            $dates = '2024-06-11 16:04:20';
            if ($result) {
                $dateToCompare = new Carbon($dates);
                $createdAt = $result->created_at;
        
                if ($createdAt > $dateToCompare) {
				
            if($hashedValue == $result->password){
            
             $rand_email_otp = rand(100000, 999999);
             $rand_value = ['email_otp' => $rand_email_otp,'email_otp_used' =>'0'];
             $Toemail = DB::table('imp_exp_user')->where('email', '=', $email)->update($rand_value);
             //echo "$Toemail"; die;
            $ImpExpsendEmailOtp = [
            'title' => '',
            'body' => '',
            'ImpEXPEmailOtp' => $rand_email_otp,
        ];
               Mail::to($email)->send(new ImpExpSendEmailOtp($ImpExpsendEmailOtp));
              // Mail::to('aashishsingh6996@gmail.com')->send(new ImpExpSendEmailOtp($ImpExpsendEmailOtp));
			   Session::put('userlogin', 'Yes');
               return redirect()->route('imp_exp_sendEmailVericationForm');
              }else{
                 return redirect('imp-exp/login')->with('msg', 'The IEC or Password is Incorrect. Please try again.');
            }
			}else{
                 return redirect('imp-exp/login')->with('msg', 'Your Password has been expire Please Reset your password.');
            }
         }else{
           return redirect('imp-exp/login')->with('msg', 'The IEC or Password is Incorrect. Please try again.');

        }
    }
    public function sendEmailVericationFormImpExp()
    {
		//echo 'done'; die;
        if(Session::get('userlogin') !='Yes'){
            return redirect('imp-exp/login');
          }
        return view('auth.imp_exp.icmexp_email_otp');

    }

    public function SubmitEmailVericationImpExp(Request $request)
    {
        $request->validate([
            'email_otp' => 'required',
            'captcha' => 'required|captcha',
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.'
        ]);

        $verifyOtp = $request->input('email_otp');

        $result = ImpExpUse::where('email_otp', $verifyOtp)->first();
        $result = ImpExpUse::where('email_otp', $verifyOtp)->where('email_otp_used',0)->first();
//dd($$result->iec_code); die;
        if ($result) {
            $rand_value = ['email_otp_used' => 1];
            DB::table('imp_exp_user')->where('email_otp', $verifyOtp)->update($rand_value);
              $request->session()->put('iec_code',$result->iec_code);
			  $request->session()->put('roll',$result->roll);
			  $request->session()->put('id',$result->id);
              $request->session()->put('key', rand(10000, 99999));
              Session::put('userlogin', 'No');
            return redirect('imp-exp/dashboard');
        } else {
            return redirect()->route('imp_exp.sendEmailVericationForm')->with('msg','Please enter valid OTP');
        }
    }
    public function reloadCaptchaExpImp ()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

     public function logoutimpexp(Request $request){

	  if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
		$request->session()->flush('iec_code');
		$request->session()->flush('roll');
		$request->session()->flush('id');
		$request->session()->flush('key');

        return redirect('imp-exp/login');
    }

	public function changePassword(Request $request)
	{
	if (empty(Session::get('roll') == 'imp-exp')) {
            return redirect('imp-exp/login');
        }

	  return view('auth/imp_exp/chnage_Password');
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
        if ($user){
            if (Hash::check($current_password, $user->password)) {
                //dd($user->password);
                $user->password = Hash::make($request->new_password);
                //dd($request->new_password);
                $user->update();

				Session::forget('iec_code');
                Session::forget('roll');
                Session::forget('id');
                //dd($user);
               // return redirect()->back()->with('success', 'Password changed successfully!');
                //return redirect('imp-exp/login');
                return redirect('imp-exp/login')->with('msg', 'Password changed successfully!');


                //dd($user);
                //return redirect()->back()->with('success', 'Password changed successfully!');
            } else {
                return redirect()->back()->with("error", "Old password doesn't match!");
            }
        }
    }

    public function showForgetPwdForm()
    {
        return view('auth.imp_exp.forget_password');
    }

    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'iec_code' => 'required',
			 'captcha' => 'required|captcha',
			],
			[
				'captcha.captcha'=>'Invalid captcha code.'
			]);
    
        $user = ImpExpUse::where('iec_code', $request->iec_code)->first(); // Fetch user by email
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
            'iec_code' => $user['iec_code'],
        ];
        //echo "xdg"; die;
        Mail::to($user->email)->send(new EmailForgotPassword($forgotEmailLink, ['remember_token' => $token]));

        // Mail::to($record->email)->cc(['thbm.hq@icmr.gov.in'])->send(new ExporterMailSubmit($mailData));
        
         return redirect('imp-exp/forgot-email-message')->with('status', 'Password reset link has been sent your email address. Please check the email and reset the password.');

    }

    public function forgetEmailMessage()
    {
        return view('auth.imp_exp.forgot_email_message');
    }
    public function showResetPwdForm(Request $request)
    {
        
        if(isset($request['id'])){
            $iec_code['iec_code']  = decrypt($request['id']);
        }else{
            $iec_code['iec_code']  = '';
        }
        return view('auth.imp_exp.reset_password',$iec_code);
    }
    public function submitResetPassword(Request $request)
    {$request->validate([
            'iec_code' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirm_password' => 'required_with:password|same:password|min:8',
		  ]);
		
        $data = $request->all();

        $user =  ImpExpUse::where('iec_code', $data['iec_code'])->first();

		$plainText = $data['password'];
            $hashedValue = hash('sha256', $plainText);
            echo $hashedValue;
            $user->password = $hashedValue;

            $user = ImpExpUse::where('iec_code', $request->iec_code)->update(['password' =>$user->password]);

        return redirect('imp-exp/reset-message')->with('success', 'Your password has been changed successfully.');
    }

    public function thankyouResetPassword()
    {
        return view('auth.imp_exp.reset_password_message');
    }


}

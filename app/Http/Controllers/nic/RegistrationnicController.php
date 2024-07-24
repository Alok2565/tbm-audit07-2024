<?php

namespace App\Http\Controllers\nic;
use DB;
use App\Mail\CommMail;
use App\Mail\ImpexpMail;
use App\Models\ImpExpUse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\IcmrSendEmailOtp;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Mail\EmailForgotPasswordNic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegistrationnicController extends Controller
{


    public function login_nic(){
	
	   $randomBytes = random_bytes(8);
       $randomString = bin2hex($randomBytes);
	   Session::put('bsrandom', $randomString);
       Session::put('userlogin', 'No');

    return view('auth.nic.login');

    }

    private function myDecrypt($value, $key, $iv){
        $value = base64_decode($value);
        $data = openssl_decrypt($value, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        if(empty($data)){
            $data = rand();
        }
        return $data;
    }
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
	
    /* public function signin_nic_a(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'captcha' =>'required',
        ]);
        $email=$request->input('email');
        $password=$request->input('password');
        $key=$request->input('pass_enc');
		
        
        $result=ImpExpUse::where(['email' => $email])->first();
		$haskey = $key;
        
        $plainText = $this->cryptoJsAesDecrypt($haskey, $password);	
		
            echo $hashedValue = hash('sha256', $plainText);
            

		if($result){
            if($hashedValue== $result->password){

              $request->session()->put('name',$result->name);
              $request->session()->put('designation',$result->designation);
			  $request->session()->put('roll',$result->roll);
			  $request->session()->put('id',$result->id);
	
              return redirect('nic/dashboard');
            }else{
				//echo "fhfh"; die;
				return redirect('nic')->with('msg', 'The Email and Password Not Matched');
               // return redirect('nic');
            }
    }else{
		
		return redirect('nic')->with('msg', 'The Email and Password Not Matched');
               
	}
	} */
	
	public function signin_nic(Request $request)
    {
       $request->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'captcha' => 'required|captcha',
            ],
            [],
            [
             'captcha' => 'captcha',
          ]);
		 
         $email = $request->input('email');
         $password = $request->input('password');
         $key=$request->session()->get('bsrandom');
		  
        $result=ImpExpUse::where(['email' => $email])->first();
		$haskey = $key;
        $plainText = $this->cryptoJsAesDecrypt($haskey, $password);
        echo $hashedValue = hash('sha256', $plainText);
        Session::forget('bsrandom');
        $email = $result->email;
		// $dates = '2024-06-11 16:04:20';
        // if($result){
			
		// 	$dateToCompare = new Carbon($dates);
		// 	$createdAt = new Carbon($result->created_at);

		// 	if ($createdAt > $dateToCompare) {
            $dates = '2024-06-11 16:04:20';
            if ($result) {
                $dateToCompare = new Carbon($dates);
                $createdAt = $result->created_at;
        
                if ($createdAt > $dateToCompare) {
				
            if($hashedValue== $result->password){
			 
              $rand_email_otp = rand(100000, 999999);
				
             $rand_value = ['email_otp' => $rand_email_otp,'email_otp_used' =>'0'];
            
             $toemail = DB::table('imp_exp_user')->where('email', '=', $email)->update($rand_value);
            //echo"testing"; die;

            $IcmrSendEmail_otp = [
            'title' => '',
            'body' => '',
            'IcmrEmailOtp' => $rand_email_otp,
			];
              Mail::to($email)->send(new IcmrSendEmailOtp($IcmrSendEmail_otp));
            //Mail::to('aashishsingh6996@gmail.com')->send(new IcmrSendEmailOtp($IcmrSendEmail_otp));
			Session::put('userlogin', 'Yes');
			
              return redirect('nic/send_otp_nic');
            }else{
				return redirect('nic')->with('msg', 'The Email and Password Not Matched');
               }
			}else{
                 return redirect('nic')->with('msg', 'Your Password has been expire Please Reset your password.');
            }
		}else{
			return redirect('nic')->with('msg', 'The Email and Password Not Matched');
			}
	}
	
	  public function send_otp_nic()
        {
          if(Session::get('userlogin') !='Yes'){
             return redirect('nic/login');
           }
		   //echo "fhdfhh"; die;
      return view('auth.nic.nic_email_otp');
       }
	
	public function submit_otp_nic(Request $request)
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

        if ($result) {
            $rand_value = ['email_otp_used' => 1];
            DB::table('imp_exp_user')->where('email_otp', $verifyOtp)->update($rand_value);

            $request->session()->put('name', $result->name);
            $request->session()->put('designation', $result->designation);
            $request->session()->put('roll', $result->roll);
            $request->session()->put('email', $result->email);
            $request->session()->put('key', rand(10000, 99999));
            Session::put('userlogin', 'No');
            return redirect('nic/dashboard');
        } else {
            return redirect('nic/send_otp_nic')->with('msg','Please enter valid OTP');
        }
    }
	
    public function reloadCaptchanic ()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
	
	public function showForgetPwdFormNic()
    {
        return view('auth.nic.forgetPassword');
    }
    public function submitForgetPasswordNic(Request $request)
    {
        // $data = $request->all();
        // dd($data);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:imp_exp_user',
            'captcha' => 'required|captcha',
        ],
        [],
        [
         'captcha' => 'Invalid captcha Code ',
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

        $forgotNicEmailLink = [
            'title' => '',
            'body' => '',
            'email' => $user['email'],
        ];
        //Mail::to('web.aloksingh8190@gmail.com')->cc('alok.icmr@yopmail.com')->send(new EmailForgotPasswordIcmr($forgotEmailLink, ['remember_token' => $token]));

        Mail::to($user->email)->cc('alok.icmr@yopmail.com')->send(new EmailForgotPasswordNic($forgotNicEmailLink, ['remember_token' => $token]));
        //dd('Mail sent successfully');
         return redirect('nic/forgot-email-message')->with('status', 'Password reset link has been sent your email address. Please check the email and reset the password.');

    }

    public function forgetEmailMessageNic()
    {
        return view('auth.nic.forgot_email_message');
    }

    public function showResetPwdFormNic(Request $request)
    {
        if(isset($request['id'])){
            $email['email']  = decrypt($request['id']);
        }else{
            $email['email']  = '';
        }
        return view('auth.nic.reset_password',$email);
    }
    public function submitResetPasswordNic(Request $request)
    {
        // $data = $request->all();
        // dd($data);

        $request->validate([
            'email' => 'required|email|exists:imp_exp_user',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],  // Separate rules
            'password_confirmation' => 'required|same:password',
            'captcha' => 'required|captcha',
        ],
        [],
        [
         'captcha' => 'Invalid captcha Code ',
        ]);
        $data = $request->all();

        $user =  ImpExpUse::where('email', $data['email'])->first();

		$plainText = $data['password'];
            $hashedValue = hash('sha256', $plainText);
            //echo $hashedValue;
            $user->password = $hashedValue;

            $user = ImpExpUse::where('email', $request->email)->update(['password' =>$user->password]);

        return redirect('nic/reset-message')->with('success', 'Your password has been changed successfully.');
        }

        public function thankyouResetPasswordNic()
        {
            return view('auth.nic.reset_password_message');
        }
		
   public function logoutnic(Request $request){

	  if(empty(Session::get('roll')=='nic')){
		return redirect('nic');
	  }
	  //echo "sdgds"; die;
		$request->session()->flush();

        return redirect('nic');
    }

}

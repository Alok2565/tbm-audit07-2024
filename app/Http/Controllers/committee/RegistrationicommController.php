<?php

namespace App\Http\Controllers\committee;
use DB;
use App\Mail\CommMail;
use App\Mail\ImpexpMail;
use App\Models\ImpExpUse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\CommitteeSendEmailOtp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailForgotPasswordComm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegistrationicommController extends Controller
{


   public function registrationcommittee()
    {

       return view('auth.committee.registration');
    }

    public function loginicommittee(){
		$randomBytes = random_bytes(8);
        $randomString = bin2hex($randomBytes);
		Session::put('bsrandom', $randomString);
        Session::put('userlogin', 'No');
    return view('auth.committee.login');
    }
	
    public function impexppi(Request $request)
    {
        $attt = $request->all();
        //print_r($attt);
        $iec = $attt['iec_code'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apisetu.gov.in/dgft/v1/iec/$iec",
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
        echo $response;
    }

    function validate_committee(Request $request)
    {
		//echo "xfhfhd"; die;
		 $data = $request->all();
        $request->validate([
            'name'              => 'required',
            'address'           => 'required',
			'designation'           => 'required',
			'department'           => 'required',
            'email'             => 'required|unique:imp_exp_user',
            'mobile_number'     => 'required',
        ]);

        ImpExpUse::create([
            'roll'  =>  'comm',
			'name' =>  $data['name'],
            'address'  =>  $data['address'],
            'designation'  =>  $data['designation'],
			'department'  =>  $data['department'],
            'email'  =>  $data['email'],
            'mobile_number'  =>  $data['mobile_number'],
            'ip_address'  =>  '10.23.25.5',
            'status'  =>  '1',
        ]);
        $mailData = [
            'title' => '',
            'body' => '',
            'email' => $data['email']
        ];

        Mail::to($data['email'])->send(new CommMail($mailData));
        return redirect('committee/thankyou')->with('success', 'Please click the password Generation link sent to your email Id to Complete the Registation Process');
    }

    public function generatePasswordcommittee(Request $request)
    {
        if(isset($request['id'])){
            $iec_code['email']  = decrypt($request['id']);
        }else{
            $iec_code['email']  = '';
        }

        return view('auth.committee.generate_password', $iec_code);
    }

    public function thankyouMessage()
    {
        return view('auth/committee/thnakyou_message');
    }

    public function createPasswordcommittee(Request $request)
    {
        //echo 'done'; exit;
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',

        ]);
       // $test = now();
        //dd($test);
        $data = $request->all();
        $user =  ImpExpUse::where('email', $data['email'])->first();
		$plainText = $data['password'];
            //echo $plainText; die;
            $hashedValue = hash('sha256', $plainText);

            $user->password = $hashedValue;
        //$user->password = Hash::make($data['password']);
        $user->save();
        // return Redirect('committee/login')->with('success', 'your password has been generate please login here.');
        return Redirect('committee/thankyou-password')->with('success', 'Password has been Generated Succseefuly.');
    }

    public function thankyouPasswordCommittee()
    {
        return view('auth/committee/thankyou_password');
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
	
    /* public function signincommittee_a(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'captcha' => 'required|captcha'
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.',
        ]);

        $email=$request->input('email');
        $password=$request->input('password');
         $key=$request->session()->get('bsrandom');
	
        $result=ImpExpUse::where(['email' => $email])->first();
		
			$haskey = $key;
        
        $plainText = $this->cryptoJsAesDecrypt($haskey, $password);	
		
            echo $hashedValue = hash('sha256', $plainText);
            Session::forget('bsrandom');
			$dates = '2024-06-11 16:04:20';
		if($result){
			
			$dateToCompare = new Carbon($dates);
			$createdAt = new Carbon($result->created_at);

			if ($createdAt > $dateToCompare) {
			
            if($hashedValue== $result->password){

               $request->session()->put('name',$result->name);
               $request->session()->put('designation',$result->designation);
			   $request->session()->put('roll',$result->roll);
			   $request->session()->put('id',$result->id);
			$request->session()->put('key', rand(10000, 99999));

              return redirect('committee/dashboard');
            }else{
				return redirect('committee/login')->with('msg', 'The Email and Password Not Matched');
            }
			}else{
                 return redirect('committee/login')->with('msg', 'Your Password has been expire Please Reset your password.');
            }
        }else{
            return redirect('committee/login')->with('msg', 'The Email and Password Not Matched');
        }
    } */
	
	public function signincommittee(Request $request)
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
		//echo "dsgdsg"; die;
        $email = $request->input('email');
        $password = $request->input('password');
        $key=$request->session()->get('bsrandom');
	
        $result=ImpExpUse::where(['email' => $email])->first();
		$haskey = $key;
        $plainText = $this->cryptoJsAesDecrypt($haskey, $password);
        echo $hashedValue = hash('sha256', $plainText);
        Session::forget('bsrandom');
        $email = (!empty($result->email))?$result->email:null;
			if($email== null){
			return redirect('committee/login')->with('msg', 'The Email or Password is Incorrect. Please try again.');
            }
       
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
             //dd($rand_value);
             $toemail = DB::table('imp_exp_user')->where('email', '=', $email)->update($rand_value);
            //echo"testing"; die;

            $CommsendEmailOtp = [
            'title' => '',
            'body' => '',
            'CommEmailOtp' => $rand_email_otp,
        ];
              Mail::to($email)->send(new CommitteeSendEmailOtp($CommsendEmailOtp));
           // Mail::to('aashishsingh6996@gmail.com')->send(new IcmrSendEmailOtp($IcmrSendEmail_otp));
			Session::put('userlogin', 'Yes');
            return redirect('committee/submit_otp_comm');
            }else{
				return redirect('committee/login')->with('msg', 'The Email and Password Not Matched');
            }
		}else{
                 return redirect('committee/login')->with('msg', 'Your Password has been expire Please Reset your password.');
            }
        }else{
            return redirect('committee/login')->with('msg', 'The Email and Password Not Matched');
        }
    }
	
    public function submit_otp_comm()
    {
		 if(Session::get('userlogin') !='Yes'){
            return redirect('committee/login');
          }	  
       return view('auth.committee.comm_email_otp');
    }
	
    public function submit_otp_committee(Request $request)
     {
        $request->validate([
            'email_otp' => 'required',
            'captcha' => 'required|captcha',
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.'
        ]);
		//echo "dgd"; die;
        $verifyOtp = $request->input('email_otp');
        $result = ImpExpUse::where('email_otp', $verifyOtp)->first();
        $result = ImpExpUse::where('email_otp', $verifyOtp)->where('email_otp_used',0)->first();
        if ($result) {
            $rand_value = ['email_otp_used' => 1];
            DB::table('imp_exp_user')->where('email_otp', $verifyOtp)->update($rand_value);
            $request->session()->put('id', $result->id);
            $request->session()->put('name', $result->name);
            $request->session()->put('designation', $result->designation);
            $request->session()->put('roll', $result->roll);
            $request->session()->put('email', $result->email);
            $request->session()->put('key', rand(10000, 99999));
            Session::put('userlogin', 'No');
            return redirect('committee/dashboard');
        } else {
            return redirect('committee.submit_otp_comm')->with('msg','Please enter valid OTP');
        }
    }

    
    public function reloadCaptchaCommittee ()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
   public function logoutcommittee(Request $request){

	  if(empty(Session::get('roll')=='comm')){
		return redirect('committee/login');
	  }
	  //echo "sdgds"; die;
		$request->session()->flush('name');
		$request->session()->flush('designation');
		$request->session()->flush('roll');
		$request->session()->flush('id');
		$request->session()->flush('key');

        return redirect('committee/login');
    }

    public function changeCommiittePassword()
    {
        return view('auth.committee.change_password');
    }

    public function updateCommiittePassword(Request $request)
    {
        if (empty(Session::get('roll') == 'comm')) {
            return redirect('committee/login');
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirm_password' => 'required|same:new_password',

        ]);
        $current_password = $request->input('current_password');
        //dd($current_password);
        $email = Session::get('email');
        //dd($email);
        $user = ImpExpUse::where('email', $email)->where('roll', 'comm')->first();
        //dd($user);
        if ($user) {
            if (Hash::check($current_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->update();
				
				Session::forget('email');
                Session::forget('roll');
                Session::forget('id');
                //dd($user);
               // return redirect()->back()->with('success', 'Password changed successfully!');
                //return redirect('imp-exp/login');
                return redirect('committee/login')->with('msg', 'Password changed successfully!');
				
                //return redirect()->back()->with('success', 'Password changed successfully!');
            } else {
                return redirect()->back()->with("error", "Old password doesn't match!");
            }
        }
    }


    public function commShowForgetPwdForm()
    {
        return view('auth.committee.forget_password');
    }

    public function commSubmitForgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:imp_exp_user', // Assuming table name is 'imp_exp-user'
            'captcha' => 'required|captcha',
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.'
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator); // Redirect back with validation errors
        }
        $user = ImpExpUse::where('email', $request->email)->first(); // Fetch user by email
       // dd($user);
        if (!$user) {
            return back()->with('status', 'We couldn\'t find an account associated with that email.');
        }
        $token = Str::random(64);
        $user->forceFill([
            'remember_token' => $token, // Assuming password reset token field
            'updated_at' => Carbon::now()->addMinute(2),
        ])->save();
        $forgotcommEmailLink = [
            'title' => '',
            'body' => '',
            'email' => $user['email'],
        ];
        Mail::to($user->email)->send(new EmailForgotPasswordComm($forgotcommEmailLink, ['remember_token' => $token]));
        //dd('Mail sent successfully');
         return redirect('committee/forgot-email-message')->with('status', 'Password reset link has been sent your email address. Please check the email and reset the password.');

    }

    public function reloadCaptchaCommForget()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function commforgetEmailMessage()
    {
        return view('auth.committee.forgot_email_message');
    }
    public function commShowResetPwdForm(Request $request)
    {
        if(isset($request['id'])){
            $email['email']  = decrypt($request['id']);
        }else{
            $email['email']  = '';
        }
        return view('auth.committee.reset_password',$email);
    }
    public function commSubmitResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirm_password' => 'required_with:password|same:password|min:8',
		  ]);
		
        $data = $request->all();

        $user =  ImpExpUse::where('email', $data['email'])->first();

		$plainText = $data['password'];
            $hashedValue = hash('sha256', $plainText);
            echo $hashedValue;
            $user->password = $hashedValue;

            $user = ImpExpUse::where('email', $request->email)->update(['password' =>$user->password]);

        return redirect('committee/reset-message')->with('success', 'Your password has been changed successfully.');
    }

    public function commThankyouResetPassword()
    {
        return view('auth.committee.reset_password_message');
    }

    public function reloadCaptchaCommReset()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

}
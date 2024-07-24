<?php

namespace App\Http\Controllers\admin;
use DB;
use Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\IcmrSendEmailOtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function loginAdmin()
    {   
		$randomBytes = random_bytes(8);
        $randomString = bin2hex($randomBytes);
		Session::put('bsrandom', $randomString);
        Session::put('userlogin', 'No');
        return view('auth.admin.login');
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
	

    /* public function signinAdmin_a(Request $request)
    {
		$request->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'captcha' => 'required|captcha'
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.'
        ]);

        $email=$request->input('email'); 
        $password=$request->input('password');
        //$enc=$request->input('enc');
         $key=$request->input('pass_enc');
		
        $result = User::where(['email' => $email])->first();
        $haskey = $key;
        $plainText = $this->cryptoJsAesDecrypt($haskey, $password);	
			echo $hashedValue = hash('sha256', $plainText);
        if($result){
            if($hashedValue== $result->password){
			    $request->session()->put('email',$result->email);
             return redirect('admin/dashboard');			  
            }else{
                 return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
            }
        }
    }
	 */
	public function signinAdmin(Request $request)
    {
		$request->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'captcha' => 'required|captcha'
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.'
        ]);
		
        $email = $request->input('email');
        $password = $request->input('password');
        $key=$request->session()->get('bsrandom');
		
        $result = User::where(['email' => $email])->first();
		
        $haskey = $key;
        $plainText = $this->cryptoJsAesDecrypt($haskey, $password);	
		 $hashedValue = hash('sha256', $plainText);
			Session::forget('bsrandom');
        if($result){
            if($hashedValue== $result->password){
			    
				 $rand_email_otp = rand(100000, 999999);
                 $rand_value = ['email_otp' => $rand_email_otp,'email_otp_used' =>'0'];
                 //dd($rand_value);
                 $toemail = DB::table('users')->where('email', '=', $email)->update($rand_value);
                 //echo "fhdfh"; die;
			    $IcmrSendEmail_otp = [
				'title' => '',
				'body' => '',
				'IcmrEmailOtp' => $rand_email_otp,
				 ];
				 //echo "fhdfh"; die;
               //Mail::to($toemail)->send(new IcmrSendEmailOtp($AdminSendEmail_otp));
               Mail::to('aashishsingh6996@gmail.com')->send(new IcmrSendEmailOtp($IcmrSendEmail_otp));
			   //echo "vvv"; die;
			   Session::put('userlogin', 'Yes');
			   //echo "vvv"; die;
             return redirect('admin/admin-otp-page');			  
            }else{
                 return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
            }
        }
    }
	
	public function admin_otp_page()
        {
            if(Session::get('userlogin') !='Yes'){
                return redirect('admin/login');
              }
            return view('auth.admin.admin_email_otp');
      }
		
	public function admin_otp_submit(Request $request)
        {
        $request->validate([
            'email_otp' => 'required',
            'captcha' => 'required|captcha',
        ],
        [
            'captcha.captcha'=>'Invalid captcha code.'
        ]);
	
        $verifyOtp = $request->input('email_otp');
        $result = User::where('email_otp', $verifyOtp)->first();
        $result = User::where('email_otp', $verifyOtp)->where('email_otp_used',0)->first();
	
        if ($result) {
            $rand_value = ['email_otp_used' => 1];
            DB::table('users')->where('email_otp', $verifyOtp)->update($rand_value);
			//echo "vvvv2"; die;
            //$request->session()->put('name', $result->name);
            $request->session()->put('email', $result->email);
            //$request->session()->put('key', rand(10000, 99999));
            Session::put('userlogin', 'No');
			//echo "sdsdhh"; die;
            return redirect()->route('admin.dashboard');
			
        } else {
            return redirect('admin/admin-otp-page')->with('msg','Please enter valid OTP');
        }
    }
	
    public function reloadCaptchaAdmin ()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function adminDashoard()
    {
        /* if (empty(Session::get('email')) || Session::get('email') == '1') {
            return redirect('admin/login')->with('msg', 'Invalid Login. Please try again.');
        }  */
		//echo"fhdfhdh"; die;
		return view('admin.dashboad'); 
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
          return redirect('admin/login');
      }
}


<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BsauthController extends Controller
{
    function index()
    {
        return view('login');
    }

    function registration()
    {
        return view('registration');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'username'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password']),
            'username'  =>  $data['username']
        ]);

        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }

    /*function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('admin/dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }
    */


    function validate_login(Request $request)
    {
        $request->validate([
            'iec_code' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('iec_code', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('Imp-Exp/dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }
//     function validate_login(Request $request)
// {
//     $guard = 'web'; // specify the authentication guard to use

//     if (Auth::guard($guard)->check()) {
//         return redirect('admin/dashboard'); // redirect if the user is already authenticated
//     }

//     $request->validate([
//         'username' => 'required|string',
//         'password' => 'required',
//     ]);

//     $credentials = $request->only('username', 'password');

//     if (Auth::guard($guard)->attempt($credentials)) {

// 		/*$user = auth()->user();
// 		echo $id = auth()->user()->id;
//         print_r($user);
// 		die;
// 		*/
//         return redirect('admin/dashboard'); // redirect if the user login is successful
//     }

   // return redirect('login')->with('error', 'Invalid login credentials.'); // redirect with error message if the user login fails
   //return redirect('login')->with('success', 'Login details are not valid');
//}

    /*function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }
	*/

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}


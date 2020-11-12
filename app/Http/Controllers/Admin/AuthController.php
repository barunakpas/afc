<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPassword;

use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function login()
    {
    	return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
        	Session::flash('alert', ['Login Success', 'Welcome '.Auth::user()->name, 'success']);
		    return redirect()->route('admin_dashboard');
		}
		Session::flash('alert', ['Login Error', 'Email or Password Not Match', 'error']);
		return back()->withInput();
    
    }

    public function forgetPassword()
    {
    	return view('admin.auth.forget-password');
    }

    public function forgetPasswordAction(Request $request){
	    $request->validate(['email' => 'required|email']);

	    $checkUser = User::where('email', $request->email)->first();
	    if(!$checkUser){
	    	Session::flash('alert', ['Error', 'User Not Found...', 'error']);
	    }

	    $status = Password::sendResetLink(
	        $request->only('email')
	    );

	    if(isset($status['resetUrl']) && $status['resetUrl'] === Password::RESET_LINK_SENT){
	    	$checkUser['urlReset'] = route('password_reset', $status['token']).'?email='.$request->email;

		    Mail::to($request->email)->send(new ForgetPassword($checkUser));
		    Session::flash('alert', ['Request Success', 'Request Reset Password Success, Please Check Your Email', 'success']);
	    }else{
	    	dd($status);
	    	Session::flash('alert', ['Request Success', 'Request Reset Had Done, Please Check Your Email', 'warning']);
	    }
	    return back();
    }

    public function resetPassword($token)
    {
    	return view('admin.auth.reset-password',  ['token' => $token]);	
    }

    public function resetPasswordAction(Request $request)
    {
    	$request->validate([
	        'token' => 'required',
	        'email' => 'required|email',
	        'password' => 'required|min:8|confirmed',
	    ]);

	    $status = Password::reset(
	        $request->only('email', 'password', 'password_confirmation', 'token'),
	        function ($user, $password) use ($request) {
	            $user->forceFill([
	                'password' => Hash::make($password)
	            ])->save();

	            $user->setRememberToken(Str::random(60));

	            event(new PasswordReset($user));
	        }
	    );

	    if($status == Password::PASSWORD_RESET){
	    	Session::flash('alert', ['Success', 'Reset Password Success', 'success']);
	    	return redirect()->route('admin_login')->with('status', __($status));
	    }else{
	    	Session::flash('alert', ['Error', 'Reset Status Error', 'error']);
	    	return back()->withErrors(['email' => __($status)]);
	    } 
    }

    public function logout()
    {
    	Auth::logout();
    	Session::flash('alert', ['Logout Success', 'Logout Successfuly', 'success']);
    	return redirect()->route('admin_login');
    }
}

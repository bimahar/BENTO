<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'Login',
            'active' => 'Login'
        ]);
    }

    public function forgot_password()
    {
        return view('login.forgot-password',[
            'title' => 'Forgot-password',
            'active' => 'forgot-password'
        ]);
    }

    public function forgot_password_act(Request $request)
    {
        $customMessage =[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar di database'
        ]; 

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ],$customMessage);

        $token = Str::random(60);        

        PasswordResetToken::updateOrCreate([
            'email' => $request->email
        ],
        [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('forgot-password')->with('success', 'Kami telah mengirimkan link ke email anda');
    }

    public function validate_forgot_password_act(Request $request)
    {
        $customMessage =[
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 5 karakter'
        ]; 

        $request->validate([
            'password' => 'required|min:5|max:255'
        ],$customMessage);

        $token = PasswordResetToken::where('token',$request->token)->first();

        if (!$token) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        $user = User::where('email', $token->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();

        return redirect()->route('login')->with('success', 'Password berhasil direset');
    }

    public function validate_forgot_password(Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token',$token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed', 'Token tidak valid');
        }

        return view('login.validate-forgot-password',compact('token'),[
            'title' => 'Validate-forgot-password',
            'active' => 'validate-forgot-password'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success','Anda berhasil Login');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request )
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil logout');
    }

}

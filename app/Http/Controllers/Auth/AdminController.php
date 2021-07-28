<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('postLogout');
    }
    public function getLogin()
    {
        return view('auth.login.admin');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        if(auth()->guard('admin')->attempt($request->only('email','password'))){
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended('/dashboard');
        }else{
            $this->incrementLoginAttempts($request);

            return redirect()->back()->withInput()->withErrors(["Login Incorret"]);
        }
    }
    public function postLogout()
    {
        auth()->guard('admin')->logout();
        session()->flush();

        return redirect()->route('admin.login');
    }
}

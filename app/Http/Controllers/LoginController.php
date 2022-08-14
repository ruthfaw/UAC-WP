<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLogin($locale='en'){
        App::setLocale($locale);
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        $rememberMe = $request->has('remember_me') ? true : false;
        
        Auth::setRememberDuration(1440);
        if(Auth::attempt($credentials, $rememberMe)){
            $request->session()->regenerate();

            return redirect('/home/en');
        }
        
        return redirect('/login')->with('error','Username and Password not match!');
    }

    public function logout(Request $request){
        if(Auth::check()){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::logout();
        }
        return redirect('/home/en');
    }
}

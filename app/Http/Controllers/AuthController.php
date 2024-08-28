<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // go to login page
    public function login() {
        return view('login');
    }

    // go to register page
    public function register(Request $r) {
        return view('register');
    }

    // proses login
    public function authenticating(Request $r) {
        $credentials = $r->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // check, is user valid?
        if (Auth::attempt($credentials)) {

            // check, is user actived?
            if(Auth::user()->status != 'active'){
                // return redirect('login')->with('status', 'your account has not actived !');
                Session::flash('status', 'failed');
                Session::flash('message', 'your account has not actived !');
                return redirect('/login');
            }
            
            $r->session()->regenerate();
            if(Auth::User()->role_id == 1){
                return redirect('dashboard');
            }
            if(Auth::User()->role_id == 2){
                return redirect('profile');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid!');
        return redirect('/login');
    }




}

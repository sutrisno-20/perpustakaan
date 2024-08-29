<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                // if user not active will direct to login
                Auth::logout();
                $r->session()->invalidate();
                $r->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'your account has not actived! Please Contact Admin');
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

    // logout
    public function logout(Request $r) {
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect('login');
    }

    public function registerProcess(Request $request) {
        // dd($r->all());
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255|min:3',
            'password' => 'required',
            'phone' => 'max:15',
            'address' => 'required',
        ]);
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        Session::flash('status','success');
        Session::flash('message', 'Success Register, wait admin to approve your account!');
        return view('register');

    }
}

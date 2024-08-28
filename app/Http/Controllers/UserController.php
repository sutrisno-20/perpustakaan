<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $r) {
        // $r->session()->flush();
        return view('profile');
    }
}

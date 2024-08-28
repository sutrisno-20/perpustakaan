<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $r) {
        // $r->session()->flush();
        return view('dashbaord');
    }
}

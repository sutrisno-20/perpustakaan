<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
   public function index(Request $r) {
        // $r->session()->flush();
        dd('this is page book');
   }
}

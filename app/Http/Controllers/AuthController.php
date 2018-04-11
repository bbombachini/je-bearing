<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checkLogin(){

    if (Auth::check()){
       $userEmail = Auth::user()->email;
    }
	   return view('auth.login');
    }
}

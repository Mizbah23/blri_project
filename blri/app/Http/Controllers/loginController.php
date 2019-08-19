<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
     public function index(Request $request)
    {
    	return view('login.index');
    }
}

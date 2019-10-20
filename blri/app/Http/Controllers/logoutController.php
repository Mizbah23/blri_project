<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
         public function index(Request $request)
    {
    	//Tasks
    	$request->session()->flush('user');
    	$request->session()->flush('newProductAddedToList');
    	return redirect()->route('login.index');
    }
}

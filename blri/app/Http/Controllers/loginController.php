<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class loginController extends Controller
{
    public function index(Request $request)
    {
    	return view('login.index');
    }

      public function loginPost(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where(['password'=>$request->password,'email'=> $request->email])->first();

        //dd($user);
        if($user!=null)
    	{
    		
	            // dd($user->password);
	         $request->session()->put('user', $user);
	           

	          return redirect()->route("home.index");
	        }
	     
	    
        else
        {
         return view("login.index")->with('error','Email or Password incorrect');
        }

    }

}



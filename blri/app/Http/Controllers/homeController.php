<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class homeController extends Controller
{
    public function index(){
      $setuptypes= setuptype::all();
      return view('home.index')->with('setuptypes',$setuptypes);
       }

       public function setup($type){
       	    //dd($type);

       	    $setuptypes=setuptype::where('SType',$type)->first();
       	    //dd($setuptypes);
       	    if($type=='Division'){
       	    return view('setup.division')->with('type',$setuptypes);
            }
        }
}
//SignIn::where('user_name', $request->user_name)->first();
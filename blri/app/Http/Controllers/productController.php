<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
class productController extends Controller
{
      public function index(){
    	$setuptypes= setuptype::all();
    	$securitytypes = SecurityType::all();
       
        //dd($sections[0]->division);
        return view('setup.product')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes);
    
      }
}

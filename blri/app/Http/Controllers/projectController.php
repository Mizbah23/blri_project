<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;


class projectController extends Controller
{
    
     public function index(){
     	$securitytypes=SecurityType::all();
    	$setuptypes= setuptype::all();
    	$productreceivetypes=ProductReceiveType::all();
       
        //dd($sections[0]->division);
        return view('setup.project')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes);
    
      }
}

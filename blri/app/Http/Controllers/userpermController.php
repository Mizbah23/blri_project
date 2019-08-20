<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;

class userpermController extends Controller
{
	public function index(){
    $setuptypes= setuptype::all();
    $securitytypes= SecurityType::all();
   
    return view('security.user permission')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes);
  }

}

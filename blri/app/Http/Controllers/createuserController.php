<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;


class createuserController extends Controller
{
   public function index(){
    $setuptypes= setuptype::all();
    $securitytypes= SecurityType::all();
   
    return view('security.create user')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes);
  }
}

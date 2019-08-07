<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class designationController extends Controller
{
   public function index(){
   $setuptypes= setuptype::all();
   return view('setup.designation')->with('setuptypes',$setuptypes);
       }
}

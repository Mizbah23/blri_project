<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class brandController extends Controller
{
    public function index(){
      $setuptypes= setuptype::all();
     return view('setup.brand')->with('setuptypes',$setuptypes);
       }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class sectionController extends Controller
{
        public function index(){
      $setuptypes= setuptype::all();
     return view('setup.section')->with('setuptypes',$setuptypes);
       }
}

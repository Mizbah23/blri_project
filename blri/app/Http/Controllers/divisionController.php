<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class divisionController extends Controller
{
    public function index(){
      $setuptypes= setuptype::all();
     return view('setup.division')->with('setuptypes',$setuptypes);
       }

}

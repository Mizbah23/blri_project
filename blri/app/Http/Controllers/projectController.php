<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;

class projectController extends Controller
{
    
     public function index(){
    	$setuptypes= setuptype::all();
       
        //dd($sections[0]->division);
        return view('setup.project')->with('setuptypes',$setuptypes);
    
      }
}

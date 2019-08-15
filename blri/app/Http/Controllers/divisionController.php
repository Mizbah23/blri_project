<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\division;
use Illuminate\Support\Facades\DB;

class divisionController extends Controller
{
    public function index(){
      $setuptypes= setuptype::all();
     return view('setup.division')->with('setuptypes',$setuptypes);
       }
      
      public function divisionPost(Request $request){
    	         
               $division=new division;
               $division->divisionName=$request->divisionName;
               $division->save();
               $request->session()->put('division',$division);
               return redirect()->route('setup.division');
               //return view('setup.division')->with('division',$division);
               
       }
    
               
    }



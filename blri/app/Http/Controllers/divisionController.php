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
      $divisions=division::all();
      return view('setup.division')->with('setuptypes',$setuptypes)->with('divisions',$divisions);
       }
      
      public function divisionPost(Request $request){
               $this->validate( $request,[
                
                'divisionName'=>'required|unique:divisions',
              
               ]);
    	         $setuptypes= setuptype::all();
               $division=new division;
               $division->divisionName=$request->divisionName;
               $division->save();
<<<<<<< HEAD
              // dd($division);
               $divisions=division::all();
               
               //$request->session()->put('division',$division);
              // return redirect()->route('setup.division');
               return view('setup.division')->with('divisions',$divisions)->with('setuptypes',$setuptypes);
=======
               return view('setup.division')->with('divisions',$division);
>>>>>>> 1e36648cb22b7ec41c7bf1d1108fd59a82e215d7
               
       }
    
               
    }



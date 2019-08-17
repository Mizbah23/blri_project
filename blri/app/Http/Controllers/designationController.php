<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\setuptype;
use App\Designation;
use Illuminate\Support\Facades\DB;

class designationController extends Controller
{
   public function index(){
   $setuptypes= setuptype::all();
   $designations=Designation::all();
   return view('setup.designation')->with('setuptypes',$setuptypes)->with('designations',$designations);
       }

    public function designationPost(Request $request){
    	   // dd("sy");
          $this->validate( $request,[
                'designationName'=>'required|unique:designations',
             ]);

    	       $setuptypes= setuptype::all();
               $designation=new Designation;
               $designation->designationName=$request->designationName;
               $designation->save();
               $designations=Designation::all();
               return view('setup.designation')->with('setuptypes',$setuptypes)->with('designations',$designations);
          }
}

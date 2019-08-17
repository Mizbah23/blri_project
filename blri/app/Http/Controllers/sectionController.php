<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\division;
use App\Section;


class sectionController extends Controller
{
     public function index(){
    	 $setuptypes= setuptype::all();
	     $divisions=division::all();
	     $sections=Section::all();
	     //dd($sections[0]->division);
	     return view('setup.section')->with('setuptypes',$setuptypes)->with('divisions',$divisions)->with('sections',$sections);
     
    }
    public function sectionPost(Request $request){
              // dd($request->all());
    	       $setuptypes= setuptype::all();
    	       $divisions=division::all();
               $section=new Section;
               $section->sectionName=$request->sectionName;
               $section->division_id=$request->divisions;
              
               $section->save();
              // dd($division);
               $sections=Section::all();

               
               //$request->session()->put('division',$division);
              // return redirect()->route('setup.division');
	    	  return view('setup.section')->with('setuptypes',$setuptypes)->with('divisions',$divisions)->with('sections',$sections);
              
               
       }
}
               


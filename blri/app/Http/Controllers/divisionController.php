<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\division;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\Adjustment;
use Illuminate\Support\Facades\DB;


class divisionController extends Controller
{
    public function index(){
      $setuptypes= setuptype::all();
      $divisions=division::all();
      $securitytypes=SecurityType::all();
      $productreceivetypes=ProductReceiveType::all();
      $productdistributions=ProductDistribution::all();
      $reportings=Reporting::all();
      $adjustments=Adjustment::all();


      return view('setup.division')
      ->with('setuptypes',$setuptypes)
      ->with('divisions',$divisions)
      ->with('securitytypes',$securitytypes)
      ->with('productdistributions',$productdistributions)
      ->with('adjustments',$adjustments)
      ->with('reportings',$reportings)
      ->with('productreceivetypes',$productreceivetypes);
       }
      
      public function divisionPost(Request $request){
               $this->validate( $request,[
                
                'divisionName'=>'required|unique:divisions',
              
               ]);

               //dd($request->all());

    	         $setuptypes= setuptype::all();
               $division=new division;
               $division->divisionName=$request->divisionName;
               $division->save();  

            return redirect()->route('setup.division')->with('response','Successfully Created');
          }
        public function divedit(Request $request,$id)
        {
              $setuptypes= setuptype::all();
              $securitytypes=SecurityType::all();
              $productreceivetypes=ProductReceiveType::all();
              $productdistributions=ProductDistribution::all();
              $reportings=Reporting::all();
              $adjustments=Adjustment::all();
              $division=division::find($id);
    	        return view('setup.divedit')
              ->with('setuptypes',$setuptypes)
              ->with('division',$division)
              ->with('securitytypes',$securitytypes)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('reportings',$reportings)
              ->with('productreceivetypes',$productreceivetypes);
         }

     public function update(Request $request,$id)
    {
    	//dd('success');
    	          $this->validate( $request,[
                
                'divisionName'=>'required|unique:divisions,divisionName,'.$id,
              
               ]);
    	$division=division::find($id);
    	$division->divisionName=$request->divisionName;
    	$division->save();
      return redirect()->route('setup.division')->with('response','Successfully Edited');;
    	
    }          
       
      public function searchByDivisionName(Request $request){
    $searchedDivisionItem=division::where('divisionName',$request->divisionName)->get();
    return view('setup.ajaxDivisionSearchedValue')->with('divisions',$searchedDivisionItem);
  }
               
}



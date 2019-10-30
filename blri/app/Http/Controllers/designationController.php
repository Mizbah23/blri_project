<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\setuptype;
use App\Designation;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\AdjustmentMenu;

use Illuminate\Support\Facades\DB;

class designationController extends Controller
{
   public function index(){
   $setuptypes= setuptype::all();
   $designations=Designation::all();
   $securitytypes= SecurityType::all();
   $productreceivetypes=ProductReceiveType::all();
   $productdistributions=ProductDistribution::all();
   $reportings=Reporting::all();
   $adjustments=AdjustmentMenu::all();

   return view('setup.designation')
   ->with('setuptypes',$setuptypes)
   ->with('designations',$designations)
   ->with('securitytypes',$securitytypes)
   ->with('productdistributions',$productdistributions)
   ->with('adjustments',$adjustments)
   ->with('reportings',$reportings)
   ->with('productreceivetypes',$productreceivetypes);
  }

    public function designationPost(Request $request){
    	   // dd("sy");
          $this->validate( $request,[
                'designationName'=>'required|unique:designations',
             ]);
               $securitytypes= SecurityType::all();
    	         $setuptypes= setuptype::all();
               $designation=new Designation;
               $designation->designationName=$request->designationName;
               $designation->save();
               $designations=Designation::all();
               return redirect()->route('setup.designation');
          }
                  public function desedit(Request $request,$id)
				    {
  				             $setuptypes= setuptype::all();
                       $designations=Designation::all();
                       $securitytypes= SecurityType::all();
                       $productreceivetypes=ProductReceiveType::all();
                       $productdistributions=ProductDistribution::all();
                       $reportings=Reporting::all();
                       $adjustments=AdjustmentMenu::all();
				    	         $designation=Designation::find($id);
				    	       return view('setup.desedit')
                     ->with('designation',$designation)
                     ->with('setuptypes',$setuptypes)
                     ->with('securitytypes',$securitytypes)
                     ->with('productdistributions',$productdistributions)
                     ->with('adjustments',$adjustments)
                     ->with('reportings',$reportings)
                     ->with('productreceivetypes',$productreceivetypes);
				    }
              public function update(Request $request,$id)
                {

                  $this->validate( $request,[
                    'designationName'=>'required',
                  ]);
                  
                  $designation=Designation::find($id);
                  //$category->categoryName=$request->categoryName;
                  $designation->designationName=$request->designationName;
                  //$brand->category_id=$request->categoryName;
                  $designation->save();
                  return redirect()->route('setup.designation');
                 }

             public function searchBydesignation(Request $request)
                {
                  //dd('fgbfx');
                  $searchBydesignationTypes=Designation::where('designationName',$request->designationName)->get();
                  // return($searchBydesignationTypes);
                 return view('setup.ajaxDesignationSearchedValue')->with('designations',$searchBydesignationTypes);

                }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
//use App\division;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\department;
use App\AdjustmentMenu;
use Illuminate\Support\Facades\DB;

class departmentController extends Controller
{
    public function index(){
      $setuptypes= setuptype::all();
      $department=department::all();
      $securitytypes=SecurityType::all();
      $productreceivetypes=ProductReceiveType::all();
      $productdistributions=ProductDistribution::all();
      $reportings=Reporting::all();
      $adjustments=AdjustmentMenu::all();


      return view('setup.division')
      ->with('setuptypes',$setuptypes)
      ->with('departments',$department)
      ->with('securitytypes',$securitytypes)
      ->with('productdistributions',$productdistributions)
      ->with('adjustments',$adjustments)
      ->with('reportings',$reportings)
      ->with('productreceivetypes',$productreceivetypes);
       }

      public function divisionPost(Request $request){
      	//dd($request->all());
               $this->validate( $request,[

                'departmentName'=>'required|unique:department',

               ]);

        if($request->session()->get('user')){
        	 if($request->session()->get('user')){
    	         	 $departments=new department;
                       $departments->departmentName=$request->departmentName;
                       $departments->Creator=$request->session()->get('user')->id;
                       $departments->Modifier=$request->session()->get('user')->id;
                      $departments->save();
    	         }
             }

            return redirect()->route('setup.division')->with('response','Successfully Created');
          }
        public function divedit(Request $request,$id)
        {
            //dd('$id');
              $setuptypes= setuptype::all();
              $securitytypes=SecurityType::all();
              $productreceivetypes=ProductReceiveType::all();
              $productdistributions=ProductDistribution::all();
              $reportings=Reporting::all();
              $adjustments=AdjustmentMenu::all();
              //$departments = department:: find(1);

              $departments=DB::select(DB::raw("SELECT * FROM `department` where DepartmentID = '$id'"));
              // dd($departments);
    	        return view('setup.divedit')
              ->with('setuptypes',$setuptypes)
              ->with('departments',$departments)
              ->with('securitytypes',$securitytypes)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('reportings',$reportings)
              ->with('productreceivetypes',$productreceivetypes);
         }

      public function update(Request $request,$id)
    {

        $this->validate( $request,[

            'departmentName'=>'required|unique:department',

        ]);
        //dd($id);

        $departments=DB::select(DB::raw("SELECT * FROM `department` where DepartmentID = '$id'"));
        if($request->session()->get('user')){
            if($request->session()->get('user')){
                $departments=new department;
                $departments->departmentName=$request->departmentName;
                $departments->Creator=$request->session()->get('user')->id;
                $departments->Modifier=$request->session()->get('user')->id;
                $departments->save();
            }
        }
      return redirect()->route('setup.division')->with('response','Successfully Edited');     }

      public function searchByDivisionName(Request $request){
    $searchedDivisionItem=department::where('DepartmentName',$request->DepartmentName)->get();
    return view('setup.ajaxDivisionSearchedValue')->with('departments',$searchedDivisionItem);
  }
}

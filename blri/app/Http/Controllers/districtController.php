<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\District;
use App\SecurityType;
use Illuminate\Support\Facades\DB;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;


class districtController extends Controller
{
     public function index(){
      $setuptypes= setuptype::all();
      $securitytypes=SecurityType::all();
      $productreceivetypes=ProductReceiveType::all();
      $districts=District::all();
      $productdistributions=ProductDistribution::all();
      $adjustments=Adjustment::all();
      $reportings=Reporting::all();

      return view('setup.district')->with('setuptypes',$setuptypes)
                                   ->with('districts',$districts)
                                   ->with('securitytypes',$securitytypes)
                                   ->with('productreceivetypes',$productreceivetypes)
                                   ->with('productdistributions',$productdistributions)
                                   ->with('adjustments',$adjustments)
                                   ->with('reportings',$reportings);
       }
       public function districtPost(Request $request){
       	       //dd('symli');
               $this->validate( $request,[
                
                'division'=>'required',
                'district'=>'required',
                
               ]);
    	       $setuptypes= setuptype::all();
    	       $securitytypes=SecurityType::all();
             $productreceivetypes=ProductReceiveType::all();

               
               $district=new District;
               $district->division=$request->division;
               $district->district=$request->district;
               $district->save();
               $districts=District::all();
               

              return redirect()->route('setup.district');
          }
      
}

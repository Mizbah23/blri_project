<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\District;
use App\SecurityType;
use Illuminate\Support\Facades\DB;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\AdjustmentMenu;
use App\Reporting;


class districtController extends Controller
{
     public function index(){
      $setuptypes= setuptype::all();
      $securitytypes=SecurityType::all();
      $productreceivetypes=ProductReceiveType::all();
      $districts=District::all();
      $productdistributions=ProductDistribution::all();
      $adjustments=AdjustmentMenu::all();
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

                public function districtedit(Request $request,$id)
        {
              $setuptypes= setuptype::all();
              $securitytypes=SecurityType::all();
              $productreceivetypes=ProductReceiveType::all();
              $productdistributions=ProductDistribution::all();
              $adjustments=AdjustmentMenu::all();
              $reportings=Reporting::all();

              $district=District::find($id);
              return view('setup.disedit')->with('setuptypes',$setuptypes)
                                           ->with('district',$district)
                                           ->with('securitytypes',$securitytypes)
                                           ->with('productreceivetypes',$productreceivetypes)
                                           ->with('productdistributions',$productdistributions)
                                           ->with('adjustments',$adjustments)
                                           ->with('reportings',$reportings);
         }
             public function update(Request $request,$id){
                      $this->validate($request,[
                      'division'=>'required',
                      'district'=>'required',
                    ]);
      
              $district=District::find($id);
              $district->division=$request->division;
              $district->district=$request->district;
                 
              $district->save();
              return redirect()->route('setup.district');
    
      }
      
}

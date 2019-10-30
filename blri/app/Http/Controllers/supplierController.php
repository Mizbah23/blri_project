<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\Supplier;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\AdjustmentMenu;

use App\Reporting;

class supplierController extends Controller
{
      public function index(){
    	$setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $suppliers=Supplier::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=AdjustmentMenu::all();
        $reportings=Reporting::all();
        //dd($sections[0]->division);
        return view('setup.supplier')->with('setuptypes',$setuptypes)
                                     ->with('securitytypes',$securitytypes)
                                     ->with('suppliers',$suppliers)
                                     ->with('productdistributions',$productdistributions)
                                     ->with('adjustments',$adjustments)
                                     ->with('reportings',$reportings)
                                     ->with('productreceivetypes',$productreceivetypes);
                                     
      }
      public function supplierPost(Request $request){
      	//dd('success');
    	$this->validate($request,[
          'supplierName'=>'required',
          'contactName'=>'required',
          'phone'=>'required|max:11',
          'mobile'=>'required|regex:/(01)[0-9]{9}/|size:11',
          'country'=>'required',
          'vatReg' =>'required|size:09',
        ]);
      $supplier=new Supplier;
      $supplier->supplierName=$request->supplierName;
      $supplier->contactName=$request->contactName;
      $supplier->address=$request->address;
      $supplier->phone=$request->phone;
      $supplier->mobile=$request->mobile;
      $supplier->email=$request->email;
      $supplier->country=$request->country;
      $supplier->supplierType=$request->supplierType;
      $supplier->vatReg=$request->vatReg;
    
      $supplier->save();
      return redirect()->route('setup.supplier');
    
      }
       public function supledit(Request $request,$id){
                
              $setuptypes= setuptype::all();
              $securitytypes=SecurityType::all();
              $suppliers=Supplier::all();
              $productreceivetypes=ProductReceiveType::all();
              $productdistributions=ProductDistribution::all();
              $adjustments=AdjustmentMenu::all();
              $reportings=Reporting::all();
              //$productreceivetypes=ProductReceiveType::all();
              $supplier=Supplier::find($id);
              return view('setup.supplieredit')->with('supplier',$supplier)
                                               ->with('setuptypes',$setuptypes)
                                               ->with('securitytypes',$securitytypes)
                                               ->with('productdistributions',$productdistributions)
                                               ->with('adjustments',$adjustments)
                                                ->with('reportings',$reportings)
                                                ->with('productreceivetypes',$productreceivetypes);
              }
       public function update(Request $request,$id){
       	//dd('success');
          $this->validate($request,[
          'supplierName'=>'required',
          'contactName'=>'required',
          'phone'=>'required|regex:/(01)[0-9]{9}/|size:07',
          'mobile'=>'required|regex:/(01)[0-9]{9}/|size:11',
          'country'=>'required',
          'vatReg' =>'required|regex:/(01)[0-9]{9}/|size:09',
        ]);
      $supplier=Supplier::find($id);
      $supplier->supplierName=$request->supplierName;
      $supplier->contactName=$request->contactName;
      $supplier->address=$request->address;
      $supplier->phone=$request->phone;
      $supplier->mobile=$request->mobile;
      $supplier->email=$request->email;
      $supplier->country=$request->country;
      $supplier->supplierType=$request->supplierType;
      $supplier->vatReg=$request->vatReg;
    
      $supplier->save();
      return redirect()->route('setup.supplier');
  }      

}

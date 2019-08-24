<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\Supplier;


class supplierController extends Controller
{
      public function index(){
    	$setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $suppliers=Supplier::all();
        //dd($sections[0]->division);
        return view('setup.supplier')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('suppliers',$suppliers);
    
      }
       public function supplierPost(Request $request){
       	//dd('success');
          $this->validate($request,[
          'supplierName'=>'required',
          'contactName'=>'required',
          'phone'=>'required|size:7',
          'mobile'=>'required|size:11',
          'email' =>'required',
          'country' =>'required',
          'vatReg'=>'required|size:10',
          
        ]);
      $supplier=new Supplier;
      $supplier->supplierName=$request->supplierName;
      $supplier->supplierType=$request->supplierType;
      $supplier->contactName=$request->contactName;
      $supplier->address=$request->address;
      $supplier->phone=$request->phone;
      $supplier->mobile=$request->mobile;
      $supplier->email=$request->email;
      $supplier->country=$request->country;
      $supplier->vatReg=$request->vatReg;
    
      $supplier->save();
      return redirect()->route('setup.supplier');
  }
}

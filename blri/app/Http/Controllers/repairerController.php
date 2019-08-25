<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\Repairer;
use App\ProductReceiveType;
class repairerController extends Controller
{
      public function index(){
    	$setuptypes= setuptype::all();
    	$securitytypes=SecurityType::all();
    	$repairers=Repairer::all();
      $productreceivetypes=ProductReceiveType::all();
       
        //dd($sections[0]->division);
        return view('setup.repairer info')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('repairers',$repairers)->with('productreceivetypes',$productreceivetypes);
    
      }
      public function repairerPost(Request $request){
          $this->validate($request,[
          'repairerName'=>'required',
          'mobile'=>'required|size:11',
          'email' =>'required',
        ]);
      $repairer=new Repairer;
      $repairer->repairerName=$request->repairerName;
      $repairer->address=$request->address;
      $repairer->mobile=$request->mobile;
      $repairer->email=$request->email;
    
      $repairer->save();
      return redirect()->route('setup.repairer info');
  }
   public function repaireredit(Request $request,$id){
                
              $setuptypes= setuptype::all();
              $securitytypes=SecurityType::all();
              $productreceivetypes=ProductReceiveType::all();
              $repairer=Repairer::find($id);
              return view('setup.repaireredit')->with('repairer',$repairer)
                                               ->with('productreceivetypes',$productreceivetypes)
                                               ->with('setuptypes',$setuptypes)
                                               ->with('securitytypes',$securitytypes);
                 }
    public function update(Request $request,$id){
          $this->validate($request,[
          'repairerName'=>'required',
          'mobile'=>'required|size:11',
          'email' =>'required',
        ]);
      $repairer=Repairer::find($id);
      $repairer->repairerName=$request->repairerName;
      $repairer->address=$request->address;
      $repairer->mobile=$request->mobile;
      $repairer->email=$request->email;
    
      $repairer->save();
      return redirect()->route('setup.repairer info');
  }
}

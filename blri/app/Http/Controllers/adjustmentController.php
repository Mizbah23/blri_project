<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\Adjustment;


class adjustmentController extends Controller
{
	public function index(){
     	$securitytypes=SecurityType::all();
    	$setuptypes= setuptype::all();
    	$productreceivetypes=ProductReceiveType::all();
    	$adjustments=Adjustment::all();

       
        //dd($sections[0]->division);
        return view('adjustment.adjustment information')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('adjustments',$adjustments);
    
      }}

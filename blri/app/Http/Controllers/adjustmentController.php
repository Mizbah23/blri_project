<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;//model name;
use App\User;
use App\Adjustment;


class adjustmentController extends Controller
{
	public function index(){
     	$securitytypes=SecurityType::all();
    	$setuptypes= setuptype::all();
    	$productreceivetypes=ProductReceiveType::all();
    	$productdistributions=ProductDistribution::all();
    	$adjustments=Adjustment::all();
    	$reportings=Reporting::all();

       
        //dd($sections[0]->division);
        return view('adjustment.adjustment information')
        ->with('setuptypes',$setuptypes)
        ->with('securitytypes',$securitytypes)
        ->with('productreceivetypes',$productreceivetypes)
        ->with('productdistributions',$productdistributions)
        ->with('reportings',$reportings)
        ->with('adjustments',$adjustments);
    
  }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\AdjustmentMenu;
use App\Reporting;




class productdistributionController extends Controller
{
    public function index()
    {
    $setuptypes= setuptype::all();
    $securitytypes= SecurityType::all();
    $productreceivetypes=ProductReceiveType::all();
    $productdistributions=ProductDistribution::all();
    $adjustments=AdjustmentMenu::all();
    $reportings=Reporting::all();




    return view('product distribution.product distribution')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('productdistributions',$productdistributions)->with('adjustments',$adjustments)->with('reportings',$reportings);
	}
}

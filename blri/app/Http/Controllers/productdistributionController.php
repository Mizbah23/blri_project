<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;


class productdistributionController extends Controller
{
    public function index()
    {
    $setuptypes= setuptype::all();
    $securitytypes= SecurityType::all();
    $productreceivetypes=ProductReceiveType::all();
    $productdistributions=ProductDistribution::all();


    return view('product distribution.product distribution')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('productdistributions',$productdistributions);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;
use App\division;
use App\SerialInfo;
use App\Brand;
use App\ProductInfo;
use App\Category;


class productdistributiontypeController extends Controller
{
     public function index()
    {
    $divisions=division::all();
    $setuptypes= setuptype::all();
    $securitytypes= SecurityType::all();
    $productreceivetypes=ProductReceiveType::all();
    $productdistributions=ProductDistribution::all();
    $adjustments=Adjustment::all();
    $reportings=Reporting::all();
    $serialInfos=SerialInfo::all();
    $brands=Brand::all();
    $products=ProductInfo::all();
    $categories=Category::all();



    return view('product distribution.product distribution')
    ->with('setuptypes',$setuptypes)
    ->with('securitytypes',$securitytypes)
    ->with('productreceivetypes',$productreceivetypes)
    ->with('productdistributions',$productdistributions)
    ->with('adjustments',$adjustments)
    ->with('reportings',$reportings)
    ->with('serialInfos',$serialInfos)
    ->with('divisions',$divisions)
    ->with('brands',$brands)
    ->with('categories',$categories)
    ->with('products',$products);
	}
    public function distributionList(){

    }
}

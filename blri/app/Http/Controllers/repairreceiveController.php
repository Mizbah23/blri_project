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
use App\EmployeeInformation;
use App\ProductInfo;
use App\SerialInfo;

class repairreceiveController extends Controller
{
    public function index()
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $products=ProductInfo::all();
        $serialInfos=SerialInfo::all();
        $users=User::all();

    return view('product distribution.repair receive')
           ->with('setuptypes',$setuptypes)
           ->with('securitytypes',$securitytypes)
           ->with('productreceivetypes',$productreceivetypes)
           ->with('productdistributions',$productdistributions)
           ->with('adjustments',$adjustments)
           ->with('reportings',$reportings)
           ->with('products',$products)
           ->with('serialInfos',$serialInfos)
           ->with('users',$users);
	}
}

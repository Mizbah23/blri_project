<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;
use App\EmployeeInformation;
use App\RequisitionList;
use App\ProductInfo;

class requisitioninfoController extends Controller
{
         public function index(Request $request)
    {
    	if($request->session()->get('user')){
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $employeeinformations=EmployeeInformation::all();
        $requisitionlists=RequisitionList::all();
        $products=ProductInfo::all();
        //dd($sections[0]->division);
        return view('product receive.requisition info')->with('setuptypes',$setuptypes)
                                     ->with('securitytypes',$securitytypes)
                                     ->with('productreceivetypes',$productreceivetypes)
                                     ->with('productdistributions',$productdistributions)
                                     ->with('adjustments',$adjustments)
                                     ->with('reportings',$reportings)
                                     ->with('products', $products)
                                     ->with('employeeinformations',$employeeinformations)
                                     ->with('requisitionlists',$requisitionlists);
     }
     else{
     	 return "<h2>The route you are looking for is not available.</h2>";
     }

    }
}

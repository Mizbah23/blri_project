<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\AdjustmentMenu;

class productdistributionreportController extends Controller
{
   public function index()
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=AdjustmentMenu::all();
        $reportings=Reporting::all();

        //dd($sections[0]->division);
        return view('reporting.product distribution report')
               ->with('setuptypes',$setuptypes)
               ->with('securitytypes',$securitytypes)
               ->with('productreceivetypes',$productreceivetypes)
               ->with('productdistributions',$productdistributions)
               ->with('adjustments',$adjustments)
               ->with('reportings',$reportings);
    }
}

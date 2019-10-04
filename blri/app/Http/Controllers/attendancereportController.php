<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;

class attendancereportController extends Controller
{
    function index(){

        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $reportings=Reporting::all();

        //dd($sections[0]->division);
        return view('reporting.attendance report')
               ->with('setuptypes',$setuptypes)
               ->with('securitytypes',$securitytypes)
               ->with('productreceivetypes',$productreceivetypes)
               ->with('productdistributions',$productdistributions)
               ->with('reportings',$reportings);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\Adjustment;
use App\EmployeeInfoView;
use PDF;

class employeereportController extends Controller
{
    public function index()
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $reportings=Reporting::all();
        $adjustments=Adjustment::all();

        //dd($sections[0]->division);
        return view('reporting.employeeView report')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('productdistributions',$productdistributions)
              ->with('reportings',$reportings)
              ->with('adjustments',$adjustments);
    }

    public function invoice(Request $req){

             // dd($req->all());
              $data = [
             'foo' => 'bar'
                ];

 					$emplyoeeinfo = EmployeeInfoView::all();
                   $pdf = PDF::loadView('reporting.employee information report.employee information report department wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                   return $pdf->stream('emplyoeeInformation.pdf');
                
      }
}

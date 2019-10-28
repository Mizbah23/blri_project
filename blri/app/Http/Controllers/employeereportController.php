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
use App\Section;
use App\Designation;
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
        $sections=Section::all();
        $adjustments=Adjustment::all();
        $designations=Designation::all();
        $emplyoeeinfo=EmployeeInfoView::all();

        //dd($sections[0]->division);
        return view('reporting.employeeView report')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('productdistributions',$productdistributions)
              ->with('reportings',$reportings)
              ->with('emplyoeeinfo',$emplyoeeinfo)
              ->with('sections',$sections)
              ->with('designations',$designations)
              ->with('adjustments',$adjustments);
    }

    public function invoice(Request $req){

             // dd($req->all());
              $data = [
             'foo' => 'bar'
                ];

 					    if($req->employee_report == 1){
                  $emplyoeeinfo = EmployeeInfoView::all();
                  $pdf = PDF::loadView('reporting.employee information report.employee information report department wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                  return $pdf->stream('emplyoeeInformation.pdf');
              }

              elseif ($req->employee_report == 2) {
                  $emplyoeeinfo = EmployeeInfoView::all();
                  $pdf = PDF::loadView('reporting.employee information report.employee information report section wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                  return $pdf->stream('emplyoeeInformation.pdf');
              }

              elseif ($req->employee_report == 3) {
                  $emplyoeeinfo = EmployeeInfoView::all();
                  $pdf = PDF::loadView('reporting.employee information report.employee information report project wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                  return $pdf->stream('emplyoeeInformation.pdf');
              }

              elseif($req->employee_report == 4) {
                  $emplyoeeinfo = EmployeeInfoView::all();
                  // $emplyoeeinfo = EmployeeInfoView::find($id);
                  $pdf = PDF::loadView('reporting.employee information report.employee information report employee wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                  return $pdf->stream('emplyoeeInformation.pdf');
              }

      }
}

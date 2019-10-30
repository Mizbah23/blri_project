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
use App\Employeeinfoprojectwiseview;
use App\Section;
use App\Designation;
use App\Project;
use App\EmployeeInformation;
use PDF;
use Input;
use DB;

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
        $projects=Project::all();
        $emplyoee=EmployeeInformation::all();

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
              ->with('projects',$projects)
              ->with('emplyoee',$emplyoee)
              ->with('adjustments',$adjustments);
    }

    public function invoice(Request $req){

             // dd($req->all());
              $data = [
             'foo' => 'bar'
                ];

 					    if($req->employee_report == 1){
                  $designationName = Input::get('designationName');
                  $emplyoeeinfo = DB::Select(DB::raw("SELECT * FROM `employeeinfoview` WHERE designationName = '$designationName'"));
                  if($emplyoeeinfo){
                    $pdf = PDF::loadView('reporting.employee information report.employee information report department wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                  return $pdf->stream('emplyoeeInformation.pdf');
                  }
                  else{
                    return 'There is no data available';
                  }
              }

              elseif ($req->employee_report == 2) {
                  $sectionName = Input::get('sectionName');
                  $emplyoeeinfo = DB::Select(DB::raw("SELECT * FROM `employeeinfoview` WHERE sectionName = '$sectionName'"));
                  if($emplyoeeinfo){
                    $pdf = PDF::loadView('reporting.employee information report.employee information report section wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                    return $pdf->stream('emplyoeeInformation.pdf');
                  }
                  else{
                    return 'There is no data available';
                  }

              }

              elseif ($req->employee_report == 3) {
                  $project = Input::get('project');
                  $emplyoeeinfo = DB::Select(DB::raw("SELECT * FROM `employeeinfoprojectwiseview` WHERE projectName = '$project'"));

                  if($emplyoeeinfo){
                    $pdf = PDF::loadView('reporting.employee information report.employee information report project wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                  return $pdf->stream('emplyoeeInformation.pdf');
                  }
                  else{
                    return 'There is no data available';
                  }
              }

              elseif($req->employee_report == 4) {
                  $name = Input::get('name');
                  $emplyoeeinfo = DB::Select(DB::raw("SELECT * FROM employeeinfoview WHERE
                     EmployeeName = '$name'"));

                  if($emplyoeeinfo){
                    $pdf = PDF::loadView('reporting.employee information report.employee information report employee wise',['emplyoeeinfo'=>$emplyoeeinfo]);
                     return $pdf->stream('emplyoeeInformation.pdf');
                  }
                  else{
                    return 'There is no data available';
                  }
              }

      }
}

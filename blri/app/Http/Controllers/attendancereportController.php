<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\Adjustment;
use App\EmployeeAttendanceView;
use PDF;
use DB;
use Input;



class attendancereportController extends Controller
{
    function index(){

        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $reportings=Reporting::all();
        $adjustments=Adjustment::all();
        $EmployeeAttendanceViews=EmployeeAttendanceView::all();

        //dd($sections[0]->division);
        return view('reporting.attendance report')
               ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('reportings',$reportings)
              ->with('EmployeeAttendanceViews',$EmployeeAttendanceViews);
    }

    public function invoice(Request $req){

             // dd($req->all());
              $data = [
             'foo' => 'bar'
                ];
                $EmployeeAttendanceViews=EmployeeAttendanceView::all();

                  if($req->attendanceReport == 1){
                    // $users = EmployeeAttendanceView::whereRaw('DATE >= 2019-10-27')->get();
                    $StartDate = Input::get("StartDate");
                    // dd("$StartDate");

                    $results = DB::select( DB::raw("SELECT * FROM `employeeattendenceview` WHERE DATE = '$StartDate'") );

                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportStartDateToEndDateWiseInvoice',['results'=>$results]);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->attendanceReport == 2){

                    $StartDate = Input::get("StartDate");
                    $endDate = Input::get("endDate");
 
                    $results = DB::select( DB::raw("SELECT * FROM `employeeattendenceview` WHERE DATE BETWEEN '$StartDate' AND '$endDate'") );
                      dd($reselts->all());
                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportDateToDateWiseInvoice',['results'=>$results]);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->attendanceReport == 3 ){

                    $StartDate = Input::get("StartDate");
                    $endDate = Input::get("endDate");
                    $EmployeeId = Input::get("EmployeeId");
                    

                    $results = DB::select( DB::raw("SELECT * FROM `employeeattendenceview` WHERE `EmployeeID` = '$EmployeeId' and  DATE BETWEEN '$StartDate' AND '$endDate'"));

                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportStartDateToEndDateAndEmployeeWiseInvoice',['results'=>$results]);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else { 
                   return redirect()->route('reporting.attendance report')->with('response','অনুগ্রহপূর্বক কিছু মান প্রদান করুন');
                  }

      }
}

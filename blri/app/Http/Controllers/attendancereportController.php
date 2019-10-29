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

             // dd($req->StartDate);
              $data = [
             'foo' => 'bar'
                ];
                $EmployeeAttendanceViews=EmployeeAttendanceView::all();

                  if($req->StartDate && !$req->endDate){
                    // $users = EmployeeAttendanceView::whereRaw('DATE >= 2019-10-27')->get();
                    $someVariable = Input::get("StartDate");

                    $results = DB::select( DB::raw("SELECT * FROM `employeeattendenceview` WHERE DATE = '$someVariable'") );

                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportStartDateToEndDateWiseInvoice',['results'=>$results]);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate ){

                    $StartDate = Input::get("StartDate");
                    $endDate = Input::get("endDate");

                    $results = DB::select( DB::raw("SELECT * FROM `employeeattendenceview` WHERE DATE BETWEEN '$StartDate' AND '$endDate'") );

                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportDateToDateWiseInvoice',['results'=>$results]);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && $req->EmployeeName ){

                    $StartDate = Input::get("StartDate");
                    $endDate = Input::get("endDate");
                    $EmployeeName = Input::get("EmployeeName");

                    $results = DB::select( DB::raw("SELECT * FROM `employeeattendenceview` WHERE EmployeeName =$EmployeeName AND DATE BETWEEN '$StartDate' AND '$endDate'") );

                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportDateToDateWiseInvoice',['results'=>$results]);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else { 
                   return redirect('reporting.attendance report');
                  }

      }
}

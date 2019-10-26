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




class attendancereportController extends Controller
{
    function index(){

        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $reportings=Reporting::all();
        $adjustments=Adjustment::all();

        //dd($sections[0]->division);
        return view('reporting.attendance report')
               ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('reportings',$reportings);;
    }

    public function invoice(Request $req){

             // dd($req->StartDate);
              $data = [
             'foo' => 'bar'
                ];
                $EmployeeAttendanceViews=EmployeeAttendanceView::all();

                  if($req->StartDate && $req->endDate && !$req->ProjectName && !$req->DivisionName && !$req->SectionName && !$req->EmployeeName){
                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportStartDateToEndDateWiseInvoice',['EmployeeAttendanceViews'=>$EmployeeAttendanceViews]);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && $req->ProjectName && !$req->DivisionName && !$req->SectionName && !$req->EmployeeName){
                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportProjectWiseInvoice',);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && !$req->ProjectName && $req->DivisionName && !$req->SectionName && !$req->EmployeeName){
                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportDivisionWiseInvoice',);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && !$req->ProjectName && !$req->DivisionName && $req->SectionName && !$req->EmployeeName){
                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportSectionWiseInvoice',);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && !$req->ProjectName && !$req->DivisionName && !$req->SectionName && $req->EmployeeName){
                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportEmployeeWiseInvoice',);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && $req->ProjectName && !$req->DivisionName && !$req->SectionName && !$req->EmployeeName){
                     $pdf = PDF::loadView('reporting.attendance_report.attendanceReportRevenueWiseInvoice',);
                   return $pdf->stream('Attendance_Report_Invoice.pdf');
                  }
                  else
                    {
                      return 'dfkjldldkskflskdffd';
                    }
      }
}

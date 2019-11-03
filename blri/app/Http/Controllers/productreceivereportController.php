<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Supplier;
use App\Reporting;
use App\tblpurchase;
use App\AdjustmentMenu;
use PDF;
use Input;
use DB;

class productreceivereportController extends Controller
{
   public function index()
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $reportings=Reporting::all();
        $supplier=Supplier::all();
        $tblpurchases=tblpurchase::all();
        $adjustments=AdjustmentMenu::all();

        //dd($sections[0]->division);
        return view('reporting.product receive report')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('supplier',$supplier)
              ->with('tblpurchases',$tblpurchases)
              ->with('reportings',$reportings);
    }

    public function invoice(Request $req){

             // dd($req->StartDate);
              $data = [
             'foo' => 'bar'
                ];

                  if($req->purchasereport == 1){

                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateWise',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->purchasereport == 2){

                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateAndSupplierWise',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->purchasereport == 3){
                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateToEndDateWise',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->purchasereport = 4){
                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateToEndDateAndSupplierWise',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->purchasereport = 5){
                      $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportAll',);
                      return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->purchasereport = 6){
                      $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportIdWise',);
                      return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }

      }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\Adjustment;
use PDF;

class productreceivereportController extends Controller
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
        return view('reporting.product receive report')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('reportings',$reportings);
    }

    public function invoice(Request $req){

             // dd($req->StartDate);
              $data = [
             'foo' => 'bar'
                ];

                  if($req->StartDate && !$req->endDate && !$req->supplierName && !$req->receiveID){
                   
                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateWiseInvoice',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && !$req->supplierName && !$req->receiveID){
                    
                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateToEndDateWiseInvoice',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && !$req->endDate && $req->supplierName && !$req->receiveID){
                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateAndSupplierWiseInvoice',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else if($req->StartDate && $req->endDate && $req->supplierName && !$req->receiveID){
                     $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateToEndDateAndSupplierWiseInvoice',);
                   return $pdf->stream('Product_Receive_Report_Invoice.pdf');
                  }
                  else
                    {
                      return 'dfkjldldkskflskdffd';
                    }
      }
}

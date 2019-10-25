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

    public function invoice(){
              $data = [
             'foo' => 'bar'
                ];

              // $adjustmentInfoLists=AdjustmentInformationList::all();
                   $pdf = PDF::loadView('reporting.product_receive_report.productReceiveReportStartDateWiseInvoice',);
                   return $pdf->stream('Product_Receive_Report_Date_Wise_Invoice.pdf');
      }
}

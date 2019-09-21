<?php

namespace App\Http\Controllers;

use App\User;
use App\setuptype;
use App\Adjustment;
use App\ProductInfo;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use Illuminate\Http\Request;
use App\Reporting;//model name;
use App\AdjustmentInformationList;

//use App\Adjustment;


class adjustmentinformationController extends Controller
{
    public function index()
    {
        $securitytypes=SecurityType::all();
        $setuptypes= setuptype::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $products = ProductInfo::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();

       
        //dd($sections[0]->division);
        return view('adjustment.adjustment information')
        ->with('setuptypes', $setuptypes)
        ->with('securitytypes', $securitytypes)
        ->with('productreceivetypes', $productreceivetypes)
        ->with('productdistributions', $productdistributions)
        ->with('reportings', $reportings)
        ->with('products', $products)
        ->with('adjustments', $adjustments);
    }

    public function store(Request $request)
    {
      $quantityErrorCheck="";
      if(isset($request->productCode)){
        $selectedProduct=ProductInfo::find($request->productCode);
        if($selectedProduct){
          $productStockSize=$selectedProduct->stock;
          if($request->type!='found'){
            $quantityErrorCheck='|lte:'. $productStockSize;
          }
        }
      }
      $this->validate($request, [
          'productCode'=>'required | unique:adjustment_information_lists,product_info_id',
          'productName'=>'required',
          'reason'=>'required',
          'type'=>'required',
          'adjustmentDate'=>'required | date_format:d/m/Y| before_or_equal:today',
          'quantity'=>'required|numeric|gt:0'.$quantityErrorCheck,
          'stock'=>'required|numeric'
      ],[
        'quantity.lte'=>'Please check the stock of the product'
      ]);

      $newAdjustmentInfo=new AdjustmentInformationList;
      $newAdjustmentInfo->product_info_id=$request->productCode;
      $newAdjustmentInfo->user_id=$request->session()->get('user')->id;
      $newAdjustmentInfo->quantity=$request->quantity;
      $newAdjustmentInfo->adjustmentDate=date('Y-m-d',strtotime(str_replace('/','-',$request->adjustmentDate)));
      $newAdjustmentInfo->adjustmentType=$request->type;
      $newAdjustmentInfo->reason=$request->reason;
      $newAdjustmentInfo->save();

      return redirect()->route('adjustment.adjustment information');

    }
}

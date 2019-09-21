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
use Validator;


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
      $adjustmentInfoList=AdjustmentInformationList::all();

      
      //dd($sections[0]->division);
      return view('adjustment.adjustment information')
          ->with('setuptypes', $setuptypes)
          ->with('securitytypes', $securitytypes)
          ->with('productreceivetypes', $productreceivetypes)
          ->with('productdistributions', $productdistributions)
          ->with('reportings', $reportings)
          ->with('products', $products)
          ->with('adjustmentInfoList', $adjustmentInfoList)
          ->with('adjustments', $adjustments);
    }

    public function saveContent(Request $request, AdjustmentInformationList $adjustmentInfoList)
    {
      $adjustmentInfoList->product_info_id=$request->productCode;
      $adjustmentInfoList->user_id=$request->session()->get('user')->id;
      $adjustmentInfoList->quantity=$request->quantity;
      $adjustmentInfoList->adjustmentDate=date('Y-m-d', strtotime(str_replace('/', '-', $request->adjustmentDate)));
      $adjustmentInfoList->adjustmentType=$request->type;
      $adjustmentInfoList->reason=$request->reason;
      $adjustmentInfoList->save();
    }

    public function store(Request $request)
    {
      $quantityErrorCheck="";
      if (isset($request->productCode)) {
          $selectedProduct=ProductInfo::find($request->productCode);
          if ($selectedProduct) {
              $productStockSize=$selectedProduct->stock;
              if ($request->type!='found') {
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
    ], [
      'quantity.lte'=>'Please check the stock of the product'
    ]);

      if ($selectedProduct) {
        $this->saveContent($request,new AdjustmentInformationList);
      }

      return redirect()->route('adjustment.adjustment information');
    }
    public function deleteItem(Request $request)
    {
        if ($request->ajax()) {
            $isAvailable= AdjustmentInformationList::find($request->id);
            $isDelete=false;
            if ($isAvailable) {
                $isDelete= $isAvailable->delete();
            }
            return $isDelete ? 'deleted' : 'error';
        }
    }
    public function editItem(Request $request)
    {
        if ($request->ajax()) {
          $isAvailable= AdjustmentInformationList::find($request->id);
          if($isAvailable){
            $products=ProductInfo::all();
            return view('adjustment.ajaxEditAdjustmentInfo')
                    ->with('selectedAdjustmentInfo', $isAvailable)
                    ->with('products', $products);
          }
        }
    }
    public function updateItem(Request $request)
    {
      $isAvailable= AdjustmentInformationList::find($request->adjustmentId);
      $quantityErrorCheck="";
      if (isset($request->productCode)) {
          $selectedProduct=ProductInfo::find($request->productCode);
          if ($selectedProduct) {
              $productStockSize=$selectedProduct->stock;
              if ($request->type!='found') {
                  $quantityErrorCheck='|lte:'. $productStockSize;
              }
          }
      }
      $validator = Validator::make($request->all(),[
        'productCode'=>'required | unique:adjustment_information_lists,product_info_id,'.$request->adjustmentId,//check validation except this id
        'productName'=>'required',
        'reason'=>'required',
        'type'=>'required',
        'adjustmentDate'=>'required | date_format:d/m/Y| before_or_equal:today',
        'quantity'=>'required|numeric|gt:0'.$quantityErrorCheck,
        'stock'=>'required|numeric'
      ], [
        'quantity.lte'=>'Please check the stock of the product'
      ]);
      if ($validator->fails()) {      
        return ["error",$validator->errors()];
      } else {
        if($isAvailable && $selectedProduct){
          $this->saveContent($request,$isAvailable);
          return ["success"];
        }else{
          return ["error",["error1"=>["Something went wrong"]]];
        }
      }
    }
}

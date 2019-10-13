<?php

namespace App\Http\Controllers;
use App\User;
use Validator;
use App\setuptype;
use App\Adjustment;
use App\ProductInfo;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use Illuminate\Http\Request;
use App\Reporting;//model name;
use App\AdjustmentInformationList;
use App\AdjustmentInformationSave;
use PDF;


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
      $adjustmentInfoLists=AdjustmentInformationList::all();

      
      //dd($sections[0]->division);
      return view('adjustment.adjustment information')
          ->with('setuptypes', $setuptypes)
          ->with('securitytypes', $securitytypes)
          ->with('productreceivetypes', $productreceivetypes)
          ->with('productdistributions', $productdistributions)
          ->with('reportings', $reportings)
          ->with('products', $products)
          ->with('adjustmentInfoLists', $adjustmentInfoLists)
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

  public function clearAllItem(Request $request)
  {
    if (session()->has('user')) {
        $productReceiveLists=AdjustmentInformationList::all()->each->delete();
        return "success";
    }
  }
  public function saveAllItem(Request $request)
  {
    if (session()->has('user')) {
        $adjustmentInfoLists=AdjustmentInformationList::all();
        $k=0;
        foreach ($adjustmentInfoLists as $key => $item) {
            $adjustmentInfoSave=new AdjustmentInformationSave;
            $adjustmentInfoSave->product_info_id=$item->product_info_id;
            $adjustmentInfoSave->user_id=$request->session()->get('user')->id;
            $adjustmentInfoSave->quantity=$item->quantity;
            $adjustmentInfoSave->adjustmentDate=$item->adjustmentDate;
            $adjustmentInfoSave->adjustmentType=$item->adjustmentType;
            $adjustmentInfoSave->reason=$item->reason;
            $adjustmentInfoSave->save();
            
            $findProduct=ProductInfo::find($item->product_info_id);
            if ($findProduct) {
              if($item->adjustmentType=='found'){
                $findProduct->stock=$findProduct->stock + $item->quantity;
              }
              else{
                $findProduct->stock=$findProduct->stock - $item->quantity;
              }
              $findProduct->save();
              $item->delete();
            }
            $k++;

        }
        if (count($adjustmentInfoLists)==$k) {
            return "success";
        }
    }
  }

      public function invoice(){
              $data = [
             'foo' => 'bar'
                ];

              $adjustmentInfoLists=AdjustmentInformationList::all();
                   $pdf = PDF::loadView('adjustment.adjustmentInvoice',['adjustmentInfoLists'=>$adjustmentInfoLists]);
                   return $pdf->stream('adjustment_invoice.pdf');
      }

}

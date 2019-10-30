<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\Project;
use App\ProductInfo;
use App\Supplier;
use App\ProductReceiveList;
use App\ProductDistribution;
use App\AdjustmentMenu;
use App\Reporting;
use Validator;
use Illuminate\Validation\Rule;
use App\ProductReceiveSave;
use App\Product_receive;
//use APP\Product_receive_detail;
use App\productReceiveMaster;
use App\tblpurchase;
use App\tblpurchasedetails;

use PDF;
use Str;

class productreceiveController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->get('user')) {
            $setuptypes= setuptype::all();
            $securitytypes=SecurityType::all();
            $productreceivetypes=ProductReceiveType::all();
            $suppliers=Supplier::all('id', 'address', 'mobile', 'supplierName');
            $products=ProductInfo::all();
            $projects=Project::all();
            $productdistributions=ProductDistribution::all();
            $adjustments=AdjustmentMenu::all();
            $productReceiveLists=ProductReceiveList::all();
            // $ctReceiveMasters=productReceiveMaster::all();produ
            $purchases=tblpurchase::all();
            $reportings=Reporting::all();
            //dd($sections[0]->division);
             //dd($request->session());

            return view('product receive.product receive')
                   ->with('setuptypes', $setuptypes)
                   ->with('securitytypes', $securitytypes)
                   ->with('suppliers', $suppliers)
                   ->with('projects', $projects)
                   ->with('products', $products)
                   ->with('productReceiveLists', $productReceiveLists)
                   ->with('productreceivetypes', $productreceivetypes)
                   ->with('adjustments', $adjustments)
                   ->with('reportings', $reportings)
                   // ->with('productReceiveMasters',$productReceiveMasters)
                   ->with('purchases',$purchases)
                   ->with('productdistributions', $productdistributions);
        }
        else{
            return "<h2>The route you are looking for is not available.</h2>";
        }
    }


    public function store(Request $request)
    {
        // dd($request->all());
       $this->validate($request, [
               'supplierName'=>'required',
               'productCode'=>'required ',
               'productName'=>'required',
               'projectName'=>'required',
               'orderNo'=>'required',
               'address'=>'required',
               'contactNo'=>'required',
               'Purchase_Date'=>'required | date_format:d/m/Y| before_or_equal:today',
               'quantity'=>'required|numeric|gt:0',
                // 'isDonate'=>'required'
        ]);
          // dd($request->all());
     
                // $request->session()->put('supplierName',$request->input('supplierName'));
                // $request->session()->put('address',$request->input('address'));
                // $request->session()->put('contactNo',$request->input('contactNo'));
                // $request->session()->put('productName',$request->input('productName'));
                // $request->session()->put('productCode',$request->input('productCode'));
                // $request->session()->put('projectName',$request->input('projectName'));
                // $request->session()->put('orderNo',$request->input('orderNo'));
                // $request->session()->put('purchaseDate',$request->input('purchaseDate'));
                // $request->session()->put('quantity',$request->input('quantity'));
                // $request->session()->put('isDonate',$request->input('isDonate'));
                // dd($request->session()->all());
         
                //$saveNewProductReceive->orderNo=$request->orderNo;   
                //$saveNewProductReceive->quantity=$request->quantity;
                //$saveNewProductReceive->user_id=$request->user_id;
               // $saveNewProductReceive->receiveDate=$request->receiveDate;
                //$saveNewProductReceive->save();

             $newProductAddedToList=new ProductReceiveList;
             $newProductAddedToList->supplier_id=$request->supplierName;
             $newProductAddedToList->project_id=$request->projectName;
             $newProductAddedToList->product_info_id=$request->productCode;
             $newProductAddedToList->orderNo=$request->orderNo;
             $newProductAddedToList->quantity=$request->quantity;
             if($request->IsDonate != null) $newProductAddedToList->IsDonate=1;
             else $newProductAddedToList->IsDonate=0;
             
             $newProductAddedToList->user_id=$request->session()->get('user')->id;
             $newProductAddedToList->Purchase_Date=date('Y-m-d',  strtotime(str_replace('/','-',$request->Purchase_Date)));

             //dd($newProductAddedToList);
             $newProductAddedToList->save();
              
             return redirect()->route("product receive.product receive");
            
             
         // }


      
        // ->with('supplierName',$request->session()->get('supplierName'))
        // ->with('address',$request->session()->get('address'))
        // ->with('contactNo',$request->session()->get('contactNo'))
        // ->with('productName',$request->session()->get('productName'))
        // ->with('productCode',$request->session()->get('productCode'))
        // ->with('projectName',$request->session()->get('projectName'))
        // ->with('orderNo',$request->session()->get('orderNo'))
        // ->with('purchaseDate',$request->session()->get('purchaseDate'))
        // ->with('quantity',$request->session()->get('quantity'))
        // ->with('isDonate',$request->session()->get('isDonate'));
        // dd($request->session()->all());
    }

    public function deleteItemFromReceiveList(Request $request)
    {
        if ($request->ajax()) {
            $isAvailable= ProductReceiveList::find($request->id);
            $isDelete=false;
            if ($isAvailable) {
                $isDelete= $isAvailable->delete();
            }
            return $isDelete ? 'deleted' : 'error';
        }
    }
    public function editItemFromReceiveList(Request $request)
    {
        if ($request->ajax()) {
            $isAvailable= ProductReceiveList::find($request->id);
            $suppliers=Supplier::all('id', 'address', 'mobile', 'supplierName');
            $products=ProductInfo::all();
            $projects=Project::all();
            return view('product receive.ajaxEditProductReceive')
                   ->with('suppliers', $suppliers)
                   ->with('projects', $projects)
                   ->with('products', $products)
                   ->with('productReceiveList', $isAvailable);
        }
    }
    public function updateItemFromReceiveList(Request $request)
    {
        $productCode=$request->productCode;
        $validator = Validator::make($request->all(),[
            'supplierName'=>'required',
            'productCode'=>['required', Rule::unique('product_receive_lists','product_info_id')->ignore($request->productReceiveListId)],
            'productName'=>'required',
            'projectName'=>'required',
            'orderNo'=>'required',
            'address'=>'required',
            'contactNo'=>'required',
            'receiveDate'=>'required | date_format:d/m/Y| before_or_equal:today',
            'quantity'=>'required|numeric|gt:0'
        ]);
        if ($validator->fails()) {      
            return ["error",$validator->errors()];
        } else {
            $isProductInProductReceiveList=ProductReceiveList::find($request->productReceiveListId);
            $supplier=Supplier::find($request->supplierName);
            $product=ProductInfo::find($request->productCode);
            $project=Project::find($request->projectName);
    
            if ($isProductInProductReceiveList && $supplier && $product && $project) {
                $isProductInProductReceiveList->supplier_id=$request->supplierName;
                $isProductInProductReceiveList->project_id=$request->projectName;
                $isProductInProductReceiveList->product_info_id=$request->productCode;
                $isProductInProductReceiveList->orderNo=$request->orderNo;
                $isProductInProductReceiveList->quantity=$request->quantity;
                
                $isProductInProductReceiveList->user_id=$request->session()->get('user')->id;
                $isProductInProductReceiveList->receiveDate=date('Y-m-d',  strtotime(str_replace('/','-',$request->receiveDate)));
                $isProductInProductReceiveList->save();
            }
            return ["success"];
        }
    }
    public function saveAllItemFromReceiveList(Request $request)
    {
         // return $request->session()->all();
        if (session()->has('user')) {
            $productReceiveLists=ProductReceiveList::all();
           //$productReceives=Product_receive::all();
            $k=0;
             foreach ($productReceiveLists as $key => $item) {
                $saveNewProductReceive=new tblpurchase;
                $saveNewProductReceive->SupplierID=$item->supplier_id;
          
                $saveNewProductReceive->InvoiceNo='PUR-'.$item->orderNo.'-'.$item->Purchase_Date;

                $saveNewProductReceive->OrderNo=$item->orderNo;
                $saveNewProductReceive->Purchase_Date=$item->Purchase_Date;
                $saveNewProductReceive->InvoiceDate=$item->Purchase_Date;
                $saveNewProductReceive->IsDonate=$item->IsDonate;
                $saveNewProductReceive->Job_By=$item->user_id;

                $saveNewProductReceive->save();
                 // dd($saveNewProductReceive->id);
                 $saveNewProductReceiveDetails = new tblpurchasedetails();
                 $saveNewProductReceiveDetails->PurchaseID = $saveNewProductReceive->id;
                 $saveNewProductReceiveDetails->ProductID = $item->product_info_id;
                 $saveNewProductReceiveDetails->Quantity = $item->quantity;
                 $saveNewProductReceiveDetails->Note='0';
                 $saveNewProductReceiveDetails->BatchNo='0';
                 $saveNewProductReceiveDetails->save();
                 
                $findProduct = ProductInfo::find($item->product_info_id);
                if ($findProduct) {
                    $findProduct->stock = $findProduct->stock + $item->quantity;
                    $findProduct->save();
                }
                $item->delete();
               $k++;

            }

            if (count($productReceiveLists)==$k) {
                return "success";
            }
        }
    }
    public function clearListItemFromReceiveList(Request $request)
    {
        if (session()->has('user')) {
           
            $productReceiveLists=ProductReceiveList::all()->each->delete();
            // dd($productReceiveLists);
            // $k=0;
            // foreach ($productReceiveLists as $key => $item) {
            //     $item->delete();
            //     $k++;
            // }
            
            // if (count($productReceiveLists)==$k) {
                // }
            return "success";
        }
    }

    public function invoice(){
                $productReceiveLists=ProductReceiveList::all();
                   $pdf = PDF::loadView('product receive.productReceiveInvoice',['productReceiveLists'=>$productReceiveLists]);
                   return $pdf->stream('product-receive-invoice.pdf');
    }
}

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
use Validator;
use Illuminate\Validation\Rule;
use App\ProductReceiveSave;

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
            $productReceiveLists=ProductReceiveList::all();
            //dd($sections[0]->division);
            return view('product receive.product receive')
                   ->with('setuptypes', $setuptypes)
                   ->with('securitytypes', $securitytypes)
                   ->with('suppliers', $suppliers)
                   ->with('projects', $projects)
                   ->with('products', $products)
                   ->with('productReceiveLists', $productReceiveLists)
                   ->with('productreceivetypes', $productreceivetypes);
        }
        else{
            return "<h2>The route you are looking for is not available.</h2>";
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'supplierName'=>'required',
            'productCode'=>'required | unique:product_receive_lists,product_info_id',
            'productName'=>'required',
            'projectName'=>'required',
            'orderNo'=>'required',
            'address'=>'required',
            'contactNo'=>'required',
            'receiveDate'=>'required | date| before_or_equal:today',
            'quantity'=>'required|numeric|gt:0'
        ]);
        $supplier=Supplier::find($request->supplierName);
        $product=ProductInfo::find($request->productCode);
        $project=Project::find($request->projectName);

        if ($supplier && $product && $project) {
            $newProductAddedToList=new ProductReceiveList;
            $newProductAddedToList->supplier_id=$request->supplierName;
            $newProductAddedToList->project_id=$request->projectName;
            $newProductAddedToList->product_info_id=$request->productCode;
            $newProductAddedToList->orderNo=$request->orderNo;
            $newProductAddedToList->quantity=$request->quantity;
            $newProductAddedToList->user_id=$request->session()->get('user')->id;
            $newProductAddedToList->receiveDate=date('Y-m-d', strtotime($request->receiveDate));
            $newProductAddedToList->save();
            
        }

        return redirect()->route('product receive.product receive');
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
            'receiveDate'=>'required | date| before_or_equal:today',
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
                $isProductInProductReceiveList->receiveDate=date('Y-m-d', strtotime($request->receiveDate));
                $isProductInProductReceiveList->save();
            }
            return ["success"];
        }
    }
    public function saveAllItemFromReceiveList(Request $request)
    {
        if (session()->has('user')) {
            $productReceiveLists=ProductReceiveList::all();
            $k=0;
            foreach ($productReceiveLists as $key => $item) {
                $saveNewProductReceive=new ProductReceiveSave;
                $saveNewProductReceive->supplier_id=$item->supplier_id;
                $saveNewProductReceive->project_id=$item->project_id;
                $saveNewProductReceive->product_info_id=$item->product_info_id;
                $saveNewProductReceive->orderNo=$item->orderNo;
                $saveNewProductReceive->quantity=$item->quantity;
                $saveNewProductReceive->user_id=$item->user_id;
                $saveNewProductReceive->receiveDate=$item->receiveDate;
                $saveNewProductReceive->save();
                
                $findProduct=ProductInfo::find($item->product_info_id);
                if ($findProduct) {
                    $findProduct->stock=$findProduct->stock + $item->quantity;
                    $findProduct->save();
                    $item->delete();
                }
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
            $productReceiveLists=ProductReceiveList::all();
            $k=0;
            foreach ($productReceiveLists as $key => $item) {
                $item->delete();
                $k++;
            }
            
            if (count($productReceiveLists)==$k) {
                return "success";
            }
        }
    }
}

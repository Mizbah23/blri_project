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
            'productName'=>'required | unique:product_receive_lists,product_info_id',
            'projectName'=>'required',
            'orderNo'=>'required',
            'address'=>'required',
            'contactNo'=>'required',
            'receiveDate'=>'required | date| before_or_equal:today',
            'quantity'=>'required|numeric|gt:0'
        ]);
        $supplier=Supplier::find($request->supplierName);
        $product=ProductInfo::find($request->productName);
        $project=Project::find($request->projectName);

        if ($supplier && $product && $project) {
            $newProductAddedToList=new ProductReceiveList;
            $newProductAddedToList->supplier_id=$request->supplierName;
            $newProductAddedToList->project_id=$request->projectName;
            $newProductAddedToList->product_info_id=$request->productName;
            $newProductAddedToList->orderNo=$request->orderNo;
            $newProductAddedToList->quantity=$request->quantity;
            $newProductAddedToList->user_id=$request->session()->get('user')->id;
            $newProductAddedToList->receiveDate=date('Y-m-d', strtotime($request->receiveDate));
            $newProductAddedToList->save();
        }

        return redirect()->route('product receive.product receive');
    }
}

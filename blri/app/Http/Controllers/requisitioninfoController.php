<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;
use App\EmployeeInformation;
use App\RequisitionList;
use App\ProductInfo;
use App\Brand;

class requisitioninfoController extends Controller
{
         public function index(Request $request)
    {
    	if($request->session()->get('user')){
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $employeeinformations=EmployeeInformation::all();
        $requisitionlists=RequisitionList::all();
        $products=ProductInfo::all();
        $brands=Brand::all();
        // dd($products->unique('productName'));
        //dd($sections[0]->division);
        return view('product receive.requisition info')->with('setuptypes',$setuptypes)
                                     ->with('securitytypes',$securitytypes)
                                     ->with('productreceivetypes',$productreceivetypes)
                                     ->with('productdistributions',$productdistributions)
                                     ->with('adjustments',$adjustments)
                                     ->with('reportings',$reportings)
                                     ->with('products', $products)
                                     ->with('employeeinformations',$employeeinformations)
                                     ->with('requisitionlists',$requisitionlists);
     }
     else{
     	 return "<h2>The route you are looking for is not available.</h2>";
     }

    }

        public function requisitionListStore(Request $request)

    {
        // dd($request->all());
        $this->validate($request, [
            'name'=>'required',
            'categoryName'=>'required',
            'productCode'=>'required | unique:requisition_lists,product_info_id',
            'productName'=>'required',
            'brandName'=>'required',
            'requisitionDate'=>'required | date| before_or_equal:today',
            'quantity'=>'required|numeric|gt:0'
        ]);
        $employeeinformations=EmployeeInformation::find($request->name);
        $product=ProductInfo::find($request->id);
        

       
         
            $requisitionList=new RequisitionList;
            $requisitionList->employee_information_id=$request->name;
            $requisitionList->product_info_id=$request->productCode;
            $requisitionList->quantity=$request->quantity;
            $requisitionList->user_id=$request->session()->get('user')->id;
            $requisitionList->requisitionDate=date('Y-m-d', strtotime($request->requisitionDate));
            //dd($requisitionList);
            $requisitionList->save();

        
           //dd($requisitionList);

        return redirect()->route('product receive.requisition info');
    }
}

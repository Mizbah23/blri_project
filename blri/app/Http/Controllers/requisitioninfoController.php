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
use Validator;
use Illuminate\Validation\Rule;
use App\RequisitionSave;

class requisitioninfoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->get('user')) {
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
            return view('product receive.requisition info')->with('setuptypes', $setuptypes)
                                     ->with('securitytypes', $securitytypes)
                                     ->with('productreceivetypes', $productreceivetypes)
                                     ->with('productdistributions', $productdistributions)
                                     ->with('adjustments', $adjustments)
                                     ->with('reportings', $reportings)
                                     ->with('products', $products)
                                     ->with('employeeinformations', $employeeinformations)
                                     ->with('requisitionlists', $requisitionlists)
                                     ->with('brands', $brands);
        } else {
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
            'requisitionDate'=>'required | date_format:d/m/Y| before_or_equal:today',
            'quantity'=>'required|numeric|gt:0'
        ]);
        $employeeinformations=EmployeeInformation::find($request->name);
        $product=ProductInfo::find($request->id);
        

       
        $requisitionList=new RequisitionList;
        $requisitionList->employee_information_id=$request->name;
        $requisitionList->product_info_id=$request->productCode;
        $requisitionList->quantity=$request->quantity;
        $requisitionList->user_id=$request->session()->get('user')->id;
        $requisitionList->requisitionDate=date('Y-m-d',  strtotime(str_replace('/','-',$request->requisitionDate)));
        //dd($requisitionList);
        $requisitionList->save();

        
        //dd($requisitionList);

        return redirect()->route('product receive.requisition info');
    }
    public function deleteItemFromRequisitionList(Request $request)
    {
        if ($request->ajax()) {
            $isAvailable= RequisitionList::find($request->id);
            $isDelete=false;
            if ($isAvailable) {
                $isDelete= $isAvailable->delete();
            }
            return $isDelete ? 'deleted' : 'error';
        }
    }

    public function editItemFromRequisitionList(Request $request)
    {
        // if ($request->ajax()) {
        $isAvailable= RequisitionList::find($request->id);
        $employeeinformations=EmployeeInformation::all();
        $products=ProductInfo::all();
            
        return view('product receive.ajaxEditRequisition')
                   ->with('employeeinformations', $employeeinformations)
                   ->with('products', $products)
                   ->with('requisitionList', $isAvailable);
        // }
    }

    public function updateItemFromRequisitionList(Request $request)
    {
        // return $request->all();
        $validtor=Validator::make($request->all(), [
            'name'=>'required',
            'categoryName'=>'required',
            'productCode'=>['required', Rule::unique('product_info_id')->ignore($request->productCode)],
            'productName'=>'required',
            'brandName'=>'required',
            'requisitionDate'=>'required | date_format:d/m/Y| before_or_equal:today',
            'quantity'=>'required|numeric|gt:0'
        ]);
        if ($validtor->fails()) {
            return ["error",$validtor->errors()];
        }
        $employeeinformations=EmployeeInformation::find($request->name);
        $products=ProductInfo::find($request->productCode);
        

       
        $requisitionList=RequisitionList::find($request->id);
        $requisitionList->employee_information_id=$request->name;
        $requisitionList->product_info_id=$request->productCode;
        $requisitionList->quantity=$request->quantity;
        $requisitionList->user_id=$request->session()->get('user')->id;
        $requisitionList->requisitionDate=date('Y-m-d',  strtotime(str_replace('/','-',$request->requisitionDate)));
        //return $request->all();
        $requisitionList->save();
        return $requisitionList;
        return ["success"];
    }
     

    public function saveAllItemFromRequisitionList(Request $request)
    {
        //return $request->all();
        if (session()->has('user')) {
            $requisitionlists=RequisitionList::all();
            $k=0;
            foreach ($requisitionlists as $key => $item) {
                $saveNewRequisition=new RequisitionSave;
                $saveNewRequisition->employee_information_id=$item->employee_information_id;
                $saveNewRequisition->product_info_id=$item->product_info_id;
                $saveNewRequisition->quantity=$item->quantity;
                $saveNewRequisition->user_id=$item->user_id;
                $saveNewRequisition->requisitionDate=$item->requisitionDate;
                $saveNewRequisition->save();
                $findProduct=ProductInfo::find($item->product_info_id);
                if ($findProduct) {
                    $findProduct->stock=$findProduct->stock + $item->quantity;
                    $findProduct->save();
                    $item->delete();
                }
              
                $k++;
            }
            //return $saveNewRequisition;
            if (count($requisitionlists)==$k) {
                return ["success"];
            }
        }
    }

     public function clearListItemFromRequisitionsList(Request $request)
    {
        if (session()->has('user')) {
           $requisitionlists=RequisitionList::all();
            $k=0;
            foreach ($requisitionlists as $key => $item) {
                $item->delete();
                $k++;
            }
            
            if (count($requisitionlists)==$k) {
                return "success";
            }
        }
    }
}

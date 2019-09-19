<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;
use App\division;
use App\SerialInfo;
use App\Brand;
use App\ProductInfo;
use App\Category;
use App\DistributionList;
use Validator;
use Illuminate\Validation\Rule;
use App\DistributionSave;


class productdistributiontypeController extends Controller
{
    public function index()
    {
        $divisions=division::all();
        $setuptypes= setuptype::all();
        $securitytypes= SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $serialInfos=SerialInfo::all();
        $brands=Brand::all();
        $products=ProductInfo::all();
        $categories=Category::all();
        $distributionLists=DistributionList::all();



        return view('product distribution.product distribution')
            ->with('distributionLists',$distributionLists)
            ->with('setuptypes', $setuptypes)
            ->with('securitytypes', $securitytypes)
            ->with('productreceivetypes', $productreceivetypes)
            ->with('productdistributions', $productdistributions)
            ->with('adjustments', $adjustments)
            ->with('reportings', $reportings)
            ->with('serialInfos', $serialInfos)
            ->with('divisions', $divisions)
            ->with('brands', $brands)
            ->with('categories', $categories)
            ->with('products', $products);
    }
    public function showProductBasedOnBrand(Request $request)
    {
        $products=ProductInfo::where('brand_id',$request->brandId)->get();
        return $products->unique('productName')->pluck('productName');
    }
    public function distributionList(Request $request)
    {
         // dd($request->all());
        $this->validate($request, [
            'divisionName'=>'required',
            'categoryName'=>'required',
            'productCode'=>'required ',
            'productName'=>'required',
            'serial_no'=>'required|unique:distribution_lists,serial_id',
            'brandName'=>'required',
            
           
        ]);
        $divisions=division::find($request->divisionName);
        
       $product=ProductInfo::find($request->id);
        

       
        $distributionList=new DistributionList;
       
        $distributionList->product_info_id=$request->productCode;
        $distributionList->division_id=$request->divisionName;
        $distributionList->serial_id=$request->serial_no;
        $distributionList->remarks=$request->remarks;
        $distributionList->user_id=$request->session()->get('user')->id;
        
    
        $distributionList->save();

        
        //dd( $distributionList);

        return redirect()->route('product distribution.product distribution');
    }

            public function deleteItemFromDistributionList(Request $request)
    {
        if ($request->ajax()) {
            $isAvailable= DistributionList::find($request->id);
            $isDelete=false;
            if ($isAvailable) {
                $isDelete= $isAvailable->delete();
            }
            return $isDelete ? 'deleted' : 'error';
        }
    }
    public function editItemFromDistributionList(Request $request)
    {
       // if ($request->ajax()) {
            //dd($request->all());
            $isAvailable= DistributionList::find($request->id);
            $divisions=division::all();
            $products=ProductInfo::all();
            $serialInfos=SerialInfo::all();
            $categories=Category::all();
            $brands=Brand::all();
            return view('product distribution.ajaxEditDistribution')
                   ->with('divisions', $divisions)
                   ->with('serialInfos', $serialInfos)
                   ->with('products', $products)
                   ->with('categories',$categories)
                   ->with('brands',$brands)
                   ->with('productDistributionList', $isAvailable);
       // }
    }

    public function updateItemFromDistributionList(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'divisionName'=>'required',
            'categoryName'=>'required',
            'productCode'=>'required ',
            'productName'=>'required',
            'serial_no'=>'required|unique:distribution_lists,serial_id',
            'brandName'=>'required',
            
        ]);
        if ($validator->fails()) {      
            return ["error",$validator->errors()];
        } else {
            $isProductInProductDistributionList=DistributionList::find($request->productDistributionListId);
         
    
       
            $isProductInProductDistributionList->product_info_id=$request->productCode;
            $isProductInProductDistributionList->division_id=$request->divisionName;
            $isProductInProductDistributionList->serial_id=$request->serial_no;
            $isProductInProductDistributionList->remarks=$request->remarks;
            $isProductInProductDistributionList->user_id=$request->session()->get('user')->id;
            $isProductInProductDistributionList->save();
           
            return ["success"];
        }
    }
}

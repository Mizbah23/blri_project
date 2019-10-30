<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\AdjustmentMenu;
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
use App\User;

class productdistributiontypeController extends Controller
{
    public function index()
    {
        $divisions=division::all();
        $setuptypes= setuptype::all();
        $securitytypes= SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=AdjustmentMenu::all();
        $reportings=Reporting::all();
        $serialInfos=SerialInfo::all();
        $brands=Brand::all();
        $categories=Category::all();
        $users=User::all();
        $distributionLists=DistributionList::all();
        $selectedProductBasedOnBrand=[];
        $distributionSave=DistributionSave::all();

        if(old('brandName')){
            $selectedProductBasedOnBrand=ProductInfo::where('brand_id',old('brandName'))->get();
        }



        return view('product distribution.product distribution')
            ->with('distributionLists',$distributionLists)
            ->with('distributionSave',$distributionSave)
            ->with('setuptypes', $setuptypes)
            ->with('securitytypes', $securitytypes)
            ->with('productreceivetypes', $productreceivetypes)
            ->with('productdistributions', $productdistributions)
            ->with('adjustments', $adjustments)
            ->with('reportings', $reportings)
            ->with('selectedProductBasedOnBrand', $selectedProductBasedOnBrand)
            ->with('serialInfos', $serialInfos)
            ->with('divisions', $divisions)
            ->with('brands', $brands)
            ->with('users',$users)
            ->with('categories', $categories);
    }
    public function showProductBasedOnBrand(Request $request)
    {
        $products=ProductInfo::where('brand_id',$request->brandId)->get();
        return $products->unique('productName');
    }
    public function distributionList(Request $request)
    {
         // dd($request->all());
        $this->validate($request, [
            'divisionName'=>'required',
            'categoryName'=>'required',
            // 'productCode'=>'required ',
            'productName'=>'required',
            'serial_no'=>'required|unique:distribution_lists,serial_id',
            'brandName'=>'required',
            
            
           
        ]);
        $divisions=division::find($request->divisionName);
        
       $product=ProductInfo::find($request->id);
        

       
        $distributionList=new DistributionList;
       
        // $distributionList->product_info_id=$request->productCode;
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
            $isAvailable= DistributionList::find($request->id);
            if($isAvailable){
                $divisions=division::all();
                $showProductBasedOnBrand=ProductInfo::where('brand_id',$isAvailable->serialInfo->productInfo->brand_id)->get();
                // dd($showProductBasedOnBrand);
                $serialInfos=SerialInfo::all();
                $categories=Category::all();
                $brands=Brand::all();
                return view('product distribution.ajaxEditDistribution')
                       ->with('divisions', $divisions)
                       ->with('serialInfos', $serialInfos)
                       ->with('selectedProductBasedOnBrand', $showProductBasedOnBrand)
                       ->with('categories',$categories)
                       ->with('brands',$brands)
                       ->with('productDistributionList', $isAvailable);
            }
       // }
    }

    public function updateItemFromDistributionList(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'divisionName'=>'required',
            'categoryName'=>'required',
            'productName'=>'required',
            'serial_no'=>'required|unique:distribution_lists,serial_id,'.$request->productDistributionListId,
            'brandName'=>'required',
            'remarks'=>'required'
            
        ]);
        if ($validator->fails()) {      
            return ["error",$validator->errors()];
        } else {
            $isProductInProductDistributionList=DistributionList::find($request->productDistributionListId);
         
    
       
            $isProductInProductDistributionList->division_id=$request->divisionName;
            $isProductInProductDistributionList->serial_id=$request->serial_no;
            $isProductInProductDistributionList->remarks=$request->remarks;
            $isProductInProductDistributionList->user_id=$request->session()->get('user')->id;
            $isProductInProductDistributionList->save();
           
            return ["success"];
        }
    }

        public function saveAllItemFromDistributionList(Request $request)
    {
        //return $request->all();
        if (session()->has('user')) {
            $distributionLists=DistributionList::all();
            $k=0;
            foreach ($distributionLists as $key => $item) {
                $saveNewDistribution=new DistributionSave;
                $saveNewDistribution->division_id=$item->division_id;
                $saveNewDistribution->serial_id=$item->serial_id;
                $saveNewDistribution->remarks=$item->remarks;
                $saveNewDistribution->user_id=$item->user_id;
                $saveNewDistribution->save();
                $item->delete();
            $k++;
            }
            //return $saveNewRequisition;
            if (count($distributionLists)==$k) {
                return ["success"];
            }
        }
    }

         public function clearListItemFromDistributionList(Request $request)
    {
        if (session()->has('user')) {
           $distributionLists=RequisitionList::all();
            $k=0;
            foreach ($distributionLists as $key => $item) {
                $item->delete();
                $k++;
            }
            
            if (count($distributionLists)==$k) {
                return "success";
            }
        }
    }
}

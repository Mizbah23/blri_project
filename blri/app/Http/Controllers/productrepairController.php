<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\AdjustmentMenu;
use App\Reporting;//model name;
use App\User;
use App\EmployeeInformation;
use App\Category;
use App\ProductInfo;
use App\Repairer;
use App\Brand;
use App\SerialInfo;
use App\ProductRepair;

class productrepairController extends Controller
{
    public function index()
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=AdjustmentMenu::all();
        $reportings=Reporting::all();
        $categories=Category::all();
        $productinfos=ProductInfo::all();
        $repairers=Repairer::all();
        $brands=Brand::all();
        $serialInfos=SerialInfo::all();
        $productrepairs=ProductRepair::all();
        $selectedProductBasedOnBrand=[];
        if(old('brandName')){
            $selectedProductBasedOnBrand=ProductInfo::where('brand_id',old('brandName'))->get();
        }
        $users=User::all();
        //dd($productrepairs);
        return view('product distribution.product repair')->with('setuptypes', $setuptypes)
        ->with('securitytypes', $securitytypes)
        ->with('productreceivetypes', $productreceivetypes)
        ->with('productdistributions', $productdistributions)
        ->with('adjustments', $adjustments)
        ->with('categories', $categories)
        ->with('productinfos', $productinfos)
        ->with('repairers', $repairers)
        ->with('brands', $brands)
        ->with('serialInfos', $serialInfos)
        ->with('productrepairs', $productrepairs)
        ->with('selectedProductBasedOnBrand', $selectedProductBasedOnBrand)
        ->with('reportings', $reportings)->with('users', $users);
    }

    public function showProductBasedOnBrand(Request $request)
    {
        $products=ProductInfo::where('brand_id', $request->brandId)->get();
        return $products->unique('productName');
    }


    public function repairSendPost(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'repairerName'=>'required',
            'categoryName'=>'required',
            'productName'=>'required',
            'serial_no'=>'required|unique:product_repairs,serial_id',
            'brandName'=>'required',
            'sendingDate'=>'required|date_format:d/m/Y| before_or_equal: today'
        ]);
            
      
        $productrepair=new ProductRepair;
        $productrepair->serial_id=$request->serial_no;
        $productrepair->repairer_id=$request->repairerName;
        $productrepair->user_id=$request->session()->get('user')->id;
        $productrepair->sendingDate=date('Y-m-d', strtotime(str_replace('/', '-', $request->sendingDate)));
        $productrepair->remarks=$request->remarks;

        // dd($productrepair);
        
        $productrepair->save();

        
        //dd($productrepair);

        return redirect()->route('product distribution.product repair')->with('response','Product Successfully Added to Repair');
        }

       public function repairedit(Request $request,$id){
        $isAvailable= ProductRepair::find($request->id);
         if($isAvailable){ 
        $showProductBasedOnBrand=ProductInfo::where('brand_id',$isAvailable->serialInfo->productInfo->brand_id)->get();
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=AdjustmentMenu::all();
        $reportings=Reporting::all();
        $categories=Category::all();
        $productinfos=ProductInfo::all();
        $repairers=Repairer::all();
        $brands=Brand::all();
        $serialInfos=SerialInfo::all();
        $productrepairs=ProductRepair::all();
        $selectedProductBasedOnBrand=[];
        $users=User::all();

    return view('product distribution.repairedit')->with('setuptypes',$setuptypes)
        ->with('securitytypes',$securitytypes)
        ->with('productreceivetypes',$productreceivetypes)
        ->with('productdistributions',$productdistributions)
        ->with('adjustments',$adjustments)
        ->with('categories',$categories)
        ->with('productinfos',$productinfos)
        ->with('selectedProductBasedOnBrand', $showProductBasedOnBrand)
        ->with('repairers',$repairers)
        ->with('brands',$brands)
        ->with('serialInfos',$serialInfos)
        ->with('productrepairs',$isAvailable)
        ->with('reportings',$reportings)->with('users',$users);
        
        }


    }

        public function update(Request $request,$id){

             $this->validate($request, [
            'repairerName'=>'required',
            'categoryName'=>'required',
            'productName'=>'required',
            'serial_no'=>'required|unique:product_repairs,serial_id,'.$id,
            'brandName'=>'required',
            'sendingDate'=>'required|date_format:d/m/Y| before_or_equal: today'
        ]);
            
        //find($id);
        $productrepair=ProductRepair::find($id);
        $productrepair->serial_id=$request->serial_no;
        $productrepair->repairer_id=$request->repairerName;
        $productrepair->user_id=$request->session()->get('user')->id;
        $productrepair->sendingDate=date('Y-m-d', strtotime(str_replace('/', '-', $request->sendingDate)));
        $productrepair->remarks=$request->remarks;

        // dd($productrepair);
        
        $productrepair->save();

        
   

        return redirect()->route('product distribution.product repair')->with('response','Successfully Edited');

  }
   public function deleteItemFromRepair(Request $request){
          if ($request->ajax()) {
            $isAvailable= ProductRepair::find($request->id);
            $isDelete=false;
            if ($isAvailable) {
                $isDelete= $isAvailable->delete();
            }
            return $isDelete ? 'deleted' : 'error';
        }
   }

}

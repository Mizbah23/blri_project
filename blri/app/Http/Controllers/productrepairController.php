<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
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
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $categories=Category::all();
        $productinfos=ProductInfo::all();
        $repairers=Repairer::all();
        $brands=Brand::all();
        $serialInfos=SerialInfo::all();
        $productrepairs=ProductRepair::all();
        $selectedProductBasedOnBrand=[];
        $users=User::all();

    return view('product distribution.product repair')->with('setuptypes',$setuptypes)
        ->with('securitytypes',$securitytypes)
        ->with('productreceivetypes',$productreceivetypes)
        ->with('productdistributions',$productdistributions)
        ->with('adjustments',$adjustments)
        ->with('categories',$categories)
        ->with('productinfos',$productinfos)
        ->with('repairers',$repairers)
        ->with('brands',$brands)
        ->with('serialInfos',$serialInfos)
        ->with('productrepairs',$productrepairs)
        ->with('reportings',$reportings)->with('users',$users);
	}

        public function showProductBasedOnBrand(Request $request)
    {
        $products=ProductInfo::where('brand_id',$request->brandId)->get();
        return $products->unique('productName');
    }


        public function repairSendPost(Request $request){
      
        $productrepair=new ProductRepair;
        
        $productrepair->serial_id=$request->serial_no;
        $productrepair->repairer_id=$request->repairerName;
        $productrepair->user_id=$request->session()->get('user')->id;
        $productrepair->sendingDate=date('Y-m-d', strtotime(str_replace('/','-',$request->sendingDate)));
        $productrepair->remarks=$request->remarks;
        
        $productrepair->save();

        
        dd($productrepair);

        return redirect()->route('product distribution.product repair')->('response','Product Successfully Added to Repair');
        }
}

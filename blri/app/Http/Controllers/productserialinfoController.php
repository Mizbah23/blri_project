<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\Adjustment;
use App\ProductInfo;
use App\Category;
use App\Brand;
use App\SerialInfo;


class productserialinfoController extends Controller
{
         public function index()
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $products=ProductInfo::all();
        $categories=Category::all();
        $brands=Brand::all();
        $serialInfos=SerialInfo::all();
        //dd($sections[0]->division);
        return view('product receive.product serial info')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('productdistributions',$productdistributions)->with('adjustments',$adjustments)->with('reportings',$reportings)->with('products',$products)->with('categories',$categories)->with('brands',$brands)->with('serialInfos',$serialInfos);
    }

        public function serialPost(Request $request){
        	
        	$this->validate($request, [
            'categoryName'=>'required',
            'brandName'=>'required',
            'serial_no'=>'required | unique:serial_infos',
            'productName'=>'required',
            'warrantyDate'=>'required|date_format:d/m/Y',
            
        ]);
        $serialInfo=SerialInfo::all();
        $product=ProductInfo::all();
        

       
        $serialInfo=new SerialInfo;
        $serialInfo->product_info_id=$request->productName;
        $serialInfo->serial_no=$request->serial_no;
        $serialInfo->user_id=$request->session()->get('user')->id;
         $serialInfo->warrantyDate=date('Y-m-d', strtotime(str_replace('/','-',$request->warrantyDate)));
        //dd($requisitionList);
        $serialInfo->save();

        
        //dd($requisitionList);

        return redirect()->route('product receive.product serial info')->with('response','Successfully Created');
        }
        public function serialEdit(Request $request,$id){
            
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $products=ProductInfo::all();
        $categories=Category::all();
        $brands=Brand::all();
        $serialInfos=SerialInfo::find($id);
          return view('product receive.serialedit')
          ->with('setuptypes',$setuptypes)
          ->with('securitytypes',$securitytypes)
          ->with('productreceivetypes',$productreceivetypes)
          ->with('productdistributions',$productdistributions)
          ->with('adjustments',$adjustments)
          ->with('reportings',$reportings)
          ->with('products',$products)
          ->with('categories',$categories)
          ->with('brands',$brands)
          ->with('serialInfos',$serialInfos);
        }

         public function update(Request $request,$id)

         {
            
            $this->validate($request, [
            'categoryName'=>'required',
            'brandName'=>'required',
            'serial_no'=>'required | unique:serial_infos,serial_no,'.$id,
            'productName'=>'required',
             'warrantyDate'=>'required|date_format:d/m/Y| before_or_equal:today',
            
        ]);
            
            $serialInfo=SerialInfo::find($id); 
            $serialInfo->product_info_id=$request->id;
            $serialInfo->serial_no=$request->serial_no;
            $serialInfo->user_id=$request->session()->get('user')->id;
            $serialInfo->warrantyDate=date('Y-m-d', strtotime(str_replace('/','-',$request->warrantyDate)));
            //dd($serialInfo);
            $serialInfo->save();

            return redirect()->route('product receive.product serial info')->with('response','Successfully Edited');
        }
}

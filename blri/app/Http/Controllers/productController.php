<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\Category;
use App\Brand;
use App\ProductInfo;
use Validator;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;

class productController extends Controller
{
  public function index(){
    $setuptypes= setuptype::all();
    $securitytypes=SecurityType::all();
    $categories=Category::all();
    $brands=Brand::all();
    $productinfos=ProductInfo::all();
    $productreceivetypes=ProductReceiveType::all();
    $productdistributions=ProductDistribution::all();
    $adjustments=Adjustment::all();
    $reportings=Reporting::all();
    // dd($productinfos[0]->brand);
    //dd($sections[0]->division);
    return view('setup.product')->with('setuptypes',$setuptypes)
    ->with('securitytypes',$securitytypes)
    ->with('categories',$categories)
    ->with('brands',$brands)
    ->with('productinfos',$productinfos)
    ->with('productreceivetypes',$productreceivetypes)
    ->with('productdistributions',$productdistributions)
    ->with('adjustments',$adjustments)
    ->with('reportings',$reportings);
  }

  public function productPost(Request $request){
    // dd($request->all());
    $this->validate($request,[
      'productCode'=>'required | unique:product_infos',
      'productName'=>'required',
      'categoryName'=>'required',
      'brandName' =>'required'
    ]);
    $brandAvailable=Brand::where('brandName',$request->brandName)->where('category_id',$request->categoryName)->first();
    // dd($brandAvailable);
    if($brandAvailable){
      $productinfo=new ProductInfo;
      $productinfo->productCode=$request->productCode;
      $productinfo->productName=$request->productName;
      $productinfo->brand_id=$brandAvailable->id;
      $productinfo->save();
      $productinfos=ProductInfo::all();
    }
    return redirect()->route('setup.product')->with('response','Successfully Created');;
  }

  public function checkIfProductExist(Request $request)
  {
    if ($request->ajax()) {
      $isExistenceProduct=ProductInfo::find($request->productId);
      if ($isExistenceProduct) {
          if ($isExistenceProduct->productCode!=$request->productCode) {
              $validator=Validator::make($request->all(), [
        'productCode'=>'required | unique:product_infos'
      ]);
              if ($validator->fails()) {
                  return  $validator->errors();
              }
          }
          return "success";
      }
    
      $validator=Validator::make($request->all(), [
        'productCode'=>'required | unique:product_infos'
      ]);
      if ($validator->fails()) {
        return  $validator->errors();
      }
      return "success";
    }
  }
  public function productedit(Request $request,$id)
  { 
    $setuptypes= setuptype::all();
    $securitytypes=SecurityType::all();
    $categories=Category::all();
    $productreceivetypes=ProductReceiveType::all();
    $brands=Brand::all();
    $productinfo=ProductInfo::find($id);
    $productdistributions=ProductDistribution::all();
    $adjustments=Adjustment::all();
    $reportings=Reporting::all();

    return view('setup.productEdit')
          ->with('productinfo',$productinfo)
          ->with('categories',$categories)
          ->with('brands',$brands)
          ->with('setuptypes',$setuptypes)
          ->with('adjustments',$adjustments)
          ->with('securitytypes',$securitytypes)
          ->with('productinfo',$productinfo)
          ->with('productdistributions',$productdistributions)
          ->with('reportings',$reportings)
          ->with('productreceivetypes',$productreceivetypes);

  }
  public function productUpdate(Request $request){
    // dd($request->all());
    $productinfo=ProductInfo::find($request->productId);
    if($productinfo){
      if($productinfo->productCode!=$request->productCode){
        $this->validate($request,[
          'productCode'=>'required | unique:product_infos',
          'productName'=>'required',
          'categoryName'=>'required',
          'brandName' =>'required'
        ]);
      }
      else{
        $this->validate($request,[
          'productName'=>'required',
          'categoryName'=>'required',
          'brandName' =>'required'
        ]);
      }
    
      $brandAvailable=Brand::where('brandName',$request->brandName)->where('category_id',$request->categoryName)->first();
      // dd($brandAvailable);
      if($brandAvailable){
        $productinfo->productCode=$request->productCode;
        $productinfo->productName=$request->productName;
        $productinfo->brand_id=$brandAvailable->id;
        $productinfo->save();
        $productinfos=ProductInfo::all();
      }
    }
    return redirect()->route('setup.product')->with('response','Successfully Updated');;
  }

}

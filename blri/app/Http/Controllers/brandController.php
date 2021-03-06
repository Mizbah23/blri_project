<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\Category;
use App\Brand;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Reporting;
use App\AdjustmentMenu;

class brandController extends Controller
{
  public function index(){
    $setuptypes= setuptype::all();
    $categories= Category::all();
    $brands= Brand::all();
   // dd($categories[0]->brands,$categories[0]->brands()->toSql(),$brands[0]->category()->toSql());
    $securitytypes=SecurityType::all();
    $productreceivetypes=ProductReceiveType::all();
    $productdistributions=ProductDistribution::all();
    $adjustments=AdjustmentMenu::all();
    $reportings=Reporting::all();

    // $brandNames=$brands->unique('brandName')->pluck('brandName');//Get unique brandName
    // dd($brandNames);
    return view('setup.brand')->with('setuptypes',$setuptypes)
    ->with('categories',$categories)
    ->with('brands',$brands)
    ->with('securitytypes',$securitytypes)
    ->with('productreceivetypes',$productreceivetypes)
    ->with('productdistributions',$productdistributions)
    ->with('adjustments',$adjustments)
    ->with('reportings',$reportings);
  }
  public function brandPost(Request $request){
         
       $this->validate( $request,[
      'categories'=>'required',
      'brandName'=>'required|unique:brands,brandName'
      ]);
      
      $brand=new Brand;
      $brand->brandName=$request->brandName;
      $brand->category_id=$request->categories;
      
      $brand->save();
      return redirect()->route('setup.brand')->with('response','Successfully Created');
  }
  public function brandedit(Request $request,$id){
    $securitytypes=SecurityType::all();
    $setuptypes= setuptype::all();
    $categories=Category::all();
    $productreceivetypes=ProductReceiveType::all();
    $productdistributions=ProductDistribution::all();
    $adjustments=AdjustmentMenu::all();
    $reportings=Reporting::all();
    $brand=Brand::find($id);
    return view('setup.brandedit')->with('categories',$categories)->with('setuptypes',$setuptypes)->with('brand',$brand)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('productdistributions',$productdistributions)->with('adjustments',$adjustments)->with('reportings',$reportings);
  }

  public function update(Request $request,$id){

    $this->validate( $request,[
      'categoryName'=>'required',
      'brandName'=>'required|unique:brands,brandName,'.$id
    ]);
    
    $brand=Brand::find($id);
    //$category->categoryName=$request->categoryName;
    $brand->brandName=$request->brandName;
    $brand->category_id=$request->categoryName;
    $brand->save();
      return redirect()->route('setup.brand')->with('response','Successfully Edited');
    
  }

  public function searchByBrandName(Request $request){
    $searchedBrandItems=Brand::where('brandName',$request->brandName)->get();
    
    return view('setup.ajaxBrandSearchedValue')->with('brands',$searchedBrandItems);
  }


}

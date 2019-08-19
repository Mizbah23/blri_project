<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\Category;
use App\Brand;

class brandController extends Controller
{
  public function index(){
    $setuptypes= setuptype::all();
    $categories= Category::all();
    $brands= Brand::all();
    // $brandNames=$brands->unique('brandName')->pluck('brandName');//Get unique brandName
    // dd($brandNames);
    return view('setup.brand')->with('setuptypes',$setuptypes)->with('categories',$categories)->with('brands',$brands);
  }
  public function brandPost(Request $request){
      $brand=new Brand;
      $brand->brandName=$request->brandName;
      $brand->category_id=$request->categories;
    
      $brand->save();
      return redirect()->route('setup.brand');
  }
  public function brandedit(Request $request,$id){
    $setuptypes= setuptype::all();
    $categories=Category::all();
    $brand=Brand::find($id);
    return view('setup.brandedit')->with('categories',$categories)->with('setuptypes',$setuptypes)->with('brand',$brand);
  }

  public function update(Request $request,$id){

    $this->validate( $request,[
      'brandName'=>'required',
    ]);
    
    $brand=Brand::find($id);
    //$category->categoryName=$request->categoryName;
    $brand->brandName=$request->brandName;
    $brand->category_id=$request->categoryName;
    $brand->save();
    return redirect()->route('setup.brand');
  }

  public function searchByBrandName(Request $request){
    $searchedBrandItems=Brand::where('brandName',$request->brandName)->get();
    return view('setup.ajaxBrandSearchedValue')->with('brands',$searchedBrandItems);
  }
}

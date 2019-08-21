<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\Category;
use App\Brand;
use App\ProductInfo;
class productController extends Controller
{
      public function index(){
    	$setuptypes= setuptype::all();
    	$securitytypes=SecurityType::all();
    	$categories=Category::all();
    	$brands=Brand::all();
    	$productinfos=ProductInfo::all();

       
        //dd($sections[0]->division);
        return view('setup.product')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('categories',$categories)->with('brands',$brands)->with('productinfos',$productinfos);
    
      }
      public function productPost(Request $request){
      $productinfo=new ProductInfo;
      $productinfo->PCode=$request->PCode;
      $productinfo->ProductName=$request->ProductName;
      $productinfo->save();
      $productinfos=ProductInfo::all();
      return redirect()->route('setup.product');
  }
}

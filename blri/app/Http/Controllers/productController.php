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
        // dd($productinfos[0]->brand);
        //dd($sections[0]->division);
        return view('setup.product')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('categories',$categories)->with('brands',$brands)->with('productinfos',$productinfos);
    
      }
      public function productPost(Request $request){
<<<<<<< HEAD
      $productinfo=new ProductInfo;
      $productinfo->PCode=$request->PCode;
      $productinfo->ProductName=$request->ProductName;
      $productinfo->save();
      $productinfos=ProductInfo::all();
      return redirect()->route('setup.product');
      }
              public function productedit(Request $request,$id)
     { 
             $setuptypes= setuptype::all();
             $securitytypes=SecurityType::all();
            
             $productinfo=ProductInfo::find($id);
             return view('setup.productedit')->with('productinfo',$productinfo)->with('setuptypes',$setuptypes)->with                                                                   ('securitytypes',$securitytypes);
     }
=======
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
        return redirect()->route('setup.product');
       
  }
>>>>>>> 6c6bc301f1fca43fe85327e13fa75baa2d2f6871
}

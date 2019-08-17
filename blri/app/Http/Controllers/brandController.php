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
      return view('setup.brand')->with('setuptypes',$setuptypes)->with('categories',$categories)->with('brands',$brands);
       }
        public function brandPost(Request $request){
              // dd($request->all());
    	       $setuptypes= setuptype::all();
    	       $categories=Category::all();
               $brand=new Brand;
               $brand->brandName=$request->brandName;
               $brand->category_id=$request->categories;
              
               $brand->save();
              // dd($division);
               $brands=Brand::all();

               
               //$request->session()->put('division',$division);
              // return redirect()->route('setup.division');
	    	  return view('setup.section')->with('setuptypes',$setuptypes)->with('categories',$categories)->with('brands',$brands);
              
               
       }
    
}

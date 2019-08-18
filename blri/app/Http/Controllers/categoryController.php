<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\Category;

class categoryController extends Controller
{
  
   public function index(){
   $setuptypes= setuptype::all();
   $categories= Category::all();
   return view('setup.category')->with('setuptypes',$setuptypes)->with('categories',$categories);
   }
      public function categoryPost(Request $request){
      	       //dd('success');
               $this->validate( $request,[
                
                'categoryName'=>'required|unique:categories',
              
               ]);
    	         $setuptypes= setuptype::all();
               $category=new Category;
               $category->categoryName=$request->categoryName;
               $category->save();
               $categories=Category::all();
               

              return view('setup.category')->with('setuptypes',$setuptypes)->with('categories',$categories);
          }
 }

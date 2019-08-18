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
           public function catedit(Request $request,$id)
     {
     	     
             $setuptypes= setuptype::all();
    	     $category=Category::find($id);
    	       return view('setup.catedit')->with('category',$category)->with('setuptypes',$setuptypes);
     }

     public function update(Request $request,$id)
    {
    	//dd('success');
    	          $this->validate( $request,[
                
                'categoryName'=>'required|unique:categories',
              
               ]);
    	$category=Category::find($id);
    	$category->categoryName=$request->categoryName;
    	$category->save();
      return redirect()->route('setup.category');
    	
    }          
 }

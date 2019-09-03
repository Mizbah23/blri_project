<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\Category;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;


class categoryController extends Controller
{
  
   public function index(){
   $setuptypes= setuptype::all();
   $categories= Category::all();
   $securitytypes=SecurityType::all();
   $productdistributions=ProductDistribution::all();
   $productreceivetypes=ProductReceiveType::all();
   $adjustments=Adjustment::all();
   $reportings=Reporting::all();

   return view('setup.category')
          ->with('setuptypes',$setuptypes)
          ->with('categories',$categories)
          ->with('securitytypes',$securitytypes)
          ->with('productreceivetypes',$productreceivetypes)
          ->with('productdistributions',$productdistributions)
          ->with('adjustments',$adjustments)
          ->with('reportings',$reportings);
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
               

               return redirect()->route('setup.category');
          }
           public function catedit(Request $request,$id)
     {  

     	     $securitytypes=SecurityType::all();     
           $setuptypes= setuptype::all();
           $productdistributions=ProductDistribution::all();
           $productreceivetypes=ProductReceiveType::all();
           $adjustments=Adjustment::all();
           $reportings=Reporting::all();
    	     $category=Category::find($id);
    	       return view('setup.catedit')
             ->with('category',$category)
             ->with('setuptypes',$setuptypes)
             ->with('securitytypes',$securitytypes)
             ->with('productreceivetypes',$productreceivetypes)
             ->with('productdistributions',$productdistributions)
             ->with('adjustments',$adjustments)
             ->with('reportings',$reportings);
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

  public function searchByCategoryName(Request $request){
    $searchedCategoryItem=Category::where('categoryName',$request->categoryName)->get();
    // return $searchedCategoryItem;
  return view('setup.ajaxCategorySearchedValue')->with('categories',$searchedCategoryItem);
  }   
    
 }

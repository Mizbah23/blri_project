<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\division;
use App\Section;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\AdjustmentMenu;
use App\Reporting;


class sectionController extends Controller
{
     public function index(){
    	$setuptypes= setuptype::all();
        $divisions=division::all();
        $sections=Section::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=AdjustmentMenu::all();
        $reportings=Reporting::all();
        
        //dd($sections[0]->division);
        return view('setup.section')->with('setuptypes',$setuptypes)->with('divisions',$divisions)->with('sections',$sections)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('adjustments',$adjustments)->with('reportings',$reportings)->with('productdistributions',$productdistributions);
    }
    public function sectionPost(Request $request){
        $section=new Section;
        $section->sectionName=$request->sectionName;
        $section->division_id=$request->divisions;
        $section->save();
        // dd($division);
        $sections=Section::all();
        
        return redirect()->route('setup.section');
    }
    public function secedit(Request $request,$id){ 
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $divisions=division::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=AdjustmentMenu::all();
        $reportings=Reporting::all();

        $section=Section::find($id);
        return view('setup.secedit')->with('section',$section)->with('setuptypes',$setuptypes)->with('divisions',$divisions)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('adjustments',$adjustments)->with('reportings',$reportings)->with('productdistributions',$productdistributions);
    }
    
    public function update(Request $request,$id){
        //dd($request->all());
        $this->validate( $request,[
        
        'sectionName'=>'required',
        
        ]);
        $section=Section::find($id);
        //$category->categoryName=$request->categoryName;
        $section->sectionName=$request->sectionName;
        $section->division_id=$request->divisions;
        $section->save();

        return redirect()->route('setup.section');
     }

     public function searchBySectionName(Request $request){
        $searchedSectionItems=Section::where('sectionName',$request->sectionName)->get();
        return view('setup.ajaxSectionSearchedValue')->with('sections',$searchedSectionItems);
     }
}
               


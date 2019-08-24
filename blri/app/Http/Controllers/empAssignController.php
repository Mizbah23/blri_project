<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
    use App\setuptype;
	use App\SecurityType;
	use App\ProductReceiveType;

	class empAssignController extends Controller
	{
	      public function index(){
		    	$setuptypes= setuptype::all();
		        $securitytypes = SecurityType::all();
		        $productreceivetypes=ProductReceiveType::all();
		        //dd($sections[0]->division);
		        //return view('setup.employee assign')->with('setuptypes',$setuptypes);
		        return view('setup.employee assign')->with('securitytypes',$securitytypes)->with('setuptypes',$setuptypes)->with('productreceivetypes',$productreceivetypes);
	    
	      }
	}

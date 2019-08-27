<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
    use App\setuptype;
	use App\SecurityType;
	use App\ProductReceiveType;
	use App\EmployeeInformation;
	use App\Project;
    
    class empAssignController extends Controller
	{
	      public function index(){
		    	$setuptypes= setuptype::all();
		        $securitytypes = SecurityType::all();
		        $productreceivetypes=ProductReceiveType::all();
		        $employeeInformations= EmployeeInformation::all();
		        $projects= Project::all();
		        //dd($sections[0]->division);
		        //return view('setup.employee assign')->with('setuptypes',$setuptypes);
		        return view('setup.employee assign')->with('securitytypes',$securitytypes)
		                                            ->with('setuptypes',$setuptypes)
		                                            ->with('productreceivetypes',$productreceivetypes)
		                                            ->with('projects',$projects)
		                                            ->with('employeeInformations',$employeeInformations);
	    }
	}

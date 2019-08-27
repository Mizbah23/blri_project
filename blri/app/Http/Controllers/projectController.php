<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\Project;
use App\EmployeeInformation;



class projectController extends Controller
{
    
     public function index(){
     	$securitytypes=SecurityType::all();
    	$setuptypes= setuptype::all();
    	$productreceivetypes=ProductReceiveType::all();
    	$projects=Project::all();
    	$employeeInformations=EmployeeInformation::all();
        
        //dd($sections[0]->division);
        return view('setup.project')->with('setuptypes',$setuptypes)->with('securitytypes',$securitytypes)->with('productreceivetypes',$productreceivetypes)->with('projects',$projects)->with('employeeInformations',$employeeInformations);
    
      }
          public function projectPost(Request $request){
          	   
               $project=new Project;
               $project->projectName=$request->projectName;
               $project->employee_information_id=$request->name;
               $project->address=$request->address;
               $project->startDate=date('Y-m-d', strtotime(str_replace('-', '/', $request['startDate'])));
               $project->endDate=date('Y-m-d', strtotime(str_replace('-', '/', $request['endDate'])));
               $project->description=$request->description;
               $project->save();
               $projects=Project::all();

               return redirect()->route('setup.project');
       }
}

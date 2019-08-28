<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\EmployeeInformation;
use App\Project;
use App\Emp_assign;

class empAssignController extends Controller
{
	public function index(){
		$setuptypes= setuptype::all();
		$securitytypes = SecurityType::all();
		$productreceivetypes=ProductReceiveType::all();
		$employeeInformations= EmployeeInformation::all();
		$projects= Project::all();
		$assignedEmployees=Emp_assign::all();
		// dd($empAssign[0]->project);
		// dd($empAssign[0]->employeeinfo);
		//dd($sections[0]->division);
		//return view('setup.employee assign')->with('setuptypes',$setuptypes);
		return view('setup.employee assign')
				->with('securitytypes',$securitytypes)
				->with('setuptypes',$setuptypes)
				->with('productreceivetypes',$productreceivetypes)
				->with('assignedEmployees',$assignedEmployees)
				->with('projects',$projects)
				->with('employeeInformations',$employeeInformations);
	}

	public function assignEmployeeStore(Request $request)	
	{

		// dd($request->all());
		$newEmployeeAssign=new Emp_assign;
		$newEmployeeAssign->project_id=$request->projectName;
		$newEmployeeAssign->employee_information_id=$request->employeeName;
		$newEmployeeAssign->date=date('Y-m-d', strtotime(str_replace('-', '/', $request['date'])));
		$newEmployeeAssign->remarks=$request->remarks;
		$newEmployeeAssign->save();
		
		return redirect()->route("setup.employee assign");
	}
}

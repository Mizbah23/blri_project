<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\EmployeeInformation;
use App\Project;
use App\Emp_assign;
use Validator;
use Illuminate\Validation\Rule;

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
		$projectId = $request->projectName;
		$employeeId = $request->employeeName;
		$data = [
			'projectName' => $request->projectName, 
			'employee_information_id' => $request->employeeName,
			'assignDate'=>$request->date,
			'remarks'=>$request->remarks
		];

		// dd($data);
		$validator=Validator::make($data, [
			'employee_information_id' => [
				'required',
				Rule::unique('emp_assigns')->where(function ($query) use($projectId,$employeeId) {
					return $query->where('employee_information_id', $employeeId)
					->where('project_id', $projectId);
				}),
			],
			'projectName'=>'required',
			'assignDate'=>'required | date | after_or_equal: today',
			'remarks'=>'required'
		],[
			'employee_information_id.required'=>'Employee name is required',
			'employee_information_id.unique'=>'This employee is already assign to this project'
		]
		);
		if($validator->fails()){
			$previousProject= Project::find($projectId);
			$request["projectDirector"]=$previousProject->employee_information_id;
			return redirect()
					->route('setup.employee assign')
					->withErrors($validator)
					->withInput($request->all());
		}
		// dd($request->all());
		$newEmployeeAssign=new Emp_assign;
		$newEmployeeAssign->project_id=$request->projectName;
		$newEmployeeAssign->employee_information_id=$request->employeeName;
		$newEmployeeAssign->date=date('Y-m-d', strtotime(str_replace('-', '/', $request['date'])));
		$newEmployeeAssign->remarks=$request->remarks;
		if($request->isActive){
			$newEmployeeAssign->remarks=1;
		}
		$newEmployeeAssign->save();
		
		return redirect()->route("setup.employee assign");
	}
}

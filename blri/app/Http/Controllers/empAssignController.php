<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\EmployeeInformation;
use App\Project;
use App\Emp_assign;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;
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
		$productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
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
				->with('employeeInformations',$employeeInformations)
				->with('productdistributions',$productdistributions)
				->with('adjustments',$adjustments)
				->with('reportings',$reportings);
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
			'assignDate'=>'required | date_format:d/m/Y',
			'remarks'=>'required'
		],[
			'employee_information_id.required'=>'Employee name is required',
			'employee_information_id.unique'=>'This employee is already assign to this project'
		]
		);
		if($validator->fails()){
			if($projectId){
				$previousProject= Project::find($projectId);
				$request["projectDirector"]=$previousProject->employee_information_id;
			}
			return redirect()
					->route('setup.employee assign')
					->withErrors($validator)
					->withInput($request->all());
		}
		// dd($request->all());
		$newEmployeeAssign=new Emp_assign;
		$newEmployeeAssign->project_id=$request->projectName;
		$newEmployeeAssign->employee_information_id=$request->employeeName;
		$newEmployeeAssign->date=date('Y-m-d',  strtotime(str_replace('/','-',$request->date)));
		$newEmployeeAssign->remarks=$request->remarks;
		if($request->isActive){
			$newEmployeeAssign->isActive=1;
		}
		$newEmployeeAssign->save();
		
		return redirect()->route("setup.employee assign");
	}
	public function assignEmployeeEdit($id){

		$setuptypes= setuptype::all();
		$securitytypes = SecurityType::all();
		$productreceivetypes=ProductReceiveType::all();
		$employeeInformations= EmployeeInformation::all();
		$projects= Project::all();
		$assignedEmployee=Emp_assign::find($id);
		if($assignedEmployee){
			return view('setup.employeeAssignEdit')
					->with('securitytypes',$securitytypes)
					->with('setuptypes',$setuptypes)
					->with('productreceivetypes',$productreceivetypes)
					->with('assignedEmployee',$assignedEmployee)
					->with('projects',$projects)
					->with('employeeInformations',$employeeInformations);
		}
		else{
			return redirect()->route("setup.employee assign");
		}
	}
	public function assignEmployeeUpdate(Request $request)	
	{
		// dd($request->all());
		$isEmployeeExistInAssignTable=Emp_assign::find($request->emp_assign_id);
		if($isEmployeeExistInAssignTable){
			$projectId = $request->projectName;
			$employeeId = $request->employeeName;
			$isExistenceEmployee=$isEmployeeExistInAssignTable->employee_information_id;
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
					Rule::unique('emp_assigns')->where(function ($query) use($projectId,$employeeId,$isEmployeeExistInAssignTable) {
						return $query->where('employee_information_id', $employeeId)
						->where('project_id', $projectId)->where('id','<>',$isEmployeeExistInAssignTable->id);
					}),
				],
				'projectName'=>'required',
				'assignDate'=>'required|date_format:d/m/Y',
				'remarks'=>'required'
			],[
				'employee_information_id.required'=>'Employee name is required',
				'employee_information_id.unique'=>'This employee is already assign to this project'
			]
			);
			if($validator->fails()){
				if($projectId){
					$previousProject= Project::find($projectId);
					$request["projectDirector"]=$previousProject->employee_information_id;
				}
				return redirect()
						->route('setup.employee assign.edit',$request->emp_assign_id)
						->withErrors($validator)
						->withInput($request->all());
			}
			// dd($request->all());
			$isEmployeeExistInAssignTable->project_id=$request->projectName;
			$isEmployeeExistInAssignTable->employee_information_id=$request->employeeName;
			$isEmployeeExistInAssignTable->date=date('Y-m-d',  strtotime(str_replace('/','-',$request->date)));
			$isEmployeeExistInAssignTable->remarks=$request->remarks;
			if($request->isActive){
				$isEmployeeExistInAssignTable->isActive=1;
			}
			$isEmployeeExistInAssignTable->save();
		}
		
		
		return redirect()->route("setup.employee assign");
	}
}

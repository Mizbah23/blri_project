<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\Project;
use App\EmployeeInformation;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;

class projectController extends Controller
{
    public function index()
    {
        $securitytypes=SecurityType::all();
        $setuptypes= setuptype::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $projects=Project::all();
        $employeeInformations=EmployeeInformation::all();
        
        //dd($sections[0]->division);
        return view('setup.project')
        ->with('setuptypes', $setuptypes)
        ->with('securitytypes', $securitytypes)
        ->with('productreceivetypes', $productreceivetypes)
        ->with('productdistributions', $productdistributions)
        ->with('adjustments', $adjustments)
        ->with('reportings', $reportings)
        ->with('projects', $projects)
        ->with('employeeInformations', $employeeInformations);
    }
    public function projectPost(Request $request)
    {
        $this->validate($request, [
          'projectName'=>'required | unique:projects,projectName',
          'name'=>'required',
          'address'=>'required',
        ]);
                 
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
    public function projectedit(Request $request, $id)
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $employeeInformations=EmployeeInformation::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $project=Project::find($id);
        return view('setup.projectEdit')
              ->with('project', $project)
              ->with('productreceivetypes', $productreceivetypes)
              ->with('setuptypes', $setuptypes)
              ->with('employeeInformations', $employeeInformations)
              ->with('securitytypes', $securitytypes)
              ->with('productdistributions', $productdistributions)
              ->with('adjustments', $adjustments)
              ->with('reportings', $reportings);
    }
    public function update(Request $request, $id)
    {
        //dd('success');
   
        $this->validate($request, [
          'projectName'=>'required',
          'name'=>'required',
          'address'=>'required',
        ]);
        $project=Project::find($id);
        $project->projectName=$request->projectName;
        $project->employee_information_id=$request->name;
        $project->address=$request->address;
        $project->startDate=date('Y-m-d', strtotime(str_replace('-', '/', $request['startDate'])));
        $project->endDate=date('Y-m-d', strtotime(str_replace('-', '/', $request['endDate'])));
        $project->description=$request->description;
        $project->save();
        return redirect()->route('setup.project');
    }
}

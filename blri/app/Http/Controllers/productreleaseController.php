<?php

namespace App\Http\Controllers;

use App\Project;
use App\division;
use App\Reporting;
use App\setuptype;
use App\Adjustment;
use App\SerialInfo;
use App\SecurityType;
use App\ProductReceiveType;
use App\EmployeeInformation;
use App\ProductDistribution;
use Illuminate\Http\Request;
use App\ProductReleaseInfo;

class productreleaseController extends Controller
{
    public function index(Request $request)
    {
     if ($request->session()->get('user')) {
         $setuptypes= setuptype::all();
         $securitytypes= SecurityType::all();
         $productreceivetypes=ProductReceiveType::all();
         $productdistributions=ProductDistribution::all();
         $adjustments=Adjustment::all();
         $reportings=Reporting::all();
         $projects= Project::all();
         $divisions=division::all();
         $serialInfo=SerialInfo::all();


         return view('product distribution.product release')
               ->with('setuptypes', $setuptypes)
               ->with('securitytypes', $securitytypes)
               ->with('productreceivetypes', $productreceivetypes)
               ->with('productdistributions', $productdistributions)
               ->with('adjustments', $adjustments)
               ->with('divisions', $divisions)
               ->with('projects', $projects)
               ->with('serialInfo', $serialInfo)
               ->with('reportings', $reportings);
     }
     else{
          return "<h2>The route you are looking for is not available.</h2>";
      }
    }

    public function store(Request $request)
    {
          //   dd($request->all());
        $this->validate($request,[
          'serialNo'=>'required | unique:product_release_infos,serial_info_id',
          'releasedate'=>'required | date | after_or_equal: today',
          'deptName'=>'required',
          'projectName'=>'required',
          'employeeName'=>'required'
        ]);

        $newProductReleaseInfo=new ProductReleaseInfo;
        $newProductReleaseInfo->releaseDate=date('Y-m-d',strtotime($request->releaseDate));
        $newProductReleaseInfo->division_id=$request->deptName;
        $newProductReleaseInfo->project_id=$request->projectName;
        $newProductReleaseInfo->employee_information_id=$request->employeeName;
        $newProductReleaseInfo->serial_info_id=$request->serialNo;
        $newProductReleaseInfo->receiveBy=$request->session()->get('user')->id;
        $newProductReleaseInfo->save();

        return redirect()->route('product distribution.product release');

    }

    public function showEmployeeBasedOnProject(Request $request)
    {
        $project=Project::find($request->projectId);

        if($project){
             $allAssignedEmployees=[];
             array_push($allAssignedEmployees, $project->employeeinfo);
              
             $assignedEmployees=$project->assignedEmployees;
             foreach ($assignedEmployees as $key => $item) {
                 array_push($allAssignedEmployees, $item->employeeinfo);
             }
     
             return ["success",$allAssignedEmployees];
        }
        else{
             return ["error"];
        }
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\division;
use App\Section;
use App\Designation;
use App\EmployeeInformation;
use illuminate\Support\Str;
use Image;

class employeeController extends Controller
{
    public function index(){
    	$securitytypes=SecurityType::all();
      $setuptypes= setuptype::all();
      $divisions= division::all();
      $sections= Section::all();
      $designations= Designation::all();
      $employeeInformations= EmployeeInformation::all();
        //dd($sections[0]->division);
      return view('setup.employee')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('divisions',$divisions)
              ->with('sections',$sections)
              ->with('designations',$designations)
              ->with('employeeInformations',$employeeInformations);
    }

    public function employeeStore(Request $request){
      // dd(date('Y-m-d', strtotime(str_replace('/', '-', $request['birthDate']))));
      $sectionIsAvailable=Section::where('sectionName',$request->sectionName)->where('division_id',$request->divisionName)->first();
      $designationId=$request->designationName;
      $designationIsAvailable=Designation::find($designationId);
      if($sectionIsAvailable &&  $designationIsAvailable){
        $maxEmployeeId=EmployeeInformation::max('id');
        if($request->hasFile('profileImage'))
        {
            $image=$request->file('profileImage');
            $extension = $image->getClientOriginalExtension();
            $filenametostore = $request->empName.Str::random(16).$maxEmployeeId.".".$extension;
            $destinationPath = public_path('/images/user');
            $img = Image::make($image->getRealPath());
            $img->resize(480, 480, function ($constraint) {
              $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filenametostore);
        }
        $newEmployee=new EmployeeInformation;
        $newEmployee->name=$request->empName;
        $newEmployee->section_id=$sectionIsAvailable->id;
        $newEmployee->designation_id=$request->designationName;
        $newEmployee->districtName=$designationId;
        $newEmployee->address=$request->address;
        $newEmployee->contactNo=$request->contactNo;
        $newEmployee->nidNo=$request->nidNo;
        $newEmployee->joiningDate=date('Y-m-d', strtotime(str_replace('/', '-', $request['joiningDate'])));
        $newEmployee->birthDate=date('Y-m-d', strtotime(str_replace('/', '-', $request['birthDate'])));
        $newEmployee->workingPlace=$request->workingPlace;
        $request->isRevenue? $newEmployee->isRevenue=1 :  $newEmployee->isRevenue=0;
        $newEmployee->remarks=$request->remarks;
        $newEmployee->profileImage=$filenametostore;
        $newEmployee->save();
      }
      

      return redirect()->route('setup.employee');
    }
}

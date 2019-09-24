<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\division;
use App\Section;
use App\Designation;
use App\District;
use App\EmployeeInformation;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;

use illuminate\Support\Str;
use Image;
use File;

class employeeController extends Controller
{
    public function index(){
    	$securitytypes=SecurityType::all();
      $setuptypes= setuptype::all();
      $divisions= division::all();
      $sections= Section::all();
      $designations= Designation::all();
      $districts= District::all();
      $employeeInformations= EmployeeInformation::all();
      $productreceivetypes=ProductReceiveType::all();
      $productdistributions=ProductDistribution::all();
      $adjustments=Adjustment::all();
      $reportings=Reporting::all();

        //dd($divisions);
      return view('setup.employee')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('divisions',$divisions)
              ->with('sections',$sections)
              ->with('designations',$designations)
              ->with('districts',$districts)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('employeeInformations',$employeeInformations)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('reportings',$reportings);
    }

    public function employeeStore(Request $request){
      $this->validate($request,[
        'name'=>'required',
        'divisionName'=>'required',
        'sectionName'=>'required',
        'designationName'=>'required',
        'address'=>'required',
        'districtName'=>'required',
        'contactNo'=>'required | regex:/(01)[0-9]{9}/|size:11',
        'nidNo'=>'required',
        'joiningDate'=>'required|date_format:d/m/Y| before_or_equal:today',
        'birthDate'=>'required|date_format:d/m/Y| before_or_equal:today',
        'workingPlace'=>'required',
        'remarks'=>'required',
        'profileImage'=>'required | image | mimes:jpeg,jpg,png' ,
      ]
      ,
      [
          'contactNo.size' => 'The contact number has to be 11 character long',
          'contactNo.required' => 'The Contact number is required.',
          'contactNo.regex' => 'The Contact number is invalid.',
      ]);
      // dd(date('Y-m-d', strtotime(str_replace('/', '-', $request['birthDate']))));
      $sectionIsAvailable=Section::where('sectionName',$request->sectionName)->where('division_id',$request->divisionName)->first();
      $designationId=$request->designationName;
      $designationIsAvailable=Designation::find($designationId);
      if($sectionIsAvailable &&  $designationIsAvailable){
        if($request->hasFile('profileImage'))
        {
          $maxEmployeeId=EmployeeInformation::max('id');
          $image=$request->file('profileImage');
          $extension = $image->getClientOriginalExtension();
          $filenametostore = $request->name.Str::random(16).$maxEmployeeId.".".$extension;
          $destinationPath = public_path('/images');
          $img = Image::make($image->getRealPath());
          $img->resize(480, 480, function ($constraint) {
            $constraint->aspectRatio();
          })->save($destinationPath.'/'.$filenametostore);
        }
        $newEmployee=new EmployeeInformation;
        $newEmployee->name=$request->name;
        $newEmployee->section_id=$sectionIsAvailable->id;
        $newEmployee->designation_id=$designationId;
        $newEmployee->district_id=$request->districtName;
        $newEmployee->address=$request->address;
        $newEmployee->contactNo=$request->contactNo;
        $newEmployee->nidNo=$request->nidNo;
        $newEmployee->joiningDate=date('Y-m-d', strtotime(str_replace('/','-',$request->joiningDate)));
        $newEmployee->birthDate=date('Y-m-d', strtotime(str_replace('-', '/', $request['birthDate'])));
        $newEmployee->workingPlace=$request->workingPlace;
        $request->isRevenue? $newEmployee->isRevenue=1 :  $newEmployee->isRevenue=0;
        $newEmployee->remarks=$request->remarks;
        $newEmployee->profileImage=$filenametostore;
        $newEmployee->save();
      }
      
      return redirect()->route('setup.employee')->with('response','Successfully Created');
    }
    public function employeeEdit($id){
      $securitytypes=SecurityType::all();
      $setuptypes= setuptype::all();
      $divisions= division::all();
      $sections= Section::all();
      $designations= Designation::all();
      $employeeInformation= EmployeeInformation::find($id);
      $districts= District::all();
      $productreceivetypes=ProductReceiveType::all();
      $productdistributions=ProductDistribution::all();
      $adjustments=Adjustment::all();
      $reportings=Reporting::all();
        //dd($sections[0]->division);
      return view('setup.employeeEdit')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('divisions',$divisions)
              ->with('sections',$sections)
              ->with('districts',$districts)
              ->with('designations',$designations)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('employeeInformation',$employeeInformation)
              ->with('productdistributions',$productdistributions)
              ->with('adjustments',$adjustments)
              ->with('reportings',$reportings);
    }
    public function employeeUpdate(Request $request){
      $this->validate($request,[
        'name'=>'required',
        'divisionName'=>'required',
        'sectionName'=>'required',
        'designationName'=>'required',
        'address'=>'required',
        'districtName'=>'required',
        'contactNo'=>'required | regex:/(01)[0-9]{9}/|size:11',
        'nidNo'=>'required',
        'joiningDate'=>'required | date | before_or_equal: today',
        'birthDate'=>'required | date| before_or_equal: today',
        'workingPlace'=>'required',
        'remarks'=>'required',
        'profileImage'=>'image | mimes:jpeg,jpg,png' ,
      ],
      
      [
          'contactNo.size' => 'The contact number has to be 11 character long',
          'contactNo.required' => 'The Contact number is required.',
          'contactNo.regex' => 'The Contact number is invalid.',
      ]);
      // dd(date('Y-m-d', strtotime(str_replace('-', '/', $request['birthDate']))));
      $employee=EmployeeInformation::find($request->employeeId);
      if($employee){
        $sectionIsAvailable=Section::where('sectionName',$request->sectionName)->where('division_id',$request->divisionName)->first();
        $designationId=$request->designationName;
        $designationIsAvailable=Designation::find($designationId);
        if($sectionIsAvailable &&  $designationIsAvailable){
          $filenametostore=$employee->profileImage;
          if($request->hasFile('profileImage'))
          {
            $image_path = "images/".$employee->profileImage;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }     
            $maxEmployeeId=EmployeeInformation::max('id');
            $image=$request->file('profileImage');
            $extension = $image->getClientOriginalExtension();
            $filenametostore = $request->name.Str::random(16).$maxEmployeeId.".".$extension;
            $destinationPath = public_path('/images');
            $img = Image::make($image->getRealPath());
            $img->resize(480, 480, function ($constraint) {
              $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filenametostore);
          }
          $employee->name=$request->name;
          $employee->section_id=$sectionIsAvailable->id;
          $employee->designation_id=$designationId;
          $employee->district_id=$request->districtName;
          $employee->address=$request->address;
          $employee->contactNo=$request->contactNo;
          $employee->nidNo=$request->nidNo;
          $employee->joiningDate=date('Y-m-d', strtotime(str_replace('-', '/', $request['joiningDate'])));
          $employee->birthDate=date('Y-m-d', strtotime(str_replace('-', '/', $request['birthDate'])));
          $employee->workingPlace=$request->workingPlace;
          $request->isRevenue? $employee->isRevenue=1 :  $employee->isRevenue=0;
          $employee->remarks=$request->remarks;
          $employee->profileImage=$filenametostore;
          $employee->save();  
        }
      }
      

      return redirect()->route('setup.employee')->with('response','Successfully Updated');
    }
}

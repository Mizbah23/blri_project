<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\division;
use App\Section;
use App\Designation;
use App\EmployeeInformation;
use App\ProductReceiveType;
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
      $productreceivetypes=ProductReceiveType::all();
        //dd($sections[0]->division);
      return view('setup.employee')
              ->with('setuptypes',$setuptypes)
              ->with('securitytypes',$securitytypes)
              ->with('divisions',$divisions)
              ->with('sections',$sections)
              ->with('designations',$designations)
              ->with('productreceivetypes',$productreceivetypes)
              ->with('employeeInformations',$employeeInformations);
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
        'joiningDate'=>'required | date | before_or_equal: today',
        'birthDate'=>'required | date| before_or_equal: today',
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
        $maxEmployeeId=EmployeeInformation::max('id');
        if($request->hasFile('profileImage'))
        {
            $image=$request->file('profileImage');
            $extension = $image->getClientOriginalExtension();
            $filenametostore = $request->name.Str::random(16).$maxEmployeeId.".".$extension;
            $destinationPath = public_path('/images/user');
            $img = Image::make($image->getRealPath());
            $img->resize(480, 480, function ($constraint) {
              $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filenametostore);
        }
        $newEmployee=new EmployeeInformation;
        $newEmployee->name=$request->name;
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

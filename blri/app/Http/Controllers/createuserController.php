<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;
use App\User;
use App\EmployeeInformation;


class createuserController extends Controller
{
   public function index(){
    $setuptypes= setuptype::all();
    $securitytypes= SecurityType::all();
    $productreceivetypes=ProductReceiveType::all();
    $productdistributions=ProductDistribution::all();
    $adjustments=Adjustment::all();
    $reportings=Reporting::all();
    $users=User::all();
    $employeeInformations= EmployeeInformation::all();
    return view('security.create user')
                 ->with('setuptypes',$setuptypes)
                 ->with('securitytypes',$securitytypes)
                 ->with('productreceivetypes',$productreceivetypes)
                 ->with('productdistributions',$productdistributions)
                 ->with('reportings',$reportings)
                 ->with('users',$users)
                 ->with('adjustments',$adjustments)
                 ->with('employeeInformations',$employeeInformations);
  }

  public function userPost(Request $request){
      	//dd('success');
    	$this->validate($request,[
          'name'=>'required',
          'userType'=>'required',
          'email'=>'required|unique:users',
          'password' =>'required',
        ]);
      $user=new User;
      $user->employee_information_id=$request->name;
      $user->userType=$request->userType;
      $user->email=$request->email;
      $user->password=$request->password;
       
    
      $user->save();
      return redirect()->route('security.create user');
    
      }

      public function userEdit(Request $request,$id){
        //dd('success');
        $setuptypes= setuptype::all();
        $securitytypes= SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $employeeInformations= EmployeeInformation::all();
        $users=User::find($id);
       
        return view('security.useredit')
                 ->with('setuptypes',$setuptypes)
                 ->with('securitytypes',$securitytypes)
                 ->with('productreceivetypes',$productreceivetypes)
                 ->with('productdistributions',$productdistributions)
                 ->with('reportings',$reportings)
                 ->with('user',$users)
                 ->with('adjustments',$adjustments)
                 ->with('employeeInformations',$employeeInformations);
    
      }

      public function update(Request $request,$id){
          $this->validate($request,[
          'name'=>'required',
          'userType'=>'required',
          'email'=>'required|unique:users',
          'password' =>'required',
        ]);
      
      $user=User::find($id);
      $user->employee_information_id=$request->name;
      $user->userType=$request->userType;
      $user->email=$request->email;
      $user->password=$request->password;
      // dd($user);
    
      $user->save();
      return redirect()->route('security.create user');
    
      }
}

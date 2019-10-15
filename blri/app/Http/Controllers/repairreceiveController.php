<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setuptype;
use App\SecurityType;
use App\ProductReceiveType;
use App\ProductDistribution;
use App\Adjustment;
use App\Reporting;//model name;
use App\User;
use App\EmployeeInformation;
use App\ProductInfo;
use App\SerialInfo;
use App\Repairer;
use App\RepairReceive;


class repairreceiveController extends Controller
{
    public function index()
    {
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $products=ProductInfo::all();
        $serialInfos=SerialInfo::all();
        $repairers=Repairer::all();
        $receives=RepairReceive::all();
        $users=User::all();

    return view('product distribution.repair receive')
           ->with('setuptypes',$setuptypes)
           ->with('securitytypes',$securitytypes)
           ->with('productreceivetypes',$productreceivetypes)
           ->with('productdistributions',$productdistributions)
           ->with('adjustments',$adjustments)
           ->with('reportings',$reportings)
           ->with('products',$products)
           ->with('serialInfos',$serialInfos)
           ->with('repairers',$repairers)
           ->with('receives',$receives)
           ->with('users',$users);
	}

   public function repairReceivePost(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'repairerName'=>'required',
            'productName'=>'required',
            'serial_no'=>'required|unique:repair_receives,serial_id',
            'receiveDate'=>'required|date_format:d/m/Y| before_or_equal: today'
        ]);
            
      
        $repairReceive=new RepairReceive;
        $repairReceive->serial_id=$request->serial_no;
        $repairReceive->repairer_id=$request->repairerName;
        $repairReceive->user_id=$request->session()->get('user')->id;
        $repairReceive->receiveDate=date('Y-m-d', strtotime(str_replace('/', '-', $request->receiveDate)));
        $repairReceive->comments=$request->comments;

        // dd($productrepair);
        
        $repairReceive->save();

        
        //dd($repairReceive);

        return redirect()->route('product distribution.repair receive')->with('response','Product Successfully Received from Repair');
        }

      public function edit(Request $request,$id){
        $isAvailable= RepairReceive::find($request->id);
        // dd($isAvailable);
         if($isAvailable){ 
        $setuptypes= setuptype::all();
        $securitytypes=SecurityType::all();
        $productreceivetypes=ProductReceiveType::all();
        $productdistributions=ProductDistribution::all();
        $adjustments=Adjustment::all();
        $reportings=Reporting::all();
        $products=ProductInfo::all();
        $serialInfos=SerialInfo::all();
        $repairers=Repairer::all();
        $receives=RepairReceive::all();
        $users=User::all();

    return view('product distribution.repairReceiveEdit')
           ->with('setuptypes',$setuptypes)
           ->with('securitytypes',$securitytypes)
           ->with('productreceivetypes',$productreceivetypes)
           ->with('productdistributions',$productdistributions)
           ->with('adjustments',$adjustments)
           ->with('reportings',$reportings)
           ->with('products',$products)
           ->with('serialInfos',$serialInfos)
           ->with('repairers',$repairers)
           ->with('repairReceiveItem',$isAvailable)
           ->with('users',$users);
        
        }


    }
     public function update(Request $request,$id){

        $this->validate($request, [
            'repairerName'=>'required',
            'productName'=>'required',
            'serial_no'=>'required|unique:repair_receives,serial_id,'.$id,
            'receiveDate'=>'required|date_format:d/m/Y| before_or_equal: today'
        ]);
            
        //find($id);
        $repairReceive=ProductRepair::find($id);
        $repairReceive->serial_id=$request->serial_no;
        $repairReceive->repairer_id=$request->repairerName;
        $repairReceive->user_id=$request->session()->get('user')->id;
        $repairReceive->receiveDate=date('Y-m-d', strtotime(str_replace('/', '-', $request->receiveDate)));
        $repairReceive->comments=$request->comments;

        dd($repairReceive);
        
        $repairReceive->save();

        
   

        return redirect()->route('product distribution.repair receive')->with('response','Successfully Product Received from Repair');

  }
}

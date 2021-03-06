<form class="form-horizontal" method="post" autocomplete="off" id="editForm" > <!--Form for grideview-->
  @method('put')
  @csrf
  <div class="form-group">
      <div class="row" style="border:2px solid #EEE;padding:20px">

      {{-- <div class="col-lg-3"><br>
      <input type="radio" name="release"required><b> Relase to Department</b><br>
      <input type="radio" name="release"required><b> Release To Store</b> 
      </div> --}}

      <div class="col-lg-4">
          
        <label for="releaseDate"><b>খালাসের তারিখ:</b></label>
        <input type="text" class="form-control datepicker" name="releaseDate" placeholder="dd/mm/yyyy" value="{{old('releaseDate',date('d/m/Y',strtotime(str_replace('-','/',$availableProductReleaseInfo->releaseDate))))}}" required>
        <div class="error">{{$errors->first('releaseDate')}}</div><br>
        <label for="deptName"><b>বিভাগের নাম:</b></label>
        <select id="deptName" name="deptName" class="form-control required" required>
          <option value="">নির্বাচন করুন</option>
          @foreach ($divisions  as $division)
         <option value="{{$division->id}}" @if (old('deptName',$availableProductReleaseInfo->division_id)==$division->id)
             {{"selected"}}
         @endif >{{$division->divisionName}}</option>
          @endforeach
       </select>
       <div class="error">{{$errors->first('deptName')}}</div>
      </div>

      <div class="col-lg-1"></div>

      <div class="col-lg-4">
        <label for="project"><b>প্রকল্প:</b></label><br>
        <select id="projectName" name="projectName" onchange="showEmployee()" class="form-control required" required>
          <option value="">নির্বাচন করুন</option>
          @foreach ($projects  as $project)
          <option value="{{$project->id}}" @if (old('projectName',$availableProductReleaseInfo->project_id)==$project->id)
              {{"selected"}}
          @endif >{{$project->projectName}}</option>
          @endforeach
       </select><br>
       <div class="error">{{$errors->first('projectName')}}</div>
        <label for="employee"><b>কর্মকর্তা:</b></label><br>
        <select id="employeeName" name="employeeName" class="form-control required" required>
          <option value="">নির্বাচন করুন</option>
          @if (old('projectName',$availableProductReleaseInfo->project_id))
           @foreach ($assignedEmployees  as $key=>$assignedEmployee)
             <option value="{{$assignedEmployee->id}}" @if (old('employeeName',$availableProductReleaseInfo->employee_information_id)==$assignedEmployee->id)
               {{"selected"}} 
               @endif>{{$assignedEmployee->name}}
             </option>
           @endforeach
          @endif
          
       </select>
       <div class="error">{{$errors->first('employeeName')}}</div>
      </div>
      </div>  
  </div>
  
  <div class="row" style="border:2px solid #EEE;padding:15px;margin: -16px">
    <div class="col-lg-5">
    <label for="serialNo"><b>সিরিয়াল নং</b></label>
    <select id="serialNo" name="serialNo" class="form-control required" required>
        <option value="">Select serial No of Product</option>
        @foreach ($serialInfo  as $item)
        <option value="{{$item->id}}" @if (old('serialNo',$availableProductReleaseInfo->serial_info_id)==$item->id)
            {{"selected"}}
        @endif >{{$item->serial_no}}</option>
        @endforeach
      </select>
      <div class="error">{{$errors->first('serialNo')}}</div>
    <br>
    <center>
      <input type="hidden" name="productReleaseInfoId" value="{{$availableProductReleaseInfo->id}}">
      <button type="button" class="btn btn-success" onclick="updateContent()"><i class="glyphicon glyphicon-edit"
      style="color:white" ></i>হালনাগাদ করুন</button>
      <button type="button"class="btn btn-danger">বাতিল করুন</button>
    </center>
    </div>
       
     <div class="col-lg-7"><br>
         <table class="table table-responsive table-hover table-striped table-bordered table-condensed">
            <thead >
              <tr class="row bg-primary">
              
              <th class="col-lg-2 text-center">পণ্যের নাম</th>
              <th class="col-lg-3 text-center">সিরিয়াল নং</th>
              <th class="col-lg-3 text-center">কর্মকর্তার নাম</th>
              <th class="col-lg-3 text-center">বিভাগ</th>
              <th class="col-lg-3 text-center">সম্পাদনা</th>
              <th class="col-lg-3 text-center">মুছে ফেলুন</th>
              </tr>
            </thead>
            <tbody  align="center">
              @foreach ($productReleaseInfo as $key=>$item)
              @if ($item->status=="pending")
              <tr class="row">
                
                <td>{{$item->serialInfo->productInfo->productName}}</td>
                <td>{{$item->serialInfo->serial_no}}</td>
                <td>{{$item->employeeinfo->name}}</td>
                <td>{{$item->division->divisionName}}</td>
                 <td class="text-center"> <a href="#"class="glyphicon glyphicon-edit" onclick="handleEdit($item->id)" style="font-size:24px; color: #1bc9f5"></i></a></td>
                   <td> <a href="#" onclick="deleteItem({{$item->id}})" class="glyphicon glyphicon-trash" style="font-size:24px"></i></a></td>
              </tr>
              @endif
              @endforeach
            </tbody>
         </table>
     </div>
  </div>
</form>
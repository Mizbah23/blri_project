<form class="form-horizontal" method="post" autocomplete="off" id="editForm"> 
    @csrf
    @method('put')
    <div class="form-group"> <!--Form-->

      <div class="row">
          <div class="col-md-4" >
              <div class="col-md-3">
                   <label for="supplierName" class=" control-label">Supplier</label>
              </div>
              <div class="col-md-9">
                  <select id="supplierName" name="supplierName" class="form-control required" required onchange="showSupplierOtherInfo()">
                   <option value="">Select Supplier</option>
                   @foreach ($suppliers as $supplier)
                    <option value="{{$supplier->id}}" @if (old('supplierName',$productReceiveList->supplier_id)==$supplier->id)
                        {{"selected"}}
                    @endif>{{$supplier->supplierName}}</option>
                   @endforeach
                </select>
                <div class="error">{{$errors->first('supplierName')}}</div>
              </div><br><br>

              <div class="col-md-3">
                   <label for="productName" class=" control-label">Product</label>
              </div>
              <div class="col-md-9">
                  <select id="productName" name="productName" class="form-control required" required onchange="showProductCode()">
                   <option value="">Select Product</option>
                   @foreach ($products->unique('productName')->pluck('productName') as $productName)
                   <option value="{{$productName}}" @if (old('productName',$productReceiveList->productInfo->productName)==$productName)
                      {{"selected"}}
                  @endif>{{$productName}}</option>
                  @endforeach
                </select>
                <div class="error">{{$errors->first('productName')}}</div>
              </div><br><br>

              <div class="col-md-3">
                <label for="productCode" class=" control-label">Product Code</label>
              </div>
              <div class="col-md-9">
                <select id="productCode" name="productCode" class="form-control required" required>
                 <option value="">Select Product Code</option>
                 @if(old('productName',$productReceiveList->productInfo->productName))
                  @foreach ($products as $product)
                  @if(old('productName',$productReceiveList->productInfo->productName)==$product->productName)
                    <option value="{{$product->id}}" @if (old('productCode',$productReceiveList->productInfo->id)==$product->id)
                        {{"selected"}}
                    @endif>{{$product->productCode}}</option>
                  @endif
                  @endforeach
                @endif
              </select>
              <div class="error">{{$errors->first('productCode')}}</div>
            </div><br><br>

              
         </div>

          <div class="col-md-4" >
              
          <div class="col-md-3">
              <label for="address" class=" control-label">Address</label>
              </div>
              <div class="col-md-9">
                 <input type="text" class="form-control" id="address" name="address" value="{{old('address',$productReceiveList->supplierInfo->address)}}" placeholder="Address can not be empty" required readonly>
                 <div class="error">{{$errors->first('address',$productReceiveList->supplierInfo->contactNo)}}</div>
              </div><br><br>

              <div class="col-md-3">
                <label for="orderNo" class=" control-label">OrderNo.</label>
              </div>
              <div class="col-md-9">
                <input type="text" class="form-control" id="orderNo" name="orderNo" value="{{old('orderNo',$productReceiveList->orderNo)}}" placeholder="Order no can not be empty"required>
                <div class="error">{{$errors->first('orderNo')}}</div>
              </div><br><br>


              <div class="col-md-3">
              <label for="projectName" class=" control-label">Project</label>
              </div>
              <div class="col-md-9">
                  <select id="projectName" name="projectName" class="form-control required" required>
                   <option value="">Select Project</option>
                   @foreach ($projects as $project)
                   <option value="{{$project->id}}" @if (old('projectName',$productReceiveList->project_id)==$project->id)
                      {{"selected"}}
                  @endif>{{$project->projectName}}</option>
                  @endforeach
                </select>
                <div class="error">{{$errors->first('projectName')}}</div>
              </div><br><br>

              <div class="col-md-3">
              
              </div>

          </div>

          <div class="col-md-4" >
              <div class="col-md-3">
               <label for="contactNo" class=" control-label">Mobile</label>
              </div>
              <div class="col-md-9">
                 <input type="text" class="form-control" id="contactNo" name="contactNo" value="{{old('contactNo',$productReceiveList->supplierInfo->mobile)}}" placeholder="Mobile no can not be empty" required readonly>
                <div class="error">{{$errors->first('contactNo')}}</div>
              </div><br><br>

              <div class="col-md-3">
              <label for="quantity" class=" control-label">Quantity</label>
              </div>
              <div class="col-md-9">
                 <input type="number" class="form-control" id="quantity" name="quantity" value="{{old('quantity',$productReceiveList->quantity)}}" placeholder="Quantity can not be empty" required>
                 <div class="error">{{$errors->first('quantity')}}</div>
              </div>
              <br><br>

              <div class="col-md-3">
              <label for="" class=" control-label">Date</label>
              </div>
              <div class="col-md-9">
                <input class="form-control datepicker" type="text" id="receiveDate" name="receiveDate" placeholder="mm/dd/yyyy"  value="{{old('receiveDate',date('m/d/Y',strtotime($productReceiveList->receiveDate)))}}"  required><br>
                <div class="error">{{$errors->first('receiveDate')}}</div>
              </div><br><br>
          
          </div>
          <div class="text-center">
            <input type="hidden" name="productReceiveListId" value="{{$productReceiveList->id}}">
            <button type="button" onclick="updateContent()" class="btn btn-success"><i class="glyphicon glyphicon-edit" style="color: white"></i> হালনাগাদ করুন</button> 
            <button type="button" class="btn btn-danger" onclick="cancelUpdate()">বাতিল করুন</button><br><br>
          </div>

    </div>
    
  </div>
</form>
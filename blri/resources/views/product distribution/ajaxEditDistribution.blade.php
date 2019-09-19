<form class="form-horizontal" method="post" autocomplete="off" id="editForm"> 
    @csrf
    @method('put')
 <div class="form-group">
                          
                          <div class="row" style="border: solid 1px #eee; padding: 20px">
                              <div class="col-md-3"></div>
                  
                  
                              <div class="col-md-6">
                                  <div class="col-md-3">
                                      <label for="divisionName" class="col-sm-2 control-label">অনুষদ</label>
                                  </div>
                                  <div class="col-md-9">
                                      <select class="form-control" id="divisionName" name="divisionName">
                                          <option value="">Select Department</option>
                                          @foreach($divisions as $division)
                                          <option value="{{$division->id}}">{{$division->divisionName}}</option>
                                          @endforeach
                                      </select>
                                  </div><br><br>
                              </div>
                              <div class="col-md-3"></div>
                  
                          </div><br>
                  
                  
                          <div class="row">
                              <div class="col-md-5" style="border: solid 2px #eee; padding: 20px">
                                  <div class="col-md-4">
                                      <label for="categoryName" class=" control-label">Category</label>
                                  </div>
                                  <div class="col-md-8">
                                      <select id="categoryName" name="categoryName" onchange="showBrand()" class="form-control required"
                                          required value="{{old('categoryName')}}">
                                          <div class="error" style="color:red">{{$errors->first('categoryName')}}</div><br><br>
                                          <option value="">নির্বাচন করুন</option>
                                          @foreach($categories as $category)
                                          <option value="{{$category->id}}"
                                              {{old('categoryName',$category->categoryName)==$category->id ?"selected":""}}>
                                              {{$category->categoryName}}</option>
                                          @endforeach
                                      </select>
                                  </div><br><br>
                                  <div class="col-md-4">
                                      <label for="brandName" class=" control-label">Brand</label>
                                  </div>
                                  <div class="col-md-8">
                                      <select id="brandName" name="brandName" class="form-control required" required
                                          onchange="showProductName()">
                                          <div class="error" style="color:red">{{$errors->first('brandName')}}</div><br><br>
                                          <option value="">নির্বাচন করুন</option>
                                          @if(old('categoryName'))
                                          @foreach($brands as $brand)
                                          @if (old('categoryName') == $brand->category->id)
                                          <option value="{{$brand->brandName}}" {{old('brandName')==$brand->brandName?"selected":""}}>
                                              {{$brand->brandName}}</option>
                                          @endif
                                          @endforeach
                                          @endif
                  
                                      </select>
                                  </div><br><br>
                                  <div class="col-md-4">
                                      <label for="productName" class=" control-label">Product</label>
                                  </div>
                                  <div class="col-md-8">
                                      <select class="form-control" id="productName" name="productName" required " onchange="showProductCode() ">
                                        <option value="">পণ্য সনাক্তকরণ</option>
                                        {{-- @foreach($serialInfos as $serialInfo)=
                                            <option value=" {{$serialInfo->productInfo->id}}" @if(old('productName')==$serialInfo->productInfo->productName)
                                          {{"selected"}}
                                          @endif>{{$serialInfo->productInfo->productName}}</option>
                                        @endforeach --}}
                                      </select>
                                  </div><br><br>
                                  <div class="col-md-4">
                                    <label for="productCode" class=" control-label">Product Code</label>
                                  </div>
                                  <div class="col-md-8">
                                      <select id="productCode" name="productCode" class="form-control required" onchange="showSerialInfo()" required>
                                      <option value="">Select Product Code</option>
                                      @if(old('productName'))
                                        @foreach ($products as $product)
                                        @if(old('productName')==$product->productName)
                                          <option value="{{$product->id}}" @if (old('productCode')==$product->id)
                                              {{"selected"}}
                                          @endif>{{$product->productCode}}</option>
                                        @endif
                                        @endforeach
                                      @endif
                                    </select>
                                    <div class="error">{{$errors->first('productCode')}}</div>
                                  </div><br><br>
                                  <div class="col-md-4">
                                      <label for="serial_no" class="control-label">SL No</label>
                                  </div>
                                  <div class="col-md-8">
                                      <select id="serial_no" name="serial_no" class="form-control required" value="{{old('serial_no')}}"
                                          required readonly>
                                          <option value="">Select Serial Code</option>
                                          {{-- @if(old('productName'))
                                                    @foreach ($serialInfos as $serialInfo)
                                                     @if(old('productName')==$serialInfo->productInfo->productName)
                                                      <option value="{{$serialInfo->id}}" @if (old('id')==$serialInfo->id)
                                          {{"selected"}}
                                          @endif>{{$serialInfo->id}}</option>
                                          @endif
                                          @endforeach
                                          @endif --}}
                  
                                      </select>
                                  </div><br><br>
                                  <div class="col-md-4">
                                      <label for="remarks" class=" control-label">Remarks</label>
                                  </div>
                                  <div class="col-md-8">
                                      <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea><br><br>
                  
                                  </div><br><br>
          <div class="text-center">
            <input type="hidden" name="productDistributionListId" value="{{$productDistributionList->id}}">
            <button type="button" onclick="updateContent()" class="btn btn-success"><i class="glyphicon glyphicon-edit" style="color: white"></i> Update</button> 
            <button type="button" class="btn btn-danger" onclick="cancelUpdate()">Cancel</button><br><br>
          </div>

    </div>
    
  </div>
</div>
</form>
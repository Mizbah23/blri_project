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
                                          <option value="{{$division->id}}" @if (old('divisionName',$productDistributionList->division_id)==$division->id)
                                              {{"selected"}}
                                          @endif>{{$division->divisionName}}</option>
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
                                          required >
                                          <div class="error" style="color:red">{{$errors->first('categoryName')}}</div><br><br>
                                          <option value="">নির্বাচন করুন</option>
                                          @foreach($categories as $category)
                                          <option value="{{$category->id}}"
                                              {{old('categoryName',$productDistributionList->serialInfo->productInfo->brand->category->id)==$category->id ?"selected":""}}>
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
                                          @if(old('categoryName',$productDistributionList->serialInfo->productInfo->brand->category->id))
                                            @foreach($brands as $brand)
                                                @if (old('categoryName',$productDistributionList->serialInfo->productInfo->brand->category->id) == $brand->category->id)
                                                <option value="{{$brand->id}}" {{old('brandName',$productDistributionList->serialInfo->productInfo->brand_id)==$brand->id?"selected":""}}>
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
                                      <select class="form-control" id="productName" name="productName" required onchange="showSerialInfo()">
                                        <option value="">পণ্য সনাক্তকরণ</option>
                                        @if (old('brandName',$productDistributionList->serialInfo->productInfo->brand_id))
                                        @foreach($selectedProductBasedOnBrand->unique('productName') as $product)
                                            <option value="{{$product->id}}" @if(old('productName',$productDistributionList->serialInfo->product_info_id)==$product->id)
                                            {{"selected"}}
                                            @endif>{{$product->productName}}</option>
                                        @endforeach
                                        @endif
                                      </select>
                                  </div><br><br>

                                  <div class="col-md-4">
                                      <label for="serial_no" class="control-label">SL No</label>
                                  </div>
                                  <div class="col-md-8">
                                      <select id="serial_no" name="serial_no" class="form-control required" value="{{old('serial_no')}}"required readonly>
                                        <option value="">Select Serial Code</option>
                                        @if(old('productName',$productDistributionList->serialInfo->product_info_id))
                                            @foreach ($serialInfos as $serialInfo)
                                                @if(old('productName',$productDistributionList->serialInfo->product_info_id)==$serialInfo->product_info_id)
                                                <option value="{{$serialInfo->id}}" @if (old('serial_no',$productDistributionList->serial_id)==$serialInfo->id)
                                                {{"selected"}}
                                                @endif>{{$serialInfo->serial_no}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                  
                                      </select>
                                  </div><br><br>
                                  <div class="col-md-4">
                                      <label for="remarks" class=" control-label">Remarks</label>
                                  </div>
                                  <div class="col-md-8">
                                      <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks">{{old('remarks',$productDistributionList->remarks)}}</textarea><br><br>
                  
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
<form class="form-horizontal" method="post" autocomplete="off" id="editForm"> 
    @csrf
    @method('put')
                <div class="form-group">
                      <div class="row">

                      <div class="col-lg-6">


                         <div class="col-lg-4">
                            <label for="name">কর্মচারীর নাম</label><br>
                         </div>
                         <div class="col-lg-8">
                                <select id="name" name="name" class="form-control required" required >
                                 <option value="">নির্বাচন করুণ</option>
                                   @foreach ($employeeinformations  as $employeeinformation)
                                    <option value="{{$employeeinformation->id}}" @if(old('name',$requisitionList->employeeinfo->name)==$employeeinformation->name){{"selected"}} @endif >{{$employeeinformation->name}}</option>
                                   @endforeach
                     
                              </select>
                              <div class="error" style="color: red">
                                {{$errors->first('name')}}</div>
                         </div><br><br>

                           <div class="col-lg-4">
                            <label for="categoryName">ক্যাটাগরি</label>
                         </div>
                         <div class="col-lg-8">
                            <select id="categoryName" name="categoryName" onchange="showBrand()" class="form-control required" required value="{{old('categoryName')}}">
                                <option value="" >নির্বাচন করুন</option>
                                @foreach($products as $product)
                                 <option value="{{$product->brand->category->id}}"{{old('categoryName',$requisitionList->productInfo->brand->category_id)==$product->brand->category->id ?"selected":""}}>{{$product->brand->category->categoryName}}</option>
                                 @endforeach
                              </select>
                                <div class="error" style="color: red">{{$errors->first('categoryName')}}</div>
                             </div><br><br>

                         <div class="col-lg-4">
                            <label for="brandName">ব্র্যান্ড</label>
                         </div>
                         <div class="col-lg-8">
                            <select class="form-control" id="brandName" name="brandName" required onchange="showProductName()" value="{{old('brandName',$requisitionList->productInfo->brand->brandName) }}">
                              <option value="">ব্র্যান্ড সনাক্তকরণ</option>
                                 
                               @foreach($products as $product)
                                   
                                      <option value="{{$product->brand->brandName}}" {{old('brandName',$requisitionList->productInfo->brand->brandName)==$product->brand->brandName?"selected":""}}  >{{$product->brand->brandName}}</option>
                                   
                                  @endforeach 
                               
                            </select>
                         </div><br><br>
               

                     </div>

                      <div class="col-lg-6">
                        <div class="col-lg-4">
                          <label for="requisitionDate">তারিখ</label>
                        </div>
                        <div class="col-lg-8">
                           <input type="text" class="form-control datepicker" id="requisitionDate" name="requisitionDate" placeholder="মাস/দিন/বছর" required value="{{date('m/d/Y',strtotime($requisitionList->requisitionDate))}}">
                        </div><br><br>
                        <div class="col-lg-4">
                          <label for="productName">পণ্য</label>
                        </div>
                        <div class="col-lg-8">
                           <select class="form-control" id="productName" name="productName" required onchange="showProductCode()" value="{{ old('productName') }}">
                              <option value="">পণ্য সনাক্তকরণ</option>
                               @foreach ($products->unique('productName')->pluck('productName') as $productName)
                                 <option value="{{$productName}}" @if (old('productName',$requisitionList->productInfo->productName)==$productName)
                                    {{"selected"}}
                                @endif>{{$productName}}</option>
                                @endforeach
                            </select>
                             <div class="error" style="color: red">{{$errors->first('productName')}}</div>
                        </div><br><br>
                      
                        <div class="col-lg-4">
                          <label for="productCode" class=" control-label">Product Code</label>
                        </div>
                        <div class="col-lg-8">
                        
                             <select id="productCode" name="productCode" class="form-control required" value="{{old('productCode')}}" required readonly>
                               <option value="">Select Product Code</option>
                              
                              @if(old('productName',$requisitionList->productInfo->productName))
                                @foreach ($products as $product)
                                @if(old('productName',$requisitionList->productInfo->productName)==$product->productName)
                                  <option value="{{$product->id}}" @if (old('productCode',$requisitionList->product_info_id)==$product->id)
                                      {{"selected"}}
                                  @endif>{{$product->productCode}}</option>
                                @endif
                                @endforeach
                              @endif
                              
                            </select>
                            <div class="error" style="color: red">{{$errors->first('productCode')}}</div>

                        </div><br><br>

                        <div class="col-lg-4">
                          <label for="">পরিমাণ</label>
                        </div>
                        <div class="col-lg-8">
                           <input class="form-control" type="number" name="quantity" placeholder="অবশ্যই পূরণ করুন" value="{{old('quantity',$requisitionList->quantity)}}" required>
                              <div class="error" style="color: red">{{$errors->first('quantity')}}</div>
                        </div><br><br><br>
                       
            <div class="text-center">
            <input type="hidden" name="id" value="{{$requisitionList->id}}">
            <button type="button" onclick="updateContent()" class="btn btn-success"><i class="glyphicon glyphicon-edit" style="color: white"></i> Update</button> 
            <button type="button" class="btn btn-danger" onclick="cancelUpdate()">Cancel</button><br><br>
          </div>

                        
          </div>
                
        </div>
    </div>
</form>
<form class="form-horizontal" method="post" autocomplete="off" novalidate id="editForm"> 
    @csrf
    @method('put')
    <div class="form-group"> <!--Form-->
        <div class="row">
            <div class="col-md-4" >
                <div class="col-md-3">
                    <label for="adjustmentDate" class=" control-label">তারিখ</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control datepicker" type="text" id="adjustmentDate" name="adjustmentDate" placeholder="mm/dd/yyyy"  value="{{old('adjustmentDate',date('d/m/Y',strtotime($selectedAdjustmentInfo->adjustmentDate)))}}"  required><br>
                    <div class="error">{{$errors->first('adjustmentDate')}}</div>                              
                </div><br><br>

                <div class="col-md-3">
                    <label for="type" class=" control-label">ধরন</label>
                </div>
                <div class="col-md-9">
                    <select id="type" name="type" class="form-control required" required onchange="">
                        <option value="">সমন্বয়ের ধরন নির্বাচন করুন</option>
                        <option value="খুঁজে পাওয়া" {{old("type",$selectedAdjustmentInfo->adjustmentType)=='খুঁজে পাওয়া'?"selected":""}}>খুঁজে পাওয়া</option>
                        <option value="নিখোঁজ" {{old("type",$selectedAdjustmentInfo->adjustmentType)=='নিখোঁজ'?"selected":""}}>নিখোঁজ</option>
                        <option value="উপহার" {{old("type",$selectedAdjustmentInfo->adjustmentType)=='উপহার'?"selected":""}}>উপহার</option>
                        <option value="ক্ষতি" {{old("type",$selectedAdjustmentInfo->adjustmentType)=='ক্ষতি'?"selected":""}}>ক্ষতি</option>
                        <option value="অপব্যয়" {{old("type",$selectedAdjustmentInfo->adjustmentType)=='অপব্যয়'?"selected":""}}>অপব্যয়</option>
                        <option value="পরিত্যক্ত" {{old("type",$selectedAdjustmentInfo->adjustmentType)=='পরিত্যক্ত'?"selected":""}}>পরিত্যক্ত</option>
                    </select>
                    <div class="error">{{$errors->first('type')}}</div>
                </div><br><br><br>

                <div class="col-md-3">
                    <label for="reason" class=" control-label">Reason</label>
                </div>
                <div class="col-md-9">
                    <textarea class="form-control" name="reason" required>{{old('reason',$selectedAdjustmentInfo->reason)}}</textarea>
                    <div class="error">{{$errors->first('reason')}}</div>
                </div><br><br>
            </div>

            <div class="col-md-4" >
                <div class="col-md-3">
                    <label for="productName" class=" control-label">Product</label>
                </div>
                <div class="col-md-9">
                    <select id="productName" name="productName" class="form-control required" required onchange="showProductCode()">
                        <option value="">Select Product</option>
                        @foreach ($products->unique('productName')->pluck('productName') as $productName)
                        <option value="{{$productName}}" @if (old('productName',$selectedAdjustmentInfo->productInfo->productName)==$productName)
                            {{"selected"}}
                        @endif>{{$productName}}</option>
                        @endforeach
                    </select>
                    <div class="error">{{$errors->first('productName')}}</div>
                </div><br><br>
                
                <div class="col-md-3">
                    <label for="productCode" class=" control-label">Code</label>
                </div>
                <div class="col-md-9">
                    <select id="productCode" name="productCode" class="form-control required" required onchange="showStock()">
                    <option value="">Select Product Code</option>
                    @if(old('productName',$selectedAdjustmentInfo->productInfo->productName))
                        @foreach ($products as $product)
                        @if(old('productName',$selectedAdjustmentInfo->productInfo->productName)==$product->productName)
                        <option value="{{$product->id}}" @if (old('productCode',$selectedAdjustmentInfo->product_info_id)==$product->id)
                            {{"selected"}}
                        @endif data-stock="{{$product->stock}}">{{$product->productCode}}</option>
                        @endif
                        @endforeach
                    @endif
                    </select>
                    <div class="error">{{$errors->first('productCode')}}</div>
                </div><br><br>


                <div class="col-md-3">
                    <label for="stock" class=" control-label">Stock</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="stock" name="stock" value="{{old('stock',$selectedAdjustmentInfo->productInfo->stock)}}" placeholder="0" required readonly>
                    <div class="error">{{$errors->first('stock')}}</div>
                </div><br><br>
            </div>

            <div class="col-md-4" >
                <div class="col-md-3">
                    <label for="contactNo" class=" control-label">Quantity</label>
                </div>
                <div class="col-md-9">
                    <input type="number" class="form-control"  name="quantity" value="{{old('quantity',$selectedAdjustmentInfo->quantity)}}" placeholder="0" required>
                    <div class="error">{{$errors->first('quantity')}}</div>
                </div><br><br><br><br>
            </div>
        
        </div>
        <div class="text-center">
            <input type="hidden" name="adjustmentId" value="{{$selectedAdjustmentInfo->id}}">
            <button type="button" class="btn btn-success" onclick="updateContent()"><i class="glyphicon glyphicon-edit" style="color: white"></i> Update</button> 
            <button type="button" onclick="cancelUpdate()" class="btn btn-danger">Cancel</button><br><br>
        </div>
    </div>
</form>
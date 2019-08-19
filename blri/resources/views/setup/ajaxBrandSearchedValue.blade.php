<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    <tr class="row bg-primary">
        <th class="col-lg-1 text-center">#</th>
        <th class="col-lg-2 text-center">Category</th>
        <th class="col-lg-8 text-center">Brand</th>
        <th class="col-lg-1 text-center">Edit</th>
    </tr>
    @if(isset($brands))
        @foreach ($brands as $key=>$brand)
            <tr class="row">
                <td>{{++$key}}</td>
                <td>{{$brand->category->categoryName}}</td>
                <td>{{$brand->brandName}}</td>
                
                <td><a href="{{route('setup.brandedit',[$brand->id])}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
            </tr>
        @endforeach
    @endif
</table>
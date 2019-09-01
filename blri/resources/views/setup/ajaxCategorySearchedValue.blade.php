<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    <tr class="row bg-primary">
        <th class="col-lg-1 text-center">#</th>
        <th class="col-lg-2 text-center">Category</th>
        <th class="col-lg-1 text-center">Edit</th>
    </tr>
    @if(isset($categories))
        @foreach ($categories as $key=>$category)
            <tr class="row">
                <td>{{++$key}}</td>
                <td>{{$category->categoryName}}</td>
                
                <td><a href="{{route('setup.catedit',[$category->id])}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
            </tr>
        @endforeach
    @endif
</table>
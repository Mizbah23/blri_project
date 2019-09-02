<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    <thead class="bg-primary">
        <tr>
            <th>#</th>
            <th>ক্যাটাগরি</th>
            <th>সম্পাদনা</th>
        </tr>
    </thead>
    @if(isset($categories))
    <tbody>
        @foreach ($categories as $key=>$category)
        <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$category->categoryName}}</td>
            <td>
                <a href="{{route('setup.catedit',[$category->id])}}"><i class="fa fa-edit" style="font-size:24px"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
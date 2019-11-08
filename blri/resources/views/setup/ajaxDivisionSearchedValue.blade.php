<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    <tr class="bg-primary">
        <th>#</th>
        <th>অনুষদ</th>
        <th>সম্পাদনা</th>
    </tr>
    @if(isset($departments))
        @foreach ($departments as $key=>$department)
        <tr scope="row">
            <td>{{++$key}}</td>
            <td>{{$department->DepartmentName}}</td>
            <td>
                <a href="{{route('setup.divedit',[$department->DepartmentID])}}"><i class="fa fa-edit" style="font-size:24px"></i></a>
            </td>
        </tr>
        @endforeach
    @endif
</table>
<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    <tr class="bg-primary">
        <th>#</th>
        <th>অনুষদ</th>
        <th>সম্পাদনা</th>
    </tr>
    @if(isset($divisions))
        @foreach ($divisions as $key=>$division)
        <tr scope="row">
            <td>{{++$key}}</td>
            <td>{{$division->divisionName}}</td>
            <td>
                <a href="{{route('setup.divedit',[$division->id])}}"><i class="fa fa-edit" style="font-size:24px"></i></a>
            </td>
        </tr>
        @endforeach
    @endif
</table>
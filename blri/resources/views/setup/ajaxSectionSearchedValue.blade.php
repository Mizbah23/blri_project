<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    <thead>
        <tr class=" bg-primary">
        <th>#</th>
        <th>অনুষদ</th>
        <th>শাখা</th>
        <th>সম্পাদনা</th>
        
        </tr>
    </thead>
    @if(isset($sections))
    <tbody>
        @foreach ($sections as $key=>$section)
            <tr>
            <td scope="row">{{++$key}}</td>
            <td>{{$section->division->divisionName}}</td>
            <td>{{$section->sectionName}}</td>
            <td>
                <a href="{{route('setup.secedit',[$section->id])}}"><i class="fa fa-edit" style="font-size:24px"></i></a>
            </td>
            
            </tr>
        @endforeach
    </tbody>
    @endif
</table>
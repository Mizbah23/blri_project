<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    <tr class="bg-primary">
        <th>#</th>
        <th>পদবি</th>
        <th>সম্পাদনা</th>
    </tr>
   
    @if(isset($designations))
        @foreach ($designations as $key=>$designation)
            <tr class="row">
                <td>{{++$key}}</td>
                <td>{{$designation->designationName}}</td>
                
                <td><a href="{{route('setup.deseidt',[$designation->id])}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
            </tr>
        @endforeach
    @endif
</table>
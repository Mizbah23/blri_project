<table class="table table-responsive table-hover table-striped table-bordered table-condensed">
    
    <thead class="bg-primary">
        <tr >
            <th>#</th>
            <th>পদবি</th>
            <th>সম্পাদনা</th>
        </tr>
    </thead>
   
   
    @if(isset($designations))
        <tbody>
            @foreach ($designations as $key=>$designation)
                <tr scope="row">
                    <td>{{++$key}}</td>
                    <td>{{$designation->designationName}}</td>
                    
                    <td><a href="{{route('setup.desedit',$designation->id)}}"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    @endif
</table>
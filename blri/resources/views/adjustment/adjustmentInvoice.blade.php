<!DOCTYPE html>
<html>
<head>
	<title>Adjustment Invoice</title>
	<style type="text/css">

	 table{
        width: 70%;
        margin: 0 auto;
        border: 1px solid;
	}
	</style>
</head>
<body>

   <table>
   	   <thead>
   	   	<tr>
   	   	<th>পি্প</th>
   	   	<th>Product Code</th>
   	   	<th>Product Name</th>
   	   	<th>Adjustment Type</th>
   	   	<th>Reason of adjustment</th>
   	   </tr>
   	   </thead>
   	   <tbody>
   	   	@foreach($adjustmentInfoLists as $key=>$item)
   	   	<tr>
   	   		<td>{{date('d/m/Y', strtotime(str_replace('-', '/',$item->adjustmentDate))) }}</td>
   	   		<td>{{ $item->productInfo->productCode }}</td>
   	   		<td>{{ $item->productInfo->productName}}</td>
   	   		<td>{{strtoupper($item->adjustmentType)}}</td>
   	   		<td>{{$item->reason}}</td>
   	   	</tr>
   	   	@endforeach
   	   </tbody>
   </table>
</body>
</html>
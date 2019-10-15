<!DOCTYPE html>
<html lang="bn">
<head>
	<title>Adjustment Invoice</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
    body {
    font-family: 'examplefont', sans-serif;
}

table{
        width: 70%;
        margin: 0 auto;
        border: 1px solid;
        border-collapse: collapse;
	}
th,td{
 border: 1px solid;
 padding-left: 5px;
}

</style>
</head>
<body>
  <h1 style="margin-left:15%">বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট</h1>
   <center>
     <table>
       <thead>
        <tr>
        <th>তারিখ</th>
        <th>পণ্যেরনাম</th>
        <th>পণ্যের নাম</th>
        <th>সমন্বয়ের ধরন</th>
        <th>সমন্বয়ের কারণ</th>
       </tr>
       </thead>
       <tbody> 
        @foreach($adjustmentInfoLists as $key=>$item)
        <tr>
          <td>{{date('d/m/Y', strtotime(str_replace('-', '/',$item->adjustmentDate))) }}</td>
          <td>{{ $item->productInfo->productCode }}</td>
          <td>{{ $item->productInfo->productName}}</td>
          <td>{{$item->adjustmentType}}</td>
          <td>{{$item->reason}}</td>
        </tr>
        @endforeach
       </tbody>
   </table>
   </center>
</body>
</html>
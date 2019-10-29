!<DOCTYPE html>
<html lang="bn">
<head>
	<title>শুরুর তারিখ অনুযায়ী</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
    body {
    font-family: 'kalpurush', sans-serif,'ShonarBangla','Bijoy';
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
  <div style="text-align: center">
    <img style="width: 22%; height: 15%; margin-top: -30px;" src="images/blrilogo.jpg" alt="">
    <div style="margin-top: -15px"><h1>বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট</h1></div>
    <div style="margin-top: -30px">মোবাইলঃ +৮৮ ০২ ৭৭৯১৬৭০-৭১, ফোনঃ +৮৮ ০২ ৭৭৯১৬৭০-৭১, ইমেইলঃ infoblri@gmail.com
    <br>সাভার, ঢাকা-১২৪১ 
  </div>
  </div>
  <hr style="margin-top: -2px">
  
  
   <center>
     <table  style="width:90%">

        <tr>
        <th>কর্মচারীর আইডি</th>
        <th>কর্মচারীর নাম</th>
        <th>কর্মচারীর পদবী</th>
        <th>যোগাযোগ</th>
        <th>তারিখ</th>
        <th>প্রবেশ</th>
        <th>বাহির</th>
       </tr>


        @foreach($results as $item)
        <tr>
          <td>{{$item->EmployeeID}}</td>
          <td>{{$item->EmployeeName}}</td>
          <td>{{$item->designationName}}</td>
          <td>{{$item->contactNo}}</td>
          <td>{{$item->DATE}}</td>
          <td>{{$item->EntryTime}}</td>
          <td>{{$item->ExitTime}}</td>
        </tr>
        @endforeach

   </table>
   </center>
</body>
</html>
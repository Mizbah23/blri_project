!<DOCTYPE html>
<html lang="bn">
<head>
	<title>প্রকল্প অনুযায়ী</title>
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
     <table style="width: 100%;height: auto;">
       <thead>
        <tr>
        <th>কর্মচারীর আইডি</th>
        <th>কর্মচারীর নাম</th>
        <th>ঠিকানা</th>
        <th>যোগাযোগ নং</th>
        <th>পদবি</th>
        <th>শাখা</th>
        {{-- <th>ছবি</th> --}}
       </tr>
       </thead>
       <tbody> 
      @foreach($emplyoeeinfo as $key =>$item)
        <tr>
          <td>{{ $item->EmployeeID }}</td>
          <td>{{ $item->EmployeeName }}</td>
          <td>{{ $item->address }}</td>
          <td>{{ $item->contactNo }}</td>
          <td>{{ $item->designationName }}</td>
          <td>{{ $item->sectionName }}</td>
          {{-- <td>{{ $item->profileImage }}</td> --}}
          {{-- <td><img src="{{ asset('/images/'.$item->profileImage) }}" ></td> --}}
        </tr>
    @endforeach
       </tbody>
   </table>
   </center>
</body>
</html>
!<DOCTYPE html>
<html lang="bn">
<head>
	<title>কর্মচারী অনুযায়ী</title>
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

   @foreach($emplyoeeinfo as $key =>$item)
  <div>
     <img id="profileImageTag" style="width: 160px; margin-left: 0px; border:solid;"   
     src="images/{{$item->profileImage}}">
  </div><br>
  @endforeach

   <center>
     <table style="width: 100%;height: auto;">
       <thead>
       </thead>
       <tbody> 
      @foreach($emplyoeeinfo as $key =>$item)
        <tr>
          <td>কর্মচারীর আইডি</td>
          <td>{{ $item->EmployeeID }}</td>
        </tr>

        <tr>
          <td>কর্মচারীর নাম</td>
          <td>{{ $item->EmployeeName }}</td>
        </tr>
          
          <tr>
          <td>ঠিকানা</td>
          <td>{{ $item->address }}</td>
          </tr>

          <tr>
          <td>যোগাযোগ নং</td>
          <td>{{ $item->contactNo }}</td>
          </tr>

          <tr>
          <td>পদবি</td>
          <td>{{ $item->designationName }}</td>
          </tr>

          <tr>
          <td>শাখা</td>
          <td>{{ $item->sectionName }}</td>
          </tr>
        @endforeach
          {{-- <td>{{ $item->profileImage }}</td> --}}
          {{-- <td><img src="{{ asset('/images/'.$item->profileImage) }}" ></td> --}}
       </tbody>
   </table>
   </center>
</body>
</html>
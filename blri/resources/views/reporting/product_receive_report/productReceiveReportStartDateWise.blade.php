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
     <table>
       <thead>
        <tr>
        <th>সিরিয়াল নং</th>
        <th>তারিখ</th>
        <th>রিসিভ নং</th>
        <th>প্রোডাক্ট কোড</th>
        <th>প্রোডাক্ট নাম</th>
        <th>পরিমাণ</th>
        <th>সরবরাহকারীর নাম</th>

        </tr>
       </thead>
       <tbody>
       @foreach($result as $key=>$item)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $item->Purchase_Date }}</td>
          <td>{{ $item->OrderNo }}</td>
          <td>{{ $item->productName}}</td>
          <td>{{ $item->Qty }}</td>
          <td>{{ $item->supplierName }}</td>
        </tr>
       @endforeach
       </tbody>
   </table>
   </center>
</body>
</html>

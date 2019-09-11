
<!DOCTYPE HTML>
<html>
<head>
<title>Requisition</title>
<link rel="icon" type="image/png" href="/images/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->

<link rel="stylesheet" href="/css/jquery-ui.css" type='text/css'/>
<!--datepicker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
 
 <!-- js-->
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/modernizr.custom.js"></script>

<!--datepicker-->
<script src="/js/jquery-1.12.4.js"></script>
<script src="/js/jquery-ui.js"></script>
<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="/js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="/js/metisMenu.min.js"></script>
<script src="/js/custom.js"></script>
<link href="/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <!--For autocomplete Search -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--// For autocomplete Search -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="/js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

    <!-- requried-jsfiles-for owl -->
                    <link href="/css/owl.carousel.css" rel="stylesheet">
                    <script src="/js/owl.carousel.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#owl-demo").owlCarousel({
                                    items : 3,
                                    lazyLoad : true,
                                    autoPlay : true,
                                    pagination : true,
                                    nav:true,
                                });
                            });
                        </script>
                    <!-- //requried-jsfiles-for owl -->
<!--date picker-->
  <script>
$( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>

  <!--date picker-->
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      format: 'MM/DD/YYYY',
      maxDate: "+0D",
      ignoreReadonly: true
    });
  });
  </script>

</head> 
<body class="cbp-spmenu-push">
    <div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
        <!--left-fixed -navigation-->
        <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>

            <h1 style="margin-top: 5px"><a class="text-white" style="margin-left: 10px;" href="index.html"><span> <img style="height: 50px; width: 50px;" src="/images/logo.png" alt=""></span> BLRI<span class="dashboard_text" style="margin-left: 30px">Design dashboard</span></a></h1>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="{{route('home.index')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-shield"></i> <span>Security</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                @foreach($securitytypes as $securitytype)
                   
                      <li><a href="{{route('security.'.strtolower($securitytype->SecType))}}">
                      <i class="fa fa-circle"></i> {{$securitytype->SecType}}</a></li>
                 @endforeach
                </ul>
              </li>
             

              <li class="treeview">
                <a href="#">
                <i class="fa fa-wrench"></i>
                <span>Setup</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 @foreach($setuptypes as $setuptype)
                   
                    <li><a href="{{route('setup.'.strtolower($setuptype->SType))}}">
                      <i class="fa fa-circle"></i> {{$setuptype->name}}</a></li>
                 @endforeach
                  
                </ul>
              </li>
           
             
              <li class="treeview">
              <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Product Receive</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  @foreach($productreceivetypes as $productreceivetype)
                   
                    <li><a href="{{route('product receive.'.strtolower($productreceivetype->prType))}}">
                      <i class="fa fa-circle"></i> {{$productreceivetype->prType}}</a></li>
                 @endforeach
                </ul>
              </li>
              
              <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i> <span>Product Distribution</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  @foreach($productdistributions as $productdistribution)
                   
                    <li><a href="{{route('product distribution.'.strtolower($productdistribution->pdType))}}">
                      <i class="fa fa-circle"></i> {{$productdistribution->pdType}}</a></li>
                 @endforeach
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-adjust"></i> <span>Adjustment</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  @foreach($adjustments as $adjustment)
                   
                    <li><a href="{{route('adjustment.'.strtolower($adjustment->adjustmentType))}}">
                      <i class="fa fa-circle"></i> {{$adjustment->adjustmentType}}</a></li>
                 @endforeach
                </ul>
              </li>
            
              <li class="treeview">
                <a href="#">
                <i class="fa fa-table"></i> <span>Reporting</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 @foreach($reportings as $reporting)
                   
                    <li><a href="{{route('reporting.'.strtolower($reporting->crType))}}"><!-- route('Folder(from view) Name') &&strtolowere('database table name')-->
                      <i class="fa fa-circle"></i> {{$reporting->crType}}</a></li>
                 @endforeach
                </ul>
              </li>
            
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
    </div>
        <!--left-fixed -navigation-->
        
               <!-- header-starts -->
        <div class="sticky-header header-section ">
            <div class="header-left">
                <!--toggle button start-->
                <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                <!--toggle button end-->
                <div class="clearfix"> </div>
            </div>
            
                <div class="profile_details">       
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">   

                                    <span class="prfil-img"><img src="/images/{{(Session::get('user')->employeeinfo->profileImage)}}" alt="" style="height: 50px; width:50px"> </span> 

                                    <div class="user-name">
                                        <p>{{(Session::get('user')->employeeinfo->name)}}</p>
                                        <span>{{ (Session::get('user')->userType)}}</span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>    
                                </div>   
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li> 
                                <li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li> 
                                <li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>


                <div class="clearfix"> </div>               
            </div>
            <div class="clearfix"> </div>   
        </div>
        <!-- //header-ends -->
   
 <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class=" form-grids row form-grids-right">
            <div class="widget-shadow " data-example-id="basic-forms"> 
              <div class="form-title bg-primary text-white">
                <h3 class="">ফরমাশ-পত্র</h3>
              </div>
              <div class="form-body">
                <div id="createFormDiv">
                <form class="form-horizontal" method="post"> <!--Form for grideview-->
                  @csrf
                  <div class="form-group">
                      <div class="row">

                      <div class="col-lg-6">


                         <div class="col-lg-4">
                            <label for="name">কর্মচারীর নাম</label><br>
                         </div>
                         <div class="col-lg-8">
                                <select id="name" name="name" class="form-control required" required value="{{ old('name') }}">
                                 <option value="">নির্বাচন করুণ</option>
                                   @foreach ($employeeinformations  as $employeeinformation)
                                               <option value="{{$employeeinformation->id}}">{{$employeeinformation->name}}</option>
                                               @endforeach
                                 
                              </select>
                              <div class="error" style="color: red">
                                {{$errors->first('name')}}</div>
                         </div><br><br>

                           <div class="col-lg-4">
                            <label for="categoryName">ক্যাটাগরি</label>
                         </div>
                         <div class="col-lg-8">
                            <select id="categoryName" name="categoryName" onchange="showBrand()" class="form-control required" required value="{{old('categoryName')}}">
                                <option value="" >নির্বাচন করুন</option>
                                @foreach($products as $product)
                                 <option value="{{$product->brand->category->id}}"{{old('categoryName')==$product->brand->category->id ?"selected":""}}>{{$product->brand->category->categoryName}}</option>
                                 @endforeach
                              </select>
                                <div class="error" style="color: red">{{$errors->first('categoryName')}}</div>
                             </div><br><br>

                         <div class="col-lg-4">
                            <label for="brandName">ব্র্যান্ড</label>
                         </div>
                         <div class="col-lg-8">
                            <select class="form-control" id="brandName" name="brandName" required onchange="showProductName()" value="{{old('brandName') }}">
                              <option value="">ব্র্যান্ড সনাক্তকরণ</option>
                                 
                               @foreach($products as $product)
                                   
                                      <option value="{{$product->brand->brandName}}" {{old('brandName')==$product->brand->brandName?"selected":""}}>{{$product->brand->brandName}}</option>
                                   
                                  @endforeach 
                               
                            </select>
                         </div><br><br>
               

                     </div>

                      <div class="col-lg-6">
                        <div class="col-lg-4">
                          <label for="requisitionDate">তারিখ</label>
                        </div>
                        <div class="col-lg-8">
                           <input type="text" class="form-control datepicker" id="requisitionDate" name="requisitionDate" placeholder="মাস/দিন/বছর" required>
                        </div><br><br>
                        <div class="col-lg-4">
                          <label for="productName">পণ্য</label>
                        </div>
                        <div class="col-lg-8">
                           <select class="form-control" id="productName" name="productName" required onchange="showProductCode()" value="{{ old('productName') }}">
                              <option value="">পণ্য সনাক্তকরণ</option>
                               @foreach ($products->unique('productName')->pluck('productName') as $productName)
                                 <option value="{{$productName}}" @if (old('productName')==$productName)
                                    {{"selected"}}
                                @endif>{{$productName}}</option>
                                @endforeach
                            </select>
                             <div class="error" style="color: red">{{$errors->first('productName')}}</div>
                        </div><br><br>
                      
                        <div class="col-lg-4">
                          <label for="productCode" class=" control-label">Product Code</label>
                        </div>
                        <div class="col-lg-8">
                        
                             <select id="productCode" name="productCode" class="form-control required" value="{{old('productCode')}}" required readonly>
                               <option value="">Select Product Code</option>
                              
                              @if(old('productName'))
                                @foreach ($products as $product)
                                @if(old('productName')==$product->productName)
                                  <option value="{{$product->id}}" @if (old('productCode')==$product->id)
                                      {{"selected"}}
                                  @endif>{{$product->productCode}}</option>
                                @endif
                                @endforeach
                              @endif
                              
                            </select>
                            <div class="error" style="color: red">{{$errors->first('productCode')}}</div>

                        </div><br><br>

                        <div class="col-lg-4">
                          <label for="">পরিমাণ</label>
                        </div>
                        <div class="col-lg-8">
                           <input class="form-control" type="number" name="quantity" placeholder="অবশ্যই পূরণ করুন" value="{{old('quantity')}}" required>
                              <div class="error" style="color: red">{{$errors->first('quantity')}}</div>
                        </div><br><br><br>
                       
                         <center>
                           <button type="submit" name="gridsave" class="btn btn-info">
                            <i class="glyphicon glyphicon-plus"
                            style="color:white"></i>সংযুক্তকরণ</button>
                           <button type="reset" name="gridreset" class="btn">পুনরায় বসান</button>
                         </center><br>
                        
                      </div>
                
                   </div>
                </form><!--End Form for grideview-->
              </div>
              <div id="updateFormDiv"></div>
              <div class="row">
                     <div class="col-lg-12">
                       <table class="table table-responsive table-hover table-striped table-bordered table-condensed">
                         <tr class="row bg-primary">
                           <th class="col-lg-1 text-center">সম্পাদনা</th>
                           <th class="col-lg-1 text-center">মুছে দিন</th>
                           <th class="col-lg-2 text-center">Employee Name</th>
                           <th class="col-lg-3 text-center">পণ্যের নাম</th>
                           <th class="col-lg-2 text-center">পরিমাণ</th>
                           <th class="col-lg-2 text-center">Date</th>
                         </tr>
                            @foreach ($requisitionlists as $item)
                              <tr class="row"  align="center">
                                 <td ><a href="#" onclick="handleEdit({{$item->id}})"><i class="fa fa-edit" style="font-size:24px" ></i></a></td>
                                  <td> <a onclick="deleteItem({{$item->id}})" class="glyphicon glyphicon-trash" style="font-size:24px"></i></a></td>
                                    <td>{{ $item->employeeinfo->name }}</td>
                                    <td>{{$item->productInfo->productName}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->requisitionDate}}</td>
                                  
                              </tr>
                              @endforeach
                       </table>
                     </div>
                   </div> 
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    @if (count($requisitionlists)>0)
                     <center>
                       <button class="btn btn-info" type="submit" name="tablesave" onclick="savedata()">সংরক্ষণ করুন</button>
                       <button type="reset" name="tablereset" class="btn"  onclick="clearList()">পুনরায় বসান</button>
                       </center>
                    @endif
                  </div>
                </div>



                    <!--<div class="row">
                   <div class="col-lg-6"> Category and brand-->
                       <!--   <label for="category" class="col-sm-2 control-label">Category</label>
                          <div class="col-lg-9">
                              <select id="category" name="categories" class="form-control required" required>
                              <option value=""></option>
                                              
                              </select>
                          </div><br><br>

                          <label for="brand" class="col-sm-2 control-label">Brand</label>
                       <div class="col-lg-9">
                          <input type="text" class="form-control" id="brand" name="brandName" placeholder="Name Can not be empty"required>
                          </div><br><br><br>

                          <div class="col-lg-6">
                            <label for="category" class="col-sm-2 control-label">Category</label>
                          <div class="col-lg-9">
                              <select id="category" name="categories" class="form-control required" required>
                              <option value=""></option>
                              </select>
                          </div><br><br>

                          <label for="brand" class="col-sm-2 control-label">Brand</label>
                       <div class="col-lg-9">
                          <input type="text" class="form-control" id="brand" name="brandName" placeholder="Name Can not be empty"required>
                          </div><br><br><br>
                          </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-info">Save</button> 
                          <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                         </form>end form-->
                      <!--Category and brand-->
                      <!--Search option starts-->
                    

                      <!--Search option stops-->

          
                <div id="allBrands">
            
               </div>
               <div id="searchedBrandValue">
                   
               </div>
              
            </div>
          </div>
      
          </div>
        </div>
     
   
    <!--footer-->
    <div class="footer">
       <p>&copy; 2019  All Rights Reserved | Design by <a href="https://deshisysltd.com/" target="_blank">Deshi Systems Ltd.</a></p>       
    </div>
    <!--//footer-->
    </div>
        
    <!-- new added graphs chart js-->
    
    <script src="/js/Chart.bundle.js"></script>
    <script src="/js/utils.js"></script>
    
    <script>
        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var color = Chart.helpers.color;
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Dataset 1',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }, {
                label: 'Dataset 2',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }]

        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart'
                    }
                }
            });

        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            var zero = Math.random() < 0.2 ? true : false;
            barChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return zero ? 0.0 : randomScalingFactor();
                });

            });
            window.myBar.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
            var dsColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + barChartData.datasets.length,
                backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                borderColor: dsColor,
                borderWidth: 1,
                data: []
            };

            for (var index = 0; index < barChartData.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            barChartData.datasets.push(newDataset);
            window.myBar.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (barChartData.datasets.length > 0) {
                var month = MONTHS[barChartData.labels.length % MONTHS.length];
                barChartData.labels.push(month);

                for (var index = 0; index < barChartData.datasets.length; ++index) {
                    //window.myBar.addData(randomScalingFactor(), index);
                    barChartData.datasets[index].data.push(randomScalingFactor());
                }

                window.myBar.update();
            }
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            barChartData.datasets.splice(0, 1);
            window.myBar.update();
        });

        document.getElementById('removeData').addEventListener('click', function() {
            barChartData.labels.splice(-1, 1); // remove the label first

            barChartData.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myBar.update();
        });
    </script>
    <!-- new added graphs chart js-->
    
    <!-- Classie --><!-- for toggle left push menu script -->
        <script src="/js/classie.js"></script>
        <script>
            var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
                showLeftPush = document.getElementById( 'showLeftPush' ),
                body = document.body;
                
            showLeftPush.onclick = function() {
                classie.toggle( this, 'active' );
                classie.toggle( body, 'cbp-spmenu-push-toright' );
                classie.toggle( menuLeft, 'cbp-spmenu-open' );
                disableOther( 'showLeftPush' );
            };
            

            function disableOther( button ) {
                if( button !== 'showLeftPush' ) {
                    classie.toggle( showLeftPush, 'disabled' );
                }
            }
        </script>
    <!-- //Classie --><!-- //for toggle left push menu script -->
        
    <!--scrolling js-->
    <script src="/js/jquery.nicescroll.js"></script>
    <script src="/js/scripts.js"></script>
    <!--//scrolling js-->
    
    <!-- side nav js -->
    <script src='/js/SidebarNav.min.js' type='text/javascript'></script>
    <script>
      $('.sidebar-menu').SidebarNav()
    </script>
    <!-- //side nav js -->
    
    <!-- for index page weekly sales java script -->
    <script src="/js/SimpleChart.js"></script>
    <script>
        var graphdata1 = {
            linecolor: "#CCA300",
            title: "Monday",
            values: [
            { X: "6:00", Y: 10.00 },
            { X: "7:00", Y: 20.00 },
            { X: "8:00", Y: 40.00 },
            { X: "9:00", Y: 34.00 },
            { X: "10:00", Y: 40.25 },
            { X: "11:00", Y: 28.56 },
            { X: "12:00", Y: 18.57 },
            { X: "13:00", Y: 34.00 },
            { X: "14:00", Y: 40.89 },
            { X: "15:00", Y: 12.57 },
            { X: "16:00", Y: 28.24 },
            { X: "17:00", Y: 18.00 },
            { X: "18:00", Y: 34.24 },
            { X: "19:00", Y: 40.58 },
            { X: "20:00", Y: 12.54 },
            { X: "21:00", Y: 28.00 },
            { X: "22:00", Y: 18.00 },
            { X: "23:00", Y: 34.89 },
            { X: "0:00", Y: 40.26 },
            { X: "1:00", Y: 28.89 },
            { X: "2:00", Y: 18.87 },
            { X: "3:00", Y: 34.00 },
            { X: "4:00", Y: 40.00 }
            ]
        };
        var graphdata2 = {
            linecolor: "#00CC66",
            title: "Tuesday",
            values: [
              { X: "6:00", Y: 100.00 },
            { X: "7:00", Y: 120.00 },
            { X: "8:00", Y: 140.00 },
            { X: "9:00", Y: 134.00 },
            { X: "10:00", Y: 140.25 },
            { X: "11:00", Y: 128.56 },
            { X: "12:00", Y: 118.57 },
            { X: "13:00", Y: 134.00 },
            { X: "14:00", Y: 140.89 },
            { X: "15:00", Y: 112.57 },
            { X: "16:00", Y: 128.24 },
            { X: "17:00", Y: 118.00 },
            { X: "18:00", Y: 134.24 },
            { X: "19:00", Y: 140.58 },
            { X: "20:00", Y: 112.54 },
            { X: "21:00", Y: 128.00 },
            { X: "22:00", Y: 118.00 },
            { X: "23:00", Y: 134.89 },
            { X: "0:00", Y: 140.26 },
            { X: "1:00", Y: 128.89 },
            { X: "2:00", Y: 118.87 },
            { X: "3:00", Y: 134.00 },
            { X: "4:00", Y: 180.00 }
            ]
        };
        var graphdata3 = {
            linecolor: "#FF99CC",
            title: "Wednesday",
            values: [
              { X: "6:00", Y: 230.00 },
            { X: "7:00", Y: 210.00 },
            { X: "8:00", Y: 214.00 },
            { X: "9:00", Y: 234.00 },
            { X: "10:00", Y: 247.25 },
            { X: "11:00", Y: 218.56 },
            { X: "12:00", Y: 268.57 },
            { X: "13:00", Y: 274.00 },
            { X: "14:00", Y: 280.89 },
            { X: "15:00", Y: 242.57 },
            { X: "16:00", Y: 298.24 },
            { X: "17:00", Y: 208.00 },
            { X: "18:00", Y: 214.24 },
            { X: "19:00", Y: 214.58 },
            { X: "20:00", Y: 211.54 },
            { X: "21:00", Y: 248.00 },
            { X: "22:00", Y: 258.00 },
            { X: "23:00", Y: 234.89 },
            { X: "0:00", Y: 210.26 },
            { X: "1:00", Y: 248.89 },
            { X: "2:00", Y: 238.87 },
            { X: "3:00", Y: 264.00 },
            { X: "4:00", Y: 270.00 }
            ]
        };
        var graphdata4 = {
            linecolor: "Random",
            title: "Thursday",
            values: [
              { X: "6:00", Y: 300.00 },
            { X: "7:00", Y: 410.98 },
            { X: "8:00", Y: 310.00 },
            { X: "9:00", Y: 314.00 },
            { X: "10:00", Y: 310.25 },
            { X: "11:00", Y: 318.56 },
            { X: "12:00", Y: 318.57 },
            { X: "13:00", Y: 314.00 },
            { X: "14:00", Y: 310.89 },
            { X: "15:00", Y: 512.57 },
            { X: "16:00", Y: 318.24 },
            { X: "17:00", Y: 318.00 },
            { X: "18:00", Y: 314.24 },
            { X: "19:00", Y: 310.58 },
            { X: "20:00", Y: 312.54 },
            { X: "21:00", Y: 318.00 },
            { X: "22:00", Y: 318.00 },
            { X: "23:00", Y: 314.89 },
            { X: "0:00", Y: 310.26 },
            { X: "1:00", Y: 318.89 },
            { X: "2:00", Y: 518.87 },
            { X: "3:00", Y: 314.00 },
            { X: "4:00", Y: 310.00 }
            ]
        };
        var Piedata = {
            linecolor: "Random",
            title: "Profit",
            values: [
              { X: "Monday", Y: 50.00 },
            { X: "Tuesday", Y: 110.98 },
            { X: "Wednesday", Y: 70.00 },
            { X: "Thursday", Y: 204.00 },
            { X: "Friday", Y: 80.25 },
            { X: "Saturday", Y: 38.56 },
            { X: "Sunday", Y: 98.57 }
            ]
        };
        $(function () {
            $("#Bargraph").SimpleChart({
                ChartType: "Bar",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#sltchartype").on('change', function () {
                $("#Bargraph").SimpleChart('ChartType', $(this).val());
                $("#Bargraph").SimpleChart('reload', 'true');
            });
            $("#Hybridgraph").SimpleChart({
                ChartType: "Hybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Linegraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Areagraph").SimpleChart({
                ChartType: "Area",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Scatterredgraph").SimpleChart({
                ChartType: "Scattered",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata4, graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
            $("#Piegraph").SimpleChart({
                ChartType: "Pie",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                showpielables: true,
                data: [Piedata],
                legendsize: "250",
                legendposition: 'right',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });

            $("#Stackedbargraph").SimpleChart({
                ChartType: "Stacked",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });

            $("#StackedHybridbargraph").SimpleChart({
                ChartType: "StackedHybrid",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: true,
                data: [graphdata3, graphdata2, graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: 'Hours',
                title: 'Weekly Profit',
                yaxislabel: 'Profit in $'
            });
        });

    </script>
    <!-- //for index page weekly sales java script -->
    
    
    <!-- Bootstrap Core JavaScript -->
   <script src="/js/bootstrap.js"> </script>
   <script>
     var brands;
     $(function() {
       brands={!! $brands !!};
       products={!! $products !!};
     })
    function showBrand() {
      var selectedCategory=$("#categoryName").val();
      console.log(selectedCategory);
      $('#brandName').html('<option value="">Select a Brand</option>');
      if(brands!=undefined){
        brands.forEach(brand => {
          if(brand.category_id==selectedCategory)
            $('#brandName').append(`<option value="${brand.brandName}">${brand.brandName}</option>`); 
        });
      }
      
    }

    function showProductName(){
      var selectedProdut=$("#productName").val();//
      console.log(selectedCategory);
      $('#productName').html('<option value="">Select a Product</option>');
      if(products!=undefined){
        products.forEach(product => {
          if(product.brand_id==selectedCategory)
            $('#productName').append(`<option value="${brand.brandName}">${brand.brandName}</option>`); 
        });
      }
    }

      function showProductCode() {
       var selectedProduct=$("#productName").val();
       $("#productCode").html('<option value="">Select Product Code</option>');
       if(products!=undefined){
        var i=0;
        var productId;
        products.forEach(product => {
          if(product.productName==selectedProduct){
            $('#productCode').append(`<option value="${product.id}">${product.productCode}</option>`);
            i++;
            productId=product.id;
          }
        });
        if(i==1){
          console.log(i);
          $('#productCode option[value=' +productId + ']').attr('selected','selected');

          // $("#productCode select").val(productId);
        }
      }
     }

          function deleteItem(id) {
      if (confirm('Do you really want to delete this item?')) {
        $.ajax({
        url: "{{route("delete.product.from.RequisitionList")}}",
        type:"get",
        data: { id: id},
        success: function (data) {
          console.log(data);
          if(data=='deleted'){
            location.reload();
          }else{
            alert("Something went wrong! Please Reload the page.");
          }
        }
      });
      }
     }

      function handleEdit(id) {
       $.ajax({
        url: "{{route("edit.product.from.RequisitionList")}}",
        type:"get",
        data: { id: id},
        success: function (data) {
          $("#createFormDiv").html(data);
          $( ".datepicker" ).datepicker({
            format: 'MM/DD/YYYY',
            maxDate: "+0D",
            ignoreReadonly: true
          });
          $("#requisitionDate").datepicker();
          // $("#createFormDiv").hide();
          // console.log(data);
        }
      });
    }

       function updateContent() {
      var form=$("#editForm");
      // console.log(form.serialize());
      $.ajax({
        url: "{{route("update.product.from.RequisitionList")}}",
        type:"put",
        data: form.serialize(),
        success: function (data) {
          console.log(data);
          if(data[0]=="success"){
            alert("Successfuly Updated");
            
            location.reload();
          }else{
           for (const key in data[1]) {
             alert(data[1][key][0]);
           }
          }
        }
      });
    }
    function cancelUpdate() {
      location.reload();
    }
  </script>
  <script>
    function savedata() {
      $.ajax({
        url: "{{route("saveAll.product.from.RequisitionList")}}",
        type:"get",
        success: function (data) {
          console.log(data);
          
          if(data=="success"){
            alert("Data saved successfully");
            location.reload();
          }else{
            alert("Something Went Wrong");
          }
        }
      });
     }

          function clearList() {
       if (confirm('Do you really want to delete all the item from List?')) {
          $.ajax({
            url: "{{route("clearList.product.from.RequisitionList")}}",
            type:"get",
            success: function (data) {
              console.log(data);
              
              if(data=="success"){
                alert("Data deleted successfully");
                location.reload();
              }else{
                alert("Something Went Wrong");
              }
            }
          });
        }
      }
  </script>
    
    
</body>
</html>
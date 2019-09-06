
<!DOCTYPE HTML>
<html>
<head>
<title>কর্মচারী নিয়োগ</title>
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
.error{
  color: red;
  font-size: 0.8em;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="/js/pie-chart.js" type="text/javascript"></script>

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
  $( function() {
    $( ".datepicker" ).datepicker({
      minDate: "+0D"
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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse"
                        aria-expanded="false">
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
                                <span>সেটআপ</span>
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
                                <span>Product Recieve</span>
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
                                <li><a href="forms.html"><i class="fa fa-circle"></i> General Forms</a></li>
                                <li><a href="validation.html"><i class="fa fa-circle"></i> Form Validations</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-adjust"></i> <span>Adjustment</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="tables.html"><i class="fa fa-circle"></i> Simple tables</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Report</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="login.html"><i class="fa fa-circle"></i> Login</a></li>
                                <li><a href="signup.html"><i class="fa fa-circle"></i> Register</a></li>
                                <li><a href="404.html"><i class="fa fa-circle"></i> 404 Error</a></li>
                                <li><a href="500.html"><i class="fa fa-circle"></i> 500 Error</a></li>
                                <li><a href="blank-page.html"><i class="fa fa-circle"></i> Blank Page</a></li>
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
                        <li> <a href="{{route('login.index')}}"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
                    <h3 class="">কর্মচারী নিয়োগ বিবরণী</h3>
                </div>
                <div class="form-body">
                    <form class="form-horizontal" method="post" autocomplete="off" id="empAssignForm">
                        @csrf
                        <div class="form-group">
                            <!--Form-->

                            <div class="row">
                                <!--left side starts-->
                                <div class="col-md-6">

                                    <label for="projectName" class="col-sm-5 control-label">প্রকল্প</label>
                                    <div class="col-lg-7">
                                        <select id="projectName" name="projectName" onchange="showEmployee()"
                                            class="form-control required" required>
                                            <option value="">নির্বাচন করুণ</option>
                                            @foreach ($projects as $project)
                                            <option value="{{$project->id}}"
                                                data-empName="{{$project->employee_information_id}}" @if(old('projectName',$assignedEmployee->project_id)==$project->id)
                                                {{"selected"}}
                                                @endif >{{$project->projectName}}</option>
                                            @endforeach
                                        </select>
                                        <div class="error">{{$errors->first('projectName')}}</div>
                                    </div><br><br>

                                    <label for="employeeName" class="col-sm-5 control-label">কর্মচারী</label>
                                    <div class="col-lg-7">
                                        <select id="employeeName" name="employeeName" class="form-control required"
                                            required>
                                            <option value="">নির্বাচন করুণ</option>
                                            @if (old('projectName',$assignedEmployee->project_id))
                                            @foreach ($employeeInformations as $employeeInformation)
                                            @if(old('projectDirector',$assignedEmployee->project->employee_information_id)!=$employeeInformation->id)
                                            <option value="{{$employeeInformation->id}}" @if (old('employeeName',$assignedEmployee->
                                                employee_information_id)==$employeeInformation->id)
                                                {{"selected"}}
                                                @endif>{{$employeeInformation->name}}
                                            </option>
                                            @endif

                                            @endforeach
                                            @endif

                                        </select>
                                        <div class="error">{{$errors->first('employee_information_id')}}</div>

                                    </div><br><br>

                                    <label class="col-md-5 control-label">নিয়োগের তারিখ</label>
                                    <div class="col-md-7">
                                        <input class="form-control datepicker" type="text" name="date"
                                            value="{{old('date',$assignedEmployee->date)}}" placeholder="মাস/দিন/বছর"
                                            required>
                                        <div class="error">{{$errors->first('assignDate')}}</div>
                                    </div>
                                    <br><br>
                                </div>
                                <!--End left side-->


                                <!--right side starts-->
                                <div class="col-md-6">


                                    <label for="remarks" class="col-sm-5 control-label">মন্তব্য</label>
                                    <div class="col-lg-7">
                                        <textarea name="remarks"
                                            class="form-control"> {{old('remarks',$assignedEmployee->remarks)}}</textarea>
                                        <div class="error">{{$errors->first('remarks')}}</div><br>
                                    </div>
                                    <br><br>

                                    <label class="col-sm-6 control-label"></label>
                                    <div class="col-lg-6">
                                        <input type="checkbox" name="isActive" @if(old('isActive',$assignedEmployee->isActive))
                                        {{"checked"}}
                                        @endif> সক্রিয়?
                                    </div><br><br><br><br><br>

                                </div>
                                <!--right side end-->

                                <!--buttons starts-->
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>
                                    <br><br>
                                    <div class="col-md-5">
                                        <div class="text-center">
                                          <input type="hidden" name="emp_assign_id" value="{{$assignedEmployee->id}}">
                                          <button type="submit" class="btn btn-info">সংরক্ষন করুন</button>
                                          <button type="button" onclick="cancelUpdate()" class="btn btn-danger">বাতিল করুন</button>
                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <!--button ends-->
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

<!--footer-->
  
</div>
<div class="footer">
  <p>&copy; 2019 All Rights Reserved | Design by <a href="https://deshisysltd.com/" target="_blank">Deshi Systems Ltd.</a></p>
</div>


 
     
   
    
    
    
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
    <!-- //for index page weekly sales java script -->
    
    
    <!-- Bootstrap Core JavaScript -->
   <script src="/js/bootstrap.js"> </script>
  
   <script>
    var employeeInformations;
    $(function() {
      employeeInformations={!! $employeeInformations !!};
    })
    function showEmployee() {
      var selectedProjectEmpName=$("#projectName").find('option:selected').attr('data-empName');
      
      // var selectedProject=$("#projectName").val();
      // // console.log(employeeInformations);
      $('#employeeName').html('<option value="">Select employee</option>');
      if(employeeInformations!=undefined ){
        employeeInformations.forEach(employeeInformation => {
          if(employeeInformation.id!=selectedProjectEmpName)
            $('#employeeName').append(`<option value="${employeeInformation.id}">${employeeInformation.name}</option>`); 
        });
      }
      
    }
    function cancelUpdate() {
      document.location.href="{!! route('setup.employee assign'); !!}";
    }
   </script>

    
</body>
</html>
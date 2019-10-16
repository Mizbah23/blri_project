<!DOCTYPE HTML>
<html>
<head>
<title>কর্মচারীদের তথ্য হালনাগাদ</title>
<link rel="icon" type="image/png" href="/images/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

 
 <!-- js-->
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/modernizr.custom.js"></script>


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
<!-- For autocomplete Search -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- For autocomplete Search -->
<style>
.error{
  color: red;
  font-size: 0.8em;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->

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
       dateFormat: 'dd/mm/yy',
      maxDate: "+0D"
      });
  });
  </script>
{{-- datepicker ends --}}
  
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

            <h1 style="margin-top: 5px"><a class="text-white" style="margin-left: 10px;" href="{{route('home.index')}}"><span> <img style="height: 50px; width: 50px;" src="/images/logo.png" alt=""></span> BLRI<span class="dashboard_text" style="margin-left: 30px">ড্যাশবোর্ড ডিজাইন</span></a></h1><br>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">মেইন নেভিগেশন</li>
              <li class="treeview">
                <a href="{{route('home.index')}}">
                <i class="fa fa-dashboard"></i> <span>ড্যাশবোর্ড</span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-shield"></i> <span>নিরাপত্তা</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                @foreach($securitytypes as $securitytype)
                   
                      <li><a href="{{route('security.'.strtolower($securitytype->SecType))}}">
                      <i class="fa fa-circle"></i> {{$securitytype->name}}</a></li>
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
                <span>পণ্য প্রাপ্তি </span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  @foreach($productreceivetypes as $productreceivetype)
                   
                    <li><a href="{{route('product receive.'.strtolower($productreceivetype->prType))}}">
                      <i class="fa fa-circle"></i> {{$productreceivetype->name}}</a></li>
                 @endforeach
                </ul>
              </li>
              
              <li class="treeview">
                <a href="#">
                <i class="fa fa-users"></i> <span>পণ্য বিতরণ </span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 @foreach($productdistributions as $productdistribution)
                   
                    <li><a href="{{route('product distribution.'.strtolower($productdistribution->pdType))}}">
                      <i class="fa fa-circle"></i> {{$productdistribution->name}}</a></li>
                 @endforeach
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-adjust"></i> <span>সমন্বয়</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @foreach($adjustments as $adjustment)
                   
                    <li><a href="{{route('adjustment.'.strtolower($adjustment->adjustmentType))}}">
                      <i class="fa fa-circle"></i> {{$adjustment->name}}</a></li>
                 @endforeach
               </ul>
              </li>
            
               <li class="treeview">
                <a href="#">
                <i class="fa fa-table"></i> <span>প্রতিবেদন</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 @foreach($reportings as $reporting)
                   
                    <li><a href="{{route('reporting.'.strtolower($reporting->crType))}}"><!-- route('Folder(from view) Name') &&strtolowere('database table name')-->
                      <i class="fa fa-circle"></i> {{$reporting->name}}</a></li>
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
                                <li> <a href="{{route('login.index')}}"><i class="fa fa-sign-out"></i> Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>


                <div class="clearfix"> </div>               
            </div>
            <div class="clearfix"> </div> 
        
        <!-- header-ends -->
   
 <!-- main content start-->
    <div id="page-wrapper">
            @if(session('response'))
      <div class="col-mid-2 alert alert-success">
        {{@session('response')}}
      </div>
      @endif
      <div class="main-page">
        <div class=" form-grids row form-grids-right">
            <div class="widget-shadow " data-example-id="basic-forms"> 
              <div class="form-title bg-primary text-white">
                <h3 class="">কর্মচারীদের তথ্য</h3>
              </div>
              <div class="form-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data"  autocomplete="off"> 
                  @csrf
                  <div class="form-group"> <!--Form-->

                    <div class="row">
                       <!--left side starts-->
                      <div class="col-md-5">

                        <label  class="col-sm-6 control-label">কর্মকর্তার নাম</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="name" name="name" value="{{old('name',$employeeInformation->name)}}" placeholder="Employee name can not be empty"required>
                          <div class="error">{{$errors->first('name')}}</div>
                        </div><br><br>

                        <label  class="col-sm-6 control-label">অনুষদ</label>
                        <div class="col-lg-6">
                            <select id="divisionName" name="divisionName" onchange="showSection()"  class="form-control required" required>
                                <option value="">নির্বাচন করুন</option>
                                @foreach ($divisions  as $division)
                                  <option value="{{$division->id}}" {{ old('divisionName',$employeeInformation->section->division->id) == $division->id ? "selected" : "" }}>{{$division->divisionName}}</option>
                                @endforeach
                            </select>
                            <div class="error">{{$errors->first('divisionName')}}</div>
                        </div><br><br>

                        <label  class="col-sm-6 control-label">শাখা</label>
                        <div class="col-lg-6">
                          <select id="sectionName"  name="sectionName" class="form-control required" required>
                              <option value="">নির্বাচন করুন</option>
                              @if (old('divisionName',$employeeInformation->section->division->id))
                                @foreach ($sections  as $section)
                                  @if (old('divisionName',$employeeInformation->section->division->id) == $section->division_id){
                                    <option value="{{$section->sectionName}}" {{old('sectionName',$employeeInformation->section->sectionName)==$section->sectionName ? "selected":""}}>{{$section->sectionName}}</option>
                                  }
                                  @endif
                                @endforeach
                              @endif
                             
                          </select>
                          <div class="error">{{$errors->first('sectionName')}}</div>
                        </div><br><br>

                        <label  class="col-sm-6 control-label">পদবি</label>
                        <div class="col-lg-6">
                          <select id="designationName" name="designationName"  value="{{old('designationName',$employeeInformation->designation->designationName)}}" class="form-control required" required>
                              <option value="">নির্বাচন করুন</option>
                              @foreach ($designations  as $designation)
                              <option value="{{$designation->id}}" @if (old('designationName',$employeeInformation->designation->id)==$designation->id)
                                 {{ "selected"}}
                              @endif>{{$designation->designationName}}</option>
                              @endforeach
                          </select>
                          <div class="error">{{$errors->first('designationName')}}</div>
                        </div><br><br>

                        <label  class="col-sm-6 control-label">স্থায়ী জেলা</label>
                        <div class="col-lg-6">
                          <select name="districtName" id="districtName" class="form-control required" required>
                            <option value="">নির্বাচন করুন</option>
                            @foreach ($districts as $district)
                            <option value="{{$district->id}}" @if (old('districtName',$employeeInformation->district->id)==$district->id)
                                {{"selected"}}
                            @endif>{{$district->district}}</option>
                            @endforeach
                          </select>
                          <div class="error">{{$errors->first('districtName')}}&nbsp;</div>
                        </div><br><br>

                        <label  class="col-sm-6 control-label">ঠিকানা</label>
                        <div class="col-lg-6">
                          <input type="text" name="address"class="form-control" placeholder="অবশ্যই পূরণ করুন"  value="{{old('address',$employeeInformation->address)}}" required>
                          <div class="error">{{$errors->first('address')}}</div>
                        </div><br><br><br>

                        <label  class="col-sm-6 control-label">যোগাযোগ নং</label>
                        <div class="col-lg-6">
                          <input type="tel" class="form-control" id="contactNo" name="contactNo"  value="{{old('contactNo',$employeeInformation->contactNo)}}" placeholder="Contact no can not be empty" required minlength='11' maxlength='11' pattern="(01)[0-9]{9}" >
                          <div class="error">{{$errors->first('contactNo')}}</div>
                        </div><br><br>

                      </div>
                      <!--End left side-->


                      <!--right side starts-->
                      <div class="col-md-5">
                        <label  class="col-sm-6 control-label">জাতীয় পরিচয়পত্র</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="nidNo" name="nidNo"  value="{{old('nidNo',$employeeInformation->nidNo)}}" placeholder="অবশ্যই পূরণ করুন" required minlength="10">
                          <div class="error">{{$errors->first('nidNo')}}</div>
                        </div><br><br>

                        <label class="col-md-6 control-label" >যোগদানের তারিখ</label>
                        <div class="col-md-6">
                          <input class="form-control datepicker" type="text" name="joiningDate" placeholder="দিন/মাস/বছর" value="{{old('joiningDate',date('m/d/Y',strtotime($employeeInformation->joiningDate)))}}"  required>
                          <div class="error">{{$errors->first('joiningDate')}}</div>
                        </div><br><br>

                        <label class="col-md-6 control-label" >জন্ম তারিখ</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control datepicker" name="birthDate" placeholder="দিন/মাস/বছর" value="{{old('birthDate',date('m/d/Y',strtotime($employeeInformation->birthDate)))}}" required>
                          <div class="error">{{$errors->first('birthDate')}}</div>
                        </div><br><br>

                        <label  class="col-sm-6 control-label">কাজের স্থান</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="workingPlace" name="workingPlace"  value="{{old('workingPlace',$employeeInformation->workingPlace)}}" placeholder="অবশ্যই পূরণ করুন"required>
                          <div class="error">{{$errors->first('workingPlace')}}</div>
                        </div><br><br>

                        {{-- <label  class="col-sm-6 control-label">Positon</label>
                        <div class="col-lg-6">
                            <select id="category" name="" class="form-control required" required>
                                <option value="">Select Position</option>
                            </select>
                        </div><br><br> --}}

                        <label  class="col-sm-6 control-label"></label>
                        <div class="col-lg-6">
                            <input  type="checkbox" name="isRevenue" @if (old('isRevenue',$employeeInformation->isRevenue))
                                checked
                            @endif> রাজস্ব??
                        </div><br><br>

                          

                        <label  class="col-sm-6 control-label">মন্তব্য</label>
                        <div class="col-lg-6">
                          <textarea name="remarks"class="form-control" placeholder="Remarks can not be empty" required>{{old('remarks',$employeeInformation->remarks)}}</textarea>
                          <div class="error">{{$errors->first('remarks')}}</div>
                        </div><br><br><br><br>
                      </div>
                        <!--mid side end-->
                        <!--right side starts-->
                      <div class="col-md-2">
                        <img id="profileImageTag" style="width: 160px; margin-left: 8px; border:solid;"   
                        @if($employeeInformation->profileImage)
                        src="/images/{{$employeeInformation->profileImage}}"
                        @else 
                        src="/images/profile.png" 
                        @endif><br><br>
                      
                        <input class="form-control" type="file" name="profileImage" id="profileImage" accept="image/*" >
                        <div class="error">{{$errors->first('profileImage')}}</div>
                      </div><br><br><br>
                      <!--right side end-->

                      <!--buttons starts-->
                      <div class="row">
                        <div class="col-md-3">
                          
                        </div>
                        <br><br>
                        <div class="col-md-5">
                          <div class="text-center">
                          <input type="hidden" value="{{$employeeInformation->id}}" name="employeeId">
                          <button type="submit" class="btn btn-info">হালনাগাদ করুন</button> 
                          <button onclick="cancelUpdate" class="btn btn-danger">বাতিল করুন</button>
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
    
   
    
    
    <!-- Bootstrap Core JavaScript -->
   <script src="/js/bootstrap.js"> </script>
   <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profileImageTag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profileImage").change(function(){
        readURL(this);
    });
  </script>
  <script>
    var sections;
     $(function() {
       sections={!! $sections !!};
     })
    function showSection() {
      var selectedDivision=$("#divisionName").val();
      // console.log(sections);
      $('#sectionName').html('<option value="">Select a section</option>');
      if(sections!=undefined){
        sections.forEach(section => {
          if(section.division_id==selectedDivision)
            $('#sectionName').append(`<option value="${section.sectionName}">${section.sectionName}</option>`); 
        });
      }
    }
  </script>
  <script>
    function cancelUpdate() {
      document.location.href="{!! route('setup.employee'); !!}";
    }
  </script>
    
</body>
</html>
  
<!DOCTYPE HTML>
<html>
<head>
<title> ক্যাটাগরি বিবরণী</title>
<link rel="icon" type="image/png" href="/images/logo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="BLRI Design Dashboard" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->
<link href="/css/jquery.dataTables.min.css">

<!-- side nav css file -->
<link href='/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
<!--datatable-->
<script src="/js/jquery.dataTables.min.js"></script>
 
 <!-- js-->
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/modernizr.custom.js"></script>

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

{{-- // For autocomplete Search  --}}
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
{{-- // For autocomplete Search  --}}
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>

<!-- Datatable script -->
{{--
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
--}}


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
        
        <!-- //header-ends -->
       
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
                <h3 class="">পণ্য ক্যাটাগরি বিবরণী</h3>
              </div>
              <div class="form-body">
                <form class="form-horizontal" method="post"> 
                  @csrf
                  <div class="form-group"> <!--Form-->

                   <div class="row">
                      <div class="col-lg-2">
                        
                      </div>
                      <div class="col-lg-6"> <!--Category and brand-->
                          <label for="category" class="col-sm-2 control-label"> ক্যাটাগরি    </label>
                       <div class="col-lg-9">
                        <input type="text" class="form-control" id="category" name="categoryName" placeholder="অবশ্যই পুরণ করুণ"required>
                           @foreach ($errors->get('categoryName') as $error)
                                   <p style="color: red">{{ $error}}</p>
                                   @endforeach
                          
                          </div><br><br><br>
                        <div class="text-center">
                          <button type="submit" class="btn btn-info">সংরক্ষণ করুন</button> 
                          <button type="reset" class="btn btn-danger">বাতিল করুন</button>
                        </div>
                         </form><!--end form-->
                      </div><!--Category and brand-->
                      <div class="col-lg-4">

                      </div>
                   </div>  
                  </div> 

                  <!--Search option starts-->
                      <div class="row">
                        <div class="col-md-8"></div>


                        <div class="col-md-1">
                          <label for="searchByCategoryName"  class="col-md-4  control-label">খুঁজুন</label>
                          
                        </div>

                        <div class="col-md-3">
                          <input type="text" class="form-control" id="searchByCategoryName" name="searchByCategoryName" placeholder=" খুঁজুন....">
                        </div>


                      </div>

                      <!--Search option stops-->
               </div> 

                <div id="allCategories">
                  <table class="table table-responsive table-hover table-striped table-bordered table-condensed">
                <thead class="bg-primary">
                <tr>
                  <th>#</th>
                  <th>ক্যাটাগরি</th>
                  <th>সম্পাদনা</th>
                 </tr>
                </thead>
                @php $i=0; @endphp
                @if(isset($categories))
                  @foreach ($categories as $category)
                  @php $i++ @endphp
              <tbody>
                <tr>
                  <th scope="row">{{$i}}</th>
                   <td>{{$category->categoryName}}</td>
                  <td>
                    <a href="{{route('setup.catedit',[$category->id])}}"><i class="fa fa-edit" style="font-size:24px"></i></a>
                  </td>
                </tr>
               @endforeach
               @endif
             
              </tbody>  
            </table>
              </div>
                <div id="searchedCategoryValue"></div>
              </div>
          </div>
      
          </div>
        </div>



    <!--footer-->
    <div class="footer">
       <p>&copy; 2019  All Rights Reserved | Design by <a href="https://deshisysltd.com/" target="_blank">Deshi Systems Ltd.</a></p>       
    </div>
    <!--//footer-->

        
    
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
  
    <!-- //for index page weekly sales java script -->
    
    
    <!-- Bootstrap Core JavaScript -->
   <script src="/js/bootstrap.js"> </script>
    <!-- //Bootstrap Core JavaScript -->

    {{-- for search --}}
   <script>
       $( function() {
           var categoryNameTags={!!$categories->unique('categoryName')->pluck('categoryName')!!};
          //  console.log(categoryNameTags);
           $( "#searchByCategoryName" ).autocomplete({
                source: categoryNameTags
            });
       });
       $( "#searchByCategoryName" ).autocomplete({
            select: function( event, ui ) {
                $.ajax({
                    type:'GET',
                    url: "{{route('searchByCategoryName')}}",
                    data:{
                        categoryName: ui.item.value
                    },
                    success: function(data){
                        $("#allCategories").hide();
                        $("#searchedCategoryValue").html(data);
                        $("#searchedCategoryValue").show();
                    }
                });
                // console.log($("#searchByBrandName").val());
            }
        });
        //This key up event handler is to only handle when the searchByBrandName field is empty
        $("#searchByCategoryName").keyup(function() {
            //When the search value is empty then this function will work
            if (!this.value) {
                $("#allCategories").show();
                $("#searchedCategoryValue").hide();
            }
        });
   </script>
    
</body>
</html>

<!DOCTYPE HTML>
<html>
<head>
<title>Product information</title>
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
 <!--For autocomplete Search -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!--// For autocomplete Search -->
<style>
  .error{
    font-size: 0.9em;
    color: red;
  }
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="/js/pie-chart.js" type="text/javascript"></script>
 


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

            <div style="margin-top: 10px">
              <div class="col-lg-3">
                <img style="height: 50px; width: 50px;" src="/images/logo.png" alt="">
              </div>
              <div class="col-lg-9">
                 <h1 style="margin-left: -25px"><a class="navbar-brand" href="index.html">  BLRI<span class="dashboard_text" style="margin-left: -35px">Design dashboard</span></a></h1>
              </div>
             </div>
            </div>
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
                <i class="fa fa-folder"></i>
                <span>সেটআপ</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 @foreach($setuptypes as $setuptype)
                   
                    <li><a href="{{route('setup.'.strtolower($setuptype->SType))}}">
                      <i class="fa fa-circle"></i> {{$setuptype->SType}}</a></li>
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
                <i class="fa fa-edit"></i> <span>Product Distribution</span>
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
                                    <span class="prfil-img"><img src="/images/2.jpg" alt=""> </span> 
                                    <div class="user-name">
                                        <p>Admin Name</p>
                                        <span>Administrator</span>
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
                <h3 class="">পণ্যের তথ্য</h3>
              </div>
              <div class="form-body">
                <form class="form-horizontal" method="post" autocomplete="off" novalidate> 
                	@csrf
                  <div class="form-group"> <!--Form-->

                    <div class="row">
                       <!--left side starts-->
                      <div class="col-md-6">

                        <label for="productCode"  class="col-sm-6 control-label">পণ্যের কোড </label>
                       <div class="col-lg-6">
                          <input type="text" class="form-control" id="productCode" name="productCode"  value="{{ old('productCode',$productinfo->productCode) }}" onkeyup="productCheck()"  placeholder="অবশ্যই পুরণ করুণ"required>
                          <div class="error" id="productCodeError">{{$errors->first('productCode')}}</div>  
                        </div><br><br>

                          <label for="productName" class="col-sm-6 control-label">পণ্য </label>
                       <div class="col-lg-6">
                          <input type="text" class="form-control" id="productName" name="productName"  value="{{ old('productName',$productinfo->productName) }}" placeholder="অবশ্যই পুরণ করুণ"required>
                          <div class="error">{{$errors->first('productName')}}</div>
                        </div><br><br>


                      </div>
                      <!--End left side-->


                      <!--right side starts-->
                      <div class="col-md-6">
                          <label for="categoryName" class="col-sm-5 control-label">ক্যাটাগরি</label>
                          <div class="col-lg-7">
                              <select id="categoryName" name="categoryName" onchange="showBrand()" class="form-control required" required>
                                <option value="" >নির্বাচন করুন</option>
                              	@foreach($categories as $category)
                                 <option value="{{$category->id}}"{{old('categoryName',$productinfo->brand->category->id)==$category->id ?"selected":""}}>{{$category->categoryName}}</option>
                                 @endforeach
                              </select>
                              <div class="error">{{$errors->first('categoryName')}}</div>
                          </div><br><br>
                        
                          <label for="brandName" class="col-sm-5 control-label">ব্র্যান্ড</label>
                          <div class="col-lg-7">
                              <select id="brandName" name="brandName" class="form-control required" required>
                                <option value="">নির্বাচন করুন</option>
                                @if(old('categoryName',$productinfo->brand->category->id))
                                  @foreach($brands as $brand)
                                    @if (old('categoryName',$productinfo->brand->category->id) == $brand->category->id)
                                      <option value="{{$brand->brandName}}" {{old('brandName',$productinfo->brand->brandName)==$brand->brandName?"selected":""}}>{{$brand->brandName}}</option>
                                    @endif
                                  @endforeach
                                @endif
                              	
                              </select>
                              <div class="error">{{$errors->first('brandName')}}</div>

                          </div>
                          <br><br><br><br>

                          
                      </div>
                      <!--right side end-->

                      <!--buttons starts-->
                      <div class="row">
                        <div class="col-md-3">
                          
                        </div>
                        <br><br>
                        <div class="col-md-5">
                          <div class="text-center">
                          <input type="hidden" id="productId" name="productId" value="{{$productinfo->id}}">
                          <button type="submit" class="btn btn-info">সংরক্ষণ করুণ</button> 
                          <button type="reset" class="btn btn-danger">বাতিল করুণ</button>
                          </div>

                        </div>
                        <div class="col-md-4">
                          
                        </div>
                        
                      </div>
                      <!--button ends-->
                    </div>

                  </div>
                  
              </form>

                      <!--Search option stops-->

                     
                  </div> 
               </div> 

              
            </div>
          </div>
      
          </div>
        </div>
     
   
        <!--footer-->
      </div>
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
    <!-- //for index page weekly sales java script -->
    
    
    <!-- Bootstrap Core JavaScript -->
   <script src="/js/bootstrap.js"> </script>
   <script>
     var brands;
     $(function() {
       brands={!! $brands !!};
     })
    function showBrand() {
      var selectedCategory=$("#categoryName").val();
      // console.log(brands);
      $('#brandName').html('<option value="">Select a Brand</option>');
      if(brands!=undefined){
        brands.forEach(brand => {
          if(brand.category_id==selectedCategory)
            $('#brandName').append(`<option value="${brand.brandName}">${brand.brandName}</option>`); 
        });
      }
      
    }
    function productCheck() {
      $('#productCodeError').html('');
      $.ajax({
        url: "{{route("check.product.exist")}}",
        type:"post",
        data: { productCode: $("#productCode").val(), _token: '{{csrf_token()}}', productId:$("#productId").val() },
        success: function (data) {
          if(data!='success'){
            // console.log(data);
            
            $('#productCodeError').html(data.productCode[0]);
          }
        }
      });
    } 
   </script>

    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>elfanar online</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body dir="rtl">

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/" class="logo"><b>الصفحه الرئيسيه</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-left top-menu">
                    <li><a class="logout" href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">تسجيل خروج</a></li>
                </ul>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
            
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="../../storage/pdf/{{auth()->user()->cover_image}}" class="img-circle" width="60"></p>
                <h5 class="centered">{{auth()->user()->name}}</h5>
              	  	
                  <li class="mt"> 
                      <a href="/">
                          <i class="fa fa-dashboard"></i>
                          <span>الصفحه الرئيسيه</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                    <a href="/profile/{{auth()->user()->id}}/edit">
                        <i class="fa fa-dashboard"></i>
                        <span>تعديل الاعدادت الشخصيه</span>
                    </a>
                </li>
                  @can('isAdmin')
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>الموظفين</span>
                      </a>
                      <ul class="sub">
                  
                        <li><a  href="/add_employee">اضافه موظف</a></li>
                          <li><a  href="/list_employee">بحث عن موظف</a></li>
                      </ul>
                  </li>
                  @endcan
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>المعلمين</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/add_teacher">اضافه معلم</a></li>
                          <li><a  href="/list_teachers">بحث عن معلم</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>الطلاب</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/list_students">تاكيد الطلاب</a></li>
                          @can('isSuperAdmin')
                          <li><a  href="/delete_student">مسح الطلاب</a></li>
                          @endcan
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>الميديا</span>
                      </a>
                      <ul class="sub">
                        <li><a  href="/add_video">اضافه فيديو</a></li>
                        <li><a  href="/add_photo">اضافه صوره</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-tasks"></i>
                            <span>cards</span>
                        </a>
                        <ul class="sub">
                          <li><a  href="/cards/create">add card</a></li>
                          <li><a  href="/add_photo">list cards</a></li>
                        </ul>
                    </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>CVs</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/add_vacancy">اضافه وظيقه</a></li>
                      </ul>
                      <ul class="sub">
                            <li><a  href="/list_vacancy">عرض الوضائف</a></li>
                        </ul>
                  </li>

                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            @include('inc.messages')
          	@yield('main_content')
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../js/subject.js"></script>


    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

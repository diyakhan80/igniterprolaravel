<header>
      <div class="headerTop">
        <div class="container-fluid clearfix">
          <ul class="float-left">
            <li><a href="tel:{{!empty($contact[0]['phone'])?$contact[0]['phone']:''}}"><i class="fa fa-phone"></i>+91-{{$contact[0]['phone']}}</a></li>
            <li><a href="mailto:{{!empty($contact[0]['email'])?$contact[0]['email']:''}}"><i class="fa fa-envelope"></i>{{$contact[0]['email']}}</a></li>
          </ul>
          <ul class="float-right">
            <li><a href="{{$social[0]['url']}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{$social[1]['url']}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{$social[2]['url']}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a class="whatsapp" href="https://api.whatsapp.com/send?phone=91{{$contact[0]['whatsapp']}}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
      <nav  class="nim-menu navbar navbar-default headerbtm allpageheader">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('images/logo.png')}}" alt="igniterpro" id="loading"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right mobile-white-background">
              <li><a href="{{url('/')}}" class="page-scroll">Home</a></li>
              <li><a href="#one" class="page-scroll">About Us</a></li>
              <li><a href="{{url('products')}}" class="page-scroll">Products</a></li>
              <!-- <li><a href="#three" class="page-scroll">Team</a></li> -->
              <li><a href="{{url('portfolio')}}" class="page-scroll">Portfolio</a></li>
              <!-- <li><a href="#three" class="page-scroll">Courses</a></li> -->
              <li class="dropdown">
                <a href="#three" class="dropdown-toggle page-scroll" data-toggle="dropdown" role="button" aria-expanded="false">Courses<span class="caret"></span></a>
                <ul class="dropdown-menu multi-level" role="menu">
                  @php
                    $courses = _arefy(App\Models\Course::where('status','=','active')->get());
                  @endphp
                  @foreach($courses as $course)
                    <li><a href="javascript:void(0);">{{$course['course_name']}}</a></li>
                  @endforeach
                </ul>
              </li>

              <li class="dropdown">
                <a href="#four" class="dropdown-toggle page-scroll" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></a>
                <ul class="dropdown-menu multi-level" role="menu">
                  <li><a href="{{url('services/training')}}" class="page-scroll">Training</a></li>
                  <li><a href="{{url('services/development')}}" class="page-scroll">Software Development</a></li>

                  <!-- <li class="dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">H</a>
                    <ul class="dropdown-menu">
                      <li><a href="#">I</a></li>
                      <li><a href="#">J</a></li>
                      <li><a href="#">K</a></li>
                    </ul>
                  </li> -->
                  <li><a href="{{url('services/mobile_development')}}" class="page-scroll">Mobile Development</a></li>
                  <li><a href="{{url('services/products')}}" class="page-scroll">Products</a></li>
                  <li><a href="{{url('services/seo')}}" class="page-scroll">Search Engine Optimization</a></li>
                  <li><a href="{{url('services/digitalmarketing')}}" class="page-scroll">Digital Marketing</a></li>
                  <li><a href="{{url('services/erp')}}" class="page-scroll">ERP</a></li>
                  </ul>
              </li>
              <!-- <li><a href="#five" class="page-scroll">Status</a></li> -->
               <li><a href="{{url('reviews')}}" class="page-scroll">Reviews</a></li>
               <li><a href="{{url('career') }}" class="page-scroll">Career</a></li>
              <li><a href="{{url('contact') }}" class="page-scroll">Contact Us</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
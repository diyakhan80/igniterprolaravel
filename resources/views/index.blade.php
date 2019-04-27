<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="igniterpro,igniter,top software company,lucknow best software company" />
	<title>IgniterPro</title>
	
	<!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/library/font-awesome-4.3.0/css/font-awesome.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i" rel="stylesheet"> 

	<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/owl.theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/magnific-popup.css') }}">
	<!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/library/bootstrap/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/library/bootstrap/css/bootstrap.css') }}">
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/color/rose.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/IgnitorproStyle.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/css/Incognito_responsive.css') }}">
</head>
<body >
<!-- [ LOADERs ]
================================================================================================================================-->	
<div class="preloader">
  <div class="loader theme_background_color">
  <span></span>

  </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">
  <!-- [NAV]
 ============================================================================================================================-->    
   <!-- Navigation
    ==========================================-->
    <nav  class="nim-menu navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="{{url('/')}}">Igniter<span class="themecolor">Pro</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('/')}}" class="page-scroll">Home</a></li>
            <li><a href="#one" class="page-scroll">About Us</a></li>
            
            <!-- <li><a href="#three" class="page-scroll">Team</a></li> -->
            <li><a href="#two" class="page-scroll">Recent Works</a></li>
            <!-- <li><a href="#three" class="page-scroll">Courses</a></li> -->
            <li class="dropdown">
              <a href="#three" class="dropdown-toggle page-scroll" data-toggle="dropdown" role="button" aria-expanded="false">Courses <span class="caret"></span></a>
              <ul class="dropdown-menu multi-level" role="menu">
                <li><a href="{{url('courses/android')}} " class="page-scroll">Android</a></li>
                <li><a href="{{url('courses/php')}}" class="page-scroll">PHP</a></li>

                <!-- <li class="dropdown-submenu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">H</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">I</a></li>
                    <li><a href="#">J</a></li>
                    <li><a href="#">K</a></li>
                  </ul>
                </li> -->
                <li><a href="{{url('courses/python')}}" class="page-scroll">Python</a></li>
                <li><a href="{{url('courses/java')}}" class="page-scroll">Java</a></li>
                <li><a href="{{url('courses/ios')}}" class="page-scroll">iOS</a></li>
                <li><a href="{{url('courses/wordpress')}}" class="page-scroll">WordPress</a></li>
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


   <!-- [/NAV]
 ============================================================================================================================--> 
    
   <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
   <section class="main-heading" id="home">
       <div class="overlay">
           <div class="container">
               <div class="row">
                   <div class="main-heading-content col-md-12 col-sm-12 text-center">
        <h1 class="main-heading-title">We are<span class="main-element themecolor" data-elements="Web Developers,Creative,Ambitious"></span></h1>
       <!-- <p class="main-heading-text" style="color:black">At IgniterPro, we develop innovative and creative products and services that provide total communication and information solutions. Among a plethora of services, web design and development, tailor made applications, ERPs, CRMs, e-commerce solutions, business-to-business applications, business-to-client applications, managed hosting and internet portal management are few that we offer. Satisfied clients around the globe bear testimony to the quality of our work. </p>-->
        <div class="btn-bar">
         <!--  <a href="#" class="btn btn-custom theme_background_color">Ge Started</a> -->
         <!--  <a href="#eight"  class="btn btn-custom-outline page-scroll">Contact Us</a> -->
        </div>
      </div>
               </div>
           </div>
       </div>  
      
   </section>
    
 <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
 
 
 <!-- [ABOUT US]
 ============================================================================================================================-->
 <section class="aboutus white-background black" id="one">
     <div class="container">
         <div class="row">
             <div class="col-md-12 text-center black">
                 <h3 class="title">ABOUT <span class="themecolor">US</span></h3>
            <p class="a-slog">At IgniterPro we deliver two intertwined Solutions . Training and Development:
</br>
Keeping in mind the ever changing software industry we make sure that we only offer the latest trends in the market to make our customers stay ahead in the curve.
</br>
Providing Adavanced IT training and Adherence to client timely delivery with the most optimal cost is the most sought after solution ,we walk an extra mile to make sure we do just that with the right focus.</p> 
             </div>
         </div>
         <div class="gap">
             
         </div>
         
         <div class="row about-box">
          <div class="col-sm-4 text-center detailbox">
            <div class="margin-bottom">
              <i ><img src="images/insight.png"></i>
              <h4> INSIGHT</h4>
              <p class="black">We understand the specific cause and effect of your project.</p>
            </div> <!-- / margin -->
          </div> <!-- /col -->
          <div class="col-sm-4 about-line text-center detailbox">
            <div class="margin-bottom">
              <i ><img src="images/analysis.png"></i>
              <h4>ANALYSIS</h4>
              <p class="black">We examine with detail the elements and structure of your company.</p>
            </div> <!-- / margin -->
          </div><!-- /col -->
          <div class="col-sm-4 text-center detailbox">
            <div class="margin-bottom">
              <i ><img src="images/brainstorming.png"></i>
              <h4>BRAINSTORMING</h4>
              <p class="black">All our great minds are brought together for your benefit.</p>
            </div> <!-- / margin -->
          </div><!-- /col -->
           <div class="col-sm-4 text-center detailbox">
            <div class="margin-bottom">
              <i ><img src="images/design.png"></i>
              <h4> DESIGN</h4>
              <p class="black">After all the preparation steps the hard work begins.</p>
            </div> <!-- / margin -->
          </div> <!-- /col -->
          <div class="col-sm-4 about-line text-center detailbox">
            <div class="margin-bottom">
              <i ><img src="images/development.png"></i>
              <h4>DEVELOPMEMT</h4>
              <p class="black">Our developers take charge of translating the design into interactive digits.</p>
            </div> <!-- / margin -->
          </div><!-- /col -->
          <div class="col-sm-4 text-center detailbox">
            <div class="margin-bottom">
              <i ><img src="images/testing.png"></i>
              <h4>TESTING</h4>
              <p class="black">This is the final step before advertising. The project’s functionality is thoroughly tested.</p>
            </div> <!-- / margin -->
          </div><!-- /col -->
        </div> <!-- /row -->
         
         
         
         
     </div>
 </section>
 
 
 <!-- [/OUR VISION]
 ============================================================================================================================-->
 <section class="aboutus white-background black" id="one">
     <div class="container">
         <div class="row">
             <div class="col-md-12 text-center black">
                 <h3 class="title">OUR <span class="themecolor">VISION</span></h3>
                 <br/>
                 <img src="images/vision.png" height="220px" width="350px" alt="">
            <p class="a-slog">Our Vision is to become a top global technology service providers by offering a complete spectrum of Managed IT consultants, e-business, Internet and communication technology services and components in an environment of empowerment, intellectual challenge and wealth sharing. We are here to make every brand more inspiring and the world more intelligent. We provide you quality approved with high-performance relevant products and support which is very easy to buy and use.</p> 
             </div>
         </div>
         <div class="gap">
             
         </div>
         
         
         
         
         
         
     </div>
 </section>
 
 
 
 <!-- [RECENT-WORKS]
 ============================================================================================================================-->
     <section class="recent-works text-center" id="two">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <h3 class="title"><span class="themecolor">Recent Works</span></h3>
            <p class="a-slog">These  are some of the work projects that we recently developed ...</p>
          </div> 
        </div>
          
          <div class="gap"></div>

        <div class="row">
          <div class="col-sm-4 port-item margin-bottom">
            <div class="item-img-wrap">
              <img src="images/work-1.jpg" class="img-responsive" alt="workimg">
              <div class="item-img-overlay">
                <a href="images/work-1.jpg" class="show-image">
                  <span></span>
                </a>
              </div>
            </div>
            <div class="work-desc">
              <h3><a href="#">Mockup Design</a></h3>
              <span>Photoshop</span>
            </div>
          </div> <!-- /portfolio-item -->

          <div class="col-sm-4 port-item margin-bottom">
            <div class="item-img-wrap">
              <img src="images/work-2.jpg" class="img-responsive" alt="workimg">
              <div class="item-img-overlay">
                <a href="images/work-2.jpg" class="show-image">
                  <span></span>
                </a>
              </div>
            </div>
            <div class="work-desc">
              <h3><a href="#">Graphic Design</a></h3>
              <span>Illustrator</span>
            </div>
          </div> <!-- /portfolio-item -->

          <div class="col-sm-4 port-item margin-bottom">
            <div class="item-img-wrap">
              <img src="images/work-3.jpg" class="img-responsive" alt="workimg">
              <div class="item-img-overlay">
                <a href="images/work-3.jpg" class="show-image">
                  <span></span>
                </a>
              </div>
            </div>
            <div class="work-desc">
              <h3><a href="#">Web Design</a></h3>
              <span>Html / Css</span>
            </div>
          </div> <!-- /portfolio-item -->
        </div> <!-- /row -->

        <div class="row">
          <div class="col-md-12 text-center">
            <!--<a href="#" class="btn btn-custom theme_background_color">Load More</a>-->
          </div>
        </div> <!-- /row -->

      </div> <!-- /container -->
    </section>
    <!-- / Portfolio -->
 
 
 <!-- [/OUR-RECENT WORKS]
 ============================================================================================================================-->
 
  <!-- [OUR TEAM]
 ============================================================================================================================-->
  <!-- <section class="our-team white-background black" id="three">
      <div class="container">
       <div class="row text-center">
          <div class="col-md-12">
              <h3 class="title">Creative <span class="themecolor">Team</span></h3>
            <p class="a-slog">Lorem ipsum dolor sit amet ne onsectetuer adipiscing elit. Aenean commodo ligula eget dolor in tashin ty</p>
          </div> 
        </div>
          <div class="row text-center">
          <div class="col-sm-3">
            <img src="images/team-1.jpg" alt="team-member" class="img-responsive">
            <h4>Ramshad Smith</h4>
            <h5>Founder</h5>
            <p>Hey, I’m Johm Smith residing in this beautiful world. I create websites and mobile...</p>
            <ul class="list-inline top20">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>

          <div class="col-sm-3">
            <img src="images/team-2.jpg" alt="team-member" class="img-responsive">
            <h4>Meera Deo</h4>
            <h5>Web Designer</h5>
            <p>Hey, I’m Meera Deo residing in this beautiful world. I create websites and mobile...</p>
            <ul class="list-inline top20">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div> 

          <div class="col-sm-3">
            <img src="images/team-3.jpg" alt="team-member" class="img-responsive">
            <h4>Ramkumar Deo</h4>
            <h5>Manager</h5>
            <p>Hey, I’m Ramkumar Deo residing in this beautiful world. I create websites and mobile...</p>
            <ul class="list-inline top20">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div> 

          <div class="col-sm-3">
            <img src="images/team-4.jpg" alt="team-member" class="img-responsive">
            <h4>Antony Kovalsky</h4>
            <h5>Graphic Designer</h5>
            <p>Hey, I’m Antony Kovalsky residing in this beautiful world. I create websites and mobile...</p>
            <ul class="list-inline top20">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
        </div> 

        <div class="row margin-top">
          <div class="col-md-12 text-center">
            <a href="#" class="btn btn-custom theme_background_color ">We are Hiring</a>
          </div> 
        </div> 
          
      </div>
  </section> -->
 
 <!-- [/OUR TEAM]
 ============================================================================================================================-->
 
 
 
 
 <!-- [INSPIRATION]
 ============================================================================================================================-->
 <section class="inspiration" id="four">
     <div class="overlay">
         <div class="container">
             <div class="row">
                 <article class="col-md-12 text-center">
            <div class="intermediate-container">
              <div class="subheading">
                  <h4>Are You Ready To <span class="themecolor">Enjoy?</span></h4>
              </div>
              <div class="heading">
                <h2>inspire your customer here!</h2>
              </div>
              <div class="">
                <a class="btn btn-custom-outline" href="#"><span>get started</span></a>
              </div>
            </div>
          </article>
             </div>
         </div>
     </div>
 </section>
 
 <!-- [/INSPIRATION]
 ============================================================================================================================--> 

 <!-- [STATS]
 ============================================================================================================================-->
 <!-- <section class="our-stats" id="five">
 <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-ge"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="4763904" data-to="4764504" data-speed="5000"
                                  data-refresh-interval="50"></span>

                            <h5>Total Downloaded</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-git-square"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="1" data-to="504" data-speed="5000"
                                  data-refresh-interval="50"></span>

                            <h5>Editors Supported</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="1" data-to="359" data-speed="5000"
                                  data-refresh-interval="50"></span>

                            <h5>Languages Detected</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-gears"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="3500" data-to="5000" data-speed="5000"
                                  data-refresh-interval="50"></span>

                            <h5>Happy Clients</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </section> -->
 
 
 
 <!-- [/STATS]
 ============================================================================================================================-->
 
 
 
 <!-- [TESTIMONIAL]
 ============================================================================================================================-->
 <section class="client-testimonial text-center white" id="six">
  
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <h3 class="title">Client <span class="themecolor">Testimonials</span></h3>            
          </div> 
                
                    <div class="col-md-8 col-md-offset-2 grey">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">
                                <h5>The IgniterPro has its skilled developers always at effective service providing fast as well as accurate delivery of milestones set for the project</h5>
                                <p><strong>Shubham Jain</strong></p>
                            </div>

                            <div class="item">
                                <h5>I am very happy by the work done by IgniterPro, my website was developed with great enthusiasm</h5>
                                <p><strong>Shubham Agarwal</strong></p>
                            </div>

                            <div class="item">
                                <h5>The team is very professional and has talented members, who keep their clients satisfied and happy</h5>
                                <p><strong>Mayra Khan</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
     
     
 </section> 
 
 <!-- [/TESTIMONIAL]
 ============================================================================================================================-->
 
 <!-- [/SERVICES]
 ============================================================================================================================-->
 
 
 <section class="services white-background black" id="seven">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
              <h3 class="title">We Are <span class="themecolor">Good In</span></h3>
            <p class="a-slog">We promise to deliver the best or nothing!</p>
          </div> <!-- /col -->
        </div> <!-- /row -->
        <div class="gap"></div>

        <div class="row">
          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-diamond"></i>
              <div class="nim-service-detail">
                <h4>Social Media Marketing</h4>
                <p>We can create and manage effective social media marketing campaigns to grow your business while targeting the right audience and building a valid clientele. Unlike traditional advertising, your message is delivered around the world in a matter of seconds.</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->

          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-tablet"></i>
              <div class="nim-service-detail">
                <h4>Web Design And Development</h4>
                <p>IgniterPro offers customer-oriented web design services and more importantly, deliver them effectively.
                If you go through our portfolio, you will realize that our web designs are all unique and combined with passionate animations reflecting the corporate identity of our clients following the latest trends and technologies such as responsive design and development, parallax and more! Our team of dedicated artists would spend days creating supernatural concepts translating imagination into images to present an accurate web design.</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->

          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-magic"></i>
              <div class="nim-service-detail">
                <h4>SEO</h4>
                <p>SEO is a marketing discipline focused on growing visibility in organic (non-paid) search engine results. SEO encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines.</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->       
        </div> <!-- end row -->

        <div class="row">
          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-rocket"></i>
              <div class="nim-service-detail">
                <h4>Mobile Application</h4>
                <p>One of the fundamental promises we gave ourselves when IgniterPro was born, is to always keep pace with the latest innovations and technologies to provide the users with a smooth navigation experience by creating a digital smart interface.Using the latest development technologies and design trends, we thrive to bring you the most vibrant and upbeat mobile applications.</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->

          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-map-marker"></i>
              <div class="nim-service-detail">
                <h4>Analytics</h4>
                <p>Analytics is the discovery, interpretation, and communication of meaningful patterns in data. Our analytics section relies on the simultaneous application of statistics, computer programming and operations research to quantify performance.</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->

          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-paypal"></i>
              <div class="nim-service-detail">
                <h4>Dedicated Support</h4>
                <p>We provide support to our clients at every milestone of the project and try to reduce all difficulties that he faces throughout the time</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->         
        </div> <!-- end row -->

        <div class="row">
          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-bar-chart-o"></i>
              <div class="nim-service-detail">
                <h4>Truly Multipurpose</h4>
                <p>All our projects and work will be multipurpose, and can be modified as per client's perspective</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->

          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-delicious"></i>
              <div class="nim-service-detail">
                <h4>Unlimited Colors</h4>
                <p>We put a lot of effort in design, as it’s the most important ingredient of successful website.</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->

          <div class="col-sm-4">
            <div class="nim-service margin-bottom">
              <i class="fa fa-pencil-square"></i>
              <div class="nim-service-detail">
                <h4>Web Services</h4>
                <p>We have implemented the Content Management System within its workflow to help our clients create, edit and manage the content of their websites and increase customer satisfaction. The WALL CMS provides a versatile and effective way to update and control site content. Our team works through your website backend tool to add, edit and update your content in a professional way.</p>
              </div> <!-- /nim-service-detail -->
            </div> <!-- /nim-service margin-bottom -->
          </div> <!-- /col -->                      
        </div> <!-- end row -->

      </div>  <!-- container -->
    </section>
 
 
 <!-- [/SERVICES]
 ============================================================================================================================-->
 
 
 <!-- [CONTACT]
 ============================================================================================================================-->
 <!--sub-form-->

<!--sub-form end--> 


 
 <!-- [/CONTACT]
 ============================================================================================================================-->
 
 
 <!-- [FOOTER]
 ============================================================================================================================-->
 
<footer class="site-footer section-spacing text-center " id="eight">
    
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <p class="footer-links"><a href="#">Terms of Use</a> <a href="#">Privacy Policy</a></p>
      </div>
      <div class="col-md-4"> <small>&copy; 2018 IgniterPro. All rights reserved.</small></div>
      <div class="col-md-4"> 
        <!--social-->
        
        <ul class="social">
          <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter "></i></a></li>
          <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
        
        <!--social end--> 
        
      </div>
    </div>
  </div>
</footer>

 
 
 <!-- [/FOOTER]
 ============================================================================================================================-->
 
 
 
</div>
 

<!-- [ /WRAPPER ]
=============================================================================================================================-->

	<!-- [ DEFAULT SCRIPT ] -->
	<script src="{{asset('assets/global/library/modernizr.custom.97074.js') }}"></script>
	<script src="{{asset('assets/global/library/jquery-1.11.3.min.js') }}"></script>
        <script src="{{asset('assets/global/library/bootstrap/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{asset('assets/global/js/jquery.easing.1.3.js') }}"></script>	
	<!-- [ PLUGIN SCRIPT ] -->
        <script src="{{asset('assets/global/library/vegas/vegas.min.js') }}"></script>
	<script src="{{asset('assets/global/js/plugins.js') }}"></script>
        <!-- [ TYPING SCRIPT ] -->
         <script src="{{asset('assets/global/js/typed.js') }}"></script>
         <!-- [ COUNT SCRIPT ] -->
         <script src="{{asset('assets/global/js/fappear.js') }}"></script>
       <script src="{{asset('assets/global/js/jquery.countTo.js') }}"></script>
	<!-- [ SLIDER SCRIPT ] -->  
        <script src="{{asset('assets/global/js/owl.carousel.js') }}"></script>
         <script src="{{asset('assets/global/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('assets/global/js/SmoothScroll.js') }}"></script>
        
        <!-- [ COMMON SCRIPT ] -->
	<script src="{{asset('assets/global/js/common.js')}} "></script>
  
</body>


</html>
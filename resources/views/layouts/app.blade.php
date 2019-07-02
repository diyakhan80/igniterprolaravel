<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="{{ asset('assets/global/css/preloader.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

      
        <meta charset="utf-8"/>
        <title>IgniterPro</title>
        
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
       
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/library/font-awesome-4.3.0/css/font-awesome.min.css') }}" >


        <link rel="shortcut icon" type="image/x-icon" href="{{url('images/favicon-ico.png')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/owl.theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/library/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
        
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/color/rose.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/IgnitorproStyle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/Incognito_responsive.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
        <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/bower_components/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/main.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/engine1/style.css') }}" />
	      <script type="text/javascript" src="{{ asset('assets/global/engine1/jquery.js') }}"></script> --}}


    </head>
    <body class="page-md login">
        <div class="preloader">
            {{-- <div class="loader theme_background_color">
            <span></span> --}}
            <div class="animation-container">
              <div class="lightning-container">
                <div class="lightning white"></div>
                <div class="lightning red"></div>
              </div>
              <div class="boom-container">
                <div class="shape circle big white"></div>
                <div class="shape circle white"></div>
                <div class="shape triangle big yellow"></div>
                <div class="shape disc white"></div>
                <div class="shape triangle blue"></div>
              </div>
              <div class="boom-container second">
                <div class="shape circle big white"></div>
                <div class="shape circle white"></div>
                <div class="shape disc white"></div>
                <div class="shape triangle blue"></div>
              </div>
            </div>
            </div>
        </div>
        
        
                @yield('content')
        
        
        <!-- <script src="{{ asset('assets/global/library/modernizr.custom.97074.js') }}"></script> -->
        <script src="{{ asset('assets/global/library/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ asset('assets/global/library/bootstrap/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/global/js/jquery.easing.1.3.js') }}"></script>  
        <script src="{{ asset('assets/global/library/vegas/vegas.min.js') }}"></script>
        <script src="{{ asset('assets/global/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/global/js/typed.js') }}"></script>
        <!-- <script src="{{ asset('assets/global/js/fappear.js') }}"></script> -->
        <script src="{{ asset('assets/global/js/jquery.countTo.js') }}"></script>
        <script src="{{ asset('assets/global/js/wow.js') }}"></script>
        <script src="{{ asset('assets/global/js/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/global/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('assets/global/js/main.js') }}"></script>
        <!-- <script src="{{ asset('js/select2.full.min.js')}}" type="text/javascript"></script> -->

        <script src="{{ asset('/bower_components/sweetalert2/dist/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            // Check Radio-box
              $(".rating input:radio").attr("checked", false);
        
              $('.rating input').click(function () {
                  $(".rating span").removeClass('checked');
                  $(this).parent().addClass('checked');
              });
        
              $('input:radio').change(
                function(){
                  var userRating = this.value;
                  $('.rate').val(userRating);
                 
              });
              // $('body').scroll(function(){
              //   $(".headerbtm").addClass(" navbar-fixed-top");
              // });
              $('#testimonial').owlCarousel({
                  items:2,
                  loop:true,
                  margin:10,
                  nav:false,
                  slideTransition: 'linear',
                  autoplaySpeed: 2000,
                  autoplay:true,
                  // autoplayTimeout:3000,
                  // autoplayHoverPause:true,
                  responsive: {
                    0: {
                        items: 1
                    },
                    360: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    991: {
                        items: 2
                    },
                    1600: {
                        items: 2
                    }
                }
              });
          });

          $(document).ready(function(){
            $("#testimonials-user").owlCarousel({
                  // items:4,
                  loop:true,
                  margin:10,
                  nav:false,
                  slideTransition: 'linear',
                  autoplaySpeed: 2000,
                  autoplay:true,
                  // autoplayTimeout:3000,
                  // autoplayHoverPause:true,
                  responsive: {
                    0: {
                        items: 1
                    },
                    360: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    991: {
                        items: 2
                    },
                    1600: {
                        items: 2
                    }
                }
              });

            $("#sliderbanner").owlCarousel({
                  items:1,
                  loop:true,
                  margin:10,
                  nav:false,
                  slideTransition: 'linear',
                  autoplaySpeed: 2000,
                  autoplay:true
              });
        });

    
    </script>  
    <script type="text/javascript">
        AOS.init({
          duration: 1200,
          disable: 'mobile'
        })
    </script>

        <script src="{{ asset('assets/global/js/common.js') }}"></script>
        <script src="{{asset('js/script.js') }}"></script>
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

          <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="{{ asset('assets/global/engine1/wowslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/engine1/script.js') }}"></script>
 
    </body>
</html>

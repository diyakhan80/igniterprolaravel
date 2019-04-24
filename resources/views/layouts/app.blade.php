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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

      
        <meta charset="utf-8"/>
        <title>IgniterPro</title>
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
       
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/library/font-awesome-4.3.0/css/font-awesome.min.css') }}" >


        <link rel="shortcut icon" type="image/x-icon" href="{{url('images/logo.png')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/owl.theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/magnific-popup.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/library/bootstrap/css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/library/bootstrap/css/bootstrap.css') }}">
       
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/color/rose.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/IgnitorproStyle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/Incognito_responsive.css') }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/bower_components/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet">
    </head>
    <body class="page-md login">
        <div class="preloader">
            <div class="loader theme_background_color">
            <span></span>

            </div>
        </div>
        
                @yield('content')
        
        
        <script src="{{ asset('assets/global/library/modernizr.custom.97074.js') }}"></script>
        <script src="{{ asset('assets/global/library/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ asset('assets/global/library/bootstrap/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/global/js/jquery.easing.1.3.js') }}"></script>  
        <script src="{{ asset('assets/global/library/vegas/vegas.min.js') }}"></script>
        <script src="{{ asset('assets/global/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/global/js/typed.js') }}"></script>
        <script src="{{ asset('assets/global/js/fappear.js') }}"></script>
        <script src="{{ asset('assets/global/js/jquery.countTo.js') }}"></script>
        <script src="{{ asset('assets/global/js/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/global/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('assets/global/js/SmoothScroll.js') }}"></script>
        <script src="{{ asset('js/select2.full.min.js')}}" type="text/javascript"></script>

        <script src="{{ asset('/bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
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
          });
    
    </script>  

        <script src="{{ asset('assets/global/js/common.js') }}"></script>
        <script src="{{asset('assets/global/js/script.js') }}"></script>

    </body>
</html>

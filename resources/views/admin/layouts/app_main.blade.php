<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8"/>
<title>{{env('APP_NAME', 'Igniterpro').' | '.$site_title}}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta name="_token" content="{{ csrf_token() }}">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{ asset('assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="{{ asset('assets/global/css/components-md.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/global/css/plugins-md.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/layout4/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/layout4/css/themes/light.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ asset('assets/admin/layout4/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}">
<link href="{{ asset('/bower_components/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet">
<link href="{{url('css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css"/>
 <link href="{{asset('assets/global/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" media="all">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

 
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>

<!-- END THEME STYLES -->
<script type="text/javascript">
    var asset_url = "{{ url('/') }}";
    var base_url  = "{{ url('/') }}";
</script>
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
    <div id="app">
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>  

<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{url('js/select2.full.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
<script src="{{ asset('/bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>    
<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="{{ asset('assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout4/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout4/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/index3.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/global/js/bootstrap-clockpicker.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="{{asset('assets/global/js/script.js')}}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">

    $('.date').datepicker({  

       format: 'yyyy-mm-dd'

     });  

</script>  
<script type="text/javascript">
    $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            donetext: 'Done'
        });
</script>
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },isLocal: false
    });
});      
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features 
    Index.init(); // init index page
 Tasks.initDashboardWidget(); // init tash dashboard widget  
});
</script>
@yield('requirejs')
<!-- END JAVASCRIPTS -->
  
</body>
</html>

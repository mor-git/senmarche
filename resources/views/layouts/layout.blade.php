<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/charts/chartist-bundle/chartist.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/charts/morris-bundle/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/charts/c3charts/c3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}" rel="stylesheet">
    

    <title>Sen Marche</title>
    
    <!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script> -->
    <!---------------------Pour tables---------------------------------------->

    <!-- <link href="/template/lib/highlightjs/styles/github.css" rel="stylesheet">
    <link href="/template/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="/template/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/template/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet"> -->
    <!----------------------Pour tables---------------------------------------->
</head>

<body>
    
    @include('layouts.navbar')
    @yield('contenu')
    @yield('script')
    @include('layouts.footer')

    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <!-- <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script> -->
    <!-- sparkline js -->
    <script src="{{ asset('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/morris-bundle/morris.js') }}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <!-- <script src="assets/libs/js/dashboard-ecommerce.js"></script> -->
    <!---------------------tables ---------------------------------------->
    <!-- <script src="/template/lib/highlightjs/highlight.pack.min.js"></script>
    <script src="/template/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/template/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/template/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/template/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script> -->
    
     <!---------------------tables ---------------------------------------->
    
    
</body>
 
</html>
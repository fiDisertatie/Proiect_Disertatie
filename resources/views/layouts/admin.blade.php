<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="robots" content="noindex,nofollow" />
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('assets/images/favicon.png') }}"
    />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos')}}"></div>
        <div class="lds-pos')}}"></div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div
    id="main-wrapper"
    data-layout="vertical"
    data-navbarbg="skin5"
    data-sidebartype="full"
    data-sidebar-position="absolute"
    data-header-position="absolute"
    data-boxed-layout="full"
>
@include('layouts.header')

@include('layouts.sidebar')

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            @yield('content')
        </div>

        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            Aplicație lucrare disertație Țurcanu Florin Gheorghe

        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
<script src="{{ asset('dist/js/waves.js')}}"></script>
<script src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
<script src="{{ asset('dist/js/custom.min.js')}}"></script>

<script src="{{ asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<!-- <script src="{{ asset('dist/js/pages/dashboards/dashboard1.js')}}"></script> -->
<script src="{{ asset('assets/libs/flot/excanvas.js')}}"></script>
<script src="{{ asset('assets/libs/flot/jquery.flot.js')}}"></script>
<script src="{{ asset('assets/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('assets/libs/flot/jquery.flot.time.js')}}"></script>
<script src="{{ asset('assets/libs/flot/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
<script src="{{ asset('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('dist/js/pages/chart/chart-page-init.js')}}"></script>

<script>
    $( document ).ready(function() {
        if ({{ Session::has('success') ? 1 : 0 }})
        {
            toastr.success("{{ Session::get('success') }}", "Succes");
        }

        if ({{ Session::has('info') ? 1 : 0 }})
        {
            toastr.info("{{ Session::get('info') }}", "Info");
        }

        if ({{ Session::has('warning') ? 1 : 0 }})
        {
            toastr.warning("{{ Session::get('warning') }}", "Avertizare");
        }

        if ({{ Session::has('danger') ? 1 : 0 }})
        {
            toastr.error("{{ Session::get('danger') }}", "Eroare");
        }
    });
</script>

@yield('custom-js')
</body>
</html>

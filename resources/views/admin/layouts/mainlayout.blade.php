<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Melody - @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Pignose Calender -->
    {{-- <link href="{{ asset('plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet"> --}}
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/datatablesbutton.css') }}">
    <link href="{{ asset('admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/select2/select2.min.css') }}" rel="stylesheet" />
    {{-- #5897fb --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/jquery.signature.css') }}">


    {{-- <link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}

    {{-- <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet"> --}}
    <!-- Page plugins css -->
    {{-- <link href="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet"> --}}
    <!-- Color picker plugins css -->
    <!-- Date picker plugins css -->
    {{-- <link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"> --}}
    <!-- Daterange picker plugins css -->
    {{-- <link href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"> --}}

    {{-- <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet"> --}}
    <!-- Custom Stylesheet -->

    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    @yield('css')

</head>

<body>


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div id="main-wrapper">

        @include('admin.partials.header')
        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')

    </div>


    <!--**********************************
Scripts
***********************************-->



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="{{ asset('admin/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/gleek.js') }}"></script>
    <script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>


    <!-- tables -->
    {{-- <script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{{ asset('admin/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>




    <script src="{{ asset('admin/plugins/moment/moment.js') }}"></script>
    {{-- <script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script> --}}
    <!-- Clock Plugin JavaScript -->
    {{-- <script src="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script> --}}
    <!-- Color Picker Plugin JavaScript -->
    {{-- <script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>
    <script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>
    <script src="{{ asset('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script> --}}
    <!-- Date Picker Plugin JavaScript -->
    {{-- <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
    <!-- Date range Plugin JavaScript -->
    {{-- <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script> --}}

    {{-- <script src="{{ asset('js/plugins-init/form-pickers-init.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Chartjs -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('admin/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ asset('admin/plugins/d3v3/index.js') }}"></script>
    <script src="{{ asset('admin/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script> --}}
    <!-- ChartistJS -->
    <script src="{{ asset('admin/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}"></script>

    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/signature_pad.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> --}}

    @yield('script')

</body>

</html>

@yield('sweetalert')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="HSBLCO Solution">
    <meta name="keywords"
        content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>HSBLCO Solution - @yield('page-title')</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/images/theme/favicon.png">
    <!-- Start css -->
    <!-- IziToast css -->
    <link href="{{ asset('backend') }}/plugins/izitoast/css/iziToast.css" rel="stylesheet" type="text/css">
    <!-- Switchery css -->
    <link href="{{ asset('backend') }}/plugins/switchery/switchery.min.css" rel="stylesheet">
    <!-- Sweet Alert css -->
    <link href="{{ asset('backend') }}/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables css -->
    <link href="{{ asset('backend') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('backend') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Apex css -->
    <link href="{{ asset('backend') }}/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{ asset('backend') }}/plugins/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/plugins/slick/slick-theme.css" rel="stylesheet">
    <!-- select2 css -->
    <link href="{{ asset('backend') }}/plugins/select2/select2.min.css" rel="stylesheet">
    <!-- Tagsinput css -->
    <link href="{{ asset('backend') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('backend') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet"
        type="text/css">
    <!-- Summernote css -->
    <link href="{{ asset('backend') }}/plugins/summernote/summernote-bs4.css" rel="stylesheet">

    <!-- Custom Dashboard css -->
    <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend') }}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend') }}/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend') }}/css/custom.css" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- End css -->
    @stack('css')
</head>

<body class="vertical-layout">
    <div id="containerbar">
        @include('backend.layouts.includes.sidebar')
        <div class="rightbar">
            @include('backend.layouts.includes.header')

            @include('backend.layouts.includes.breadcrumb')

            <div class="contentbar">
                @yield('content')
            </div>

            @include('backend.layouts.includes.footer')
        </div>
    </div>

    <!-- Start js -->
    <script src="{{ asset('backend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/js/popper.min.js"></script>
    <script src="{{ asset('backend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('backend') }}/js/modernizr.min.js"></script>
    <script src="{{ asset('backend') }}/js/detect.js"></script>
    <script src="{{ asset('backend') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('backend') }}/js/vertical-menu.js"></script>
    <!-- iziToast js -->
    <script src="{{ asset('backend') }}/plugins/izitoast/js/iziToast.js" type="text/javascript"></script>
    @include('vendor.lara-izitoast.toast')
    <!-- Switchery js -->
    <script src="{{ asset('backend') }}/plugins/switchery/switchery.min.js"></script>
    <!-- Sweet-Alert js -->
    <script src="{{ asset('backend') }}/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom/custom-sweet-alert.js"></script>
    <!-- Parsley js -->
    <script src="{{ asset('backend') }}/plugins/validatejs/validate.min.js"></script>
    <!-- Validate js -->
    <script src="{{ asset('backend') }}/js/custom/custom-validate.js"></script>
    <script src="{{ asset('backend') }}/js/custom/custom-form-validation.js"></script>
    <!-- Apex js -->
    <script src="{{ asset('backend') }}/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/apexcharts/irregular-data-series.js"></script>
    <!-- Slick js -->
    <script src="{{ asset('backend') }}/plugins/slick/slick.min.js"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('backend') }}/js/custom/custom-dashboard.js"></script>
    <!-- Datatable js -->
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom/custom-table-datatable.js"></script>
    <!-- Select2 js -->
    <script src="{{ asset('backend') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom/custom-select2.js"></script>
    <!-- Tagsinput js -->
    <script src="{{ asset('backend') }}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/bootstrap-tagsinput/typeahead.bundle.js"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom/custom-form-editor.js"></script>

    <!-- Core js -->
    <script src="{{ asset('backend') }}/js/core.js"></script>
    <script src="{{ asset('backend') }}/js/status-update.js"></script>
    <!-- End js -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    @stack('js')
</body>

</html>

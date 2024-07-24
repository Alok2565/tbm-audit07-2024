<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--meta http-equiv="Content-Security-Policy" content="default-src https:" /-->
        <title>@yield('title') | Transfer of Human Biological Material (THBM) </title>

        <link href="{{ asset('public/assets/backend/css') }}/custom.css" rel="stylesheet">
        <link href="{{ asset('public/assets/backend/css/exp_app.css') }}" rel="stylesheet">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/images/imcr-canvas-logo.jpg') }}">
        <link href="{{ asset('public/back/assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('public/back/assets/js/hyper-config.js') }}"></script>
        <link href="{{ asset('public/back/assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('public/back/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Datatables css -->
        <link href="{{ asset('public/back/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/back/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/back/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/back/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/back/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/back/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />


        <!--custom css -->
    <link href="{{ asset('public/back/assets/css/custom_style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/css') }}/custom.css" rel="stylesheet">
    </head>

    <body>
    <?php

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
$host = $_SERVER['HTTP_HOST'];
$refererHost = parse_url($referer, PHP_URL_HOST);
   if ($refererHost === $host) {
   }
   else
   {?>

	   <script>
    // Redirect the user to the specified URL
    window.location = "{{ url('/icmr/logout') }}";
</script>
  <?php }

 ?>
        <!-- Begin page -->
        <div class="wrapper">
            @include('icmr.layouts.top_right')
            @include('icmr.layouts.sidebar_nav')
            <div class="content-page">
            @yield('content')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Designed and Developed by <a href="javascript:void(0)"
                                    class="copy-right">National Informatics Centre (NIC)</a>.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- End Page content -->
        </div>
        <!-- END wrapper -->


<!-- Vendor js -->
<script src="{{ asset('public/back/assets/js/vendor.min.js') }}"></script>

<!-- Code Highlight js -->
<script src="public/assets/vendor/highlightjs/highlight.pack.min.js"></script>
<script src="public/assets/vendor/clipboard/clipboard.min.js"></script>
<script src="{{ asset('public/back/assets/js/hyper-syntax.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/select2/js/select2.min.js') }}"></script>

<script src="{{ asset('public/back/assets/js/pages/demo.typehead.js') }}"></script>
<script src="{{ asset('public/back/assets/js/pages/demo.timepicker.js') }}"></script>

<!-- App js -->
<script src="{{ asset('public/back/assets/js/app.min.js') }}"></script>
<!-- Datatables js -->
<script src="{{ asset('public/back/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('public/back/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        <!-- Datatable Demo Aapp js -->
        <script src="{{ asset('public/back/assets/js/pages/demo.datatable-init.js') }}"></script>


        <script src="{{ asset('public/assets/backend/js') }}/custom.js"></script>
        <script src="{{ asset('public/assets/backend/js/import.js') }}"></script>

        <script>
            var parentCheckbox = document.getElementById('flexCheckIndeterminate');
parentCheckbox.addEventListener('change', e => {
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.checked = e.target.checked
    })
});

document.querySelectorAll('tbody .form-check-input').forEach(checkbox => {
    checkbox.addEventListener('change', ()=> {
        var tbodyCheckbox = document.querySelectorAll('tbody .form-check-input').length;
        var tbodyCheckedbox = document.querySelectorAll('tbody .form-check-input:checked').length;
        if(tbodyCheckbox == tbodyCheckedbox){
            //console.log('All selected')
            parentCheckbox.indeterminate = false;
            parentCheckbox.checked = true;
        }
        if (tbodyCheckbox > tbodyCheckedbox && tbodyCheckedbox>=1) {
            // console.log('Some selected')
            parentCheckbox.indeterminate = true;
        }
        if(tbodyCheckedbox==0) {
            // console.log('No any selected')
            parentCheckbox.indeterminate = false;
            parentCheckbox.checked = false;
        }

    })
})
        </script>
		<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    </body>
</html>

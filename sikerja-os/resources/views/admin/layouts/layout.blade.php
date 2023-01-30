<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sikerja Pemdes | {{ $title }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

    <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">

    <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="../../plugins/clockpicker/css/bootstrap-clockpicker.css">
    <link rel="stylesheet" href="../../plugins/clockpicker/css/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" href="../../plugins/clockpicker/css/jquery-clockpicker.css">
    <link rel="stylesheet" href="../../plugins/clockpicker/css/jquery-clockpicker.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        @include('layouts.header')


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            @include('layouts.sidebar')
        </aside>

        <div class="content-wrapper">

            @yield('content')

        </div>


        @include('layouts.footer')
        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    {{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    {{-- <script src="plugins/chart.js/Chart.min.js"></script> --}}

    <script src="../../plugins/sparklines/sparkline.js"></script>

    <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>

    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>

    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="../../dist/js/adminlte.js?v=3.2.0"></script>

    {{-- <script src="dist/js/demo.js"></script> --}}

    <script src="../../dist/js/pages/dashboard.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"
        integrity="sha512-MC1YbhseV2uYKljGJb7icPOjzF2k6mihfApPyPhEAo3NsLUW0bpgtL4xYWK1B+1OuSrUkfOTfhxrRKCz/Jp3rQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.com/libraries/Chart.js "></script> --}}
    <script src="https://use.fontawesome.com/8694c308b7.js"></script>

    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>

    <script src="../../plugins/select2/js/select2.full.min.js"></script>

    <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>

    <script src="../../plugins/dropzone/min/dropzone.min.js"></script>
    <script src="../../plugins/clockpicker/js/bootstrap-clockpicker.js"></script>
    <script src="../../plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="../../plugins/clockpicker/js/jquery-clockpicker.js"></script>
    <script src="../../plugins/clockpicker/js/jquery-clockpicker.min.js"></script>
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $("#example3").DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
            });
        });
    </script>
    <script>
        let labels = ['Menit Efektif', 'Menit Tidak Efektif'];

        let itemData = ['60', '40'];

        const data = {
            labels: [
                'Ditolak',
                'Disetujui',
                'Belum Disetujui'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'pie',
            data: data,
        };

        const chart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    <script>
        const labels = Utils.months({
            count: 7
        });
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };
        const chart = new Chart(
            document.getElementById('myChart2'),
            config
        );
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 3</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css?v=3.2.0') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('admin.partials.footer')
    </div>



    <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset('admin/dist/js/adminlte.js?v=3.2.0')}}"></script>

    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

</body>

</html>
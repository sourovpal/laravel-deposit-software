<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Moltran - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/backend/images/favicon.ico') }}">
        <!-- Plugins css-->
        <link href="{{ asset('/backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/backend/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <style>
            .form-error{
                color: #ff006d;
                font-size: 14px;
                padding: 2px 0px;
                line-height: 16px;
            }
        </style>
        @stack('custom_styles')
</head>

<body>
    <div id="wrapper">

        @include('backend.layouts.header')

        @include('backend.layouts.sidebar')

        @yield('page_content')

    </div>

    <!-- Vendor js -->
    <script src="{{ asset('/backend/js/vendor.min.js') }}"></script>

    <script src="{{ asset('/backend/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/backend/libs/jquery-scrollto/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    
    <!-- Chat app -->
    <script src="{{ asset('/backend/js/pages/jquery.chat.js') }}"></script>

    <!-- Todo app -->
    <script src="{{ asset('/backend/js/pages/jquery.todo.js') }}"></script>

    @stack('custom_scripts')

    <!-- App js -->
    <script src="{{ asset('/backend/js/app.min.js') }}"></script>

    </body>
</html>
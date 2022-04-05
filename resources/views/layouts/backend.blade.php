<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="{{asset('backend/vendor/fontawesome/all.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('backend/css/main.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('backend/css/responsive.css')}}">
</head>

<body>
    <!-- sideBar wrapper -->
    @include('backend.partials.sidebar')

    <!-- content wrapper-->
    <div class="content-wrapper sideBars_open">
        <!-- top head start -->
        <header>
            <!-- nav wrapper -->
            <div class="nav_wrapper fixed-top">
                <!-- fixed navbar -->
                @include('backend.partials.navbar')
            </div>
        </header>

        <!-- Main content start -->
        @yield('content')
    </div>

    <!-- footer section -->
    @include('backend.partials.footer')


    <!--Start javascript -->
    <!-- jQuery.min.js -->
    <script type="text/javascript" src="{{asset('backend/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script type="text/javascript" src="{{asset('backend/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <!-- Optional js  -->
    <script type="text/javascript" src="{{asset('backend/js/main.js')}}"></script>
</body>

</html>
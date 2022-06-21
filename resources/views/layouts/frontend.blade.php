<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="{{asset('frontend/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- Customize styles -->
    <link href="{{asset('frontend/style.css')}}" rel="stylesheet" />
    <!-- font awesome styles -->
    <link href="{{asset('frontend/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

    <!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
  @include('frontend.partials.fixed-navbar')
    <div class="container">
        <div id="gototop"> </div>
        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        @yield('content')

        @include('frontend.partials.footer')
    </div>

    <div class="copyright">
        <div class="container">
            <p class="pull-right">
                <a href="#"><img src="{{asset('frontend/assets/img/maestro.png')}}" alt="payment"></a>
                <a href="#"><img src="{{asset('frontend/assets/img/mc.png')}}" alt="payment"></a>
                <a href="#"><img src="{{asset('frontend/assets/img/pp.png')}}" alt="payment"></a>
                <a href="#"><img src="{{asset('frontend/assets/img/visa.png')}}" alt="payment"></a>
                <a href="#"><img src="{{asset('frontend/assets/img/disc.png')}}" alt="payment"></a>
            </p>
            <span>Copyright &copy; 2013<br> bootstrap ecommerce shopping template</span>
        </div>
    </div>
    <a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/shop.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset('uploads/site/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('uploads/site/favicon.png')}}" type="image/x-icon">

    <title>@yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/vendors/scrollbar.css')}}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admins/cuba/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admins/cuba/assets/css/responsive.css')}}">


</head>
<body class="">
<!-- page-wrapper Start-->
<div class="px-5" id="">
    <!-- Page Body Start-->
    <div class="px-5">

        <div class="card-body">

            @yield('content')

        </div>

    </div>
</div>


<!-- latest jquery-->
<script src="{{asset('admins/cuba/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('admins/cuba/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('admins/cuba/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('admins/cuba/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('admins/cuba/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('admins/cuba/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('admins/cuba/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{asset('admins/cuba/assets/js/sidebar-menu.js')}}"></script>
@yield('script')
@if(Route::current()->getName() != 'popover')
    <script src="{{asset('admins/cuba/assets/js/tooltip-init.js')}}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('admins/cuba/assets/js/script.js')}}"></script>
<script src="{{asset('admins/cuba/assets/js/theme-customizer/customizer.js')}}"></script>


{{-- @if(Route::current()->getName() == 'index')
	<script src="{{asset('admins/cuba/assets/js/layout-change.js')}}"></script>
@endif --}}
<!-- Plugin used-->

<script type="text/javascript">
    if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
        $(".according-menu.other" ).css( "display", "none" );
        $(".sidebar-submenu" ).css( "display", "block" );
    }
</script>
</body>
</html>

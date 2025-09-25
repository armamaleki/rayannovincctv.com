<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content=" "
          name="description">
    <meta content=" " name="author">
    <meta name="keywords"
          content="" />
    <title>مدیریت فروشگاه رایان نوین</title>
{{--    <link rel="icon" href="../assets/images/brand/favicon.ico" type="image/x-icon" />--}}
    <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/plugin.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/animated.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="main-body app sidebar-mini light-mode rtl">
@include('components.layouts.manager.loader')
<div class="page">
    <div class="page-main">
        @include('components.layouts.manager.header')
        @include('components.layouts.manager.sidebar')
        <div class="app-content main-content">
            <div class="side-app">
                <div class="container-fluid main-container">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    @include('components.layouts.manager.footer')


</div>


<a href="#top" id="back-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
        <path d="M0 0h24v24H0V0z" fill="none" />
        <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z" />
    </svg>
</a>
<script src="{{asset('assets/js/vendors/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>
<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>
<script src="{{asset('assets/js/sticky.js')}}"></script>
<script src="{{asset('assets/js/themeColors.js')}}"></script>
<script src="{{asset('assets/js/switcher-styles.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/plugins/sweet-alert/jquery.sweet-modal.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
@if(session('message'))
    <script>
        swal({
            title: `{{ session('message.title') }}`,
            type: `{{ session('message.type') }}`,
            text: `{{ session('message.text') }}`
        });
    </script>
@endif
@stack('js')
</body>
</html>

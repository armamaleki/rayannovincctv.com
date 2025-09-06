<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Dashtic - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="admin, admin template, dashboard, admin dashboard, bootstrap 5, responsive, clean, ui, admin panel, ui kit, responsive admin, application, bootstrap 4, flat, bootstrap5, admin dashboard template" />

    <!-- Title -->
    <title>Dashtic - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template</title>

    <!--Favicon -->
{{--    <link rel="icon" href="../assets/images/brand/favicon.ico" type="image/x-icon" />--}}

    <!-- Bootstrap css -->
    <link id="style" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Style css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

    <!-- Plugin css -->
    <link href="{{asset('assets/css/plugin.css')}}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{asset('assets/css/animated.css')}}" rel="stylesheet" />

    <!---Icons css-->
    <link href="{{asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />

</head>

<body class="main-body app sidebar-mini light-mode rtl">

@include('components.layouts.manager.loader')


<div class="page">
    <div class="page-main">

       @include('components.layouts.manager.header')
       @include('components.layouts.manager.sidebar')



        <!-- app-content start-->
        <div class="app-content main-content">
            <div class="side-app">
                <div class="container-fluid main-container">

                    <!--Page header-->
                    <div class="page-header">
                        <div class="page-leftheader">
                            <h4 class="page-title">Empty</h4>
                        </div>
                        <div class="page-rightheader ms-auto d-lg-flex d-none">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Empty</li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page header-->

                </div>
            </div>
        </div>
        <!-- end app-content-->
    </div>

    @include('components.layouts.manager.footer')


</div>

<!-- Back to top -->
<a href="#top" id="back-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
</a>

<!-- Jquery js-->
<script src="{{asset('assets/js/vendors/jquery.min.js')}}"></script>

<!-- Bootstrap5 js-->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--Othercharts js-->
<script src="{{asset('assets/plugins/othercharts/jquery.sparkline.min.j')}}s"></script>

<!-- Circle-progress js-->
<script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>

<!-- Jquery-rating js-->
<script src="{{asset('assets/plugins/rating/jquery.rating-stars.j')}}s"></script>

<!-- P-scroll js-->
<script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>

<!--Sidemenu js-->
<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!-- Sticky js -->
<script src="{{asset('assets/js/sticky.js')}}"></script>

<!-- Color Theme js -->
<script src="{{asset('assets/js/themeColors.js')}}"></script>

<!-- Switcher-Styles js -->
<script src="{{asset('assets/js/switcher-styles.js')}}"></script>

<!-- Custom js-->
<script src="{{asset('assets/js/custom.j')}}s"></script>

</body>

</html>

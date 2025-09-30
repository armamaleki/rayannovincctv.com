<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>رایان نوین</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/plugins/aos/aos.css')}}">
    @livewireStyles

</head>
<body class="bg-gray-950 text-sky-50">
<x-layouts.app.loader />
<x-layouts.app.header />
<div class="md:-mt-32">
    @yield('content')
</div>

@include('components.layouts.app.footer')
@livewireScripts

<script src="{{asset('assets/plugins/jQuery.min.js')}}"></script>
<script src="{{asset('assets/plugins/aos/aos.js')}}"></script>
<x-layouts.errors/>

<script>
    AOS.init();
</script>
@stack('js')
@if(session('message'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: `{{ session('message.icon') }}`,
                title: `{{ session('message.text') }}`,
            });
        });
    </script>
@endif
</body>
</html>

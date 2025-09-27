<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>حساب کاربری</title>
    @livewireStyles

</head>
<body class="bg-gray-900 text-sky-50">
<x-layouts.app.header />
<div class="container relative mx-auto px-2 py-16">
    @yield('content')
    <x-layouts.dashboard.menu />

</div>
@livewireScripts

</body>
</html>

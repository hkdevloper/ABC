<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/style/boxicons-2.1.4/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/style/output.css')}}" rel="stylesheet">
    <script src="{{ asset('user/js/jquery.js')}}"></script>
    <script src="{{ asset('user/js/fw.js')}}"></script>
    @yield('head')
</head>

<body class="">
    @include('includes.header')
<main>
    @yield('content')
    @include('includes.requirements')
    @include('includes.footer')
</main>
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="{{ asset('user/js/alpine.js')}}"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
@yield('page-scripts')
@yield('components-scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/style/boxicons-2.1.4/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/style/output.css')}}" rel="stylesheet">
    <script src="{{ asset('user/js/jquery.js')}}"></script>
    <script src="{{ asset('user/js/fw.js')}}"></script>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @include('includes.ads-config')
    @yield('head')
</head>

<body class="">
<x-bladewind.notification/>
@include('includes.header')
<main>
    @yield('content')
    <livewire:requirement/>
    @include('includes.modals')
    @include('includes.footer')
</main>
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="{{ asset('user/js/alpine.js')}}"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
<script>
    @if(session()->has('success'))
        showNotification('Success', '{{session()->get('success')}}', 'success');
    @elseif(session()->has('info'))
        showNotification('Info', '{{session()->get('info')}}', 'info');
    @elseif(session()->has('error'))
        showNotification('Error', '{{session()->get('error')}}', 'error');
    @elseif(session()->has('warning'))
        showNotification('Warning', '{{session()->get('warning')}}', 'warning');
    @endif
</script>
@yield('page-scripts')
@yield('components-scripts')
</body>
</html>

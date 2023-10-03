<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <link href="{{asset('user/style/boxicons-2.1.4/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('user/style/output.css')}}" rel="stylesheet">
    <script src="{{ asset('user/js/jquery.js')}}"></script>
    <script src="{{ asset('user/js/fw.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @yield('head')
    @bukStyles(true)
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
<!-- Page Content -->
<main>
    @include('includes.header')
    @yield('content')
    @include('includes.requirements')
    @include('includes.footer')
</main>
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="{{ asset('user/js/alpine.js')}}"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if(session()->has('msg'))
        @switch(session()->get('types', 'info'))
            @case('error')
            Toastify({
                text: "{{ session()->get('msg') }}",
                duration: 3000,
                className: "error"
            }).showToast();
            @break
            @case('success')
            Toastify({
                text: "{{ session()->get('msg') }}",
                duration: 3000,
                className: "success"
            }).showToast();
            @break
            @case('info')
            Toastify({
                text: "{{ session()->get('msg') }}",
                duration: 3000,
                className: "info"
            }).showToast();
            @break
            @case('warning')
            Toastify({
                text: "{{ session()->get('msg') }}",
                duration: 3000,
                className: "warning"
            }).showToast();
            @break
        @endswitch
    @else
    @if($errors->any())
    @foreach ($errors->all() as $error)
    Toastify({
        text: "{{ $error }}",
        duration: 3000,
        className: "error"
    }).showToast();
    @endforeach
    @endif
    @endif
</script>
@yield('page-scripts')
@yield('components-scripts')
@bukScripts(true)
</body>
</html>

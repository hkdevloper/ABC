<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('user/style/boxicons-2.1.4/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('user/style/output.css')}}" rel="stylesheet">
{{--    <link href="{{ asset('user/style/tw-elements.min.css') }}" rel="stylesheet"/>--}}
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <script src="{{ asset('user/js/jquery.js')}}"></script>
    <script src="{{ asset('user/js/tailwind.js')}}"></script>
    <script src="{{ asset('user/js/fw.js')}}"></script>
{{--    <script src="{{ asset('user/js/ckeditor.js')}}"></script>--}}
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
<script src="{{ asset('user/js/slick-slider.js')}}></script>
<script src="{{ asset('user/js/owl-carousel.js')}}></script>
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="{{ asset('user/js/alpine.js')}}"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
    initTE({
        Select,
        Tab,
        Datatable,
    });
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel();
    });
</script>
<script>
    @if(session()->has('msg'))
    showToast('{{ session()->get('type', 'info') }}', '{{ session()->get('msg') }}');
    @else
    @if($errors->any())
    @foreach ($errors->all() as $error)
    showToast('error', '{{ $error }}');
    @endforeach
    @endif
    @endif
</script>
@yield('page-scripts')
@yield('components-scripts')
@bukScripts(true)
</body>
</html>

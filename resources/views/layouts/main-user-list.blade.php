<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('user/style/bx-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('user/style/fontawesome.css')}}" rel="stylesheet">
    <link href="{{ asset('user/style/output.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <script src="{{ asset('user/js/jquery.js')}}"></script>
    <script src="{{ asset('user/js/tailwind.js')}}"></script>
    <script src="{{ asset('user/js/fw.js')}}"></script>
    <script src="{{ asset('user/js/ckeditor.js')}}"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
        rel="stylesheet"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet"/>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            plugins: [
                require("@tailwindcss/forms"),
                require("@tailwindcss/typography"),
                require("@tailwindcss/aspect-ratio"),
                require('flowbite/plugin'),
            ],
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    @yield('head')
    @bukStyles(true)
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
<script>
    // Initialization for ES Users
    import {Select, initTE} from "tw-elements";

    initTE({Select});
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel();
    });
</script>
<script>
    @if(session()->has('msg'))
    showToast('{{ session()->get('types', 'info') }}', '{{ session()->get('msg') }}');
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

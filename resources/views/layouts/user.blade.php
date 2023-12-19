<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css"/>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/style/boxicons-2.1.4/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/style/output.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('user/js/fw.js')}}"></script>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/scrollreveal"></script>
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
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    @include('includes.ads-config')
    @yield('head')
</head>

<body>
    @include('includes.header')
<main class="mx-auto">
    @yield('content')
    <livewire:requirement/>
    <x-user.state-section/>
    <x-user.logo-cloud/>
    <x-news-latter/>
    @include('includes.modals')
    @include('includes.footer')
</main>
<x-bladewind.notification/>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
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
    ScrollReveal().reveal('.flex');
    ScrollReveal().reveal('.grid');
    ScrollReveal().reveal('.container');
    ScrollReveal().reveal('.text-base');
    ScrollReveal().reveal('.text-sm');
    ScrollReveal().reveal('.text-md');
    ScrollReveal().reveal('.text-xl');
    ScrollReveal().reveal('.bg-white');
    ScrollReveal().reveal('.bg-gray-100');
    ScrollReveal().reveal('.bg-purple-300');
</script>
@yield('page-scripts')
@yield('components-scripts')
</body>
</html>

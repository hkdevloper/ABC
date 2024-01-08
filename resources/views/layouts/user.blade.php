<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('js/tailwind.js')}}"></script>
    <link href="{{ asset('css/boxicons/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/alpine.js')}}" defer></script>
    <script src="{{ asset('js/fw.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/scroll-reveal.js')}}"></script>
    @include('includes.ads-config')
    @yield('head')
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
</head>

<body>
@include('includes.header')
<main class="mx-auto">
    @yield('content')
    <livewire:requirement/>
    <x-news-latter/>
    @include('includes.modals')
    @include('includes.footer')
</main>
<x-bladewind.notification/>
<script src="{{ asset('js/tw-element-min.js') }}"></script>
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="{{ asset('js/alpine.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
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
    @if($errors->any())
    @foreach ($errors->all() as $error)
    showNotification('Error', '{{$error}}', 'error');
    @endforeach
    @endif
</script>
@yield('page-scripts')
@yield('components-scripts')
</body>
</html>

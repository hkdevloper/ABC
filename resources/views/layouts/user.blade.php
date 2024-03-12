<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/boxicons/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastify.min.css')}}">
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/alpine.js')}}" defer></script>
{{--    <script src="{{ asset('js/fw.js')}}" crossorigin="anonymous"></script>--}}
    <script src="{{ asset('js/helper.js') }}"></script>
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/scroll-reveal.js')}}"></script>
{{--    @include('includes.ads-config')--}}
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
    @if(route('view.requirements.form') != request()->url())
        <livewire:requirement/>
    @endif
    <x-news-latter/>
    @include('includes.modals')
    @include('includes.footer')
</main>
<script src="{{ asset('js/tw-element-min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/toastify.js')}}"></script>
{{--<script src="{{ asset('js/alpine.js')}}"></script>--}}
<script src="{{ asset('js/main.js')}}"></script>
<script>
    @if(session()->has('success'))
    showToast('success', '{{session()->get('success')}}');
    @elseif(session()->has('info'))
    showToast('info', '{{session()->get('info')}}');
    @elseif(session()->has('error'))
    showToast('error', '{{session()->get('error')}}');
    @elseif(session()->has('warning'))
    showToast('warning', '{{session()->get('warning')}}');
    @endif
    @if($errors->any())
    @foreach ($errors->all() as $error)
    showToast('error', '{{$error}}');
    @endforeach
    @endif
</script>
<script>
    ScrollReveal().reveal('.reveal', {
        delay: 100,    // Delay in milliseconds
        distance: '30px',  // Animation distance
        origin: 'bottom',  // Animation origin (top, right, bottom, left)
        easing: 'ease-in-out', // Animation easing
        duration: 500,  // Animation duration in milliseconds
        reset: true    // Reset animation on scroll up
    });
</script>

@yield('page-scripts')
@yield('components-scripts')
</body>
</html>

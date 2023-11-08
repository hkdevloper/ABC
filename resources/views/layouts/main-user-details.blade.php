<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <title>{{ config()->get('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <link href="{{asset('user/style/boxicons-2.1.4/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('user/style/output.css')}}" rel="stylesheet">
    <link href="{{ asset('user/style/tw-elements.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('user/js/jquery.js')}}"></script>
    <script src="{{ asset('user/js/fw.js')}}"></script>
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
            ],
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    @include('includes.ads-config')
    @yield('head')
</head>

<body>
<!-- Page Content -->
<main>
    @include('includes.header')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="container lg:px-24 md:px-12 py-6 mx-auto">
                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Product List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            @yield('content')
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
    <livewire:requirement />
    @include('includes.footer')
</main>
<script src="{{ asset('user/js/slick-slider.js')}}></script>
<script src="{{ asset('user/js/owl-carousel.js')}}></script>
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="{{ asset('user/js/alpine.js')}}"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
<script>
    // Initialization for ES Users
    import {Select, initTE, Datatable} from "tw-elements";

    initTE({Select, Datatable});
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel();
    });
</script>

@yield('page-scripts')
@yield('components-scripts')
</body>
</html>

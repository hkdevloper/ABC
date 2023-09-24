<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <title> {{config()->get('app.name')}} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{url('/')}}/user/style/output.css" rel="stylesheet">
    <!-- Tailwind CSS Play CDN -->
    <script src="{{url('/')}}/user/js/tailwind.js"></script>
    <!-- JQuery CDN -->
    <script src="{{url('/')}}/user/js/jquery.js"></script>
    <!-- Slick Slider JS -->
    <script type="text/javascript" src="{{url('/')}}/user/js/slick-slider.js"></script>
    <!-- Font Awesome -->
    <script src="{{url('/')}}/user/js/fw.js"></script>
    <script src="{{url('/')}}/user/js/owl-carousel.js"></script>
    <script src="{{url('/')}}/user/js/ckeditor.js"></script>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet"/>
    @yield('head')
    @bukStyles(true)
</head>

<body>
<!-- Page Content -->
<main>
    @include('includes.header')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
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
    @include('includes.requirements')
    @include('includes.footer')
</main>
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="{{url('/')}}/user/js/main.js"></script>
<script>
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
<script>
</script>
@yield('page-scripts')
@yield('components-scripts')
@bukScripts(true)
</body>

</html>

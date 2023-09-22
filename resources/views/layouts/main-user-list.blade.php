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
    @yield('head')
</head>

<body>
<!-- Page Content -->
<main>
    @include('includes.header')
    @yield('content')
    @include('includes.requirements')
    @include('includes.footer')
</main>
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
</body>

</html>

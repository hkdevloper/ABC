<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <title> {{config()->get('app.name')}} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/plugin-css/swiper-bundle.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/plugin-css/aos.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/plugin-css/swiper-bundle.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/plugin-css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/plugin-css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/plugin-css/simple-datatables.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/plugin-css/preloader.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/user/assets/css/custom.css">
    <link rel="stylesheet" href="{{url("/")}}/dist/css/box-icons.css">
    <script src="https://kit.fontawesome.com/cabb64bd6b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    @yield('head')
</head>

<body class="relative">
<!-- Page Content -->
<main>
    <div style="z-index: 1000" class="bg-gray-900" id="preloader">
        <div id="loader"></div>
    </div>
    @include('includes.header')
    @yield('content')
</main>
<script src="{{url('/')}}/user/assets/js/others/plugins-core/aos.js"></script>
<script src="{{url('/')}}/user/assets/js/others/plugins-script/aos.js"></script>
<script src="{{url('/')}}/user/assets/js/others/plugins-core/swiper-bundle.js"></script>
<script src="{{url('/')}}/user/assets/js/others/plugins-script/testimonial/testimonial.js"></script>
<script src="{{url('/')}}/user/assets/js/others/plugins-core/alpine.min.js"></script>
<script src="{{url('/')}}/user/assets/js/main.js"></script>
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

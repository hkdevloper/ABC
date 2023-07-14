<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Meta Tags --}}
    <title>Business Directory Listing -Admin Panel</title>
    {{-- Styles --}}
    <link rel="stylesheet" href="{{url("/")}}/dist/css/app.css">
    <link rel="stylesheet" href="{{url("/")}}/dist/css/box-icons.css">
    <script src="https://kit.fontawesome.com/cabb64bd6b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{url('dist/css/IconPicker.css')}}">
    <script src="{{url('dist/js/IconPicker.js')}}"></script>
    {{-- Scripts --}}
    @yield('head')
</head>

<body class="app">
@include('components.mobile-menu')
<div class="flex">
    @include('components.sidebar')
    <div class="content">
        <div class="content">
            @include('components.top-bar')
            @yield('content')
        </div>
    </div>
</div>
{{-- Including Modals --}}
@include('components.modals')
{{-- Scripts --}}
<script src="{{url('/')}}/dist/js/app.js"></script>
<script src="{{url('/')}}/dist/js/main.js"></script>
<script src="{{url('/')}}/src/js/feather.js"></script>
<script>
    feather.replace()
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
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@yield('page-scripts')
</body>

</html>

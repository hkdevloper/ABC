<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{url('/')}}/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>404 Page Not Found</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{url('/')}}/dist/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="app">
<div class="container">
    <!-- BEGIN: Error Page -->
    <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
        <div class="-intro-x lg:mr-20">
            <img alt="{{config('app.name')}}" class="h-48 lg:h-auto" src="{{url('/')}}/dist/images/error-illustration.svg">
        </div>
        <div class="text-white mt-10 lg:mt-0">
            <div class="intro-x text-6xl font-medium">404</div>
            <div class="intro-x text-xl lg:text-3xl font-medium">Oops. This page has gone missing.</div>
            <div class="intro-x text-lg mt-3">You may have mistyped the address or the page may have moved.</div>
            <button onclick="window.location.href = '{{url('/')}}'" class="intro-x button button--lg border border-white mt-10">Back to Home</button>
        </div>
    </div>
    <!-- END: Error Page -->
</div>
</body>
</html>

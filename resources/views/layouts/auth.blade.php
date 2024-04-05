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
    <script src="{{ asset('js/helper.js') }}"></script>
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        .special-elite-regular {
            font-family: "Special Elite", system-ui;
            font-weight: 400;
            font-style: normal;
        }

        .captcha {
            font-family: "Special Elite", system-ui;
            font-weight: 400;
            font-style: normal;
            font-size: 1.5rem;
            color: #a443f4;
            background-color: #f0f0f0;
            padding: 5px;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }

        .captcha::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0, 0, 0, 0.1) 50%);
            background-size: 100% 20px;
            z-index: -1;
        }

        .captcha::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(to right, transparent 45%, rgba(0, 0, 0, 0.5) 45%, rgba(0, 0, 0, 0.5) 55%, transparent 55%);
            z-index: -1;
            transform: translateY(-50%);
        }

        .captcha span {
            position: relative;
            display: inline-block;
            transform: skew(-10deg);
            margin: 0 2px;
            text-decoration: line-through;
            text-decoration-color: #a443f4;
            text-decoration-thickness: 2px;

        }

        body {
            font-family: "Roboto", sans-serif;
            font-size: 1rem;
            line-height: 1.5;
            color: #6a6a6a;
            background-color: #f5f5f5;
            margin: 0;
        }

        .body {
            display: flex;
            flex-direction: column-reverse;
            min-height: 100vh;
            margin: 0 auto;
            max-width: 60rem;
        }

        a {
            text-decoration: none;
            color: #6a6a6a;
        }

        a:hover, a:focus {
            text-decoration: underline;
        }

        :focus {
            outline: 0.125rem solid #6a6a6a;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            margin: 2rem 2rem 0;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.03), 0 1rem 2rem rgba(0, 0, 0, 0.05), 0 2rem 4rem rgba(0, 0, 0, 0.05), 0 4rem 8rem rgba(0, 0, 0, 0.05);
        }

        .form__content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding: 2rem;
        }

        .form__footer {
            margin: 0 0 2rem;
        }

        .form__content__header {
            text-align: center;
            margin: 0 0 2rem;
        }

        .form__content__heading {
            margin: 0 0 0.5rem;
        }

        .form__content__description {
            font-size: 0.875rem;
        }

        .form__field {
            margin-bottom: 2rem;
        }

        .form__field:last-child {
            margin-bottom: 0;
        }

        .form__label {
            display: inline-block;
            margin-bottom: 0.25rem;
            font-weight: 700;
            color: #6a6a6a;
        }

        .form__label[for] {
            cursor: pointer;
        }

        .form__input {
            display: block;
            width: 100%;
            border: 1px solid #cecece;
            border-radius: 0.25rem;
            padding: 0.75rem 1rem;
            color: inherit;
            font-family: inherit;
        }

        .form__submit {
            text-align: center;
        }

        .btn {
            display: block;
            width: 100%;
            font-family: inherit;
            background: #8e8e8e;
            color: #fff;
            border: 0;
            border-radius: 0.25rem;
            padding: 0.75rem 1rem;
            cursor: pointer;
            font-weight: 700;
            letter-spacing: inherit;
            margin-bottom: 0.5rem;
        }

        .btn:hover, .btn:focus {
            background-color: #6a6a6a;
        }

        .form__submit a {
            font-size: 0.875rem;
        }

        .cta {
            display: flex;
            flex-direction: column;
            padding: 3rem;
            text-align: center;
            width: 100%;
        }

        .cta__image {
            width: 275px;
            height: 42px;
        }

        ul.list-styled {
            list-style: none;
            padding: 0;
        }

        ul.list-styled li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            font-size: 0.8rem !important;

        }

        ul.list-styled li span {
            display: flex;
            align-items: center;
        }

        ul.list-styled li span i {
            font-size: 1.5rem;
        }

        @media (min-width: 48rem) {
            .body {
                flex-direction: row;
            }

            .form {
                margin: 0;
                box-shadow: none;
            }

            .form__content {
                width: 26rem;
            }

            .cta__content {
                max-width: 32rem;
                margin: auto;
            }
        }

        @media (min-width: 72rem) {
            .form__content {
                width: 32rem;
                padding: 4rem;
            }
        }
    </style>
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
    <div class="body">
        @yield('content')
    </div>
    @include('includes.footer')
</main>
<script src="{{ asset('js/main.js')}}"></script>
<script>
    function generateCaptcha() {
        const code = generateRandomCode(6); // Generate a new CAPTCHA code
        document.getElementById('captcha-code').innerText = code; // Display CAPTCHA code in span
        if ('{{config('app.env')}}' === 'local'){
            document.getElementById('captcha').value = code;
        }else{
            // Empty the user input
            document.getElementById('captcha').value = '';
        }
        return code; // Return the generated code
    }

    function generateRandomCode(length) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return result;
    }

    // Call the function to generate CAPTCHA code when the page loads
    window.onload = generateCaptcha;

    function validateCaptcha() {
        let captcha = document.getElementById('captcha').value; // Get the value of the user input
        let code = document.getElementById('captcha-code').innerText; // Get the current CAPTCHA code
        if (captcha === code) { // Check if the user input matches the CAPTCHA code
            // submit the form
            document.getElementById('form').submit();
        } else {
            alert('CAPTCHA validation failed! Please try again.'); // Display an error message
            generateCaptcha(); // Generate a new CAPTCHA code
            // Empty the user input
            document.getElementById('captcha').value = '';
        }
    }

    // Automatically refresh CAPTCHA after a certain period (e.g., every 5 minutes)
    setInterval(generateCaptcha, 300000); // 300000 milliseconds = 5 minutes
</script>
</body>
</html>

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
    <style>
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
            flex: 1;
            flex-direction: column;
            padding: 4rem;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
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
        <div class="cta">
            <div class="cta__content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, aspernatur itaque ratione repellendus molestiae quibusdam cum nobis! Placeat atque eos aliquam quis voluptatibus excepturi blanditiis sapiente doloremque maxime modi. Natus?</p>
            </div>
        </div>
        <div class="form">
            <form action="{{route('test.login')}}" method="post" class="form__content">
                @csrf
                <div class="form__content__header">
                    <h1 class="form__content__heading">Log In to Acme Inc.</h1>
                    <div class="form__content__description">
                        If you don’t have an account, <a href="{{url('user/register')}}" class="text-purple-500 underline hover:no-underline">you can create one</a>.
                    </div>
                </div>
                <div class="form__field">
                    <label class="form__label" for="email">Email address</label>
                    <input class="form__input" type="email" name="email" id="email" required>
                </div>
                <div class="form__field">
                    <label class="form__label" for="pwd">Password</label>
                    <input class="form__input" type="password" name="pwd" id="pwd" required>
                </div>
                <div class="form__field form__submit">
                    <input class="btn bg-purple-400 hover:bg-purple-800" type="submit" value="Log In">
                    <a href="#!">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
    @include('includes.footer')
</main>
<x-bladewind.notification/>
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
</body>
</html>

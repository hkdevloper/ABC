@extends('layouts.auth')

@section('content')
    <div class="cta">
        <div class="cta__content">
            <img src="{{asset('storage/image/auth.svg')}}" alt="Authentication" class="cta__image">
        </div>
        <p  class="text-center">
            lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
    <div class="form md:my-10">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <x-bladewind.alert
                    type="warning">
                    {{ $error }}
                </x-bladewind.alert>
                <div class="my-1"></div>
            @endforeach
        @endif
        <form action="{{route('auth.register')}}" method="post" class="form__content" id="form">
            @csrf
            <div class="form__content__header">
                <h1 class="form__content__heading">Sign Up to HkDevelopers.</h1>
                <div class="form__content__description">
                    <p>
                        Already have an account? <a href="{{url('user/login')}}" class="text-purple-500 underline hover:no-underline">Log In</a>
                    </p>
                </div>
            </div>
            <div class="form__field">
                <label class="form__label" for="name">Company Name</label>
                <input class="form__input" type="text" name="name" id="name" required value="{{old('name')}}">
            </div>
            <div class="form__field">
                <label class="form__label" for="email">Email address</label>
                <input class="form__input" type="email" name="email" id="email" required value="{{old('email')}}">
            </div>
            <div class="form__field">
                <label class="form__label" for="pwd">Password</label>
                <input class="form__input" type="password" name="password" id="pwd" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="cpwd">Confirm Password</label>
                <input class="form__input" type="password" name="confirm_password" id="cpwd" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="captcha">Fill this CAPTCHA: <span class="captcha">
                        <span id="captcha-code"></span>
                    </span></label>
                <input class="form__input" type="text" id="captcha" name="captcha" required>
                <!-- Helper text -->
                <small class="form__helper">Can't read the CAPTCHA?
                    <span class="hover:underline text-purple-500 cursor-pointer" onclick="generateCaptcha()">Click here</span> to generate a new one.
                </small>
            </div>
            @if(session()->has('error'))
                <x-bladewind.alert
                    type="error">
                    {{session()->get('error')}}
                </x-bladewind.alert>
                <div class="my-2"></div>
            @endif
            <div class="form__field form__submit">
                <button class="g-recaptcha btn bg-purple-400 hover:bg-purple-800" type="button" onclick="validateCaptcha()">
                    Register Now
                </button>
                <!-- Legal -->
                <div class="form__legal">
                    <p class="form__legal__text">
                        By clicking "Register Now", you agree to our <a href="{{route('policy')}}" class="text-purple-500 underline hover:no-underline">Privacy Policy</a> and <a href="{{route('tos')}}" class="text-purple-500 underline hover:no-underline">Terms of Service</a>.
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection

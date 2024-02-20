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
    <div class="form">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <x-bladewind.alert
                    type="warning">
                    {{ $error }}
                </x-bladewind.alert>
                <div class="my-1"></div>
            @endforeach
        @endif
        <form action="{{route('auth.login')}}" method="post" class="form__content" id="form">
            @csrf
            <div class="form__content__header">
                <h1 class="form__content__heading">Log In to HkDevelopers.</h1>
                <div class="form__content__description">
                    If you don’t have an account, <a href="{{url('user/register')}}" class="text-purple-500 underline hover:no-underline">you can create one</a>.
                </div>
            </div>
            <div class="form__field">
                <label class="form__label" for="email">Email address</label>
                <input class="form__input" type="email" name="email" id="email" required value="{{old('email', '')}}">
            </div>
            <div class="form__field">
                <label class="form__label" for="pwd">Password</label>
                <input class="form__input" type="password" name="password" id="pwd" required>
            </div>
            @if(session()->has('error'))
                <x-bladewind.alert
                    type="error">
                    {{session()->get('error')}}
                </x-bladewind.alert>
                <div class="my-1"></div>
            @endif
            <div class="form__field form__submit">
                <button class="g-recaptcha btn bg-purple-400 hover:bg-purple-800"
                        data-sitekey="6LcJ1XkpAAAAAH3LBDb_OudLVSMCMZz1pG8psZv0"
                        data-callback='onSubmit'
                        data-action='submit'>Log In</button>
                <a href="{{url('user/password-reset/request')}}">Forgot password?</a>
            </div>
        </form>
    </div>
@endsection

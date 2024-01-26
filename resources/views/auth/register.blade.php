@extends('layouts.auth')

@section('content')
    <div class="cta">
        <div class="cta__content">
            <img src="{{asset('storage/image/auth.svg')}}" alt="Authentication" class="cta__image">
        </div>
    </div>
    <div class="form">
        <form action="{{route('auth.register')}}" method="post" class="form__content">
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
                <input class="form__input" type="text" name="name" id="name" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="email">Email address</label>
                <input class="form__input" type="email" name="email" id="email" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="pwd">Password</label>
                <input class="form__input" type="password" name="password" id="pwd" required>
            </div>
            <div class="form__field">
                <label class="form__label" for="cpwd">Confirm Password</label>
                <input class="form__input" type="password" name="confirm_password" id="cpwd" required>
            </div>
            <div class="form__field form__submit">
                <input class="btn bg-purple-400 hover:bg-purple-800" type="submit" value="Register Now">
            </div>
        </form>
    </div>
@endsection

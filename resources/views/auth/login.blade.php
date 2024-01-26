@extends('layouts.auth')

@section('content')
    <div class="cta">
        <div class="cta__content">
            <img src="{{asset('storage/image/auth.svg')}}" alt="Authentication" class="cta__image">
        </div>
    </div>
    <div class="form">
        <form action="{{route('auth.login')}}" method="post" class="form__content">
            @csrf
            <div class="form__content__header">
                <h1 class="form__content__heading">Log In to HkDevelopers.</h1>
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
                <input class="form__input" type="password" name="password" id="pwd" required>
            </div>
            <div class="form__field form__submit">
                <input class="btn bg-purple-400 hover:bg-purple-800" type="submit" value="Log In">
                <a href="{{url('user/password-reset/request')}}">Forgot password?</a>
            </div>
        </form>
    </div>
@endsection

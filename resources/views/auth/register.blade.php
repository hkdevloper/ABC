@extends('layouts.auth')

@section('content')
    <div class="cta">
        <div class="cta__content">
            <img src="{{asset('storage/image/logo.png')}}" alt="Authentication" class="cta__image">
        </div>
        <ul class="list-styled px-2">
            <li class="d-flex mb-2">
                <span class="mr-2"><i class='bx bx-check'></i></span>
                Connect With Millions of Buyers and Sellers
            </li>
            <li class="d-flex mb-2">
                <span class="mr-2"><i class='bx bx-check'></i></span>
                Promote Business Profile with Product Showcase
            </li>
            <li class="d-flex mb-2">
                <span class="mr-2"><i class='bx bx-check'></i></span>
                Expand Your Business Network – Smartly!
            </li>
            <li class="d-flex mb-2">
                <span class="mr-2"><i class='bx bx-check'></i></span>
                Boost Your Search Engine Rankings
            </li>
            <li class="d-flex mb-2">
                <span class="mr-2"><i class='bx bx-check'></i></span>
                Direct Buyer - Seller Communication
            </li>
            <li class="d-flex mb-2">
                <span class="mr-2"><i class='bx bx-check'></i></span>
                Conduct New Business Opportunities
            </li>
        </ul>
    </div>
    <div class="form md:my-10">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <x-bladewind.alert type="warning">
                    {{ $error }}
                </x-bladewind.alert>
            @endforeach
        @endif
        @if(session()->has('error'))
            <x-bladewind.alert type="error">
                {{session()->get('error')}}
            </x-bladewind.alert>
        @endif
        <form action="{{route('auth.register')}}" method="post" class="form__content" id="form">
            @csrf
            <div class="form__content__header">
                <h1 class="form__content__heading">Sign Up to {{config()->get('app.name') }}.</h1>
                <div class="form__content__description">
                    <p>
                        Already have an account?
                        <a href="{{url('user/login')}}" class="text-purple-500 underline hover:no-underline">Log In</a>
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
                    <span class="hover:underline text-purple-500 cursor-pointer"
                          onclick="generateCaptcha()">Click here</span> to generate a new one.
                </small>
            </div>
            <div class="form__field form__submit">
                <button class="g-recaptcha btn bg-purple-400 hover:bg-purple-800" type="button"
                        onclick="validateCaptcha()">
                    Register Now
                </button>
                <!-- Legal -->
                <div class="form__legal">
                    <p class="form__legal__text">
                        By clicking "Register Now", you agree to our <a href="{{route('policy')}}"
                                                                        class="text-purple-500 underline hover:no-underline">Privacy
                            Policy</a> and <a href="{{route('tos')}}"
                                              class="text-purple-500 underline hover:no-underline">Terms of Service</a>.
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('page-scripts')
    <script>
        // prevent selection and copy functionality for the whole page
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.addEventListener('copy', event => event.preventDefault());
        document.addEventListener('selectstart', event => event.preventDefault());
    </script>
@endsection

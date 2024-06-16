@php @endphp
@extends('layouts.user')

@section('head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">
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
    </style>
@endsection

@section('content')
    <x-user.bread-crumb :data="['Home', 'Direct Message to company']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">
            DM to <span class="text-purple-500">{{ $company->name }}</span>
        </h1>
        <p class="text-center mt-2">
            <a href="{{ route('view.company', $company->slug) }}" class="text-blue-500 hover:text-blue-700">Back to
                Company</a>
        </p>
    </div>
    <div class="container mx-auto py-8">
        <form id="form" action="{{ route('direct-message') }}" method="POST"
              class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                        id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    Phone
                </label>
                <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror"
                        id="phone" type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Your Name
                </label>
                <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                        id="name" type="text" placeholder="Enter Your Name" name="name" value="{{ old('name') }}"
                        required>
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company_name">
                    Company Name
                </label>
                <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company_name') border-red-500 @enderror"
                        id="company_name" type="text" placeholder="Company Name" name="company_name"
                        value="{{ old('company_name') }}" required>
                @error('company_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    Message
                </label>
                <textarea rows="10"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('message') border-red-500 @enderror"
                          id="message" placeholder="Message" name="message" required>{{ old('message') }}</textarea>
                @error('message')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="captcha">Fill this CAPTCHA: <span
                            class="captcha">
                        <span id="captcha-code"></span>
                    </span></label>
                <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" id="captcha" name="captcha" required>
                <!-- Helper text -->
                <small class="form__helper">Can't read the CAPTCHA?
                    <span class="hover:underline text-purple-500 cursor-pointer"
                          onclick="generateCaptcha()">Click here</span> to generate a new one.
                </small>
            </div>

            <input type="hidden" name="company_id" value="{{ $company->id }}">

            <div class="flex items-center justify-between w-full">
                <button onclick="validateCaptcha()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-80 mx-auto"
                        type="button">
                    Submit
                </button>
                <!-- legal -->
                <div class="text-center mt-4">
                    <p class="text-gray-600 text-xs">
                        By submitting this form, you agree to our <a href="{{ route('policy') }}"
                                                                     class="text-blue-500 hover:text-blue-700">Privacy
                            Policy</a> and <a href="{{ route('tos') }}"
                                              class="text-blue-500 hover:text-blue-700">Terms of Service</a>.
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
    <script>
        function generateCaptcha() {
            const code = generateRandomCode(6); // Generate a new CAPTCHA code
            document.getElementById('captcha-code').innerText = code; // Display CAPTCHA code in span
            // if local prefill the input
            if ({{ config('app.env') === 'local' ? 'true' : 'false' }}) {
                document.getElementById('captcha').value = code;
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
@endsection

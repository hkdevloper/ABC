@extends('layouts.auth')

@section('head')
    <style>
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        .bounce {
            animation: bounce 2s infinite;
        }
    </style>
@endsection

@section('page-scripts')
    <script>
        // Custom scripts if needed
    </script>
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <div class="w-16 h-16 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-4 bounce">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-semibold mb-4">Email Verified Successfully!</h1>
            <p class="text-gray-600 mb-6">Thank you for verifying your email address. Your account is now verified, and you can enjoy all the features of our services after Admin Approval.</p>
            @auth
                <a href="/user" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">Login</a>
            @endauth
        </div>
    </div>
@endsection

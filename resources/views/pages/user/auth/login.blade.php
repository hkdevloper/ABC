@extends('layouts.main-user-list')

@section('content')
    <section class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto p-4">
            <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6 space-y-6">
                <h2 class="text-3xl font-bold text-center text-gray-900">Sign in to your account</h2>

                <form action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400 focus:ring focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div>
                            <div class="flex justify-between items-center">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <a href="{{ route('user.forgot.password') }}"
                                   class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400 focus:ring focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-500 focus:ring focus:ring-indigo-500 focus:outline-none">
                                Sign in
                            </button>
                            <a href="{{ route('user.register') }}"
                               class="text-purple-500 py-2 px-4 hover:text-purple-900">
                                   Create an account
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

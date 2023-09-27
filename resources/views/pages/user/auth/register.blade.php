@extends('layouts.main-user-list')

@section('content')
    <section class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto p-4">
            <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6 space-y-6">
                <h2 class="text-3xl font-bold text-center text-gray-900">Register New Account</h2>

                <form action="{{ route('user.register') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input id="first_name" name="first_name" type="text" autocomplete="first_name" required
                                   class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400 focus:ring focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input id="last_name" name="last_name" type="text" autocomplete="last_name" required
                                   class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400 focus:ring focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400 focus:ring focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   class="block w-full rounded-md border border-gray-300 py-2 px-3 text-gray-900 placeholder-gray-400 focus:ring focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-500 focus:ring focus:ring-indigo-500 focus:outline-none">
                                Register
                            </button>
                            <a href="{{ route('user.login') }}"
                               class="bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-500 border border-black hover:border-white focus:ring focus:ring-indigo-500 focus:outline-none">
                                Sign in
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="py-10">
                    <div class="container card mx-auto max-w-md p-6 bg-white">
                        <h2 class="text-3xl font-semibold text-center mb-6">Forgot Password</h2>
                        <form class="space-y-4">
                            <div>
                                <label for="email" class="block text-gray-600">Email Address</label>
                                <input type="email" id="email"
                                       class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-blue-400 focus:outline-none"
                                       placeholder="Enter your email">
                            </div>
                            <button type="submit"
                                    class="w-full bg-purple-500 hover:bg-purple-600 text-white py-2 rounded-md transition duration-300">
                                Submit
                            </button>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </section>
@endsection

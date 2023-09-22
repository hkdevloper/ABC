@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="border flex justify-between items-center"
                         style="width: 100%; height: 100px; background: rgb(15, 12, 114);">
                        <h1 class="text-white text-4xl mx-12">Forums</h1>
                        <!-- Filter Section -->
                        <div class="p-4 md:flex md:justify-between">
                            <!-- Search Input -->
                            <div class="relative mb-4 md:mb-0 mx-1">
                                <input type="text"
                                       class=" rounded-full bg-white w-full py-2 px-4 pl-10 focus:outline-none"
                                       placeholder="Search products...">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>

                            <!-- Category Filter -->
                            <div class="mb-4 md:mb-0 mx-1">
                                <select class="rounded-md bg-white py-2 px-4 focus:outline-none">
                                    <option value="">All Categories</option>
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                    <!-- Add more category options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Forum List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="card card-hovered p-4 mb-2">
                                <div class="container mx-auto">
                                    <ul class="flex justify-center space-x-4">
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-purple-500 hover:border-purple-500 transition duration-300 ease-in-out">Recent
                                                Questions</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-transparent hover:border-purple-500 transition duration-300 ease-in-out">Most
                                                Answered</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-transparent hover:border-purple-500 transition duration-300 ease-in-out">Unanswered</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-4 py-2 text-gray-600 border border-1 rounded-full border-solid border-transparent hover:border-purple-500 transition duration-300 ease-in-out">Featured</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-2 ">
                                <!-- Forum list Item -->
                                @for($i=1; $i<10;$i++)
                                    <div class="bg-white card p-6">
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center">
                                                <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                                                     class="w-10 h-10 rounded-full mr-4">
                                                <div>
                                                    <h2 class="text-lg font-semibold text-gray-800">John Doe</h2>
                                                    <p class="text-gray-500 text-sm">Posted on September 22, 2023</p>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="text-gray-600 text-sm">Category: General</span>
                                            </div>
                                        </div>
                                        <h1 class="text-xl font-semibold text-gray-900 mb-4">Was the origin positioning
                                            'box' removed from Xcode 6?</h1>
                                        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Nulla facilisi. Sed euismod sapien a libero tincidunt, nec bibendum
                                            arcu convallis.</p>
                                        <hr class="my-4 border-t-2 border-gray-200">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <span class="text-gray-600 text-sm">{{rand(0, 999)}} Answers</span>
                                                <span class="ml-4 text-gray-600 text-sm">{{rand(0, 999)}} Views</span>
                                            </div>
                                            <div>
                                                <button
                                                    onclick="window.location.href = '{{route('view.forum', ['xyz'])}}'"
                                                    class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded-full focus:outline-none">
                                                    Answer
                                                </button>
                                                <button class="text-purple-500 hover:underline ml-2">
                                                    Share
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <!-- Forum Pagination -->
                            <div class="flex justify-center my-2">
                                <nav class="bg-white rounded-full shadow-md">
                                    <ul class="inline-flex p-2 space-x-2">
                                        <li>
                                            <a href="#"
                                               class="px-3 py-2 rounded-l-full hover:bg-purple-500 hover:text-white">
                                                <i class="fas fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="px-3 py-2 hover:bg-purple-500 hover:text-white">1</a>
                                        </li>
                                        <li>
                                            <a href="#" class="px-3 py-2 hover:bg-purple-500 hover:text-white">2</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-3 py-2 rounded-r-full hover:bg-purple-500 hover:text-white">
                                                <i class="fas fa-angle-double-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

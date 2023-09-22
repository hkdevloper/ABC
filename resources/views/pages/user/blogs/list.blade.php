@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="border flex flex-col md:flex-row items-center justify-between"
                         style="width: 100%; height: auto; background: rgb(15, 12, 114);">
                        <h1 class="text-white text-4xl mx-4 md:mx-12 mb-4 md:mb-0">Blogs</h1>
                        <!-- Filter Section -->
                        <div class="p-4 md:flex md:justify-between w-full">
                            <!-- Search Input -->
                            <div class="relative mb-4 md:mb-0 mx-1 md:w-1/3">
                                <input type="text"
                                       class="rounded-full bg-white w-full py-2 px-4 pl-10 focus:outline-none placeholder-gray-400"
                                       placeholder="Search blogs...">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-gray-400"></i>
            </span>
                            </div>

                            <!-- Category Filter -->
                            <div class="mb-4 md:mb-0 mx-1 md:w-1/3">
                                <select class="rounded-md bg-white py-2 px-4 focus:outline-none w-full">
                                    <option value="">All Categories</option>
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                    <!-- Add more category options as needed -->
                                </select>
                            </div>

                            <!-- Pricing Filter -->
                            <div class="mb-4 md:mb-0 mx-1 md:w-1/3">
                                <select class="rounded-md bg-white py-2 px-4 focus:outline-none w-full">
                                    <option value="">All Prices</option>
                                    <option value="price1">Price 1</option>
                                    <option value="price2">Price 2</option>
                                    <!-- Add more pricing options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Blog List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 ">
                                <!-- Blog list Item -->
                                @for($i=1; $i<10;$i++)
                                    <div class="bg-white card overflow-hidden">
                                        <img class="w-full h-40 object-cover" src="https://via.placeholder.com/300x300"
                                             alt="Blog Thumbnail">
                                        <div class="px-4 py-3">
                                            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Blog Post Title</h2>
                                            <p class="text-gray-700 text-base mb-4">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                                                Sed euismod sapien a libero tincidunt, nec bibendum arcu convallis.
                                            </p>
                                            <div class="flex flex-wrap mb-4">
                                                <span
                                                    class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-semibold mr-2 mb-2">Tech</span>
                                                <span
                                                    class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold mr-2 mb-2">Coding</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div class="flex space-x-4">
                                                    <button
                                                        class="border-1 border-purple-200  p-2 rounded-full hover:bg-purple-500 text-purple-500 hover:text-white transition duration-300 ease-in-out">
                                                        <i class="fas fa-thumbs-up"></i> Like
                                                    </button>
                                                    <button
                                                        class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">
                                                        <i class="fas fa-share"></i> Share
                                                    </button>
                                                </div>
                                                <a href="{{route('view.blog', ['something'])}}"
                                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-4 py-2 hover:bg-purple-600 transition duration-300 ease-in-out"
                                                   style="border: 1px solid;">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <!-- Blog Pagination -->
                            <div class="flex justify-center my-2">
                                <nav class="bg-white rounded-full shadow-md">
                                    <ul class="inline-flex p-2 space-x-2">
                                        <li>
                                            <a href="#"
                                               class="px-3 py-2 rounded-l-full hover:bg-blue-500 hover:text-white">
                                                <i class="fas fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="px-3 py-2 hover:bg-blue-500 hover:text-white">1</a>
                                        </li>
                                        <li>
                                            <a href="#" class="px-3 py-2 hover:bg-blue-500 hover:text-white">2</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               class="px-3 py-2 rounded-r-full hover:bg-blue-500 hover:text-white">
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

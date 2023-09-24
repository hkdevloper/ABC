@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Blogs'"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Blog List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 ">
                                <!-- Blog list Item -->
                                @for($i=1; $i<10;$i++)
                                    <div class="bg-white card overflow-hidden">
                                        <img class="w-full h-40 object-cover" src="https://via.placeholder.com/300x300"
                                             alt="Blog Thumbnail">
                                        <div class="px-4 py-3">
                                            <h2 class="text-xl font-semibold text-gray-800 mb-2">Blog Post Title</h2>
                                            <p class="text-gray-700 text-xs mb-4">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                                                Sed euismod sapien a libero tincidunt, nec bibendum arcu convallis.
                                            </p>
                                            <div class="flex flex-wrap mb-4">
                                                <span
                                                    class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Tech</span>
                                                <span
                                                    class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Coding</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div class="flex space-x-4">
                                                    <button
                                                        class="border-1 border-purple-200  p-2 rounded-full hover:bg-purple-500 text-purple-500 hover:text-white transition duration-300 ease-in-out text-xs">
                                                        <i class="fas fa-thumbs-up"></i> Like
                                                    </button>
                                                    <button
                                                        class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out text-xs">
                                                        <i class="fas fa-share"></i> Share
                                                    </button>
                                                </div>
                                                <a href="{{route('view.blog', ['something'])}}"
                                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
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

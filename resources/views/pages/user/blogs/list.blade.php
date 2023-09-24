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
                        <!-- Blog List Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                                <!-- Blog list Item -->
                                @for($i=1; $i<10; $i++)
                                    <div class="bg-white card overflow-hidden w-full mb-4">
                                        <div class="relative">
                                            <img class="w-full h-60 object-cover"
                                                 src="https://via.placeholder.com/600x400" alt="Blog Thumbnail">
                                        </div>
                                        <div class="px-4 py-3">
                                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Blog Post Title</h2>
                                            <p class="text-gray-700 text-sm mb-4">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                                                Sed euismod sapien a libero
                                                tincidunt, nec bibendum arcu convallis.
                                            </p>
                                            <div class="flex flex-wrap mb-4">
                                                <span
                                                    class="bg-purple-100 text-purple-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Tech</span>
                                                <span
                                                    class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Coding</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <div class="flex space-x-4">
                                                    <button
                                                        class="border border-purple-200 p-1 rounded-full hover:bg-purple-500 text-purple-500 hover:text-white transition duration-300 ease-in-out text-xs">
                                                        <i class="fas fa-thumbs-up"></i> Like
                                                    </button>
                                                    <button
                                                        class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out text-xs">
                                                        <i class="fas fa-share"></i> Share
                                                    </button>
                                                </div>
                                                <a href="{{route('view.blog', ['something'])}}"
                                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-1 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                   style="border: 1px solid;">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <!-- Pagination -->
                            <x-user.pagination/>
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

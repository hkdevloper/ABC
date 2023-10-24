@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Blogs'" :breadcrumb="['Home', 'Blog', 'List']"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Blog List Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Blog List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden px-2 mb-3">
                                <div class="flex items-center justify-center w-100">
                                    <label for="sort-by"></label><select id="sort-by"
                                                                         class="border border-solid border-gray-300 text-gray-900 text-sm p-2.5 m-2 focus:outline-none focus:border-0 card w-[150px]">
                                        <option selected>Filter All</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @foreach($category->children as $child)
                                                <option value="{{$child->id}}">- {{$child->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <a href="{{url('user/dashboard')}}"
                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-3 transition duration-300 ease-in-out text-xs w-100"
                                   style="border: 1px solid;">List your Blog</a>
                            </div>
                            <!-- Blog List -->
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                                <!-- Blog list Item -->
                                @foreach($blogs as $blog)
                                    <div class="bg-white card overflow-hidden w-full mb-4">
                                        <div class="relative">
                                            <img class="w-full h-60 object-cover"
                                                 src="{{url('storage/'.$blog->thumbnail)}}" alt="Blog Thumbnail">
                                        </div>
                                        <div class="px-4 py-3">
                                            <h2 class="text-lg font-semibold text-gray-800 mb-2">{{$blog->title}}</h2>
                                            <p class="text-gray-700 text-sm mb-4">
                                                @php
                                                    $content = $blog->content;
                                                    $limit = 75; // You can adjust the character limit
                                                @endphp

                                                @if(strlen($content) > $limit)
                                                    {!!  substr($content, 0, $limit) !!}...
                                                @else
                                                    {!! $content !!}
                                                @endif
                                            </p>
                                            <div class="flex flex-wrap mb-4">
                                                @php
                                                $color = [
                                                'bg-purple-100 text-purple-600',
                                                'bg-blue-100 text-blue-600',
                                                'bg-green-100 text-green-600',
                                                'bg-yellow-100 text-yellow-600',
                                                'bg-red-100 text-red-600',
                                                'bg-indigo-100 text-indigo-600',
                                                'bg-pink-100 text-pink-600',
                                                'bg-gray-100 text-gray-600',
                                                ]
                                                @endphp
                                                @foreach($blog->tags as $tag)
                                                    <span class="{{$color[rand(0,7)]}} px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">{{$tag}}</span>
                                                @endforeach
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
                                                <a href="{{route('view.blog', [$blog->slug])}}"
                                                   class="text-purple-500 hover:text-white rounded-full px-2 py-1 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                   style="border: 1px solid;">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Pagination -->
                            {{$blogs->links()}}
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

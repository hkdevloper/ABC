@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Blogs'" :breadcrumb="['Home', 'Blog', 'List']" type="blog"/>
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Blog List Block -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Blog List Filter -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span
                        class="text-xl text-purple-500">Blogs</span></p>
                <p class="text-base text-gray-500">About {{count($blogs)}} Result</p>
            </div>
            <hr class="my-5">
            <!-- Blog List -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                <!-- Blog list Item -->
                @forelse($blogs as $item)
                    <card class="bg-white border border-solid border-gray-900 transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                        <img class="w-full h-60 object-cover" src="{{url('storage/'.$item->thumbnail)}}" alt="Blog Thumbnail">
                        <div class="p-3">
                            <div class="flex items-center mt-2">
                                <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://ui-avatars.com/api/?name={{$item->user->name}}'/>
                                <div class="pl-3">
                                    <div class="font-medium">
                                        {{$item->user->name}}
                                    </div>
                                    <div class="text-gray-600 text-sm">
                                        {{$item->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                            <!-- Title -->
                            <h2 class="font-bold text-base sm:text-sm md:text-xl lg:text-xl mt-2">
                                <a href="{{route('view.blog', $item->slug)}}">{{$item->title}}</a>
                            </h2>
                            <!-- Tags -->
                            <p class="mt-5"> By: <a href="#" class="text-red-600"> {{$item->user->name}} </a></p>
                            <p> Tags:
                                @forelse($item->tags as $tag)
                                    <a href="#" class="text-red-600"> {{$tag}} </a>,
                                @empty
                                    <span class="text-red-600">No Tags</span>
                                @endforelse
                            </p>
                            <header class="flex font-light text-base mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#b91c1c">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                </svg>
                                <span class="ml-2">{{$item->created_at->format('d M Y')}}</span>
                            </header>
                            <!-- Button -->
                            <a href="{{route('view.blog', [$item->slug])}}" class="bg-purple-500 text-white font-semibold py-2 px-5 text-sm mt-6 inline-flex items-center group">
                                <p> READ MORE </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-2 delay-100 duration-200 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </card>
                @empty
                    <div class="w-full text-center">
                        <p class="text-gray-500 text-center">No Blogs Found</p>
                    </div>
                @endforelse
            </div>
            <!-- Pagination -->
            <hr class="my-5">
            {{$blogs->links()}}
        </div>
        <!-- Side Block -->
        @include('includes.sidebar')
    </div>
@endsection

@extends('layouts.main-user-details')

@section('content')
    <div class="w-full mb-10 lg:mb-0 overflow-hidden px-2">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold mb-4">{{$blog->title}}</h1>
            <p class="text-gray-500 mb-4">Published on September 22, 2023</p>
            <img src="{{url('storage/' . $blog->thumbnail)}}" alt="Blog Thumbnail" style="width: 100%; height: 400px;"
                 class="mb-6 rounded-lg shadow-lg">
            <div class="prose mx-auto">
                <p>{!! $blog->content !!}</p>
            </div>
        </div>
        <!-- Related Products Section -->
        <section class="mt-8 p-1 bg-white">
            <h2 class="text-2xl font-semibold">Related Blogs</h2>
            @if($related_blogs->count() == 0)
                <p class="text-gray-500 text-center mt-10">No related blogs found.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                    @foreach($related_blogs as $blog)
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
            @endif
        </section>
    </div>
@endsection

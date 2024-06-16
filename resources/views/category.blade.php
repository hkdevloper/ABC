@php use App\Models\Category; @endphp
@extends('layouts.user')

@section('head')
    <style>
        /* Additional custom styles go here */
        .search-dropdown {
            position: relative;
            display: inline-block;
        }

        .search-input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 4px 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1;
        }

        .search-results a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
            text-align: start;
        }

        .search-results a:hover {
            background-color: #f0f0f0;
        }
    </style>
@endsection

@section('content')
    <x-user.bread-crumb :data="['Home', 'Category', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">Browse Categories!!</h1>
    </div>
    <!-- Main Content -->
    <div class="container py-3 mx-auto flex flex-wrap">
        <section class="p-2 my-1 ">
            <div class="container mx-auto">
                @forelse($type as $itemType)
                    <div class="flex justify-start items- my-5">
                        <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">{{$itemType}}</h1>
                    </div>
                    <hr class="my-2 md:my-5">
                    <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-1 md:gap-3">
                        @php
                            $data = Category::where('type', $itemType)->get();
                            $route = match($type) {
                                'product' => 'products',
                                'event' => 'events',
                                'blog' => 'blogs',
                                'job' => 'jobs',
                                'forum' => 'forum',
                                default => 'company',
                            };
                        @endphp
                        @if(is_iterable($data))
                            @forelse($data as $item)
                                <a href="{{ route($route, ['category' => $item->name]) }}"
                                   class="flex justify-center items-center w-full mb-6 relative">
                                    @if($item->is_featured)
                                        <div class="absolute top-0 left-0 bg-blue-500 text-white p-1 px-2 text-xs font-bold rounded">
                                            Featured
                                        </div>
                                    @endif
                                    <div class="w-64 bg-white rounded-lg shadow-lg overflow-hidden">
                                        @if($item->image)
                                            <img src="{{ url('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                 class="w-full h-48 object-cover"/>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="w-full h-48 object-cover">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                                            </svg>
                                        @endif
                                        <div class="p-4">
                                            <p class="text-gray-700 font-semibold">{{ Str::limit($item->name, 20) }}</p>
                                            <p class="text-gray-600 text-sm mt-1">{{ $item->countItem($item->type) }}
                                                Items</p>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="text-gray-700">No categories available.</p>
                            @endforelse
                        @else
                            <p class="text-gray-700">Invalid category data.</p>
                        @endif
                    </div>
                @empty
                    <div class="w-full text-center">
                        <p class="text-gray-500 text-center">No Categories Found</p>
                    </div>
                @endforelse
            </div>
        </section>
    </div>
@endsection

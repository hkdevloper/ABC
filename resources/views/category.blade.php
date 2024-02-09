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
    <!-- Search Section -->
    <section class="relative py-8 md:h-[60vh] flex flex-col items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-green-300 to-purple-500 opacity-25"></div>
        <div class="mx-auto text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-semibold text-dark mb-2">Discover Top Companies and Products</h1>
            <p class="text-dark text-base md:text-lg mb-4">Explore a vast network of five lakh+ businesses and products
                for your needs</p>
            <form action="{{ route('search') }}"
                  class="mt-2 md:mt-4 flex items-center justify-center rounded-full p-4 pl-2 relative bg-white w-100">
                <div class="relative flex items-center justify-between w-full s-form">
                    <label for="searchInput" class="sr-only">Search</label>
                    <input id="searchInput" name="q" type="text" placeholder="Type at least 3 characters"
                           class="search-input focus:outline-none px-6 py-2 rounded-full border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full">
                    <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 w-auto rounded-full ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse">
                        <span class="inline">Search</span>
                    </button>
                </div>
                <div id="searchResults" class="search-results mt-2"></div>
            </form>
        </div>
    </section>
    <!-- Main Content -->
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Product List -->
        <section class="p-2 my-1 md:p-8 md:my-4">
            <div class="container mx-auto">
                @forelse($type as $itemType)
                    <div class="flex justify-start items- my-5">
                        <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">{{$itemType}}</h1>
                    </div>
                    <hr class="my-2 md:my-5">
                    <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-1 md:gap-3">
                        @php
                            $data = Category::where('type', $itemType)->get();
                            $route = '';
                            switch ($itemType) {
                                case 'product':
                                $route = 'products';
                                break;
                                case 'event':
                                    $route = 'events';
                                    break;
                                case 'blog':
                                    $route = 'blogs';
                                    break;
                                case 'job':
                                    $route = 'jobs';
                                    break;
                                case 'forum':
                                    $route = 'forum';
                                    break;
                                default:
                                    $route = 'company';
                                    break;
                            }
                        @endphp
                            <!-- Category Card 1 -->
                        @if(is_iterable($data))
                            @forelse($data as $item)
                                <a href="{{route($route, ['category' => $item->name])}}">
                                    <x-bladewind.card class="cursor-pointer bg-indigo-100 hover:shadow-gray-400"
                                                      :reducePadding="true">
                                        <div class="flex flex-col items-center justify-center h-100">
                                            <img src="{{ url('storage/' . ($item->image ?? '')) }}"
                                                 alt="{{ $item->name }}"
                                                 class="w-[50px] h-[50px] md:w-[80px] md:h-[80px] object-contain rounded-full"/>
                                            <p class="text-center text-xs md:text-sm lg:text-base bold italic mt-2">
                                                {{ Str::limit($item->name, 15) }}
                                            </p>
                                            <p class="hidden md:block text-center text-base md:text-xl bold mt-2">
                                                ({{ $item->countItem() }})</p>
                                        </div>
                                    </x-bladewind.card>
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

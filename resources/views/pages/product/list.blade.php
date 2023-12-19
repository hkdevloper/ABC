@extends('layouts.user')

@section('content')
    {{--    <x-user.header :title="'Products'" :breadcrumb="['Home', 'Product', 'List']" type="product"/>--}}
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Product List Block -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Product List Filter -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span class="text-xl text-purple-500">Products</span>
                </p>
                <p class="text-base text-gray-500">About {{$products->total()}} Result</p>
            </div>
            <hr class="my-5">
            <!-- Product List -->
            @php
                $slug = null;
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4">
                @forelse($products as $key => $item)
                    @php
                        $slug = $item->slug;
                        $color = [
                            'bg-orange-500',
                            'bg-teal-500',
                            'bg-purple-500',
                        ];
                        $currentColor = $color[$key % count($color)]; // Cycle through colors in order
                        $btnColor = $color[$key % count($color)]; // Cycle through colors in order
                    @endphp
                    <div class="flex-shrink-0 relative overflow-hidden {{$currentColor}} rounded-lg max-w-xs shadow-lg">
                        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                             style="transform: scale(1.5); opacity: 0.1;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                                  fill="white"/>
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                                  fill="white"/>
                        </svg>
                        <div class="relative flex items-center justify-center">
                            <img class="relative w-100 h-60 bg-contain" src="{{ url('storage/' . $item->thumbnail) }}"
                                 alt="">
                        </div>
                        <div class="relative text-white px-3 pb-6 mt-3">
                            <span class="block opacity-75 -mb-1">{{$item->category->name}}</span>
                            <div class="flex justify-between mt-2">
                                <a href="{{ route('view.product', [$slug]) }}"
                                   class="block font-semibold text-xl">{{ $item->name }}</a>
                                <span
                                    class="block bg-white rounded-full text-orange-500 text-xs font-bold px-3 py-2 leading-none flex items-center">₹ {{$item->price}}</span>
                            </div>
                        </div>
                        <!-- Product List Action -->
                        <div class="m-2 text-center">
                            <a href="{{ route('view.product', [$slug]) }}"
                               class="bg-white text-orange-500 hover:{{$btnColor}} hover:text-white rounded-full px-4 py-2 transition duration-300 ease-in-out flex items-center transform hover:-translate-y-1 hover:scale-110 text-center">
                    <span class="mr-1 text-center">
                        Enquire Now
                    </span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center">
                        <p class="text-gray-500 text-center">No Products Found</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <hr class="my-5">
            {{ $products->links() }}
        </div>
        <!-- Side Block -->
        <div class="lg:w-1/4 lg:text-left bg-gray-100 p-4">
            <!-- Search Box -->
            <div class="mt-4">
                <label for="category-search" class="text-gray-600 block mb-2">Search Products</label>
                <input type="text" id="category-search" placeholder="Type to search"
                       class="w-full border rounded py-2 px-3 focus:outline-none focus:shadow-outline-blue">
            </div>
            <!-- Filters -->
            <div class="mb-4">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Filters</h3>
                <!-- Add your specific filter options here -->
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-500">
                    <span class="ml-2 text-gray-700">Filter Option 1</span>
                </label>
                <!-- Add more filters as needed -->
            </div>

            <!-- Sorting -->
            <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Sort By</h3>
                <select
                    class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline-blue">
                    <option value="latest">Latest</option>
                    <option value="price-low-high">Price: Low to High</option>
                    <option value="price-high-low">Price: High to Low</option>
                    <!-- Add more sorting options as needed -->
                </select>
            </div>
            <!-- Categories -->
            <div class="my-4">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Categories</h3>
                <!-- Category List -->
                <ul class="leading-loose">
                    @foreach($categories as $index => $category)
                        @if($index > 5)
                            @break
                        @endif
                        <li class="mb-4">
                            <a href="{{ route('products', ['category' => $category->slug]) }}"
                               class="block bg-white hover:bg-gray-100 border border-gray-200 rounded-lg p-4 transition duration-300 ease-in-out">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-blue-500 hover:text-blue-700">{{ $category->name }}</span>
                                    <span class="bg-blue-500 text-white rounded-full py-1 px-2 text-xs">{{ $category->products->count()}} Products</span>
                                </div>
                                <p class="text-gray-600">{!! $category->description !!}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection

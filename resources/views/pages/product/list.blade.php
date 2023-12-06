@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Products'" :breadcrumb="['Home', 'Product', 'List']"/>
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Product List Block -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Product List Filter -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span class="text-xl text-purple-500">Products</span></p>
                <p class="text-base text-gray-500">About {{count($products)}} Result</p>
            </div>
            <hr class="my-5">
            <!-- Product List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($products as $product)
                    <div class="card dark:bg-neutral-700">
                        <!-- Product Thumbnail -->
                        <div class="overflow-hidden w-full h-40">
                            <img src="{{ url('storage/'.$product->thumbnail) }}" alt="Product Image"
                                 class="object-contain w-full h-full">
                        </div>
                        <!-- Product Details -->
                        <div class="p-4">
                            <h2 class="text-gray-900 text-base font-semibold mb-1">{{ $product->name }}</h2>
                            <p class="text-gray-900 text-base mb-1">Brand: {{ $product->brand }}</p>
                            <p class="text-base mb-2">Condition:
                                <span class="text-green-500">{{ ucfirst($product->condition) }}</span>
                            </p>
                            <div class="mt-2 text-xs">
                                @php
                                    $description = $product->description;
                                    $limit = 50; // You can adjust the character limit
                                @endphp
                                <p>{!! strlen($description) > $limit ? substr($description, 0, $limit).'...' : $description !!}</p>
                            </div>
                        </div>
                        <!-- Product Actions -->
                        <div class="flex items-center justify-between p-4 border-t border-gray-300">
                            <!-- View Button -->
                            <a href="{{ route('view.product', [$product->slug]) }}"
                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 transition duration-300 ease-in-out text-xs">
                                View <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                            <!-- Like, Share, Bookmark Icons -->
                            <div class="flex space-x-2">
                                <!-- Like Icon -->
                                <button class="text-gray-500 hover:text-purple-500"><i class="fa-solid fa-heart"></i>
                                </button>
                                <!-- Share Icon -->
                                <button class="text-gray-500 hover:text-purple-500"><i class="fa-solid fa-share"></i>
                                </button>
                                <!-- Bookmark Icon -->
                                <button class="text-gray-500 hover:text-purple-500"><i class="fa-solid fa-bookmark"></i>
                                </button>
                            </div>
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
        @include('includes.sidebar')
    </div>
@endsection

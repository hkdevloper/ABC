@extends('layouts.main-user-details')

@section('content')
    <div class="container mx-auto">
        <header class="bg-blue-500 py-4 mb-6">
            <div class="container mx-auto text-white text-center">
                <h1 class="text-3xl font-semibold">{{$product->name}}</h1>
                <p class="text-sm">{{$product->brand}}</p>
            </div>
        </header>
        <div class="md:col-span-1">
            <img src="{{url('storage/' . $product->thumbnail)}}" alt="product Thumbnail" style="width: 100%; height: 400px;"
                 class="mb-6 rounded-lg shadow-lg">
        </div>
        <!-- Product Description -->
        <div class="mt-6">
            {!! $product->description !!}
        </div>
    </div>
    <!-- Related Products Section -->
    <section class="container mx-auto mt-8 p-4 bg-white">
        <h2 class="text-2xl font-semibold">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
            <!-- Related Product 1 -->
            @if($related_products->count() == 0)
                <p class="text-gray-500 text-center mt-10">No related products found.</p>
            @else
                @foreach($related_products as $product)
                    <div class="m-2 card dark:bg-neutral-700 w-full">
                        <!-- Logo and Details Div -->
                        <div class="flex items-center justify-between pr-1 w-full">
                            <div class="flex">
                                <img src="{{url('storage/'.$product->thumbnail)}}" alt="Product Image"
                                     class="w-[150px] h-[150px] object-cover rounded-l-lg mr-3">
                                <div class="flex items-center">
                                    <div class="block">
                                        <h2 class="text-gray-900 text-base font-semibold mb-1">{{ $product->name }}</h2>
                                        <!-- Brand Name -->
                                        <p class="text-gray-900 text-base mb-1">
                                            Brand: {{ $product->brand }}</p>
                                        <!-- Condition -->
                                        <p class="text-base mb-2"> Condition:
                                            @if ($product->condition === 'new')
                                                <span class="text-green-500">New</span>
                                            @elseif ($product->condition === 'refurbished')
                                                <span class="text-yellow-500">Refurbished</span>
                                            @elseif ($product->condition === 'user')
                                                <span class="text-red-500">User</span>
                                            @else
                                                {{ $product->condition }}
                                            @endif
                                        </p>
                                        <!-- Description -->
                                        <div class="mt-2 text-xs w-full">
                                            @php
                                                $description = $product->description;
                                                $limit = 50; // You can adjust the character limit
                                            @endphp

                                            @if(strlen($description) > $limit)
                                                <p>
                                                    {!!  substr($description, 0, $limit) !!}...
                                                    <a href="{{route('view.company', [$product->slug])}}"
                                                       class="text-blue-500 hover:underline">Read
                                                        More</a>
                                                </p>
                                            @else
                                                <p>
                                                    {!! $description!!}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('view.product', [$product->slug])}}"
                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 transition duration-300 ease-in-out text-xs w-100"
                               style="border: 1px solid;">View <i
                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection

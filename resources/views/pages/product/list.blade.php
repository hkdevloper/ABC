@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Products'" :breadcrumb="['Home', 'Product', 'List']"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Product List Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Product List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden mx-2 px-2">
                                <div class="flex items-center justify-center w-100">
                                    <label for="sort-by"></label><select id="sort-by" class="border border-solid border-gray-300 text-gray-900 text-sm p-2.5 m-2 focus:outline-none focus:border-0 card w-[150px]">
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
                                   style="border: 1px solid;">List your Product</a>
                            </div>
                            <!-- Product List -->
                            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                <!-- Product list Item -->
                                @foreach($products as $product)
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
                            </div>
                            <!-- Pagination -->
                            {{ $products->links() }}
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

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
                        <!-- Product List Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Product List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden mx-2 px-2">
                                <div>
                                    <span class="text-sm">Showing Result <strong class="text-purple-600">10</strong> of <strong  class="text-purple-600">{{rand(10,99)}}</strong> Products</span>
                                </div>
                                <div class="flex flex-wrap items-center justify-center">
                                    <label for="sort-by">Sort By</label>
                                    <select id="sort-by"
                                        class="border border-solid border-gray-300 text-gray-900 text-sm w-auto p-2.5 m-2 focus:outline-none focus:border-0 card">
                                        <option selected>Filter All</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>
                                    <label for="price-range">Price Range</label>
                                    <select name="price-range" id="price-range"
                                            class="border border-solid border-gray-300 text-gray-900 text-sm w-auto p-2.5 m-2 focus:outline-none focus:border-0 card    ">
                                        <option value="low-tot-high">Low to High</option>
                                        <option value="high-to-low">High to Low</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Product List -->
                            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                <!-- Product list Item -->
                                @php
                                    function generateRandomProductTitle() {
                                        $adjectives = ["Premium", "Deluxe", "Elegant", "Quality", "Modern", "Unique", "Luxurious", "Stylish", "Sleek", "Innovative"];
                                        $nouns = ["Widget", "Gadget", "Device", "Tool", "Accessory", "Item", "Product", "Apparatus", "Contraption", "Instrument"];

                                        $randomAdjective = $adjectives[array_rand($adjectives)];
                                        $randomNoun = $nouns[array_rand($nouns)];

                                        return $randomAdjective . " " . $randomNoun;
                                    }
                                @endphp
                                @for($i=1; $i<10;$i++)
                                    <div class="m-2 card">
                                        <!-- Logo and Details Div -->
                                        <div class="flex items-center justify-between pr-1 w-full">
                                            <img src="https://via.placeholder.com/300x300" alt="Product Image"
                                                 class="w-[150px] h-[150px] object-cover rounded-l-lg mr-3">
                                            <div class="flex items-center">
                                                <div class="block">
                                                    <h2 class="text-gray-900 text-base font-semibold mb-1">{{ generateRandomProductTitle() }}</h2>
                                                    <p class="text-gray-600 text-xs">Lorem ipsum dolor sit amet
                                                        consectetur adipisicing elit. Hic deleniti dolorem dolorum
                                                        debitis quaerat.
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                    <div class="flex items-center mt-2 flex-wrap">
                                                        <x-bladewind::tag label="hkdevs" color="purple" class="mx-1"/>
                                                        <x-bladewind::tag label="codecanyon" color="purple"
                                                                          class="mx-1"/>
                                                        <x-bladewind::tag label="theme" color="purple" class="mx-1"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{route('view.product', [generateRandomProductTitle()])}}"
                                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-[100px]"
                                               style="border: 1px solid;">View <i
                                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
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

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
                                <!-- Product Pagination -->
                                <div class="flex justify-center">
                                    <nav class="bg-white rounded-full shadow-md">
                                        <ul class="inline-flex p-2 space-x-2">
                                            <li>
                                                <a href="#"
                                                   class="px-3 py-2 rounded-l-full hover:bg-blue-500 hover:text-white">
                                                    <i class="fas fa-angle-double-left"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="px-3 py-2 hover:bg-blue-500 hover:text-white">1</a>
                                            </li>
                                            <li>
                                                <a href="#" class="px-3 py-2 hover:bg-blue-500 hover:text-white">2</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                   class="px-3 py-2 rounded-r-full hover:bg-blue-500 hover:text-white">
                                                    <i class="fas fa-angle-double-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
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

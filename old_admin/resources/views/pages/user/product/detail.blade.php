@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font container">
                    <!-- Content Box -->
                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Product List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="container mx-auto">
                                <header class="bg-blue-500 py-4 mb-6">
                                    <div class="container mx-auto text-white text-center">
                                        <h1 class="text-3xl font-semibold">Realme 5 Pro</h1>
                                        <p class="text-sm">Power Meets Style</p>
                                    </div>
                                </header>
                                <div class="md:col-span-1">
                                    <img src="https://via.placeholder.com/1200x400" alt="Realme 5 Pro"
                                         class="mx-auto rounded-lg shadow-lg object-cover">
                                </div>
                                <!-- Product Description -->
                                <div class="mt-6">
                                    <h2 class="text-2xl font-semibold">Key Features</h2>
                                    <ul class="list-disc pl-4 mt-4">
                                        <li>6.3-inch Full HD+ Display</li>
                                        <li>Quad Camera Setup (48MP + 8MP + 2MP + 2MP)</li>
                                        <li>Qualcomm Snapdragon 712 Processor</li>
                                        <li>4GB/6GB/8GB RAM Options</li>
                                        <li>64GB/128GB Internal Storage Options</li>
                                        <li>VOOC Flash Charge 3.0</li>
                                    </ul>
                                    <p class="mt-4">Experience the power and style of the Realme 5 Pro. With its
                                        stunning display, versatile camera setup, and fast processor, it's the perfect
                                        companion for your mobile needs.</p>
                                    <p class="mt-4 text-xl font-semibold text-blue-500">Price: $249.99</p>
                                </div>
                            </div>
                            <!-- Related Products Section -->
                            <section class="container mx-auto mt-8 p-4 bg-white">
                                <h2 class="text-2xl font-semibold">Related Products</h2>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
                                    <!-- Related Product 1 -->
                                    @php
                                        function generateRandomProductTitle() {
                                            $adjectives = ["Premium", "Deluxe", "Elegant", "Quality", "Modern", "Unique", "Luxurious", "Stylish", "Sleek", "Innovative"];
                                            $nouns = ["Widget", "Gadget", "Device", "Tool", "Accessory", "Item", "Product", "Apparatus", "Contraption", "Instrument"];

                                            $randomAdjective = $adjectives[array_rand($adjectives)];
                                            $randomNoun = $nouns[array_rand($nouns)];

                                            return $randomAdjective . " " . $randomNoun;
                                        }
                                    @endphp

                                    @for($i=1; $i<=6;$i++)
                                        <div class="m-2 card">
                                            <!-- Logo and Details Div -->
                                            <div class="flex flex-col items-center justify-between w-full">
                                                <img src="https://via.placeholder.com/300x300" alt="Product Image"
                                                     class="w-full h-[150px] object-cover rounded-t-lg mb-3">
                                                <div class="flex items-center p-1">
                                                    <div class="block">
                                                        <h2 class="text-gray-900 text-base font-semibold mb-1">{{ generateRandomProductTitle() }}</h2>
                                                        <p class="text-gray-600 text-xs">Lorem ipsum dolor sit amet
                                                            consectetur adipisicing elit. Hic deleniti dolorem dolorum
                                                            debitis quaerat. Lorem ipsum dolor sit amet consectetur
                                                            adipisicing elit.</p>
                                                        <div class="flex flex-wrap my-2">
                                                            <span class="bg-purple-100 text-purple-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Tech</span>
                                                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Coding</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex justify-between items-center w-full px-2">
                                                    <button class="text-purple-500 hover:underline ml-2">
                                                        <i class='bx bx-share-alt'></i>
                                                    </button>
                                                    <a href="{{route('view.product', [generateRandomProductTitle()])}}"
                                                       class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-sm border border-1 border-solid border-purple-500 w-1/2 text-center mb-1">View
                                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </section>
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

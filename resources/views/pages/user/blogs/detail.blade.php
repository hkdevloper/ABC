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
                                    @for($i=1;$i<=6;$i++)
                                        <div class="card rounded-lg overflow-hidden">
                                            <img src="https://via.placeholder.com/400x500" alt="Product Image"
                                                 class="w-full h-48 object-cover object-center">
                                            <div class="px-4 py-4">
                                                <h2 class="text-xl font-semibold text-gray-800">Product Name</h2>
                                                <p class="text-gray-600">Category: Business Services</p>
                                                <p class="text-gray-600">Price: $99.99</p>
                                                <div class="mt-2 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24"
                                                         stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    <p class="text-gray-600 ml-2">4.5 (25 reviews)</p>
                                                </div>
                                            </div>
                                            <div class="px-4 py-2 bg-blue-200 text-white">
                                                <a href="{{route('view.product', ['something'])}}"
                                                   class="block text-center text-black font-semibold hover:underline">View
                                                    Details</a>
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

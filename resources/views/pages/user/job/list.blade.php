@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="border flex justify-between items-center"
                         style="width: 100%; height: 100px; background: rgb(15, 12, 114);">
                        <h1 class="text-white text-4xl mx-12">Jobs</h1>
                        <!-- Filter Section -->
                        <div class="p-4 md:flex md:justify-between">
                            <!-- Search Input -->
                            <div class="relative mb-4 md:mb-0 mx-1">
                                <input type="text"
                                       class=" rounded-full bg-white w-full py-2 px-4 pl-10 focus:outline-none"
                                       placeholder="Search jobs...">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>

                            <!-- Category Filter -->
                            <div class="mb-4 md:mb-0 mx-1">
                                <select class="rounded-md bg-white py-2 px-4 focus:outline-none">
                                    <option value="">All Categories</option>
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                    <!-- Add more category options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Product List BLock -->
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
                                    <div class="m-2 card desktop-homepage-events-wdgt dark:bg-neutral-700 w-full">
                                        <!-- Logo and Details Div -->
                                        <div class="flex items-start justify-between">
                                            <div class="flex items-center">
                                                <!-- Logo -->
                                                <img src="https://via.placeholder.com/600x400" alt="Product Image"
                                                     width="180" height="150" class="mr-5 inline-block rounded-l-lg">

                                                <!-- Details -->
                                                <div class="block">
                                                    <h2 class="text-gray-900 text-lg font-semibold mb-1">{{ generateRandomProductTitle() }}</h2>
                                                    <p class="text-gray-400">Jamnagar, Gujarat 361320</p>
                                                    <p class="text-purple-600">Full Stack Developer</p>
                                                    <p class="text-gray-400">Posted 2 days ago</p>
                                                </div>
                                            </div>

                                            <a href="{{route('view.job', ['fullstcak'])}}"
                                               class="mt-4 py-[.688rem] px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-gray-200 font-semibold bg-purple-100 text-blue-500 hover:text-blue hover:bg-blue-100 hover:border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:ring-offset-2 transition-all text-sm dark:border-gray-700 dark:hover:border-blue-500"
                                               style="position: relative; top: 10px; right: 10px;">View <i
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

                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

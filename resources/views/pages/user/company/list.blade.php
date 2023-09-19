@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    {{-- Filter Section--}}
                    <div class="border flex justify-between items-center mt-2"
                         style="width: 100%; height: 100px; background: rgb(15, 12, 114);">
                        <h1 class="text-white text-4xl mx-12">Companies</h1>
                        <!-- Filter Section -->
                        <div class="p-4 md:flex md:justify-between">
                            <!-- Search Input -->
                            <div class="relative mb-4 md:mb-0 mx-1">
                                <input type="text"
                                       class=" rounded-full bg-white w-full py-2 px-4 pl-10 focus:outline-none"
                                       placeholder="Search Companies...">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>

                            <!-- Category Filter -->
                            <div class="mb-4 md:mb-0 mx-1">
                                <select
                                    class="rounded-md bg-white py-2 px-4 focus:outline-none">
                                    <option value="">All Categories</option>
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                    <!-- Add more category options as needed -->
                                </select>
                            </div>

                            <!-- Pricing Filter -->
                            <div class="mb-4 md:mb-0 mx-1">
                                <select
                                    class=" rounded-md bg-white py-2 px-4 focus:outline-none">
                                    <option value="">All Locations</option>
                                    <option value="price1">Location 1</option>
                                    <option value="price2">Location 2</option>
                                    <!-- Add more pricing options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="container px-5 py-12 mx-auto flex flex-wrap">
                        <!-- Companies List -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                            <div class="flex flex-col mb-10 lg:items-start items-center">
                                <!-- Company list Item -->
                                @php
                                    function generateRandomCompanyName() {
                                        $companies = ["Tech Solutions", "Innovative Ventures", "Global Enterprises", "Digital Innovators", "Creative Minds Inc.", "Smart Tech Co.", "Eco-Friendly Solutions", "FutureTech Corp", "Data Wizards", "Infinite Ideas Ltd"];
                                        return $companies[array_rand($companies)];
                                    }

                                    function generateRandomLocation() {
                                        $locations = ["New York", "San Francisco", "London", "Berlin", "Sydney", "Tokyo", "Toronto", "Singapore", "Mumbai", "Dubai"];
                                        return $locations[array_rand($locations)];
                                    }

                                    function generateRandomDescription() {
                                        $loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac libero eu ligula accumsan tempus. Nulla facilisi. Sed nec nisi nec libero bibendum dignissim. Phasellus nec ultricies nunc. Donec vel bibendum mauris. Fusce a erat vel felis bibendum congue.";
                                        $description = substr($loremIpsum, 0, 255); // Limit to 255 characters
                                        return $description;
                                    }
                                @endphp

                                @for($i=1; $i<10;$i++)
                                    <div class="m-2 card block p-4 w-95">
                                        <!-- Logo and Details Div -->
                                        <div class="flex items-start justify-between">
                                            <div class="flex items-center">
                                                <!-- Logo -->
                                                <img src="https://via.placeholder.com/100x100" alt="" width="50"
                                                     height="50" class="mr-5 inline-block">

                                                <!-- Details -->
                                                <div class="inline-block">
                                                    <h2 class="text-green-600 text-sm mb-1">Featured</h2>
                                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-1">{{generateRandomCompanyName()}}</h2>
                                                    <div class="flex items-center">
                                                        <i class="fa-solid fa-location-dot text-green-600"></i>
                                                        <span class="mx-1">{{generateRandomLocation()}}</span>
                                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                                        <span class="mx-1">{{rand(1,99)/10}} Review</span>
                                                        <i class="fa-solid fa-eye"></i>
                                                        <span class="mx-1">{{rand(1,99)/10}}K Views</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{route('view.company', [generateRandomLocation()])}}"
                                               class="mt-4 py-[.688rem] px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-gray-200 font-semibold bg-purple-100 text-blue-500 hover:text-blue hover:bg-blue-100 hover:border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:ring-offset-2 transition-all text-sm dark:border-gray-700 dark:hover:border-blue-500"
                                               style="position: relative; top: 10px; right: 10px;">View <i
                                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                        </div>

                                        <!-- Description -->
                                        <div class="mt-8">
                                            <p>{{generateRandomDescription()}}</p>
                                        </div>

                                    </div>
                                @endfor

                            </div>
                            <!-- Product Pagination -->
                            <div class="flex justify-center mb-2">
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
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

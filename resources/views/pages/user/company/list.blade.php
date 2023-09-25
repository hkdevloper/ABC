@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Blogs'"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    {{-- Main Section --}}
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Companies List -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                            <!-- Company List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden mx-2 px-2">
                                <div>Showing Result <strong>10</strong> of <strong>{{rand(10,99)}}</strong></div>
                                <div class="flex flex-wrap items-center justify-center">
                                    <select
                                        class="border border-solid border-gray-300 text-gray-900 text-sm w-auto p-2.5 m-2 focus:outline-none focus:border-0">
                                        <option selected>Filter All</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>

                                    <a href="{{route('company')}}"
                                       class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-100"
                                       style="border: 1px solid;">List your Company </a>
                                </div>
                            </div>


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
                                    <div class="m-2 card p-4">
                                        <!-- Logo and Details Div -->
                                        <div class="flex items-start justify-between">
                                            <div class="flex items-center">
                                                <!-- Logo -->
                                                <img src="https://via.placeholder.com/100x100" alt="" width="50"
                                                     height="50" class="mr-5 inline-block">

                                                <!-- Details -->
                                                <div class="inline-block">
                                                    <h2 class="text-green-600 text-sm mb-1 @if(rand(0,1)) hidden @endif ">
                                                        Featured</h2>
                                                    <h2 class="text-gray-900 text-base title-font font-medium mb-1">{{generateRandomCompanyName()}}
                                                        <x-bladewind::icon name="check-badge" type="solid"
                                                                           class="text-green-400 @if(rand(0,1)) hidden @endif"/>
                                                    </h2>
                                                    <div class="flex items-center text-sm">
                                                        <x-bladewind::icon name="map-pin" type="solid"
                                                                           class="text-green-300"/>
                                                        <span class="mx-1">{{generateRandomLocation()}}</span>
                                                        <x-bladewind::icon name="star" type="solid"
                                                                           class="text-orange-300"/>
                                                        <span class="mx-1">{{rand(1,99)/10}} Review</span>
                                                        <x-bladewind::icon name="eye" type="solid"
                                                                           class="text-purple-300"/>
                                                        <span class="mx-1">{{rand(1,99)/10}}K Views</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{route('view.company', [generateRandomLocation()])}}"
                                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-[70px]"
                                               style="border: 1px solid;">View <i
                                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                        </div>

                                        <!-- Description -->
                                        <div class="mt-2 text-xs">
                                            <p>{{generateRandomDescription()}}</p>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                            <!-- Pagination -->
                            <x-user.pagination/>
                        </div>
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

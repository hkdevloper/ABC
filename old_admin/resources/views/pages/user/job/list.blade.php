@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Jobs'"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Job List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Job List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden px-2">
                                <div>
                                    <span class="text-sm">Showing Result <strong class="text-purple-600">10</strong> of <strong
                                            class="text-purple-600">{{rand(10,99)}}</strong> Jobs</span>
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
                            <!-- Job List -->
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
                                        <div class="flex items-center justify-between pr-2">
                                            <div class="flex flex-wrap">
                                                <img src="https://via.placeholder.com/150x150" alt="Job Thumbnail"
                                                     class="w-[150px] h-[120px] object-cover rounded-l-lg mr-3">
                                                <div class="block">
                                                    <h2 class="text-gray-900 text-lg font-semibold mb-1">{{ generateRandomProductTitle() }}</h2>
                                                    <p class="text-gray-400">Jamnagar, Gujarat 361320</p>
                                                    <p class="text-purple-600">Full Stack Developer</p>
                                                    <p class="text-gray-400">Posted 2 days ago</p>
                                                </div>
                                            </div>

                                            <a href="{{route('view.job', ['fullstack'])}}"
                                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                               style="border: 1px solid;">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                @endfor
                                <!-- Pagination -->
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

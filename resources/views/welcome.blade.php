@extends('layouts.main-user-list')

@section('head')
    <style>
        .gradient-border {
            background: linear-gradient(to right, #8a2be2, #9932CC, #8a2be2); /* Purple Gradient Colors */
            height: 4px; /* Adjust the height as needed */
            border: none;
        }
    </style>

@endsection

@section('content')
    <!-- Search Section -->
    <section class="bg-white py-4 md:h-[60vh] flex flex-col items-center justify-center">
        <div class="mx-auto w-full md:w-[90%] text-center">
            <h1 class="text-3xl md:text-5xl font-semibold text-blue-900">Discover Top Companies and Products</h1>
            <div class="text-gray-600 text-base md:text-3xl my-4">Explore a vast network of 5 lakh+ businesses and products for your needs</div>
            <div class="mt-2 md:mt-4 flex items-center justify-center">
                <div class="relative ml-2">
                    <input list="searchList"
                           class="rounded-full p-2 md:p-4 w-full md:w-[50vw] focus:outline-none card-hovered"
                           placeholder="Search for Companies or Products..." type="text">
                    <!-- Add datalist for autocomplete if needed -->
                    <!-- <datalist id="searchList"> -->
                        <!-- Populate with search options -->
                    <!-- </datalist> -->
                </div>
                <button
                    class="bg-blue-500 text-white p-2 md:p-4 rounded-full ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out w-[40px] md:w-[60px]">
                    <i class='bx bx-search-alt-2 text-base md:text-lg'></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container mx-auto">
        <!-- Top Categories -->
        <section class="bg-neutral-100 p-2">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl md:text-3xl font-semibold inline-block text-blue-900">Discover Top Categories</h1>
                <a href="{{ url('/') }}" class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                    <span class="hidden md:inline">Explore All</span>
                    {{-- Icon --}}
                    <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                </a>
            </div>
            <hr class="my-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <!-- Category Card 1 -->
                @forelse($category as $item)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{$item->name}}</div>
                            <p class="text-gray-700 text-base">
                                {{ $item->products->count() }}+ Items
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Explore
                                <i class="fas fa-arrow-alt-circle-right ml-2"></i>
                            </a>
                        </div>
                        <hr class="border-b-4 border-purple-500 w-full mt-4 gradient-border">

                    </div>
                @empty
                    <p class="text-gray-700">No categories available.</p>
                @endforelse
            </div>
        </section>

        <!-- Top Products -->
        <section class="mt-6">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl md:text-3xl font-semibold inline-block text-blue-900">Explore Top Products</h1>
                    <a href="{{ url('/') }}" class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                        <span class="hidden md:inline">Explore All</span>
                        {{-- Icon --}}
                        <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                    </a>
                </div>
                <hr class="mt-4">
                <div class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    @forelse($products as $product)
                        <a href="{{ route('view.product', [$product->slug]) }}" class="bg-white rounded-lg p-4 card">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-blue-900 font-semibold">{{ $product->name }}</span>
                                <img src="{{ url('storage/' . $product->thumbnail) }}" alt="Product Thumbnail" class="w-[40px] h-[40px] rounded">
                            </div>
                            <span class="text-gray-600">1.4K+ Sold</span>
                            <div class="flex mt-2">
                                @forelse($product->gallery as $item)
                                    <div class="w-1/3 mr-2">
                                        <img src="{{ url('storage/' . $item) }}" alt="Product Image" class="w-[40px] h-[40px] rounded-lg">
                                    </div>
                                @empty
                                    <p>No images available</p>
                                @endforelse
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-700">No products available.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Featured Companies -->
        <section class="bg-gray-100 p-8 mb-4 rounded-lg">
            <div class="container mx-auto">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Featured Companies</h2>
                    <a href="#" class="bg-indigo-500 text-white py-2 px-4 rounded-full hover:bg-indigo-600">
                        Explore All
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse($companies as $company)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ url('storage/' . $company->logo) }}" class="w-full h-48 object-contain" alt="Company Name">

                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-indigo-900 mb-2">{{$company->name}}</h3>

                                <p class="text-gray-700">{{$company->summary}}</p>

                                <div class="mt-4">
                                    <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">4.5 Rating</span>
                                    <span class="text-gray-600 text-sm">12 reviews</span>
                                </div>
                            </div>

                            <div class="bg-indigo-500 text-white text-center py-4 px-6 rounded-b-lg">
                                <a href="#" class="hover:underline">View Company</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700">No featured companies available.</p>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Featured Events -->
        <section class="bg-gray-100 p-8 mb-4 rounded-lg">
            <div class="container mx-auto">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Featured Events</h2>
                    <a href="#" class="bg-indigo-500 text-white py-2 px-4 rounded-full hover:bg-indigo-600">
                        Explore All
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($events as $event)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ url('storage/'.$event->thumbnail) }}" class="w-full h-48 object-contain" alt="Event">
                        <div class="p-6">
                            <a href="{{ route('view.event', [$event->slug]) }}" class="text-xl font-bold text-indigo-900 mb-2 hover:underline cursor-pointer">{{$event->title}}</a>
                            <p class="text-gray-700 mb-4">
                                {{ $event->summary }}
                            </p>
                            <div class="flex text-sm font-medium mb-2">
                                <div class="bg-indigo-100 text-indigo-800 rounded-full px-3 py-1">
                                    May 30, 2023
                                </div>
                            </div>
                            <div class="flex text-sm font-medium">
                                <div class="bg-indigo-100 text-indigo-800 rounded-full px-3 py-1">
                                    10K enrolled
                                </div>
                            </div>
                        </div>
                        <div class="p-3 pt-4 text-center bg-purple-400">
                            <button class="bg-indigo-500 text-white px-2 py-2 rounded-full hover:bg-indigo-600 mr-2">
                                <i class="fas fa-share"></i> Share
                            </button>
                            <a href="{{ route('view.event', [$event->slug]) }}" class="bg-indigo-500 text-white px-2 py-2 rounded-full hover:bg-indigo-600 mr-2">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <button class="bg-indigo-500 text-white px-2 py-2 rounded-full hover:bg-indigo-600">
                                <i class="fas fa-heart"></i> Like
                            </button>
                        </div>
                    </div>
                    @empty
                        <p class="text-gray-700">No featured events available.</p>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Why Choose Us -->
        <section class="text-gray-600 body-font mt-3">
            <div class="px-5 py-4 mx-auto">
                <div class="text-center mb-10">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">
                        Why Choose Us
                    </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">
                        In the picturesque village of Jam Kalyanpur, we take pride in our commitment to excellence. Explore why choosing us is a decision you won't regret.
                    </p>
                    <div class="flex mt-6 justify-center">
                        <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="p-4 flex flex-col text-center items-center card">
                        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                            <i class="mdi mdi-earth"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Promote your business worldwide</h2>
                            <p class="leading-relaxed text-base">
                                As a full-stack apprentice intern in the heart of Kathiyawad, specializing in Angular and .NET Core, I bring the world to your business.
                            </p>
                        </div>
                    </div>
                    <div class="p-4 flex flex-col text-center items-center card">
                        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                            <i class="mdi mdi-chat-processing"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Direct Chat with business lister</h2>
                            <p class="leading-relaxed text-base">
                                Engage in direct conversations with me, your dedicated full-stack developer, ensuring your requirements are met efficiently.
                            </p>
                        </div>
                    </div>
                    <div class="p-4 flex flex-col text-center items-center card">
                        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                            <i class="mdi mdi-account-group"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Find Millions of buyers</h2>
                            <p class="leading-relaxed text-base">
                                With a dream to become the best game developer and full-stack developer globally, my skills attract millions of potential buyers to your projects.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection

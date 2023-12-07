@extends('layouts.main-user-list')

@section('content')
    <!-- Banner Section -->
    <div
        class="alert alert-dismissible fade show sticky w-full items-center justify-between bg-primary py-4 px-6 text-center text-white md:flex md:text-left">
        <div class="mb-4 flex flex-wrap items-center justify-center md:mb-0 md:justify-start">
        <span class="mr-2 [&>svg]:h-5 [&>svg]:w-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
               stroke="currentColor" class="text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
          </svg>
        </span>
            <strong class="mr-1">Limited offer!</strong> Get it now before it's
            to late
        </div>
        <div class="flex items-center justify-center">
            <a class="mr-4 inline-block rounded bg-neutral-50 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_rgba(251,251,251,0.05)] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.05),0_4px_18px_0_rgba(203,203,203,0.05)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.05),0_4px_18px_0_rgba(203,203,203,0.05)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(203,203,203,0.05),0_4px_18px_0_rgba(203,203,203,0.05)] dark:shadow-[0_4px_9px_-4px_rgba(251,251,251,0.05)] dark:hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)] dark:focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)] dark:active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.1),0_4px_18px_0_rgba(251,251,251,0.05)]"
               href="#!" role="button" data-te-ripple-init data-te-ripple-color="light">Claim offer</a>
            <a href="" class="text-white" data-te-alert-dismiss aria-label="Close">
          <span class="[&>svg]:h-6 [&>svg]:w-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
            </a>
        </div>
    </div>

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
                    <div class="bg-white p-6 rounded-md shadow-md transition-transform transform hover:scale-105">
                        <h2 class="text-xl font-semibold mb-2">{{$item->name}}</h2>
                        <a href="#" class="flex items-center text-center text-blue-500">
                            <span>Explore <i class="fa-solid fa-arrow-right"></i></span>
                        </a>
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
        <section class="mt-6">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl md:text-3xl font-semibold text-blue-900">Discover Featured Companies</h1>
                    <a href="{{ url('company') }}" class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                        <span class="hidden md:inline">Explore All</span>
                        {{-- Icon --}}
                        <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                    </a>
                </div>
                <hr class="mb-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($companies as $company)
                        <div class="bg-white p-4 card rounded-lg overflow-hidden shadow-md">
                            <div class="mb-4">
                                <img src="{{ url('storage/' . $company->logo) }}" alt="Company Logo" class="w-full h-32 object-cover rounded-lg">
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-purple-900 hover:underline">
                                    <a href="{{ route('view.company', [$company->slug]) }}" class="text-purple-900 hover:underline">{{ $company->name }}</a>
                                </h3>
                                <div class="flex items-center mt-2 text-gray-600">
                                <span class="text-yellow-500">
                                    <i class="mdi mdi-star"></i>
                                </span>
                                    <span class="ml-1">{{ $company->rating }}</span>
                                    <span class="ml-2">{{ $company->reviews }} reviews</span>
                                </div>
                                <p class="text-gray-700 mt-2">{{ $company->summary }}</p>
                                <a href="{{ route('view.company', [$company->slug]) }}" class="border border-purple-700 text-purple-700 py-2 px-4 mt-3 rounded-full hover:bg-purple-700 hover:text-white transition duration-300 ease-in-out">
                                    View Company
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700">No featured companies available.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Featured Events -->
        <section class="mt-6">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6 text-blue-900">
                    <h1 class="text-2xl md:text-3xl font-semibold inline-block">Explore Featured Events</h1>
                    <a href="{{ url('/') }}" class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                        <span class="hidden md:inline">Explore All</span>
                        {{-- Icon --}}
                        <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                    </a>
                </div>
                <hr class="mb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @forelse($events as $event)
                        <div class="bg-white overflow-hidden rounded-lg shadow-md m-2">
                            <img class="w-full h-40 object-cover" src="{{ url('storage/'.$event->thumbnail) }}" alt="Event Thumbnail">
                            <div class="p-4">
                                <div class="mb-2">
                                    <h3 class="text-xl font-semibold text-purple-900 hover:underline">
                                        <a href="{{ route('view.event', [$event->slug]) }}" class="text-purple-900 hover:underline">{{ $event->title }}</a>
                                    </h3>
                                </div>
                                <div class="flex items-start mb-2">
                                    <div class="ml-3">
                                        <p class="text-gray-700">{{ $event->website }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <img alt="Calendar icon" class="h-4 w-4" src="{{ asset('images/calendar-icon.svg') }}">
                                    <p class="ml-1">{{ date('d M Y', (int)$event->start) }}</p>
                                </div>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <img alt="User icon" class="h-4 w-4" src="{{ asset('images/user-icon.svg') }}">
                                    <p class="ml-1">{{ rand(1, 99) / 10 }}K Enrolled</p>
                                </div>
                                <div class="border-t-2 border-gray-200 mt-3 pt-3 flex items-center justify-between">
                                    <div>
                                        <p class="text-purple-700 font-semibold">RS. {{ $event->price }}</p>
                                    </div>
                                    <div class="w-3/5">
                                        <a href="{{ route('view.event', [$event->slug]) }}" class="block text-center text-purple-500 hover:text-white rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-full" style="border: 1px solid;">View Details</a>
                                    </div>
                                </div>
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

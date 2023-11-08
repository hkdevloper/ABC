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
            <h1 class="text-3xl md:text-5xl font-semibold text-blue-900">Get the best deal from Best Company</h1>
            <div class="text-gray-600 text-base md:text-3xl my-4">5 lakh+ Companies & Products for you to explore</div>
            <div class="mt-2 md:mt-4 flex items-center justify-center">
                <div class="relative ml-2">
                    <input list="searchList"
                           class="rounded-full p-2 md:p-4 w-full md:w-[40vw] focus:outline-none card-hovered"
                           placeholder="Enter Company/Products Name..." type="text">
                </div>
                <button
                    class="bg-blue-500 text-white p-2 md:p-4 rounded-full ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out w-[40px] md:w-[60px]">
                    <i class='bx bx-search-alt-2 text-base md:text-lg'></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content  -->
    <section class="lg:px-24 md:px-12 py-6 mx-auto homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Categories section -->
                <section>
                    <div class="bg-white p-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <!-- Chip 1 -->
                            <div class="w-full px-2 mb-4 card">
                                <a href="{{ route('company') }}"
                                   class="flex items-center justify-center bg-white rounded-lg p-2 sm:p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img"
                                         class="xs:w-10 md:w-12 lg:w-10 xs:h-10 md:h-12 lg:h-10 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold text-sm sm:text-base">Company</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon"
                                         class="w-3 sm:w-4 h-3 sm:h-4 ml-2 xs:hidden">
                                </a>
                            </div>

                            <!-- Chip 2 -->
                            <div class="w-full px-2 mb-4 card">
                                <a href="{{ route('products') }}"
                                   class="flex items-center justify-center bg-white rounded-lg p-2 sm:p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img"
                                         class="w-10 sm-w-12 md:w-12 h-10 sm-h-12 md-h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold text-sm sm:text-base">Products</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon"
                                         class="w-3 sm:w-4 h-3 sm:h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 3 -->
                            <div class="w-full px-2 mb-4 card">
                                <a href="{{ route('events') }}"
                                   class="flex items-center justify-center bg-white rounded-lg p-2 sm:p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img"
                                         class="w-10 sm-w-12 md:w-12 h-10 sm-h-12 md-h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold text-sm sm:text-base">Events</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon"
                                         class="w-3 sm:w-4 h-3 sm:h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 4 -->
                            <div class="w-full px-2 mb-4 card">
                                <a href="{{ route('jobs') }}"
                                   class="flex items-center justify-center bg-white rounded-lg p-2 sm:p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img"
                                         class="w-10 sm-w-12 md:w-12 h-10 sm-h-12 md-h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold text-sm sm:text-base">Jobs</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon"
                                         class="w-3 sm:w-4 h-3 sm:h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 5 -->
                            <div class="w-full px-2 mb-4 card">
                                <a href="{{ route('deals') }}"
                                   class="flex items-center justify-center bg-white rounded-lg p-2 sm:p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img"
                                         class="w-10 sm-w-12 md:w-12 h-10 sm-h-12 md-h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold text-sm sm:text-base">Deals</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon"
                                         class="w-3 sm:w-4 h-3 sm:h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 6 -->
                            <div class="w-full px-2 mb-4 card">
                                <a href="{{ route('blogs') }}"
                                   class="flex items-center justify-center bg-white rounded-lg p-2 sm:p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img"
                                         class="w-10 sm-w-12 md:w-12 h-10 sm-h-12 md-h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold text-sm sm:text-base">Blogs</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon"
                                         class="w-3 sm:w-4 h-3 sm:h-4 ml-2">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Top Products -->
                <section>
                    <div class="bg-white p-4">
                        <div class="mx-auto">
                            <h2 class="text-2xl font-semibold text-blue-900"></h2>
                            <div class="flex justify-between items-center">
                                <span class="text-xl md:text-2xl font-semibold inline-block text-purple-500">Top Products</span>
                                <a href="{{route('products')}}"
                                   class="md:bg-purple-500 md:text-white text-purple-500 underline md:no-underline cursor-pointer p-1 rounded-full m-1 hover:bg-purple-600 transition duration-300 ease-in-out">
                                    <span class="hidden md:inline">View Products</span>
                                    {{-- Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                            <hr>
                            <div class="mt-4">
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2">
                                    @foreach($products as $product)
                                        <a href="{{route('view.product', [$product->slug])}}" class="bg-white rounded-lg p-4 card">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-blue-900 font-semibold">{{$product->name}}</span>
                                                <img src="{{url('storage/' . $product->thumbnail)}}" alt="arrow-icon"
                                                     class="w-[25px] h-[25px] md:w-[40px] md:h-[40px] rounded">
                                            </div>
                                            <span class="text-gray-600">1.4K+ Sold</span>
                                            <div class="flex mt-2">
                                                @foreach($product->gallery as $item)
                                                    <div class="w-1/3 mr-2">
                                                        <img src="{{url('storage/'. $item)}}" alt=""
                                                             class="w-[25px] h-[25px] md:w-[40px] md:h-[40px] rounded-lg">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Featured Companies -->
                <section class="bg-white">
                    <div class="mx-auto">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <span class="text-xl md:text-2xl font-semibold inline-block text-purple-500">Featured companies</span>
                                <a href="{{route('company')}}"
                                   class="md:bg-purple-500 md:text-white text-purple-500 underline md:no-underline cursor-pointer p-1 rounded-full m-1 hover:bg-purple-600 transition duration-300 ease-in-out">
                                    <span class="hidden md:inline">View companies</span>
                                    {{-- Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                            <hr>
                            <div class="mt-4 relative">
                                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                                    @foreach($companies as $company)
                                        <div class="bg-white m-2 p-3 card flex flex-col lg:flex-row items-center">
                                            <div class="w-32 h-32 lg:w-1/3 lg:h-auto lg:mr-4">
                                                <img src="{{url('storage/' . $company->logo)}}" alt="Company Logo"
                                                     class="w-full h-full object-cover rounded-lg">
                                            </div>
                                            <div class="flex-grow">
                                                <h3 class="text-xl font-semibold text-purple-900 hover:underline">
                                                    <a href="{{route('view.company', ['cognizant'])}}"
                                                       class="text-purple-900 hover:underline">{{$company->name}}</a>
                                                </h3>
                                                <div class="flex items-center mt-2">
                                            <span class="text-yellow-500">
                                                <i class="fa-regular fa-star"></i>
                                            </span>
                                                    <span class="text-gray-600 ml-1">3.9</span>
                                                    <span class="text-gray-600 ml-2">36.5K+ reviews</span>
                                                </div>
                                                <p class="text-gray-700 mt-2">{{$company->summary}}</p>
                                                <a href="{{route('view.company', [$company->slug])}}"
                                                    class="border border-purple-500 text-purple-500 py-2 px-4 mt-3 rounded-full hover:bg-purple-500 hover:text-white transition duration-300 ease-in-out">
                                                    View Company
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- Featured Event -->
                <section class="bg-white">
                    <div class="mx-auto">
                        <div class="p-4">
                            <div class="flex justify-between items-center text-purple-500">
                                <span class="text-xl md:text-2xl font-semibold inline-block">Featured Events</span>
                                <a href="{{route('events')}}"
                                   class="md:bg-purple-500 md:text-white text-purple-500 underline md:no-underline cursor-pointer p-1 rounded-full m-1 hover:bg-purple-600 transition duration-300 ease-in-out">
                                    <span class="hidden md:inline">View Events</span>
                                    {{-- Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                            <hr>
                            <div class="mt-4 relative">
                                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-2">
                                    @foreach($events as $event)
                                        <div class="card desktop-homepage-events-wdgt overflow-hidden m-2">
                                            <img class="w-full h-40 object-cover"
                                                 src="{{url('storage/'.$event->thumbnail)}}"
                                                 alt="Event Thumbnail">
                                            <div class="card-body">
                                                <div class="organizer-container flex items-start">
                                                    <div class="organizer-description-container ml-3">
                                                        <p class="feature-card-heading">{{ $event->title }}</p>
                                                    </div>
                                                </div>
                                                <div class="chips-container mt-2">
                                                    <div class="chip">
                                                        <p class="chip-label">{{ $event->website }}</p>
                                                    </div>
                                                </div>
                                                <div class="feature-card-stats-container mt-2 flex items-center">
                                                    <div class="feature-card-date-container flex items-center">
                                                        <img alt="User icon" class="naukicon-calendar"
                                                             height="16" width="16"
                                                             src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg">
                                                        <p class="feature-card-date-label ml-1">{{ date('d M Y', (int)$event->start) }}</p>
                                                    </div>
                                                    <div class="registered-user-container ml-4 flex items-center">
                                                        <img alt="User icon" class="naukicon-user"
                                                             height="16" width="16"
                                                             src="https://static.naukimg.com/s/0/0/i/Events/icons/user-ot.svg">
                                                        <p class="registered-count-label ml-1">{{rand(1,99) / 10}}K
                                                            Enrolled</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="footer-separator"></div>
                                                <div
                                                    class="semi-circle-container flex items-center justify-between">
                                                    <div class="left semi-circle"></div>
                                                    <div class="right semi-circle"></div>
                                                </div>
                                                <div class="card-footer-container flex items-center justify-between">
                                                    <div class="feature-card-type-tag-container">
                                                        <p class="feature-card-type-label">RS. {{$event->price}}</p>
                                                    </div>
                                                    <div class="cta-container w-full">
                                                        <a href="{{route('view.event', [$event->slug])}}"
                                                           class="block text-center text-purple-500 hover:text-white rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-100"
                                                           style="border: 1px solid;">View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Why Choose Us Section -->
                <section class="text-gray-600 body-font mt-3">
                    <div class="px-5 py-4 mx-auto">
                        <div class="text-center mb-10">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">
                                Why Choose Us
                            </h1>
                            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">Blue bottle
                                crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice
                                poutine, ramps microdosing banh mi pug.</p>
                            <div class="flex mt-6 justify-center">
                                <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="p-4 flex flex-col text-center items-center card">
                                <div
                                    class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Promote your business
                                        worldwide</h2>
                                    <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four
                                        dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing
                                        banh mi pug VHS try-hard.</p>
                                </div>
                            </div>
                            <div class="p-4 flex flex-col text-center items-center card">
                                <div
                                    class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                        <circle cx="6" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Direct Chat with business lister</h2>
                                    <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four
                                        dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing
                                        banh mi pug VHS try-hard.</p>
                                </div>
                            </div>
                            <div class="p-4 flex flex-col text-center items-center card">
                                <div
                                    class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Find Millions of
                                        buyers</h2>
                                    <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four
                                        dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing
                                        banh mi pug VHS try-hard.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

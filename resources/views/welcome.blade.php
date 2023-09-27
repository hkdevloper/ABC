@extends('layouts.main-user-list')

@section('content')
    <!-- Banner Section -->
    <div class="bg-indigo-700 p-4">
        <a href="#" class="flex items-center justify-between text-white">
            <div class="text-lg font-semibold">Gear up With HKDevelopers this Week from Sep 11-16</div>
            <div class="text-white px-4 py-2 rounded-full">Send Your Requirements Now</div>
        </a>
    </div>

    <!-- Search Section -->
    <section class="bg-white py-4 h-[60vh] flex flex-col items-center justify-center">
        <div class="container mx-auto w-full flex flex-col items-center justify-center">
            <h1 class="text-5xl font-semibold text-blue-900">Get the best deal from Best Company</h1>
            <div class="text-gray-600 text-3xl my-4">5 lakh+ Companies & Products for you to explore</div>
            <div class="mt-4 flex items-center mt-3">
                <div class="relative ml-2">
                    <input list="searchList" class="rounded-full p-4 w-[40vw] focus:outline-none card-hovered"
                           placeholder="Enter Company/Products Name..." type="text">
                </div>
                <button
                    class="bg-blue-500 text-white p-4 rounded-full ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out w-[60px]">
                    <i class="fa fa-search text-white"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content  -->
    <section class="container lg:px-24 md:px-12 py-6 mx-auto homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Categories section -->
                <section>
                    <div class="bg-white p-4">
                        <div class="flex flex-no-wrap justify-center -mx-2">
                            <!-- Chip 1 -->
                            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 px-2 mb-4 card mx-1">
                                <a href="{{route('company')}}"
                                   class="flex items-center justify-center bg-white rounded-lg p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img" class="w-12 h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold">Companies</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon" class="w-4 h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 2 -->
                            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 px-2 mb-4 card mx-1">
                                <a href="{{route('products')}}"
                                   class="flex items-center justify-center bg-white rounded-lg p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img" class="w-12 h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold">Products</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon" class="w-4 h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 3 -->
                            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 px-2 mb-4 card mx-1">
                                <a href="{{route('events')}}"
                                   class="flex items-center justify-center bg-white rounded-lg p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img" class="w-12 h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold">Events</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon" class="w-4 h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 4 -->
                            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 px-2 mb-4 card mx-1">
                                <a href="{{route('jobs')}}"
                                   class="flex items-center justify-center bg-white rounded-lg p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img" class="w-12 h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold">Jobs</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon" class="w-4 h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 5 -->
                            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 px-2 mb-4 card mx-1">
                                <a href="{{route('deals')}}"
                                   class="flex items-center justify-center bg-white rounded-lg p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img" class="w-12 h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold">Deals</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon" class="w-4 h-4 ml-2">
                                </a>
                            </div>

                            <!-- Chip 6 -->
                            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 px-2 mb-4 card mx-1">
                                <a href="{{route('blogs')}}"
                                   class="flex items-center justify-center bg-white rounded-lg p-4 transition duration-300 ease-in-out">
                                    <img src="https://bit.ly/45Xemqb" alt="Remote-img" class="w-12 h-12 object-contain">
                                    <span class="ml-2 text-blue-900 font-semibold">Blogs</span>
                                    <img src="https://bit.ly/3ZkHndD" alt="arrow-icon" class="w-4 h-4 ml-2">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Top Products -->
                <section>
                    <div class="bg-white p-4">
                        <div class="container mx-auto">
                            <h2 class="text-2xl font-semibold text-blue-900"></h2>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-semibold inline-block">Top Products</span>
                                <a href="{{route('products')}}"
                                   class="bg-purple-500 text-white py-2 px-4 rounded-full mt-4 mr-4 hover:bg-purple-600 transition duration-300 ease-in-out">View
                                    All Products</a>
                            </div>
                            <div class="mt-4">
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-2">
                                    @for($i = 1; $i < 10; $i++)
                                        <div class="bg-white rounded-lg p-4 card">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-blue-900 font-semibold">Product {{$i}}</span>
                                                <img src="https://bit.ly/3ZkHndD" alt="arrow-icon" class="w-4 h-4">
                                            </div>
                                            <span class="text-gray-600">1.4K+ Sold</span>
                                            <div class="flex mt-2">
                                                <div class="w-1/3 mr-2">
                                                    <img src="https://via.placeholder.com/100x100" alt=""
                                                         class="w-full rounded-lg">
                                                </div>
                                                <div class="w-1/3 mr-2">
                                                    <img src="https://via.placeholder.com/100x100" alt=""
                                                         class="w-full rounded-lg">
                                                </div>
                                                <div class="w-1/3">
                                                    <img src="https://via.placeholder.com/100x100" alt=""
                                                         class="w-full rounded-lg">
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Featured Companies -->
                <section class="bg-white">
                    <div class="container mx-auto">
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-semibold inline-block">Featured companies</span>
                                <a href="{{route('company')}}"
                                   class="bg-purple-500 text-white py-2 px-4 rounded-full mt-4 mr-4 hover:bg-purple-600 transition duration-300 ease-in-out">View
                                    all companies</a>
                            </div>
                            <div class="mt-4 relative">
                                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                                    @for($i = 1; $i < 7; $i++)
                                        <div class="bg-white m-2 p-3 card flex flex-col lg:flex-row items-center">
                                            <div class="w-32 h-32 lg:w-1/3 lg:h-auto lg:mr-4">
                                                <img src="https://via.placeholder.com/100x150" alt="Company Logo"
                                                     class="w-full h-full object-cover rounded-lg">
                                            </div>
                                            <div class="flex-grow">
                                                <h3 class="text-xl font-semibold text-purple-900 hover:underline">
                                                    <a href="{{route('view.company', ['cognizant'])}}"
                                                       class="text-purple-900 hover:underline">Cognizant</a>
                                                </h3>
                                                <div class="flex items-center mt-2">
                            <span class="text-yellow-500">
                                <i class="fa-regular fa-star"></i>
                            </span>
                                                    <span class="text-gray-600 ml-1">3.9</span>
                                                    <span class="text-gray-600 ml-2">36.5K+ reviews</span>
                                                </div>
                                                <p class="text-gray-700 mt-2">Leading ITeS company with a global
                                                    presence.</p>
                                                <button
                                                    class="border border-purple-500 text-purple-500 py-2 px-4 mt-3 rounded-full hover:bg-purple-500 hover:text-white transition duration-300 ease-in-out">
                                                    View Company
                                                </button>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- Why Choose Us Section -->
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-4 mx-auto">
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
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Direct Chat with
                                        business lister</h2>
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

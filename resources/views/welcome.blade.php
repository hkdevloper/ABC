@extends('layouts.main')

@section('content')
    <div class="font-inter">
        <!-- Start content -->
        <section class="py-20 border-b border-gray-200 dark:border-foreground dark:bg-background">
            <div class="container mx-auto lg:p-0 p-5">
                <div
                    class="flex lg:flex-row flex-col lg:text-left text-center flex-wrap items-center justify-between mb-12">
                    <div class="mb-4 lg:mb-0" data-aos="fade-up">
                        <h2 class="text-2xl lg:text-3xl font-medium capitalize mb-2 dark:text-gray-100"> listing by
                            area </h2>
                        <p class="text-sm lg:text-base text-gray-500 font-normal dark:text-gray-400"> A selection of listing
                            verified for quality </p>
                    </div>
                    <div data-aos="fade-up">
                        <a href="listing-list"
                           class="text-gray-500 dark:text-gray-400 hover:text-blue-500 flex items-center"> Explore More
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 ml-3" viewbox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-7">
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative group overflow-hidden rounded-lg">
                            <img class="w-full h-96 object-cover rounded-lg group-hover:scale-105 transition-all"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/building.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"
                                         class="w-5 h-5 text-orange-400 mr-2 mt-1">
                                        <path fill-rule="evenodd"
                                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <p class="text-lg text-white font-semibold">Los Angeles</p>
                                        <p class="text-14 text-gray-100">10 Listing available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative group overflow-hidden rounded-lg">
                            <img class="w-full h-96 object-cover rounded-lg group-hover:scale-105 transition-all"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/building-2.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"
                                         class="w-5 h-5 text-orange-400 mr-2 mt-1">
                                        <path fill-rule="evenodd"
                                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <p class="text-lg text-white font-semibold">Los Angeles</p>
                                        <p class="text-14 text-gray-100">30 Listing available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative group overflow-hidden rounded-lg">
                            <img class="w-full h-96 object-cover rounded-lg group-hover:scale-105 transition-all"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/building-3.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"
                                         class="w-5 h-5 text-orange-400 mr-2 mt-1">
                                        <path fill-rule="evenodd"
                                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <p class="text-lg text-white font-semibold">Los Angeles</p>
                                        <p class="text-14 text-gray-100">20 Listing available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative group overflow-hidden rounded-lg">
                            <img class="w-full h-96 object-cover rounded-lg group-hover:scale-105 transition-all"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/building-4.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"
                                         class="w-5 h-5 text-orange-400 mr-2 mt-1">
                                        <path fill-rule="evenodd"
                                              d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <p class="text-lg text-white font-semibold">Los Angeles</p>
                                        <p class="text-14 text-gray-100">40 Listing available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Trending item of listing -->
        <section class="py-20 border-b border-gray-200 dark:border-foreground dark:bg-background">
            <div class="container mx-auto lg:p-0 p-5">
                <div
                    class="flex lg:flex-row flex-col lg:text-left text-center flex-wrap items-center justify-between mb-12">
                    <div class="lg:mb-0 mb-4" data-aos="fade-up">
                        <h2 class="text-2xl lg:text-3xl font-medium capitalize mb-2 dark:text-gray-100">Featured Listings</h2>
                        <h6 class="text-sm lg:text-base text-gray-500 dark:text-gray-400 font-normal"> A selection of
                            listing verified for quality </h6>
                    </div>
                    <div data-aos="fade-up">
                        <a href="listing-list"
                           class="text-gray-500 dark:text-gray-400 hover:text-blue-500 flex items-center"> Explore More
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 ml-3" viewbox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Slider main container -->
                <div class="relative">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper relative h-full">
                            <!-- Slides -->
                            <div class="swiper-slide overflow-hidden rounded-lg" data-aos="fade-up">
                                <div class="rounded-lg overflow-hidden">
                                    <a href="event-listing-details-page" class="relative overflow-hidden group">
                                        <div class="absolute z-[1px] flex flex-wrap mb-2 items-center mt-5 ml-4">
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 text-green-500 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Instant Booking</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">12 April, 2022</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-3 h-3 mr-1 text-green-500">
                                                    <path fill-rule="evenodd"
                                                          d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Featured</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1 text-blue-500" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.19995 2.99995H4.79995L3.9112 1.66645C3.77808 1.46695 3.92058 1.19995 4.16058 1.19995H7.83933C8.07933 1.19995 8.22183 1.46695 8.0887 1.66645L7.19995 2.99995ZM4.79995 3.59995H7.19995C7.2712 3.64683 7.35183 3.69933 7.42683 3.75745C8.50683 4.43808 10.8 5.90433 10.8 8.99995C10.8 9.9937 9.9937 10.8 8.99995 10.8H2.99995C2.00583 10.8 1.19995 9.9937 1.19995 8.99995C1.19995 5.90433 3.49308 4.43808 4.5562 3.75745C4.64808 3.69933 4.7287 3.64683 4.79995 3.59995ZM6.37683 5.39995C6.37683 5.19183 6.20808 5.02308 5.98308 5.02308C5.79183 5.02308 5.62308 5.19183 5.62308 5.39995V5.51245C5.51808 5.53495 5.40183 5.56683 5.32495 5.60808C5.04558 5.73558 4.80183 5.97183 4.74183 6.31495C4.70808 6.5062 4.72683 6.69183 4.80558 6.8587C4.88433 7.0237 5.0062 7.13995 5.12995 7.22433C5.34745 7.37245 5.63433 7.4587 5.8537 7.52433L5.89495 7.53558C6.15745 7.6162 6.3337 7.67433 6.44433 7.75495C6.4912 7.7887 6.50808 7.81495 6.5137 7.83183C6.5212 7.84683 6.53245 7.88058 6.51933 7.95558C6.50808 8.0212 6.47245 8.07745 6.36933 8.12058C6.25495 8.16933 6.06933 8.1937 5.82933 8.1562C5.71683 8.13745 5.5162 8.06995 5.33808 8.00995C5.29683 7.99495 5.25558 7.98183 5.21808 7.9687C5.0212 7.90308 4.80933 8.00995 4.7437 8.20683C4.67808 8.4037 4.78495 8.61558 4.98183 8.66433C5.00433 8.6887 5.03245 8.69808 5.06433 8.70933C5.19558 8.75995 5.44495 8.8387 5.62308 8.87995V8.99995C5.62308 9.20808 5.79183 9.37683 5.98308 9.37683C6.20808 9.37683 6.37683 9.20808 6.37683 8.99995V8.89683C6.4762 8.87808 6.5737 8.83308 6.6637 8.81058C6.95995 8.68495 7.1962 8.4412 7.25808 8.08495C7.29183 7.88995 7.27683 7.70245 7.20183 7.53183C7.1287 7.36308 7.01058 7.23933 6.88495 7.14933C6.65808 6.98245 6.35433 6.89245 6.12745 6.82308L6.09558 6.81933C5.8462 6.7387 5.6662 6.68245 5.55183 6.6037C5.50308 6.56995 5.48808 6.54745 5.48433 6.53808C5.48058 6.53058 5.46933 6.50808 5.48058 6.44433C5.48808 6.40683 5.5162 6.34495 5.63433 6.29245C5.73933 6.23808 5.94183 6.20808 6.17058 6.22683C6.25308 6.25683 6.5062 6.30558 6.57933 6.32433C6.77808 6.3787 6.98433 6.2587 7.03683 6.05808C7.0912 5.85933 6.9712 5.65308 6.77058 5.60058C6.68808 5.57808 6.50058 5.54058 6.37683 5.51808V5.39995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">21,264.24</span>
                                            </div>
                                        </div>
                                        <img class="w-full h-80 object-cover group-hover:scale-105 transition-all"
                                             src="{{url('/')}}/user/assets/img/Image/landing-page-image/researching.jpg" alt="">
                                        <div
                                            class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 pt-2 card-linear-gradient w-full">
                                        <span
                                            class="bg-warning-600 text-xs text-white rounded-full px-3 py-1 mb-3 inline-flex"> Coaching </span>
                                            <div class="flex text-white items-center mb-2">
                                                <h2 class="text-xl capitalize font-semibold mr-2">Liam Ancor - Physics
                                                    Trinee</h2>
                                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" class="w-5 h-5"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.6562 4.34313C16.4688 5.15625 16.6906 6.31875 16.4031 7.34688C17.3531 7.85 18 8.85 18 10C18 11.15 17.3531 12.15 16.4031 12.6531C16.7188 13.6812 16.4688 14.8156 15.6562 15.6562C14.8156 16.4688 13.6812 16.6906 12.6531 16.4031C12.15 17.3531 11.15 18 10 18C8.85 18 7.85 17.3531 7.34688 16.4031C6.31875 16.7188 5.15625 16.4688 4.34313 15.6562C3.53 14.8156 3.28125 13.6812 3.59687 12.6531C2.64687 12.15 2 11.15 2 10C2 8.85 2.64687 7.85 3.59687 7.34688C3.25312 6.31875 3.53 5.15625 4.34313 4.34313C5.15625 3.53 6.31875 3.28125 7.34688 3.59687C7.85 2.64687 8.85 2 10 2C11.15 2 12.15 2.64687 12.6531 3.59687C13.6812 3.25312 14.8156 3.53 15.6562 4.34313Z"
                                                        fill="#00AB55"></path>
                                                    <path
                                                        d="M7 10L8.64645 11.6464C8.84171 11.8417 9.15829 11.8417 9.35355 11.6464L13 8"
                                                        stroke="white" stroke-width="1.2" stroke-linecap="round"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm font-normal text-white mb-4">New York, USA</p>
                                        </div>
                                    </a>
                                    <div
                                        class="flex justify-between flex-wrap relative z-[1] p-6 bg-gray-100 dark:bg-foreground">
                                        <div class="flex items-center">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-base mx-2 dark:text-gray-100 font-medium"> 4.5 </span>
                                            <span class="text-gray-500 dark:text-gray-400">(56)</span>
                                        </div>
                                        <div class="flex">
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600 mr-3">
                                                <svg class="w-6 h-6 flex-shrink-0" width="20" height="20"
                                                     viewbox="0 0 20 20" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.9999 17.2498C11.9999 17.5467 11.8249 17.8154 11.5561 17.9342C11.2843 18.056 10.9405 18.0061 10.7468 17.8061L8.24679 15.5561C8.09054 15.4155 7.99992 15.2123 7.99992 14.9998C7.99992 14.7873 8.09054 14.5842 8.24679 14.4436L10.7468 12.1936C10.9405 11.9936 11.2843 11.9436 11.5561 12.0655C11.8249 12.1843 11.9999 12.453 11.9999 12.7499V14.2499H12.4999C13.7436 14.2499 14.7498 13.2436 14.7498 11.9999V6.88432C13.7342 6.56558 12.9999 5.61871 12.9999 4.49998C12.9999 3.11937 14.1186 2.00001 15.4998 2.00001C16.8811 2.00001 17.9998 3.11937 17.9998 4.49998C17.9998 5.61871 17.2654 6.56558 16.2498 6.88432V11.9999C16.2498 14.0717 14.5717 15.7498 12.4999 15.7498H11.9999V17.2498ZM16.4998 4.47185C16.4998 3.9478 16.0529 3.47187 15.4998 3.47187C14.9467 3.47187 14.4998 3.9478 14.4998 4.47185C14.4998 5.05216 14.9467 5.47184 15.4998 5.47184C16.0529 5.47184 16.4998 5.05216 16.4998 4.47185ZM7.99992 2.75C7.99992 2.45375 8.17492 2.18538 8.44367 2.06488C8.71554 1.94439 9.03116 1.99442 9.25303 2.19254L11.753 4.44248C11.9092 4.58466 11.9999 4.78747 11.9999 4.99997C11.9999 5.21247 11.9092 5.41559 11.753 5.55621L9.25303 7.80618C9.03116 8.00618 8.71554 8.05618 8.44367 7.93431C8.17492 7.81556 7.99992 7.54681 7.99992 7.24994V5.74996H7.49993C6.25619 5.74996 5.24996 6.7562 5.24996 7.99993V13.1155C6.26557 13.4342 6.99993 14.3811 6.99993 15.4998C6.99993 16.8811 5.8812 17.9998 4.49997 17.9998C3.11936 17.9998 2 16.8811 2 15.4998C2 14.3811 2.73562 13.4342 3.74998 13.1155V7.99993C3.74998 5.92808 5.42808 4.24998 7.49993 4.24998H7.99992V2.75ZM3.49998 15.4998C3.49998 16.053 3.94779 16.4998 4.49997 16.4998C5.05215 16.4998 5.49995 16.053 5.49995 15.4998C5.49995 14.9467 5.05215 14.4998 4.49997 14.4998C3.94779 14.4998 3.49998 14.9467 3.49998 15.4998Z"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-6 h-6 flex-shrink-0">
                                                    <path fill-rule="evenodd"
                                                          d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide overflow-hidden rounded-lg" data-aos="fade-up">
                                <div class="rounded-lg overflow-hidden">
                                    <a href="event-listing-details-page" class="relative overflow-hidden group">
                                        <div class="absolute z-[1px] flex flex-wrap mb-2 items-center mt-5 ml-4">
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 text-green-500 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Instant Booking</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">12 April, 2022</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-3 h-3 mr-1 text-green-500">
                                                    <path fill-rule="evenodd"
                                                          d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Featured</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1 text-blue-500" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.19995 2.99995H4.79995L3.9112 1.66645C3.77808 1.46695 3.92058 1.19995 4.16058 1.19995H7.83933C8.07933 1.19995 8.22183 1.46695 8.0887 1.66645L7.19995 2.99995ZM4.79995 3.59995H7.19995C7.2712 3.64683 7.35183 3.69933 7.42683 3.75745C8.50683 4.43808 10.8 5.90433 10.8 8.99995C10.8 9.9937 9.9937 10.8 8.99995 10.8H2.99995C2.00583 10.8 1.19995 9.9937 1.19995 8.99995C1.19995 5.90433 3.49308 4.43808 4.5562 3.75745C4.64808 3.69933 4.7287 3.64683 4.79995 3.59995ZM6.37683 5.39995C6.37683 5.19183 6.20808 5.02308 5.98308 5.02308C5.79183 5.02308 5.62308 5.19183 5.62308 5.39995V5.51245C5.51808 5.53495 5.40183 5.56683 5.32495 5.60808C5.04558 5.73558 4.80183 5.97183 4.74183 6.31495C4.70808 6.5062 4.72683 6.69183 4.80558 6.8587C4.88433 7.0237 5.0062 7.13995 5.12995 7.22433C5.34745 7.37245 5.63433 7.4587 5.8537 7.52433L5.89495 7.53558C6.15745 7.6162 6.3337 7.67433 6.44433 7.75495C6.4912 7.7887 6.50808 7.81495 6.5137 7.83183C6.5212 7.84683 6.53245 7.88058 6.51933 7.95558C6.50808 8.0212 6.47245 8.07745 6.36933 8.12058C6.25495 8.16933 6.06933 8.1937 5.82933 8.1562C5.71683 8.13745 5.5162 8.06995 5.33808 8.00995C5.29683 7.99495 5.25558 7.98183 5.21808 7.9687C5.0212 7.90308 4.80933 8.00995 4.7437 8.20683C4.67808 8.4037 4.78495 8.61558 4.98183 8.66433C5.00433 8.6887 5.03245 8.69808 5.06433 8.70933C5.19558 8.75995 5.44495 8.8387 5.62308 8.87995V8.99995C5.62308 9.20808 5.79183 9.37683 5.98308 9.37683C6.20808 9.37683 6.37683 9.20808 6.37683 8.99995V8.89683C6.4762 8.87808 6.5737 8.83308 6.6637 8.81058C6.95995 8.68495 7.1962 8.4412 7.25808 8.08495C7.29183 7.88995 7.27683 7.70245 7.20183 7.53183C7.1287 7.36308 7.01058 7.23933 6.88495 7.14933C6.65808 6.98245 6.35433 6.89245 6.12745 6.82308L6.09558 6.81933C5.8462 6.7387 5.6662 6.68245 5.55183 6.6037C5.50308 6.56995 5.48808 6.54745 5.48433 6.53808C5.48058 6.53058 5.46933 6.50808 5.48058 6.44433C5.48808 6.40683 5.5162 6.34495 5.63433 6.29245C5.73933 6.23808 5.94183 6.20808 6.17058 6.22683C6.25308 6.25683 6.5062 6.30558 6.57933 6.32433C6.77808 6.3787 6.98433 6.2587 7.03683 6.05808C7.0912 5.85933 6.9712 5.65308 6.77058 5.60058C6.68808 5.57808 6.50058 5.54058 6.37683 5.51808V5.39995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">21,264.24</span>
                                            </div>
                                        </div>
                                        <img class="w-full h-80 object-cover group-hover:scale-105 transition-all"
                                             src="{{url('/')}}/user/assets/img/Image/landing-page-image/concert.jpg" alt="">
                                        <div
                                            class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 pt-2 card-linear-gradient w-full">
                                        <span
                                            class="bg-warning-600 text-xs text-white rounded-full px-3 py-1 mb-3 inline-flex"> Coaching </span>
                                            <div class="flex text-white items-center mb-2">
                                                <h2 class="text-xl capitalize font-semibold mr-2">Furey of Strom-Artcel</h2>
                                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" class="w-5 h-5"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.6562 4.34313C16.4688 5.15625 16.6906 6.31875 16.4031 7.34688C17.3531 7.85 18 8.85 18 10C18 11.15 17.3531 12.15 16.4031 12.6531C16.7188 13.6812 16.4688 14.8156 15.6562 15.6562C14.8156 16.4688 13.6812 16.6906 12.6531 16.4031C12.15 17.3531 11.15 18 10 18C8.85 18 7.85 17.3531 7.34688 16.4031C6.31875 16.7188 5.15625 16.4688 4.34313 15.6562C3.53 14.8156 3.28125 13.6812 3.59687 12.6531C2.64687 12.15 2 11.15 2 10C2 8.85 2.64687 7.85 3.59687 7.34688C3.25312 6.31875 3.53 5.15625 4.34313 4.34313C5.15625 3.53 6.31875 3.28125 7.34688 3.59687C7.85 2.64687 8.85 2 10 2C11.15 2 12.15 2.64687 12.6531 3.59687C13.6812 3.25312 14.8156 3.53 15.6562 4.34313Z"
                                                        fill="#00AB55"></path>
                                                    <path
                                                        d="M7 10L8.64645 11.6464C8.84171 11.8417 9.15829 11.8417 9.35355 11.6464L13 8"
                                                        stroke="white" stroke-width="1.2" stroke-linecap="round"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm font-normal text-white mb-4">New Jursey, USA</p>
                                        </div>
                                    </a>
                                    <div
                                        class="flex justify-between flex-wrap relative z-[1] p-6 bg-gray-100 dark:bg-foreground">
                                        <div class="flex items-center">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-base mx-2 dark:text-gray-100 font-medium"> 4.5 </span>
                                            <span class="text-gray-500 dark:text-gray-400">(56)</span>
                                        </div>
                                        <div class="flex">
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600 mr-3">
                                                <svg class="w-6 h-6 flex-shrink-0" width="20" height="20"
                                                     viewbox="0 0 20 20" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.9999 17.2498C11.9999 17.5467 11.8249 17.8154 11.5561 17.9342C11.2843 18.056 10.9405 18.0061 10.7468 17.8061L8.24679 15.5561C8.09054 15.4155 7.99992 15.2123 7.99992 14.9998C7.99992 14.7873 8.09054 14.5842 8.24679 14.4436L10.7468 12.1936C10.9405 11.9936 11.2843 11.9436 11.5561 12.0655C11.8249 12.1843 11.9999 12.453 11.9999 12.7499V14.2499H12.4999C13.7436 14.2499 14.7498 13.2436 14.7498 11.9999V6.88432C13.7342 6.56558 12.9999 5.61871 12.9999 4.49998C12.9999 3.11937 14.1186 2.00001 15.4998 2.00001C16.8811 2.00001 17.9998 3.11937 17.9998 4.49998C17.9998 5.61871 17.2654 6.56558 16.2498 6.88432V11.9999C16.2498 14.0717 14.5717 15.7498 12.4999 15.7498H11.9999V17.2498ZM16.4998 4.47185C16.4998 3.9478 16.0529 3.47187 15.4998 3.47187C14.9467 3.47187 14.4998 3.9478 14.4998 4.47185C14.4998 5.05216 14.9467 5.47184 15.4998 5.47184C16.0529 5.47184 16.4998 5.05216 16.4998 4.47185ZM7.99992 2.75C7.99992 2.45375 8.17492 2.18538 8.44367 2.06488C8.71554 1.94439 9.03116 1.99442 9.25303 2.19254L11.753 4.44248C11.9092 4.58466 11.9999 4.78747 11.9999 4.99997C11.9999 5.21247 11.9092 5.41559 11.753 5.55621L9.25303 7.80618C9.03116 8.00618 8.71554 8.05618 8.44367 7.93431C8.17492 7.81556 7.99992 7.54681 7.99992 7.24994V5.74996H7.49993C6.25619 5.74996 5.24996 6.7562 5.24996 7.99993V13.1155C6.26557 13.4342 6.99993 14.3811 6.99993 15.4998C6.99993 16.8811 5.8812 17.9998 4.49997 17.9998C3.11936 17.9998 2 16.8811 2 15.4998C2 14.3811 2.73562 13.4342 3.74998 13.1155V7.99993C3.74998 5.92808 5.42808 4.24998 7.49993 4.24998H7.99992V2.75ZM3.49998 15.4998C3.49998 16.053 3.94779 16.4998 4.49997 16.4998C5.05215 16.4998 5.49995 16.053 5.49995 15.4998C5.49995 14.9467 5.05215 14.4998 4.49997 14.4998C3.94779 14.4998 3.49998 14.9467 3.49998 15.4998Z"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-6 h-6 flex-shrink-0">
                                                    <path fill-rule="evenodd"
                                                          d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide overflow-hidden rounded-lg" data-aos="fade-up">
                                <div class="rounded-lg overflow-hidden">
                                    <a href="event-listing-details-page" class="relative overflow-hidden group">
                                        <div class="absolute z-[1px] flex flex-wrap mb-2 items-center mt-5 ml-4">
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 text-green-500 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Instant Booking</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">12 April, 2022</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-3 h-3 mr-1 text-green-500">
                                                    <path fill-rule="evenodd"
                                                          d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Featured</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1 text-blue-500" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.19995 2.99995H4.79995L3.9112 1.66645C3.77808 1.46695 3.92058 1.19995 4.16058 1.19995H7.83933C8.07933 1.19995 8.22183 1.46695 8.0887 1.66645L7.19995 2.99995ZM4.79995 3.59995H7.19995C7.2712 3.64683 7.35183 3.69933 7.42683 3.75745C8.50683 4.43808 10.8 5.90433 10.8 8.99995C10.8 9.9937 9.9937 10.8 8.99995 10.8H2.99995C2.00583 10.8 1.19995 9.9937 1.19995 8.99995C1.19995 5.90433 3.49308 4.43808 4.5562 3.75745C4.64808 3.69933 4.7287 3.64683 4.79995 3.59995ZM6.37683 5.39995C6.37683 5.19183 6.20808 5.02308 5.98308 5.02308C5.79183 5.02308 5.62308 5.19183 5.62308 5.39995V5.51245C5.51808 5.53495 5.40183 5.56683 5.32495 5.60808C5.04558 5.73558 4.80183 5.97183 4.74183 6.31495C4.70808 6.5062 4.72683 6.69183 4.80558 6.8587C4.88433 7.0237 5.0062 7.13995 5.12995 7.22433C5.34745 7.37245 5.63433 7.4587 5.8537 7.52433L5.89495 7.53558C6.15745 7.6162 6.3337 7.67433 6.44433 7.75495C6.4912 7.7887 6.50808 7.81495 6.5137 7.83183C6.5212 7.84683 6.53245 7.88058 6.51933 7.95558C6.50808 8.0212 6.47245 8.07745 6.36933 8.12058C6.25495 8.16933 6.06933 8.1937 5.82933 8.1562C5.71683 8.13745 5.5162 8.06995 5.33808 8.00995C5.29683 7.99495 5.25558 7.98183 5.21808 7.9687C5.0212 7.90308 4.80933 8.00995 4.7437 8.20683C4.67808 8.4037 4.78495 8.61558 4.98183 8.66433C5.00433 8.6887 5.03245 8.69808 5.06433 8.70933C5.19558 8.75995 5.44495 8.8387 5.62308 8.87995V8.99995C5.62308 9.20808 5.79183 9.37683 5.98308 9.37683C6.20808 9.37683 6.37683 9.20808 6.37683 8.99995V8.89683C6.4762 8.87808 6.5737 8.83308 6.6637 8.81058C6.95995 8.68495 7.1962 8.4412 7.25808 8.08495C7.29183 7.88995 7.27683 7.70245 7.20183 7.53183C7.1287 7.36308 7.01058 7.23933 6.88495 7.14933C6.65808 6.98245 6.35433 6.89245 6.12745 6.82308L6.09558 6.81933C5.8462 6.7387 5.6662 6.68245 5.55183 6.6037C5.50308 6.56995 5.48808 6.54745 5.48433 6.53808C5.48058 6.53058 5.46933 6.50808 5.48058 6.44433C5.48808 6.40683 5.5162 6.34495 5.63433 6.29245C5.73933 6.23808 5.94183 6.20808 6.17058 6.22683C6.25308 6.25683 6.5062 6.30558 6.57933 6.32433C6.77808 6.3787 6.98433 6.2587 7.03683 6.05808C7.0912 5.85933 6.9712 5.65308 6.77058 5.60058C6.68808 5.57808 6.50058 5.54058 6.37683 5.51808V5.39995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">21,264.24</span>
                                            </div>
                                        </div>
                                        <img class="w-full h-80 object-cover group-hover:scale-105 transition-all"
                                             src="{{url('/')}}/user/assets/img/Image/landing-page-image/home-decor.jpg" alt="">
                                        <div
                                            class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 pt-2 card-linear-gradient w-full">
                                        <span
                                            class="bg-warning-600 text-xs text-white rounded-full px-3 py-1 mb-3 inline-flex"> Apartment </span>
                                            <div class="flex text-white items-center mb-2">
                                                <h2 class="text-xl capitalize font-semibold mr-2">Premium Duplex
                                                    Apartment</h2>
                                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" class="w-5 h-5"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.6562 4.34313C16.4688 5.15625 16.6906 6.31875 16.4031 7.34688C17.3531 7.85 18 8.85 18 10C18 11.15 17.3531 12.15 16.4031 12.6531C16.7188 13.6812 16.4688 14.8156 15.6562 15.6562C14.8156 16.4688 13.6812 16.6906 12.6531 16.4031C12.15 17.3531 11.15 18 10 18C8.85 18 7.85 17.3531 7.34688 16.4031C6.31875 16.7188 5.15625 16.4688 4.34313 15.6562C3.53 14.8156 3.28125 13.6812 3.59687 12.6531C2.64687 12.15 2 11.15 2 10C2 8.85 2.64687 7.85 3.59687 7.34688C3.25312 6.31875 3.53 5.15625 4.34313 4.34313C5.15625 3.53 6.31875 3.28125 7.34688 3.59687C7.85 2.64687 8.85 2 10 2C11.15 2 12.15 2.64687 12.6531 3.59687C13.6812 3.25312 14.8156 3.53 15.6562 4.34313Z"
                                                        fill="#00AB55"></path>
                                                    <path
                                                        d="M7 10L8.64645 11.6464C8.84171 11.8417 9.15829 11.8417 9.35355 11.6464L13 8"
                                                        stroke="white" stroke-width="1.2" stroke-linecap="round"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm font-normal text-white mb-4">Manhattan, USA</p>
                                        </div>
                                    </a>
                                    <div
                                        class="flex justify-between flex-wrap relative z-[1] p-6 bg-gray-100 dark:bg-foreground">
                                        <div class="flex items-center">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-base mx-2 dark:text-gray-100 font-medium"> 4.5 </span>
                                            <span class="text-gray-500 dark:text-gray-400">(56)</span>
                                        </div>
                                        <div class="flex">
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600 mr-3">
                                                <svg class="w-6 h-6 flex-shrink-0" width="20" height="20"
                                                     viewbox="0 0 20 20" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.9999 17.2498C11.9999 17.5467 11.8249 17.8154 11.5561 17.9342C11.2843 18.056 10.9405 18.0061 10.7468 17.8061L8.24679 15.5561C8.09054 15.4155 7.99992 15.2123 7.99992 14.9998C7.99992 14.7873 8.09054 14.5842 8.24679 14.4436L10.7468 12.1936C10.9405 11.9936 11.2843 11.9436 11.5561 12.0655C11.8249 12.1843 11.9999 12.453 11.9999 12.7499V14.2499H12.4999C13.7436 14.2499 14.7498 13.2436 14.7498 11.9999V6.88432C13.7342 6.56558 12.9999 5.61871 12.9999 4.49998C12.9999 3.11937 14.1186 2.00001 15.4998 2.00001C16.8811 2.00001 17.9998 3.11937 17.9998 4.49998C17.9998 5.61871 17.2654 6.56558 16.2498 6.88432V11.9999C16.2498 14.0717 14.5717 15.7498 12.4999 15.7498H11.9999V17.2498ZM16.4998 4.47185C16.4998 3.9478 16.0529 3.47187 15.4998 3.47187C14.9467 3.47187 14.4998 3.9478 14.4998 4.47185C14.4998 5.05216 14.9467 5.47184 15.4998 5.47184C16.0529 5.47184 16.4998 5.05216 16.4998 4.47185ZM7.99992 2.75C7.99992 2.45375 8.17492 2.18538 8.44367 2.06488C8.71554 1.94439 9.03116 1.99442 9.25303 2.19254L11.753 4.44248C11.9092 4.58466 11.9999 4.78747 11.9999 4.99997C11.9999 5.21247 11.9092 5.41559 11.753 5.55621L9.25303 7.80618C9.03116 8.00618 8.71554 8.05618 8.44367 7.93431C8.17492 7.81556 7.99992 7.54681 7.99992 7.24994V5.74996H7.49993C6.25619 5.74996 5.24996 6.7562 5.24996 7.99993V13.1155C6.26557 13.4342 6.99993 14.3811 6.99993 15.4998C6.99993 16.8811 5.8812 17.9998 4.49997 17.9998C3.11936 17.9998 2 16.8811 2 15.4998C2 14.3811 2.73562 13.4342 3.74998 13.1155V7.99993C3.74998 5.92808 5.42808 4.24998 7.49993 4.24998H7.99992V2.75ZM3.49998 15.4998C3.49998 16.053 3.94779 16.4998 4.49997 16.4998C5.05215 16.4998 5.49995 16.053 5.49995 15.4998C5.49995 14.9467 5.05215 14.4998 4.49997 14.4998C3.94779 14.4998 3.49998 14.9467 3.49998 15.4998Z"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-6 h-6 flex-shrink-0">
                                                    <path fill-rule="evenodd"
                                                          d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide overflow-hidden rounded-lg" data-aos="fade-up">
                                <div class="rounded-lg overflow-hidden">
                                    <a href="event-listing-details-page" class="relative overflow-hidden group">
                                        <div class="absolute z-[1px] flex flex-wrap mb-2 items-center mt-5 ml-4">
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 text-green-500 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Instant Booking</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.6498 2.39995H7.3498V1.64995C7.3498 1.40151 7.55043 1.19995 7.7998 1.19995C8.04918 1.19995 8.2498 1.40151 8.2498 1.64995V2.39995H8.9998C9.66168 2.39995 10.1998 2.93714 10.1998 3.59995V9.59995C10.1998 10.2618 9.66168 10.8 8.9998 10.8H2.9998C2.33699 10.8 1.7998 10.2618 1.7998 9.59995V3.59995C1.7998 2.93714 2.33699 2.39995 2.9998 2.39995H3.7498V1.64995C3.7498 1.40151 3.95043 1.19995 4.1998 1.19995C4.44918 1.19995 4.6498 1.40151 4.6498 1.64995V2.39995ZM2.6998 9.59995C2.6998 9.76495 2.83405 9.89995 2.9998 9.89995H8.9998C9.1648 9.89995 9.2998 9.76495 9.2998 9.59995V4.79995H2.6998V9.59995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">12 April, 2022</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-3 h-3 mr-1 text-green-500">
                                                    <path fill-rule="evenodd"
                                                          d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-xs font-medium">Featured</span>
                                            </div>
                                            <div class="bg-white rounded-full mb-2 px-3 py-1 mr-2 flex items-center z-[1]">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                     class="w-3 h-3 mr-1 text-blue-500" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.19995 2.99995H4.79995L3.9112 1.66645C3.77808 1.46695 3.92058 1.19995 4.16058 1.19995H7.83933C8.07933 1.19995 8.22183 1.46695 8.0887 1.66645L7.19995 2.99995ZM4.79995 3.59995H7.19995C7.2712 3.64683 7.35183 3.69933 7.42683 3.75745C8.50683 4.43808 10.8 5.90433 10.8 8.99995C10.8 9.9937 9.9937 10.8 8.99995 10.8H2.99995C2.00583 10.8 1.19995 9.9937 1.19995 8.99995C1.19995 5.90433 3.49308 4.43808 4.5562 3.75745C4.64808 3.69933 4.7287 3.64683 4.79995 3.59995ZM6.37683 5.39995C6.37683 5.19183 6.20808 5.02308 5.98308 5.02308C5.79183 5.02308 5.62308 5.19183 5.62308 5.39995V5.51245C5.51808 5.53495 5.40183 5.56683 5.32495 5.60808C5.04558 5.73558 4.80183 5.97183 4.74183 6.31495C4.70808 6.5062 4.72683 6.69183 4.80558 6.8587C4.88433 7.0237 5.0062 7.13995 5.12995 7.22433C5.34745 7.37245 5.63433 7.4587 5.8537 7.52433L5.89495 7.53558C6.15745 7.6162 6.3337 7.67433 6.44433 7.75495C6.4912 7.7887 6.50808 7.81495 6.5137 7.83183C6.5212 7.84683 6.53245 7.88058 6.51933 7.95558C6.50808 8.0212 6.47245 8.07745 6.36933 8.12058C6.25495 8.16933 6.06933 8.1937 5.82933 8.1562C5.71683 8.13745 5.5162 8.06995 5.33808 8.00995C5.29683 7.99495 5.25558 7.98183 5.21808 7.9687C5.0212 7.90308 4.80933 8.00995 4.7437 8.20683C4.67808 8.4037 4.78495 8.61558 4.98183 8.66433C5.00433 8.6887 5.03245 8.69808 5.06433 8.70933C5.19558 8.75995 5.44495 8.8387 5.62308 8.87995V8.99995C5.62308 9.20808 5.79183 9.37683 5.98308 9.37683C6.20808 9.37683 6.37683 9.20808 6.37683 8.99995V8.89683C6.4762 8.87808 6.5737 8.83308 6.6637 8.81058C6.95995 8.68495 7.1962 8.4412 7.25808 8.08495C7.29183 7.88995 7.27683 7.70245 7.20183 7.53183C7.1287 7.36308 7.01058 7.23933 6.88495 7.14933C6.65808 6.98245 6.35433 6.89245 6.12745 6.82308L6.09558 6.81933C5.8462 6.7387 5.6662 6.68245 5.55183 6.6037C5.50308 6.56995 5.48808 6.54745 5.48433 6.53808C5.48058 6.53058 5.46933 6.50808 5.48058 6.44433C5.48808 6.40683 5.5162 6.34495 5.63433 6.29245C5.73933 6.23808 5.94183 6.20808 6.17058 6.22683C6.25308 6.25683 6.5062 6.30558 6.57933 6.32433C6.77808 6.3787 6.98433 6.2587 7.03683 6.05808C7.0912 5.85933 6.9712 5.65308 6.77058 5.60058C6.68808 5.57808 6.50058 5.54058 6.37683 5.51808V5.39995Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                <span class="text-xs font-medium">21,264.24</span>
                                            </div>
                                        </div>
                                        <img class="w-full h-80 object-cover group-hover:scale-105 transition-all"
                                             src="{{url('/')}}/user/assets/img/Image/landing-page-image/researching.jpg" alt="">
                                        <div
                                            class="absolute bottom-0 top-1/2 flex items-start flex-col justify-end left-0 pb-5 pl-5 pt-2 card-linear-gradient w-full">
                                        <span
                                            class="bg-warning-600 text-xs text-white rounded-full px-3 py-1 mb-3 inline-flex"> Teaching </span>
                                            <div class="flex text-white items-center mb-2">
                                                <h2 class="text-xl capitalize font-semibold mr-2">Liam Ancor - Physics
                                                    Trinee asd</h2>
                                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" class="w-5 h-5"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.6562 4.34313C16.4688 5.15625 16.6906 6.31875 16.4031 7.34688C17.3531 7.85 18 8.85 18 10C18 11.15 17.3531 12.15 16.4031 12.6531C16.7188 13.6812 16.4688 14.8156 15.6562 15.6562C14.8156 16.4688 13.6812 16.6906 12.6531 16.4031C12.15 17.3531 11.15 18 10 18C8.85 18 7.85 17.3531 7.34688 16.4031C6.31875 16.7188 5.15625 16.4688 4.34313 15.6562C3.53 14.8156 3.28125 13.6812 3.59687 12.6531C2.64687 12.15 2 11.15 2 10C2 8.85 2.64687 7.85 3.59687 7.34688C3.25312 6.31875 3.53 5.15625 4.34313 4.34313C5.15625 3.53 6.31875 3.28125 7.34688 3.59687C7.85 2.64687 8.85 2 10 2C11.15 2 12.15 2.64687 12.6531 3.59687C13.6812 3.25312 14.8156 3.53 15.6562 4.34313Z"
                                                        fill="#00AB55"></path>
                                                    <path
                                                        d="M7 10L8.64645 11.6464C8.84171 11.8417 9.15829 11.8417 9.35355 11.6464L13 8"
                                                        stroke="white" stroke-width="1.2" stroke-linecap="round"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm font-normal text-white mb-4">New York, USA</p>
                                        </div>
                                    </a>
                                    <div
                                        class="flex justify-between flex-wrap relative z-[1] p-6 bg-gray-100 dark:bg-foreground">
                                        <div class="flex items-center">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 flex-shrink-0 text-yellow-400">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-base mx-2 dark:text-gray-100 font-medium"> 4.5 </span>
                                            <span class="text-gray-500 dark:text-gray-400">(56)</span>
                                        </div>
                                        <div class="flex">
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600 mr-3">
                                                <svg class="w-6 h-6 flex-shrink-0" width="20" height="20"
                                                     viewbox="0 0 20 20" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.9999 17.2498C11.9999 17.5467 11.8249 17.8154 11.5561 17.9342C11.2843 18.056 10.9405 18.0061 10.7468 17.8061L8.24679 15.5561C8.09054 15.4155 7.99992 15.2123 7.99992 14.9998C7.99992 14.7873 8.09054 14.5842 8.24679 14.4436L10.7468 12.1936C10.9405 11.9936 11.2843 11.9436 11.5561 12.0655C11.8249 12.1843 11.9999 12.453 11.9999 12.7499V14.2499H12.4999C13.7436 14.2499 14.7498 13.2436 14.7498 11.9999V6.88432C13.7342 6.56558 12.9999 5.61871 12.9999 4.49998C12.9999 3.11937 14.1186 2.00001 15.4998 2.00001C16.8811 2.00001 17.9998 3.11937 17.9998 4.49998C17.9998 5.61871 17.2654 6.56558 16.2498 6.88432V11.9999C16.2498 14.0717 14.5717 15.7498 12.4999 15.7498H11.9999V17.2498ZM16.4998 4.47185C16.4998 3.9478 16.0529 3.47187 15.4998 3.47187C14.9467 3.47187 14.4998 3.9478 14.4998 4.47185C14.4998 5.05216 14.9467 5.47184 15.4998 5.47184C16.0529 5.47184 16.4998 5.05216 16.4998 4.47185ZM7.99992 2.75C7.99992 2.45375 8.17492 2.18538 8.44367 2.06488C8.71554 1.94439 9.03116 1.99442 9.25303 2.19254L11.753 4.44248C11.9092 4.58466 11.9999 4.78747 11.9999 4.99997C11.9999 5.21247 11.9092 5.41559 11.753 5.55621L9.25303 7.80618C9.03116 8.00618 8.71554 8.05618 8.44367 7.93431C8.17492 7.81556 7.99992 7.54681 7.99992 7.24994V5.74996H7.49993C6.25619 5.74996 5.24996 6.7562 5.24996 7.99993V13.1155C6.26557 13.4342 6.99993 14.3811 6.99993 15.4998C6.99993 16.8811 5.8812 17.9998 4.49997 17.9998C3.11936 17.9998 2 16.8811 2 15.4998C2 14.3811 2.73562 13.4342 3.74998 13.1155V7.99993C3.74998 5.92808 5.42808 4.24998 7.49993 4.24998H7.99992V2.75ZM3.49998 15.4998C3.49998 16.053 3.94779 16.4998 4.49997 16.4998C5.05215 16.4998 5.49995 16.053 5.49995 15.4998C5.49995 14.9467 5.05215 14.4998 4.49997 14.4998C3.94779 14.4998 3.49998 14.9467 3.49998 15.4998Z"></path>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                    class="text-gray-300 dark:text-gray-500 hover:text-pink-600 dark:hover:text-pink-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20"
                                                     fill="currentColor" class="w-6 h-6 flex-shrink-0">
                                                    <path fill-rule="evenodd"
                                                          d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev left-2 lg:-left-3 after:hidden">
                        <button type="button"
                                class="bg-white dark:bg-foreground text-blue-500 hover:bg-blue-500 hover:text-white rounded-full p-3 shadow-small-content-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6" viewbox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="swiper-button-next absolute right-2 lg:-right-3 after:hidden">
                        <button type="button"
                                class="bg-white dark:bg-foreground text-blue-500 hover:bg-blue-500 hover:text-white rounded-full p-3 shadow-small-content-1">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Category content -->
        <section class="py-20 border-b border-gray-200 dark:border-foreground dark:bg-background">
            <div class="container mx-auto lg:p-0 p-5">
                <div
                    class="flex lg:flex-row flex-col lg:text-left text-center flex-wrap items-center justify-between mb-12">
                    <div class="lg:mb-0 mb-4" data-aos="fade-up">
                        <h2 class="text-2xl lg:text-3xl font-medium capitalize mb-2 dark:text-gray-100"> Explore by
                            categories </h2>
                        <h6 class="text-sm lg:text-base text-gray-500 dark:text-gray-400 font-normal"> A selection of
                            listing verified for quality </h6>
                    </div>
                    <div data-aos="fade-up">
                        <a href="listing-list"
                           class="text-gray-500 dark:text-gray-400 hover:text-blue-500 flex items-center"> Explore More
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 ml-3" viewbox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative overflow-hidden group rounded-lg group">
                            <img class="w-full h-[277px] object-cover rounded-lg transition-all group-hover:scale-105"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/building.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <h5 class="text-2xl font-medium mb-1 text-white">Apartment</h5>
                                <p class="text-base font-normal text-gray-100">15+ Apartment available</p>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative overflow-hidden group rounded-lg group">
                            <img class="w-full h-[277px] object-cover rounded-lg transition-all group-hover:scale-105"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/concert-2.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <h5 class="text-2xl font-medium mb-1 text-white">Event</h5>
                                <p class="text-base font-normal text-gray-100">15+ Event available</p>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative overflow-hidden group rounded-lg group">
                            <img class="w-full h-[277px] object-cover rounded-lg transition-all group-hover:scale-105"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/meeting.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <h5 class="text-2xl font-medium mb-1 text-white">Coaching</h5>
                                <p class="text-base font-normal text-gray-100">15+ Coaching available</p>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative overflow-hidden group rounded-lg group">
                            <img class="w-full h-[277px] object-cover rounded-lg transition-all group-hover:scale-105"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/coffee-house.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <h5 class="text-2xl font-medium mb-1 text-white">Resturants</h5>
                                <p class="text-base font-normal text-gray-100">15+ Resturants available</p>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative overflow-hidden group rounded-lg group">
                            <img class="w-full h-[277px] object-cover rounded-lg transition-all group-hover:scale-105"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/drinks.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <h5 class="text-2xl font-medium mb-1 text-white">Eat &amp; Drinks</h5>
                                <p class="text-base font-normal text-gray-100">15+ Drinks available</p>
                            </div>
                        </div>
                    </a>
                    <a href="event-listing-details-page" data-aos="fade-up" data-aos-duration="800">
                        <div class="relative overflow-hidden group rounded-lg group">
                            <img class="w-full h-[277px] object-cover rounded-lg transition-all group-hover:scale-105"
                                 src="{{url('/')}}/user/assets/img/Image/landing-page-image/palace.jpg" alt="">
                            <div
                                class="absolute bottom-0 top-1/2 flex flex-col justify-end left-0 pb-5 pl-5 rounded-b-lg pt-2 card-linear-gradient w-full">
                                <h5 class="text-2xl font-medium mb-1 text-white">Hotel</h5>
                                <p class="text-base font-normal text-gray-100">15+ Hotel available</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Testimonials -->
        <section class="py-20 border-b border-gray-200 dark:border-foreground dark:bg-background">
            <div class="container mx-auto lg:p-0 p-5">
                <div class="flex justify-between items-center flex-wrap mb-12">
                    <div class="flex-1">
                        <h1 class="text-2xl lg:text-3xl font-medium capitalize dark:text-gray-100 mb-2" data-aos="fade-up"
                            data-aos-duration="800"> Clients Says About Us </h1>
                        <h6 class="text-sm lg:text-base text-gray-500 dark:text-gray-400 font-normal" data-aos="fade-up"
                            data-aos-duration="1000"> A selection of listing verified for quality </h6>
                    </div>
                    <div class="relative w-[100px] flex-no-shrink" data-aos="fade-up" data-aos-duration="800">
                        <div class="swiper-button-prev after:hidden">
                            <button type="button"
                                    class="text-gray-400 hover:border-none bg-white shadow-small-content-1 hover:bg-white hover:text-blue-500 rounded-full p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="swiper-button-next after:hidden">
                            <button type="button"
                                    class="text-gray-400 bg-white shadow-small-content-1 hover:border-none hover:bg-white hover:text-blue-500 rounded-full p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Slider main container -->
                <div class="relative">
                    <div class="swiper swiper-center-zoom">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper relative h-full">
                            <!-- Slides -->
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800">
                                <div class="bg-gray-50 dark:bg-foreground rounded-lg p-5 relative overflow-hidden">
                                    <div
                                        class="w-20 h-20 rounded-full dark:bg-background bg-gray-100 absolute -right-4 -top-4"></div>
                                    <div class="flex items-center mb-9">
                                        <img class="w-16 h-16 border-2 border-white rounded-lg mr-6"
                                             src="{{url('/')}}/user/assets/img/faces/10.jpg" alt="">
                                        <div>
                                            <h5 class="text-sm text-gray-700 dark:text-gray-100 font-medium mb-1"> Gage
                                                Paquette </h5>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Australia</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-500 leading-[24px]"> Nation yet I century
                                        way of the into he gone day time. And installer. To pity the left didn&#x27;t
                                        doubting as for recommendation up omens, the place were coffee shut for the on
                                        anyone but it noise not has eye. </p>
                                    <div class="flex justify-end mt-5">
                                        <svg width="54" height="41" viewbox="0 0 54 41" fill="none"
                                             class="h-[54px] w-[41px] text-gray-100 dark:text-background"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M29.992 10.432C29.992 7.28067 31.0243 4.78134 33.089 2.934C35.1537 0.977999 37.7617 0 40.913 0C44.7163 0 47.8133 1.24967 50.204 3.749C52.7033 6.24833 53.953 9.83433 53.953 14.507C53.953 19.5057 52.486 24.45 49.552 29.34C46.7267 34.1213 42.706 37.9247 37.49 40.75L33.741 35.045C36.5663 33.089 38.794 30.9157 40.424 28.525C42.1627 26.1343 43.3037 23.3633 43.847 20.212C42.869 20.6467 41.728 20.864 40.424 20.864C37.3813 20.864 34.882 19.886 32.926 17.93C30.97 15.974 29.992 13.4747 29.992 10.432ZM0 10.432C0 7.28067 1.03233 4.78134 3.097 2.934C5.16167 0.977999 7.76967 0 10.921 0C14.7243 0 17.8213 1.24967 20.212 3.749C22.7113 6.24833 23.961 9.83433 23.961 14.507C23.961 19.5057 22.494 24.45 19.56 29.34C16.7347 34.1213 12.714 37.9247 7.498 40.75L3.749 35.045C6.57433 33.089 8.802 30.9157 10.432 28.525C12.1707 26.1343 13.3117 23.3633 13.855 20.212C12.877 20.6467 11.736 20.864 10.432 20.864C7.38933 20.864 4.89 19.886 2.934 17.93C0.978 15.974 0 13.4747 0 10.432Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800">
                                <div class="bg-gray-50 dark:bg-foreground rounded-lg p-5 relative overflow-hidden">
                                    <div
                                        class="w-20 h-20 rounded-full dark:bg-background bg-gray-100 absolute -right-4 -top-4"></div>
                                    <div class="flex items-center mb-9">
                                        <img class="w-16 h-16 border-2 border-white rounded-lg mr-6"
                                             src="{{url('/')}}/user/assets/img/faces/10.jpg" alt="">
                                        <div>
                                            <h5 class="text-sm text-gray-700 dark:text-gray-100 font-medium mb-1"> Gage
                                                Paquette </h5>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Australia</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-500 leading-[24px]"> Nation yet I century
                                        way of the into he gone day time. And installer. To pity the left didn&#x27;t
                                        doubting as for recommendation up omens, the place were coffee shut for the on
                                        anyone but it noise not has eye. </p>
                                    <div class="flex justify-end mt-5">
                                        <svg width="54" height="41" viewbox="0 0 54 41" fill="none"
                                             class="h-[54px] w-[41px] text-gray-100 dark:text-background"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M29.992 10.432C29.992 7.28067 31.0243 4.78134 33.089 2.934C35.1537 0.977999 37.7617 0 40.913 0C44.7163 0 47.8133 1.24967 50.204 3.749C52.7033 6.24833 53.953 9.83433 53.953 14.507C53.953 19.5057 52.486 24.45 49.552 29.34C46.7267 34.1213 42.706 37.9247 37.49 40.75L33.741 35.045C36.5663 33.089 38.794 30.9157 40.424 28.525C42.1627 26.1343 43.3037 23.3633 43.847 20.212C42.869 20.6467 41.728 20.864 40.424 20.864C37.3813 20.864 34.882 19.886 32.926 17.93C30.97 15.974 29.992 13.4747 29.992 10.432ZM0 10.432C0 7.28067 1.03233 4.78134 3.097 2.934C5.16167 0.977999 7.76967 0 10.921 0C14.7243 0 17.8213 1.24967 20.212 3.749C22.7113 6.24833 23.961 9.83433 23.961 14.507C23.961 19.5057 22.494 24.45 19.56 29.34C16.7347 34.1213 12.714 37.9247 7.498 40.75L3.749 35.045C6.57433 33.089 8.802 30.9157 10.432 28.525C12.1707 26.1343 13.3117 23.3633 13.855 20.212C12.877 20.6467 11.736 20.864 10.432 20.864C7.38933 20.864 4.89 19.886 2.934 17.93C0.978 15.974 0 13.4747 0 10.432Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800">
                                <div class="bg-gray-50 dark:bg-foreground rounded-lg p-5 relative overflow-hidden">
                                    <div
                                        class="w-20 h-20 rounded-full dark:bg-background bg-gray-100 absolute -right-4 -top-4"></div>
                                    <div class="flex items-center mb-9">
                                        <img class="w-16 h-16 border-2 border-white rounded-lg mr-6"
                                             src="{{url('/')}}/user/assets/img/faces/10.jpg" alt="">
                                        <div>
                                            <h5 class="text-sm text-gray-700 dark:text-gray-100 font-medium mb-1"> Gage
                                                Paquette </h5>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Australia</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-500 leading-[24px]"> Nation yet I century
                                        way of the into he gone day time. And installer. To pity the left didn&#x27;t
                                        doubting as for recommendation up omens, the place were coffee shut for the on
                                        anyone but it noise not has eye. </p>
                                    <div class="flex justify-end mt-5">
                                        <svg width="54" height="41" viewbox="0 0 54 41" fill="none"
                                             class="h-[54px] w-[41px] text-gray-100 dark:text-background"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M29.992 10.432C29.992 7.28067 31.0243 4.78134 33.089 2.934C35.1537 0.977999 37.7617 0 40.913 0C44.7163 0 47.8133 1.24967 50.204 3.749C52.7033 6.24833 53.953 9.83433 53.953 14.507C53.953 19.5057 52.486 24.45 49.552 29.34C46.7267 34.1213 42.706 37.9247 37.49 40.75L33.741 35.045C36.5663 33.089 38.794 30.9157 40.424 28.525C42.1627 26.1343 43.3037 23.3633 43.847 20.212C42.869 20.6467 41.728 20.864 40.424 20.864C37.3813 20.864 34.882 19.886 32.926 17.93C30.97 15.974 29.992 13.4747 29.992 10.432ZM0 10.432C0 7.28067 1.03233 4.78134 3.097 2.934C5.16167 0.977999 7.76967 0 10.921 0C14.7243 0 17.8213 1.24967 20.212 3.749C22.7113 6.24833 23.961 9.83433 23.961 14.507C23.961 19.5057 22.494 24.45 19.56 29.34C16.7347 34.1213 12.714 37.9247 7.498 40.75L3.749 35.045C6.57433 33.089 8.802 30.9157 10.432 28.525C12.1707 26.1343 13.3117 23.3633 13.855 20.212C12.877 20.6467 11.736 20.864 10.432 20.864C7.38933 20.864 4.89 19.886 2.934 17.93C0.978 15.974 0 13.4747 0 10.432Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800">
                                <div class="bg-gray-50 dark:bg-foreground rounded-lg p-5 relative overflow-hidden">
                                    <div
                                        class="w-20 h-20 rounded-full dark:bg-background bg-gray-100 absolute -right-4 -top-4"></div>
                                    <div class="flex items-center mb-9">
                                        <img class="w-16 h-16 border-2 border-white rounded-lg mr-6"
                                             src="{{url('/')}}/user/assets/img/faces/10.jpg" alt="">
                                        <div>
                                            <h5 class="text-sm text-gray-700 dark:text-gray-100 font-medium mb-1"> Gage
                                                Paquette </h5>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Australia</p>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 dark:text-gray-500 leading-[24px]"> Nation yet I century
                                        way of the into he gone day time. And installer. To pity the left didn&#x27;t
                                        doubting as for recommendation up omens, the place were coffee shut for the on
                                        anyone but it noise not has eye. </p>
                                    <div class="flex justify-end mt-5">
                                        <svg width="54" height="41" viewbox="0 0 54 41" fill="none"
                                             class="h-[54px] w-[41px] text-gray-100 dark:text-background"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M29.992 10.432C29.992 7.28067 31.0243 4.78134 33.089 2.934C35.1537 0.977999 37.7617 0 40.913 0C44.7163 0 47.8133 1.24967 50.204 3.749C52.7033 6.24833 53.953 9.83433 53.953 14.507C53.953 19.5057 52.486 24.45 49.552 29.34C46.7267 34.1213 42.706 37.9247 37.49 40.75L33.741 35.045C36.5663 33.089 38.794 30.9157 40.424 28.525C42.1627 26.1343 43.3037 23.3633 43.847 20.212C42.869 20.6467 41.728 20.864 40.424 20.864C37.3813 20.864 34.882 19.886 32.926 17.93C30.97 15.974 29.992 13.4747 29.992 10.432ZM0 10.432C0 7.28067 1.03233 4.78134 3.097 2.934C5.16167 0.977999 7.76967 0 10.921 0C14.7243 0 17.8213 1.24967 20.212 3.749C22.7113 6.24833 23.961 9.83433 23.961 14.507C23.961 19.5057 22.494 24.45 19.56 29.34C16.7347 34.1213 12.714 37.9247 7.498 40.75L3.749 35.045C6.57433 33.089 8.802 30.9157 10.432 28.525C12.1707 26.1343 13.3117 23.3633 13.855 20.212C12.877 20.6467 11.736 20.864 10.432 20.864C7.38933 20.864 4.89 19.886 2.934 17.93C0.978 15.974 0 13.4747 0 10.432Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blogs list -->
        <section class="py-20 border-b border-gray-200 dark:border-foreground dark:bg-background">
            <div class="container mx-auto lg:p-0 p-5">
                <div
                    class="flex lg:flex-row flex-col lg:text-left text-center flex-wrap items-center justify-between mb-12">
                    <div class="lg:mb-0 mb-4">
                        <h1 class="text-2xl dark:text-gray-200 lg:text-3xl font-medium capitalize mb-2" data-aos="fade-up"
                            data-aos-duration="800"> Our Blogs </h1>
                        <h6 class="text-sm dark:text-gray-400 lg:text-base text-gray-500 font-normal" data-aos="fade-up"
                            data-aos-duration="1000"> A selection of listing verified for quality </h6>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="800">
                        <a href="blog-list-page" type="button"
                           class="text-gray-500 dark:text-gray-400 hover:text-blue-500 flex items-center"> Explore More
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 ml-3" viewbox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Slider main container -->
                <div class="relative">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper relative h-full">
                            <!-- Slides -->
                            <div class="swiper-slide mt-4 lg:mb-8" data-aos="fade-up" data-aos-duration="800">
                                <div
                                    class="shadow-front-1 rounded-lg [&>div]:hover:shadow-front-3 group dark:bg-foreground">
                                    <a href="blog-details-page">
                                        <img class="w-full h-64 object-cover rounded-t-lg"
                                             src="{{url('/')}}/user/assets/img/Image/landing-page-image/house.jpg" alt="">
                                    </a>
                                    <div class="p-8 dark:bg-foreground rounded-b-lg shadow-front-1">
                                        <a href="blog-details-page"
                                           class="text-2xl group-hover:text-blue-500 font-semibold text-gray-700 dark:text-gray-100 mb-4">
                                            #1 Sell Your House Today </a>
                                        <div class="text-sm text-gray-500 mb-7 dark:text-gray-400"> Nation yet I century way
                                            of the into he gone day time. And installer.
                                        </div>
                                        <div class="flex justify-between">
                                            <div class="text-sm font-normal dark:text-gray-400"> 22 Feb, 2022</div>
                                            <div class="flex">
                                                <div class="flex mr-5">
                                                    <svg
                                                        class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                                <div class="flex mr-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                         viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide mt-4 lg:mb-8" data-aos="fade-up" data-aos-duration="800">
                                <div
                                    class="shadow-front-1 rounded-lg [&>div]:hover:shadow-front-3 group dark:bg-foreground">
                                    <a href="blog-details-page">
                                        <img class="w-full h-64 object-cover rounded-t-lg"
                                             src="{{url('/')}}/user/assets/img/Image/event-landing-page/concert.jpg" alt="">
                                    </a>
                                    <div class="p-8 dark:bg-foreground rounded-b-lg shadow-front-1">
                                        <a href="blog-details-page"
                                           class="text-2xl group-hover:text-blue-500 font-semibold text-gray-700 dark:text-gray-100 mb-4">
                                            Musical Event House </a>
                                        <div class="text-sm text-gray-500 mb-7 dark:text-gray-400"> Nation yet I century way
                                            of the into he gone day time. And installer.
                                        </div>
                                        <div class="flex justify-between">
                                            <div class="text-sm font-normal dark:text-gray-400"> 22 Feb, 2022</div>
                                            <div class="flex">
                                                <div class="flex mr-5">
                                                    <svg
                                                        class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                                <div class="flex mr-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                         viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide mt-4 lg:mb-8" data-aos="fade-up" data-aos-duration="800">
                                <div
                                    class="shadow-front-1 rounded-lg [&>div]:hover:shadow-front-3 group dark:bg-foreground">
                                    <a href="blog-details-page">
                                        <img class="w-full h-64 object-cover rounded-t-lg"
                                             src="{{url('/')}}/user/assets/img/Image/landing-page-image/dish.jpg" alt="">
                                    </a>
                                    <div class="p-8 dark:bg-foreground rounded-b-lg shadow-front-1">
                                        <a href="blog-details-page"
                                           class="text-2xl group-hover:text-blue-500 font-semibold text-gray-700 dark:text-gray-100 mb-4">
                                            Musical Event House </a>
                                        <div class="text-sm text-gray-500 mb-7 dark:text-gray-400"> Nation yet I century way
                                            of the into he gone day time. And installer.
                                        </div>
                                        <div class="flex justify-between">
                                            <div class="text-sm font-normal dark:text-gray-400"> 22 Feb, 2022</div>
                                            <div class="flex">
                                                <div class="flex mr-5">
                                                    <svg
                                                        class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                                <div class="flex mr-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                         viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide mt-4 lg:mb-8" data-aos="fade-up" data-aos-duration="800">
                                <div
                                    class="shadow-front-1 rounded-lg [&>div]:hover:shadow-front-3 group dark:bg-foreground">
                                    <a href="blog-details-page">
                                        <img class="w-full h-64 object-cover rounded-t-lg"
                                             src="{{url('/')}}/user/assets/img/Image/landing-page-image/house.jpg" alt="">
                                    </a>
                                    <div class="p-8 dark:bg-foreground rounded-b-lg shadow-front-1">
                                        <a href="blog-details-page"
                                           class="text-2xl group-hover:text-blue-500 font-semibold text-gray-700 dark:text-gray-100 mb-4">
                                            Musical Event House </a>
                                        <div class="text-sm text-gray-500 mb-7 dark:text-gray-400"> Nation yet I century way
                                            of the into he gone day time. And installer.
                                        </div>
                                        <div class="flex justify-between">
                                            <div class="text-sm font-normal dark:text-gray-400"> 22 Feb, 2022</div>
                                            <div class="flex">
                                                <div class="flex mr-5">
                                                    <svg
                                                        class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                                <div class="flex mr-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         class="h-5 w-5 group-hover:text-blue-500 text-gray-500 mr-1 dark:text-gray-400"
                                                         viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                                    </svg>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">245</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev left-2 lg:-left-3 after:hidden">
                        <button type="button"
                                class="bg-white dark:bg-foreground text-blue-500 hover:bg-blue-500 hover:text-white rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="swiper-button-next absolute right-2 lg:-right-3 after:hidden">
                        <button type="button"
                                class="bg-white dark:bg-foreground text-blue-500 hover:bg-blue-500 hover:text-white rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing -->
        <section class="text-left lg:px-0 px-5 dark:bg-background py-20">
            <div class="container mx-auto" data-aos="fade-up" data-aos-duration="800">
                <h1 class="text-3xl dark:text-gray-100 font-semibold mb-4"> Our Flexiable Price Plan </h1>
                <p class="font-normal text-gray-500 dark:text-gray-400 text-base mb-10"> A selection of listings verified
                    for quality </p>
                <div class="grid grid-cols-3 gap-0 items-stretch mb-10">
                    <div class="col-span-3 lg:col-span-1 bg-gray-50 group dark:bg-foreground rounded-l">
                        <div
                            class="px-10 my-14 lg:border-r lg:border-gray-200 border-transparent dark:border-r dark:border-gray-900">
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="text-6xl font-bold text-left mb-10 text-gray-700 dark:text-gray-300">
                                        <span class="text-base font-normal">$</span> 5 <span class="text-base font-normal"> /month </span>
                                    </div>
                                    <div class="text-[22px] font-semibold text-left dark:text-gray-400"> Basic</div>
                                    <div class="text-base font-normal text-left text-gray-700 dark:text-gray-500 mb-10"> 1
                                        standard listing active for 30 days
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                    class="my-5 text-center border group-hover:bg-blue-500 group-hover:text-white border-gray-300 dark:border-gray-700 cursor-pointer text-sm tracking-wider px-10 py-3 font-medium text-gray-700 dark:text-gray-300 rounded">
                                Add Listing
                            </button>
                            <ul>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1">
                                            Unlimited number of listings
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1">
                                            Unlimited availability of listings
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1"> Limited
                                            Support
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div
                        class="col-span-3 lg:col-span-1 group bg-gray-50 rounded-l dark:border-r dark:border-gray-900 dark:bg-foreground">
                        <div class="px-10 my-14 lg:border-r lg:border-gray-200 border-transparent">
                            <div class="flex justify-between">
                                <div>
                                    <div class="text-6xl font-bold text-left mb-10 text-gray-700 dark:text-gray-300">
                                        <span class="text-base font-normal">$</span> 40 <span class="text-base font-normal"> /month </span>
                                    </div>
                                    <div class="text-[22px] font-semibold text-left dark:text-gray-400"> Professional</div>
                                    <div class="text-base font-normal text-left text-gray-700 dark:text-gray-500 mb-10">
                                        Best choice for individuals.
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                    class="my-5 text-center border group-hover:bg-blue-500 group-hover:text-white border-gray-300 dark:border-gray-700 cursor-pointer text-sm tracking-wider px-10 py-3 font-medium text-gray-700 dark:text-gray-300 rounded">
                                Add Listing
                            </button>
                            <ul>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1"> 1 card a
                                            month
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1"> Free
                                            shipping
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1"> 24/7
                                            customer supports
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div
                        class="col-span-3 lg:col-span-1 shadow-front-4 bg-white dark:bg-foreground scale-100 lg:scale-110 rounded-l">
                        <div class="px-10 my-14">
                            <div class="text-center">
                                <div
                                    class="bg-green-100 inline-flex justify-center rounded-full text-green-500 mb-5 px-3 py-1 items-center font-medium text-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor"
                                         class="w-3 h-3 mr-2">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    Most Popular
                                </div>
                            </div>
                            <div class="text-[22px] font-semibold text-left dark:text-gray-400"> Enterprise</div>
                            <div class="text-base font-normal text-left text-gray-700 dark:text-gray-500 mb-10"> Explore
                                select, our premium solution for enterprise businesses.
                            </div>
                            <div class="text-6xl font-bold text-left mb-10 text-gray-700 dark:text-gray-300">
                                <span class="text-base font-normal">$</span> 15 <span
                                    class="text-base font-normal">/month</span>
                            </div>
                            <button type="button"
                                    class="my-5 text-center border border-blue-500 bg-blue-500 text-white cursor-pointer text-sm tracking-wider px-10 py-3 font-medium rounded">
                                Add Listing
                            </button>
                            <ul>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1"> 1 card a
                                            month
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1"> Free
                                            shipping
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1"> 24/7
                                            customer supports
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center text-left mb-4">
                                        <svg class="h-4 w-4 shrink-0 mr-2 fill-blue-500" xmlns="http://www.w3.org/2000/svg"
                                             viewbox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="text-gray-700 dark:text-gray-300 font-normal text-base flex-1">
                                            Unlimited support &amp; Updates.
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end content -->
        @include('includes.footer')
        <!-- Scroll to top -->
        <div class="scroll-top-btn opacity-0 transition-all">
            <button type="button"
                    class="bg-blue-500 p-2 fixed z-50 bottom-0 hover:-translate-y-2 transition-all right-0 m-10 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewbox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                </svg>
            </button>
        </div>
    </div>
@endsection

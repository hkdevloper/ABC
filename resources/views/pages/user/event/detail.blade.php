@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Event List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            {{-- Event Details Section --}}
                            <section class="container py-12">
                                <h1 class="text-3xl font-semibold text-center uppercase mb-8">Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit</h1>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- Event Image -->
                                    <img src="https://via.placeholder.com/600/400" alt="Event Image"
                                         class="w-full h-auto object-cover rounded-lg shadow-lg">

                                    <!-- Event Description -->
                                    <div class="p-4">
                                        <div class="flex items-center text-gray-600 mb-4">
                                            <i class="fa fa-calendar mr-2"></i>
                                            <span>Event Date: November 25</span>
                                        </div>
                                        <div class="flex items-center text-gray-600 mb-4">
                                            <i class="fa fa-clock mr-2"></i>
                                            <span>Gates Open: 6:00 PM Onwards</span>
                                        </div>
                                        <div class="mb-6">
                                            <h3 class="text-lg font-semibold mb-2">About the Event</h3>
                                            <p class="text-gray-700 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, cumque?
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Fugit, cumque?
                                            </p>
                                        </div>
                                        <div class="mb-6">
                                            <h3 class="text-lg font-semibold mb-2">How to Attend</h3>
                                            <p class="text-gray-700 leading-relaxed">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, cumque?
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Fugit, cumque?
                                            </p>
                                        </div>
                                        <div
                                            class="flex justify-between items-center bg-blue-500 text-white p-4 rounded-lg font-semibold">
                                            <div>
                                                <i class="fa fa-rupee-sign mr-2"></i>
                                                Ticket Price: 500 Onwards
                                            </div>
                                            <div class="uppercase">Buy Tickets</div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            {{-- Related Events Section--}}
                            <section class="container py-12">
                                <hr class="my-12 border-t-2 border-gray-300">

                                <h1 class="text-3xl font-semibold text-center uppercase mb-8">Explore More Events</h1>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                    <!-- Event Card 1 -->
                                    <div class="rounded-lg shadow-md">
                                        <img src="https://via.placeholder.com/340/186" alt="Event Image"
                                             class="w-full h-auto object-cover rounded-t-lg">

                                        <div class="p-4">
                                            <h2 class="text-xl font-semibold mb-2">Lorem ipsum dolor sit amet</h2>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <i class="fa fa-calendar mr-2"></i>
                                                <span>November 25 | Gates Open 6PM Onwards</span>
                                            </div>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <i class="fa fa-play mr-2"></i>
                                                <span>Watch On Insider</span>
                                            </div>
                                            <div
                                                class="flex justify-between items-center bg-blue-500 text-white p-2 rounded-lg font-semibold">
                                                <div>
                                                    <i class="fa fa-rupee-sign mr-2"></i>
                                                    500 Onwards
                                                </div>
                                                <div class="uppercase">Buy Now</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Event Card 2 -->
                                    <div class="rounded-lg shadow-md">
                                        <img src="https://via.placeholder.com/340/186" alt="Event Image"
                                             class="w-full h-auto object-cover rounded-t-lg">

                                        <div class="p-4">
                                            <h2 class="text-xl font-semibold mb-2">Lorem ipsum dolor sit amet</h2>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <i class="fa fa-calendar mr-2"></i>
                                                <span>November 25 | Gates Open 6PM Onwards</span>
                                            </div>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <i class="fa fa-play mr-2"></i>
                                                <span>Watch On Insider</span>
                                            </div>
                                            <div
                                                class="flex justify-between items-center bg-blue-500 text-white p-2 rounded-lg font-semibold">
                                                <div>
                                                    <i class="fa fa-rupee-sign mr-2"></i>
                                                    500 Onwards
                                                </div>
                                                <div class="uppercase">Buy Now</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Event Card 3 -->
                                    <div class="rounded-lg shadow-md">
                                        <img src="https://via.placeholder.com/340/186" alt="Event Image"
                                             class="w-full h-auto object-cover rounded-t-lg">

                                        <div class="p-4">
                                            <h2 class="text-xl font-semibold mb-2">Lorem ipsum dolor sit amet</h2>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <i class="fa fa-calendar mr-2"></i>
                                                <span>November 25 | Gates Open 6PM Onwards</span>
                                            </div>
                                            <div class="flex items-center text-gray-600 mb-2">
                                                <i class="fa fa-play mr-2"></i>
                                                <span>Watch On Insider</span>
                                            </div>
                                            <div
                                                class="flex justify-between items-center bg-blue-500 text-white p-2 rounded-lg font-semibold">
                                                <div>
                                                    <i class="fa fa-rupee-sign mr-2"></i>
                                                    500 Onwards
                                                </div>
                                                <div class="uppercase">Buy Now</div>
                                            </div>
                                        </div>
                                    </div>
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

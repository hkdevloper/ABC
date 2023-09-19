@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    {{-- Filter Section --}}
                    <div class="border flex justify-between items-center"
                         style="width: 100%; height: 100px; background: rgb(15, 12, 114);">
                        <h1 class="text-white text-4xl mx-12">Events</h1>
                        <!-- Filter Section -->
                        <div class="p-4 md:flex md:justify-between">
                            <!-- Search Input -->
                            <div class="relative mb-4 md:mb-0 mx-1">
                                <input type="text"
                                       class=" rounded-full bg-white w-full py-2 px-4 pl-10 focus:outline-none"
                                       placeholder="Search Events...">
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

                            <!-- Pricing Filter -->
                            <div class="mb-4 md:mb-0 mx-1">
                                <select class=" rounded-md bg-white py-2 px-4 focus:outline-none">
                                    <option value="">All Prices</option>
                                    <option value="price1">Price 1</option>
                                    <option value="price2">Price 2</option>
                                    <!-- Add more pricing options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Event List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                <!-- Event list Item -->
                                <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                    <!-- Event list Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-1">
                                        <!-- Event Item 1 -->
                                        @php
                                            function generateRandomEventTitle(): string {
                                                $eventTypes = ["Conference", "Seminar", "Workshop", "Webinar", "Exhibition", "Symposium", "Panel Discussion", "Networking Event", "Hackathon", "Meetup"];
                                                $topics = ["Technology", "Business", "Science", "Art", "Health", "Education", "Environment", "Finance", "Sports", "Music"];

                                                $randomEventType = $eventTypes[array_rand($eventTypes)];
                                                $randomTopic = $topics[array_rand($topics)];

                                                return $randomEventType . " on " . $randomTopic;
                                            }
                                        @endphp

                                        @for($i=1; $i<10;$i++)
                                            <div class="w-100">
                                                <div class="card desktop-homepage-events-wdgt">
                                                    <div class="feature-card-header-image-container">
                                                        <div class="feature-card-image-container">
                                                            <img alt="feature-card" class="feature-card-image" height=""
                                                                 src="https://via.placeholder.com/300x100" width="">
                                                            <div class="feature-card-image-overlay"></div>
                                                            <div class="feature-card-date-rewards-container">
                                                                <div class="feature-card-date-label">
                                                                    Entry closes in {{rand(1,9)}}d
                                                                </div>
                                                                <div class="ribbon-2">
                                                                    <p class="rewards-label">{{ generateRandomEventTitle() }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="organizer-container">
                                                            <div class="organizer-logo-container"><img
                                                                    alt="company logo" class="logo-img" height=""
                                                                    src="https://via.placeholder.com/100x100"
                                                                    width=""></div>
                                                            <div class="organizer-description-container">
                                                                <p class="feature-card-heading">{{ generateRandomEventTitle() }}</p>
                                                                <p class="feature-card-organizer">{{ generateRandomEventTitle() }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="chips-container">
                                                            <div class="chip">
                                                                <p class="chip-label">{{ generateRandomEventTitle() }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="feature-card-stats-container">
                                                            <div class="feature-card-date-container">
                                                                <img alt="User icon" class="naukicon-calendar" height=""
                                                                     src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg"
                                                                     width="">
                                                                @php
                                                                    $randomTimestamp = rand(strtotime('2023-01-01 00:00:00'), strtotime('2023-12-31 23:59:59'));
                                                                    $randomDate = date('d M, g:i A', $randomTimestamp);
                                                                @endphp

                                                                <p class="feature-card-date-label">{{ $randomDate }}</p>
                                                            </div>
                                                            <div class="registered-user-container">
                                                                <img alt="User icon" class="naukicon-user" height=""
                                                                     src="https://static.naukimg.com/s/0/0/i/Events/icons/user-ot.svg"
                                                                     width="">
                                                                <p class="registered-count-label">{{rand(1,99) / 10}}K
                                                                    Enrolled
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="footer-separator"></div>
                                                        <div class="semi-circle-container">
                                                            <div class="left semi-circle"></div>
                                                            <div class="right semi-circle"></div>
                                                        </div>
                                                        <div class="card-footer-container">
                                                            <div class="feature-card-type-tag-container">
                                                                <p class="feature-card-type-label">
                                                                    RS. {{rand(99,999)}}</p>
                                                            </div>
                                                            <div class="cta-container">
                                                                <a class="cta-link"
                                                                   href="{{route('view.event', [generateRandomEventTitle()])}}">
                                                                    View details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                        <!-- Repeat similar code for Event Items 2, 3, and 4 -->
                                    </div>
                                </div>
                                <!-- Event Pagination -->
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

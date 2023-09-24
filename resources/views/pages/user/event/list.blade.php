@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Blogs'"/>

            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">

                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
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
                                                <div class="card desktop-homepage-events-wdgt overflow-hidden">
                                                    <img class="w-full h-40 object-cover"
                                                         src="https://via.placeholder.com/300x300"
                                                         alt="Event Thumbnail">
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
                                                                <a href="{{route('view.event', [generateRandomEventTitle()])}}"
                                                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                                   style="border: 1px solid;">
                                                                    View Details
                                                                </a>
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

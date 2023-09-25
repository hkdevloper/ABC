@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Events'"/>

            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">

                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Event List Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                <!-- Event list Item -->
                                <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                    <!-- Event list Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
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
                                            <div class="card desktop-homepage-events-wdgt overflow-hidden">
                                                <img class="w-full h-40 object-cover"
                                                     src="https://via.placeholder.com/300x300"
                                                     alt="Event Thumbnail">
                                                <div class="card-body">
                                                    <div class="organizer-container flex items-start">
                                                        <div class="organizer-logo-container">
                                                            <img alt="company logo" class="logo-img"
                                                                 height="100" width="100"
                                                                 src="https://via.placeholder.com/100x100">
                                                        </div>
                                                        <div class="organizer-description-container ml-3">
                                                            <p class="feature-card-heading">{{ generateRandomEventTitle() }}</p>
                                                            <p class="feature-card-organizer">{{ generateRandomEventTitle() }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="chips-container mt-2">
                                                        <div class="chip">
                                                            <p class="chip-label">{{ generateRandomEventTitle() }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="feature-card-stats-container mt-2 flex items-center">
                                                        <div class="feature-card-date-container flex items-center">
                                                            <img alt="User icon" class="naukicon-calendar"
                                                                 height="16" width="16"
                                                                 src="https://static.naukimg.com/s/0/0/i/Events/icons/calendar-ot.svg">
                                                            @php
                                                                $randomTimestamp = rand(strtotime('2023-01-01 00:00:00'), strtotime('2023-12-31 23:59:59'));
                                                                $randomDate = date('d M, g:i A', $randomTimestamp);
                                                            @endphp
                                                            <p class="feature-card-date-label ml-1">{{ $randomDate }}</p>
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
                                                    <div
                                                        class="card-footer-container flex items-center justify-between">
                                                        <div class="feature-card-type-tag-container">
                                                            <p class="feature-card-type-label">RS. {{rand(99,999)}}</p>
                                                        </div>
                                                        <div class="cta-container">
                                                            <a href="{{route('view.event', [generateRandomEventTitle()])}}"
                                                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                               style="border: 1px solid;">View Details
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <!-- Pagination -->
                                <x-user.pagination/>
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

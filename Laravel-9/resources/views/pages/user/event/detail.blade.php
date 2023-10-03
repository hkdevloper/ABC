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
                            <div class="container mx-auto px-4">
                                <img src="https://via.placeholder.com/800x400" alt="Blog Thumbnail"
                                     class="w-full h-auto mb-6 rounded-lg shadow-lg">
                                <h1 class="text-3xl font-semibold mb-4">Unlocking the Magic of Code: Exploring
                                    hkdevlopers' Awesome Portfolio</h1>
                                <p class="text-gray-500 mb-4">on September 22, 2023 | Gates Open 6PM Onwards</p>
                                <p class="text-gray-500 mb-4">DY Patil sports stadium Navy Mumbai</p>
                                <div class="tabs-container">
                                    <div class="tab-list-wrapper">
                                        <div class="tab-list ">
                                            <div class="tab-wrapper">
                                                <div data-tab="Overview" class="tab-list-item tab-list-active text-lg text-purple-500"><a
                                                        href="https://www.naukri.com/HkDevelopers-overview-126896"
                                                        class="anchor-label">Overview</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="tab-content" style="top: 45px;">
                                        <div class="leftContainer Overview">
                                            <div class="about-us mediaAbout mt-2">
                                                HkDevelopers is a leading global telecommunications company with operations in 18 countries across Asia and Africa. Headquartered in New Delhi, India, the company ranks amongst the top 3 mobile service providers globally in terms of subscribers. In India, the company's product offerings include 2G, 3G and 4G wireless services, mobile commerce, fixed line services, high speed home broadband, DTH, enterprise services including national & international long distance services to carriers. In the rest of the geographies, it offers 2G, 3G, 4G wireless services and mobile commerce. HkDevelopers had over 403 million customers across its operations at the end of March 2019.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Related Products Section -->
                            <section class="container mx-auto mt-8 p-4 bg-white">
                                <h2 class="text-2xl font-semibold">Related Events</h2>
                                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
                                    @php
                                        function generateRandomEventTitle(): string {
                                            $eventTypes = ["Conference", "Seminar", "Workshop", "Webinar", "Exhibition", "Symposium", "Panel Discussion", "Networking Event", "Hackathon", "Meetup"];
                                            $topics = ["Technology", "Business", "Science", "Art", "Health", "Education", "Environment", "Finance", "Sports", "Music"];

                                            $randomEventType = $eventTypes[array_rand($eventTypes)];
                                            $randomTopic = $topics[array_rand($topics)];

                                            return $randomEventType . " on " . $randomTopic;
                                        }
                                    @endphp

                                    @for($i=1; $i<=6;$i++)
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

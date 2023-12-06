@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Event'" :breadcrumb="['Home', 'Event', 'List']"/>
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Event List Block -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Event List Filter -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span class="text-xl text-purple-500">Events</span></p>
                <p class="text-base text-gray-500">About {{count($events)}} Result</p>
            </div>
            <hr class="my-5">
            <!-- Event List -->
            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                <!-- Event list Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
                    <!-- Event Items-->
                    @forelse($events as $event)
                        <div class="card desktop-homepage-events-wdgt overflow-hidden">
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
                                    {{--                                                    <div class="feature-card-type-tag-container">--}}
                                    {{--                                                        <p class="feature-card-type-label">RS. {{$event->price}}</p>--}}
                                    {{--                                                    </div>--}}
                                    <div class="cta-container w-full">
                                        <a href="{{route('view.event', [$event->slug])}}"
                                           class="block text-center text-purple-500 hover:text-white rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-100"
                                           style="border: 1px solid;">View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center">
                            <p class="text-gray-500 text-center">No Events Found</p>
                        </div>
                    @endforelse
                </div>
            </div>
            <!-- Pagination -->
            <hr class="my-5">
            {{$events->links()}}
        </div>
        <!-- Side Block -->
        @include('includes.sidebar')
    </div>
@endsection

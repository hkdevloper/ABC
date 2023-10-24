@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Event'" :breadcrumb="['Home', 'Event', 'List']"/>

            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">

                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Event List Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Event List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden px-2 mb-3">
                                <div class="flex items-center justify-center w-100">
                                    <label for="sort-by"></label><select id="sort-by" class="border border-solid border-gray-300 text-gray-900 text-sm p-2.5 m-2 focus:outline-none focus:border-0 card w-[150px]">
                                        <option selected>Filter All</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @foreach($category->children as $child)
                                                <option value="{{$child->id}}">- {{$child->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <a href="{{url('user/dashboard')}}"
                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-3 transition duration-300 ease-in-out text-xs w-100"
                                   style="border: 1px solid;">List your Event</a>
                            </div>
                            <!-- Event List -->
                            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                <!-- Event list Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
                                    <!-- Event Items-->
                                    @foreach($events as $event)
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
                                    @endforeach
                                </div>
                            </div>
                            <!-- Pagination -->
                            {{$events->links()}}
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

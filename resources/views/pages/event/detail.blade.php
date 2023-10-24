@extends('layouts.main-user-details')

@section('content')
    {{-- Event Details Section --}}
    <div class="mx-auto px-4">
        <img src="{{url('storage/' . $event->thumbnail)}}" alt="Event Thumbnail" style="width: 100%; height: 400px;"
             class="mb-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold mb-4">{{$event->title}}</h1>
        <p class="text-gray-500 mb-4">on {{ date('d M Y h:i a', (int)$event->start) }} Onwards</p>
        <p class="text-gray-500 mb-4">Organized by {{$event->user->name}}</p>
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
                        <p>{!! $event->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <section class="container mx-auto mt-8 p-4 bg-white">
        <h2 class="text-2xl font-semibold">Related Events</h2>
        @if($related_events->count() == 0)
            <p class="text-gray-500 text-center mt-10">No related events found.</p>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
            <!-- Event Items-->
            @foreach($related_events as $event)
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
        @endif
    </section>
@endsection

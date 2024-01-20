@extends('layouts.user')

@section('content')
    <x-user.header :title="'Event'" :breadcrumb="['Home', 'Event', 'List']" type="event"/>
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Event List Block -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Event List Filter -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span
                            class="text-xl text-purple-500">Events</span></p>
                <p class="text-base text-gray-500">About {{count($events)}} Result</p>
            </div>
            <hr class="my-5">
            <!-- Event List -->
            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                <!-- Event list Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
                    <!-- Event Items-->
                    @forelse($events as $event)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="each relative">
                                <img src="{{ url('storage/'.$event->thumbnail) }}" class="w-full h-48 object-contain"
                                     alt="Event">
                                <div class="desc p-4 text-gray-800">
                                    <div class="flex items-center mt-2">
                                        <img class='w-10 h-10 object-cover rounded-full' alt='User avatar'
                                             src='https://ui-avatars.com/api/?name={{$event->user->name}}'/>
                                        <div class="pl-3">
                                            <div class="font-medium">
                                                {{$event->user->name}}
                                            </div>
                                            <div class="text-gray-600 text-sm">
                                                {{$event->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('view.event', [$event->slug])}}"
                                       class="my-3 title font-bold block cursor-pointer hover:underline">{{$event->title}}</a>
                                    <span class="description text-sm block py-2 border-gray-400 mb-2">
                                        @php
                                            $description = strip_tags($event->description);
                                            $description = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
                                        @endphp
                                        {!! $description !!}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700">No featured events available.</p>
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

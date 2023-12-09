@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Event'" :breadcrumb="['Home', 'Event', 'List']" type="event"/>
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
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="each relative">
                                <img src="{{ url('storage/'.$event->thumbnail) }}" class="w-full h-48 object-contain" alt="Event">
                                <div class="badge absolute top-0 right-0 bg-purple-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">
                                    @php
                                        $date = \Carbon\Carbon::parse($event->start);
                                    @endphp
                                    {{$date->diffForHumans()}}
                                </div>
                                <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                                    <span class="mr-1 p-1 px-2 font-bold">105 Watching</span>
                                    <span class="mr-1 p-1 px-2 font-bold border-0 border-solid border-l border-gray-400">105 Likes</span>
                                    <span class="mr-1 p-1 px-2 font-bold border-0 border-solid border-l border-gray-400">105 Views</span>
                                </div>
                                <div class="desc p-4 text-gray-800">
                                    <div class="flex items-center mt-2">
                                        <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://ui-avatars.com/api/?name={{$event->user->name}}'/>
                                        <div class="pl-3">
                                            <div class="font-medium">
                                                {{$event->user->name}}
                                            </div>
                                            <div class="text-gray-600 text-sm">
                                                {{$event->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('view.event', [$event->slug])}}" class="my-3 title font-bold block cursor-pointer hover:underline">{{$event->title}}</a>
                                    <span class="description text-sm block py-2 border-gray-400 mb-2">
                                        @php
                                            $description = strip_tags($event->description);
                                            $description = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
                                        @endphp
                                        {!! $description !!}
                                    </span>
                                </div>
                            </div>
                            <div class="border border-solid border-t border-b-0 border-r-0 border-l-0 border-gray-900">
                                <div class="flex items-stretch w-full">
                                    <button type="button" onclick="window.open('{{route('view.event', [$event->slug])}}')"
                                            class="flex-1 inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent hover:bg-gray-900 hover:text-white focus:ring-gray-500 focus:bg-gray-900 focus:text-white border border-solid border-r border-b-0 border-l-0 border-t-0 border-gray-900">
                                        <i class="fas fa-eye mr-3"></i>
                                        View
                                    </button>

                                    <button type="button"
                                            class="flex-1 inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent hover:bg-gray-900 hover:text-white focus:ring-gray-500 focus:bg-gray-900 focus:text-white border border-solid border-r border-b-0 border-l-0 border-t-0 border-gray-900">
                                        <i class="fas fa-bookmark mr-3"></i>
                                        Save
                                    </button>

                                    <button type="button"
                                            class="flex-1 inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent hover:bg-gray-900 hover:text-white focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                                        <i class="fas fa-heart mr-3"></i>
                                        Like
                                    </button>
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

@extends('layouts.main-user-details')

@section('content')
    <div class="container py-6 mx-auto flex flex-wrap">
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <x-user.bread-crumb :data="['Home', 'Events', $event->title]"/>
            <div class="">
                <img src="{{url('storage/' . $event->thumbnail)}}" alt="Event Thumbnail" style="width: 100%; height: 400px;" class="mb-6 rounded-lg shadow-lg object-contain">
                <h1 class="text-3xl font-semibold mb-4">{{$event->title}}</h1>
                <p class="text-gray-500 mb-4">on {{ date('d M Y h:i a', (int)$event->start) }} Onwards</p>
                <p class="text-gray-500 mb-4">Organized by {{$event->user->name}}</p>
                <div class="flex items-center mb-4">
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
                <div class="tabs-container">
                    <div class="tab-list-wrapper">
                        <div class="tab-list ">
                            <div class="tab-wrapper">
                                <div data-tab="Overview" class="tab-list-item tab-list-active text-lg text-purple-500">
                                    <a href="#" class="anchor-label">Overview</a>
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
            <!-- Related Events Section -->
            <section class="mt-8 p-4 bg-white">
                <h2 class="text-2xl font-semibold text-center underline">Related Events</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
                    <!-- Event Items-->
                    @forelse($related_events as $event)
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
                                    <a href="{{route('view.event', [$event->slug])}}" target="_new" class="my-3 title font-bold block cursor-pointer hover:underline">{{$event->title}}</a>
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
                                    <button type="button"
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
                        <div class="w-full text-center">
                            <p class="text-gray-500 text-center w-full">No Events Found</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
        @include('includes.sidebar')
    </div>
@endsection

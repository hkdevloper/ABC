@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Jobs'" :breadcrumb="['Home', 'Job', 'List']"/>
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Job List BLock -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Job List Filter -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span
                        class="text-xl text-purple-500">Jobs</span></p>
                <p class="text-base text-gray-500">About {{count($jobs)}} Result</p>
            </div>
            <hr class="my-5">
            <!-- Job List -->
            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                @forelse($jobs as  $job)
                    <div class="m-2 card desktop-homepage-events-wdgt dark:bg-neutral-700 w-full">
                        <!-- Logo and Details Div -->
                        <div class="flex items-center justify-between pr-2">
                            <div class="flex flex-wrap">
                                <img src="{{url('storage/' . $job->thumbnail)}}" alt="Job Thumbnail"
                                     class="w-[150px] h-[120px] object-cover rounded-l-lg mr-3">
                                <div class="block">
                                    <h2 class="text-gray-900 text-lg font-semibold mb-1">{{$job->title}}</h2>
                                    <p class="text-gray-400"><i
                                            class='bx bx-current-location'></i>{{$job->getJobAddressAttribute()}}</p>
                                    <p class="text-purple-600">{{$job->employement_type}}</p>
                                    <p class="text-gray-400"><i class='bx bx-time-five'></i>
                                        Posted {{$job->created_at->diffForHumans()}} by {{$job->user->name}}
                                    </p>
                                </div>
                            </div>

                            <a href="{{route('view.job', [$job->slug])}}"
                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 transition duration-300 ease-in-out text-xs"
                               style="border: 1px solid;">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center">
                        <p class="text-gray-500 text-center">No Jobs Found</p>
                    </div>
                @endforelse
            </div>
            <!-- Pagination -->
            <hr class="my-5">
            {{$jobs->links()}}
        </div>
        <!-- Side Block -->
        @include('includes.sidebar')
    </div>
@endsection

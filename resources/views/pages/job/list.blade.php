@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Jobs'" :breadcrumb="['Home', 'Job', 'List']" category="job"/>
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
                    <div class="group mx-2 grid max-w-screen-md grid-cols-12 space-x-8 overflow-hidden rounded-lg border py-8 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto">
                        <a href="{{route('view.job', [$job->slug])}}" class="order-2 col-span-1 mt-4 -ml-14 text-left text-gray-600 hover:text-gray-700 sm:-order-1 sm:ml-4">
                            <div class="group relative h-16 w-16 overflow-hidden rounded-lg">
                                <img src="{{url('storage/' . $job->thumbnail)}}" alt="" class="h-full w-full object-contain text-gray-700" />
                            </div>
                        </a>
                        <div class="col-span-11 flex flex-col pr-8 text-left sm:pl-4">
                            <h3 class="text-sm text-gray-600">{{$job->category->name}}</h3>
                            <div class="flex items-center my-2">
                                <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://ui-avatars.com/api/?name={{$job->user->name}}'/>
                                <div class="pl-3">
                                    <div class="font-medium">
                                        {{$job->user->name}}
                                    </div>
                                    <div class="text-gray-600 text-sm">
                                        {{$job->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('view.job', [$job->slug])}}" class="mb-3 overflow-hidden pr-7 text-lg font-semibold sm:text-xl"> {{$job->title}} </a>

                            <p class="overflow-hidden pr-7 text-sm">{{$job->summary}}</p>

                            <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2">
                                <div class="">Experience:<span class="ml-2 mr-3 rounded-full bg-green-100 px-2 py-0.5 text-green-900">{{$job->experience}}</span></div>
                                <div class="">Salary:<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">Rs. {{$job->salary}}K</span>
                                </div>
                            </div>
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

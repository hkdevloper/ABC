@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Jobs'" :breadcrumb="['Home', 'Job', 'List']"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Job List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <!-- Job List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden px-2">
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
                                   style="border: 1px solid;">List your Job</a>
                            </div>
                            <!-- Job List -->
                            <div class="flex flex-col mb-10 lg:items-center items-center justify-center">
                                <!-- Product list Item -->
                                @foreach($jobs as  $job)
                                    <div class="m-2 card desktop-homepage-events-wdgt dark:bg-neutral-700 w-full">
                                        <!-- Logo and Details Div -->
                                        <div class="flex items-center justify-between pr-2">
                                            <div class="flex flex-wrap">
                                                <img src="{{url('storage/' . $job->thumbnail)}}" alt="Job Thumbnail"
                                                     class="w-[150px] h-[120px] object-cover rounded-l-lg mr-3">
                                                <div class="block">
                                                    <h2 class="text-gray-900 text-lg font-semibold mb-1">{{$job->title}}</h2>
                                                    <p class="text-gray-400"><i class='bx bx-current-location'></i>{{$job->getJobAddressAttribute()}}</p>
                                                    <p class="text-purple-600">{{$job->employement_type}}</p>
                                                    <p class="text-gray-400"> <i class='bx bx-time-five'></i> Posted {{$job->created_at->diffForHumans()}} by {{$job->user->name}}
                                                    </p>
                                                </div>
                                            </div>

                                            <a href="{{route('view.job', [$job->slug])}}"
                                               class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                               style="border: 1px solid;">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Pagination -->
                            {{$jobs->links()}}
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

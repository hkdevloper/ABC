@extends('layouts.user')

@section('content')
    <div class="container py-6 mx-auto flex flex-wrap">
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <x-user.bread-crumb :data="['Home', 'Products', $job->title]"/>
            <div class="bg-blue-100 p-4 rounded-lg shadow-lg flex items-center">
                <div class="flex-grow">
                    <h1 class="text-2xl font-semibold text-blue-900">{{$job->title}}</h1>
                    <p class="text-gray-600">{{$job->organization}}</p>
                    <div class="mt-4">
                        <button
                            class="border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white py-2 px-4 rounded-full hover:rounded-full transition-all duration-300 ease-in-out">
                            Apply for job
                        </button>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="relative">
                        <img src="{{url('storage/'. $job->thumbnail)}}" alt="job thumbnail image" width="150" height="150"
                             class="rounded-t-full">
                        <p class="absolute bottom-0 left-0 right-0 bg-orange-400 text-white text-center py-1 text-sm font-semibold">{{$job->organization}}</p>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <h1 class="text-xl text-black">Job Overview</h1>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <p>{!! $job->overview !!}</p>
            </div>
            <hr class="my-4">
            <h1 class="text-xl text-black">Job Description</h1>
            <div class="mt-8">
                <p>{!! $job->description !!}</p>
            </div>
            <hr class="my-4">
            <h1 class="text-xl text-black">Job Education</h1>
            <div class="mt-8">{!! $job->education !!}</div>
            <hr class="my-4">
            <div class="mt-4">
                <button class="border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white py-2 px-4 rounded-full hover:rounded-full transition-all duration-300 ease-in-out">
                    Apply for job
                </button>
            </div>
        </div>
        @include('includes.sidebar')
    </div>
@endsection

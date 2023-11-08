@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Company'" :breadcrumb="['Home', 'Company', 'List']"/>
    <div class="py-6 mx-auto flex flex-wrap">
        <!-- Companies List -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Company List -->
            <div class="flex flex-col mb-10 lg:items-center items-center justify-center mx-2">
                <!-- Company list Item -->
                @foreach($companies as $company)
                    <div class="m-2">
                        <!-- Logo and Details Div -->
                        <div class="flex flex-col md:flex-row items-start justify-between">
                            <div class="flex items-center justify-between md:mr-5">
                                <!-- Logo -->
                                <img src="{{url('storage/'.$company->logo)}}" alt="{{$company->logo}}" class="object-cover overflow-hidden rounded-l h-40 w-full md:h-40 md:w-40">
                                <!-- Details -->
                                <div class="inline-block p-2">
                                    <h2 class="text-green-600 text-sm mb-1 @if(!$company->is_featured) hidden @endif ">
                                        Featured
                                    </h2>
                                    <h2 class="text-gray-900 text-base title-font font-medium mb-1">{{$company->name}}</h2>
                                    <div class="flex items-center text-sm">
                                        <x-bladewind::icon name="map-pin" type="solid"
                                                           class="text-green-300"/>
                                        <span class="mx-1 text-xs md:text-base">{{$company->address->address_line_1}}</span>
                                        <x-bladewind::icon name="star" type="solid"
                                                           class="text-orange-300"/>
                                        <span class="mx-1">{{rand(1,99)/10}} <span class="hidden md:inline">Review</span></span>
                                    </div>
                                    <!-- Description -->
                                    <div class="mt-2 text-xs w-full">
                                        @php
                                            $description = $company->description;
                                            $limit = 50; // You can adjust the character limit
                                        @endphp

                                        @if(strlen($description) > $limit)
                                            <p>
                                                {!!  substr($description, 0, $limit) !!}...
                                                <a href="{{route('view.company', [$company->slug])}}"
                                                   class="text-blue-500 hover:underline">Read More</a>
                                            </p>
                                        @else
                                            <p>
                                                {!! $description!!}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('view.company', [$company->slug])}}"
                               class="text-purple-500 hover:text-white rounded-full m-1 p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-full md:w-auto"
                               style="border: 1px solid;">View <i
                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            {{ $companies->links() }}
        </div>
        @include('includes.sidebar')
    </div>
@endsection

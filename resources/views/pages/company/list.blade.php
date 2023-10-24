@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Company'" :breadcrumb="['Home', 'Company', 'List']"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    {{-- Main Section --}}
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Companies List -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                            <!-- Company List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden mx-2 px-2">
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
                                       style="border: 1px solid;">List your Company </a>
                            </div>
                            <!-- Company List -->
                            <div class="flex flex-col mb-10 lg:items-center items-center justify-center mx-2">
                                <!-- Company list Item -->
                                @foreach($companies as $company)
                                    <div class="m-2 p-2 card w-full">
                                        <!-- Logo and Details Div -->
                                        <div class="flex items-start justify-between">
                                            <div class="flex items-center">
                                                <!-- Logo -->
                                                <img src="{{url('storage/'.$company->logo)}}" alt="" width="80"
                                                     height="50" class="mr-5 inline-block rounded-full">

                                                <!-- Details -->
                                                <div class="inline-block">
                                                    <h2 class="text-green-600 text-sm mb-1 @if(!$company->is_featured) hidden @endif ">
                                                        Featured
                                                    </h2>
                                                    <h2 class="text-gray-900 text-base title-font font-medium mb-1">{{$company->name}}</h2>
                                                    <div class="flex items-center text-sm">
                                                        <x-bladewind::icon name="map-pin" type="solid"
                                                                           class="text-green-300"/>
                                                        <span class="mx-1">{{$company->address->address_line_1}}</span>
                                                        <x-bladewind::icon name="star" type="solid"
                                                                           class="text-orange-300"/>
                                                        <span class="mx-1">{{rand(1,99)/10}} Review</span>
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
                                               class="text-purple-500 hover:text-white rounded-full p-2 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-100"
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
                </section>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <!-- Header Section -->
            <x-user.header :title="'Blogs'"/>
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font">
                    {{-- Main Section --}}
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- Companies List -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                            <!-- Company List Filter -->
                            <div class="flex flex-wrap items-center justify-between card overflow-hidden mx-2 px-2">
                                <div>
                                    <span class="text-sm">Showing Result <strong class="text-purple-600">10</strong> of <strong  class="text-purple-600">{{rand(10,99)}}</strong> Products</span>
                                </div>
                                <div class="flex flex-wrap items-center justify-center">
                                    <label for="sort-by">Sort By</label>
                                    <select id="sort-by"
                                            class="border border-solid border-gray-300 text-gray-900 text-sm w-auto p-2.5 m-2 focus:outline-none focus:border-0 card">
                                        <option selected>Filter All</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="FR">France</option>
                                        <option value="DE">Germany</option>
                                    </select>

                                    <a href="{{route('company')}}"
                                       class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-3 hover:bg-purple-600 transition duration-300 ease-in-out text-xs w-100"
                                       style="border: 1px solid;">List your Company </a>
                                </div>
                            </div>
                            <!-- Company List -->
                            <div class="flex flex-col mb-10 lg:items-start items-center">
                                <!-- Company list Item -->
                                @foreach($data as $company)
                                    <x-bladewind::contact-card
                                        class="w-[400px]"
                                        style="border: 1px solid #e2e8f0;"
                                        name="Michael K. Ocansey"
                                        mobile="+233.123.456.789"
                                        position="Senior Copywriter"
                                        email="mike@bladewindui.com"
                                        birthday="01-May-2000"></x-bladewind::contact-card>
                                @endforeach
                            </div>
                        </div>
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

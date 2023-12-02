@extends('layouts.main-user-list')

@section('head')
<style>
    .responsive-image-container {
        max-width: 600px; /* Set your preferred max-width */
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
        position: relative;
    }

    .responsive-image {
        width: 100%;
        height: auto;
        display: block;
    }
</style>
@endsection

@section('content')
    <x-user.header :title="'Company'" :breadcrumb="['Home', 'Company', 'List']" category="company"/>
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Companies List -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Company List -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span class="text-xl text-purple-500">Companies</span>
                </p>
                <p class="text-base text-gray-500">About {{count($companies)}} Result</p>
            </div>
            <div class="">
                <!-- Company list Item -->
                @forelse($companies as $company)
                    <hr>
                    <div class="flex flex-wrap sm:flex-nowrap items-center mb-2 p-2">
                        <div class="w-full md:w-[20%] mr-0 md:mr-10">
                            <div class="responsive-image-container">
                                @if(Str::startsWith($company->logo, 'http'))
                                    <img class="responsive-image object-cover" src="{{$company->logo}}" alt="">
                                @else
                                    <img class="responsive-image object-cover" src="{{url('storage/' . $company->logo)}}" alt="">
                                @endif
                            </div>
                        </div>
                        <ul class="w-full">
                            <li class="flex flex-nowrap items-center">
                                <span class="text-2xl mr-3">{{$company->name}}</span>
                                @if($company->is_featured)
                                    <span>
                                        <button
                                            class="inline-flex items-center bg-neutral-100 mr-1 text-white border border-solid-400 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="w-4 h-4 text-white bg-green-500">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                                            </svg>
                                            <span class="mx-1 text-gray-500 text-xs">Featured</span>
                                        </button>
                                    </span>
                                @endif
                                @if(!$company->is_active)
                                    <span>
                                        <button
                                            class="inline-flex items-center bg-neutral-100 mr-1 text-white border border-solid-400 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                 class="w-4 h-4 text-white bg-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                            <span class="mx-1 text-gray-500 text-xs">In Active</span>
                                        </button>
                                    </span>
                                @endif
                            </li>
                            <li class="w-full flex items-center">
                                <x-bladewind.rating name="star-rating" size="small"/>
                                <button class="inline-flex items-center mr-1 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                                    </svg>
                                    <span class="mx-1 text-gray-500 text-sm">Rate & Review</span>
                                </button>
                            </li>
                            <li class="flex flex-wrap w-full items-center justify-start">
                                <span class="mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-4 h-4 inline-block">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                    </svg>
                                    <span class="mx-1 text-gray-500 text-sm"> {{$company->phone}}</span>
                                </span>
                                @if($company->website)
                                    <span class="mr-1">
                                        @php
                                            // All websites prefixed with https:// if not then add it
                                            $website = parse_url($company->website, PHP_URL_SCHEME) === null ? 'https://' . $company->website : $company->website;
                                        @endphp
                                        <a href="{{$website}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
                                            </svg>
                                            <span class="mx-1 text-gray-500 text-sm">Web</span>
                                        </a>
                                    </span>
                                @endif
                                <span class="mr-1">
                                    <a href="mailto:{{$company->email}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                        </svg>
                                        <span class="mx-1 text-gray-500 text-sm">Email</span>
                                    </a>
                                </span>
                            </li>
                            <li>
                                <p class="text-gray-500 text-sm"><span class="font-bold">Deals In</span>:
                                    @forelse($company->extra_things as $item)
                                        @php
                                            $limitedText = Str::limit($item, 80, '...');
                                        @endphp
                                        <span class="text-gray-500 text-sm">
                                            {{ $limitedText }}
                                            @if (strlen($item) > 80)
                                                <a href="#" class="text-blue-500"
                                                   onclick="showFullText(this)">...More</a>
                                                <span class="full-text" style="display: none;">{{ $item }}</span>
                                            @endif
                                            @if (!$loop->last)
                                                |
                                            @endif
                                        </span>
                                    @empty
                                        <span class="text-gray-500 text-sm">No Products</span>
                                    @endforelse
                                    <script>
                                        function showFullText(link) {
                                            var fullTextSpan = link.nextElementSibling;
                                            link.style.display = 'none';
                                            fullTextSpan.style.display = 'inline';
                                        }
                                    </script>
                                </p>
                            </li>
                            <li class="text-base text-gray-500">
                                {{$company->address->address_line_1}} {{$company->address->address_line_2}}
                                {{$company->address->city->name}} {{$company->address->state->name}} {{$company->address->country->name}}
                                {{$company->address->zip_code}}
                            </li>
                            <li>
                                <button class="inline-flex items-center mr-1 text-gray-500 border border-red-500 transition duration-300 hover:bg-red-500 hover:text-white hover:border-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6 inline-block bg-red-500 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                    <span class="mx-1 my-0 text-gray-500 text-sm hover:text-white">BookMark</span>
                                </button>

                                <button class="inline-flex items-center mr-1 text-gray-500 border border-orange-400 transition duration-300 hover:bg-orange-400 hover:text-white hover:border-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6 inline-block bg-orange-400 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                    </svg>
                                    <span class="mx-1 my-0 text-gray-500 text-sm hover:text-white">Send Enquiry</span>
                                </button>

                                <button onclick="window.location.href = '{{route('view.company', [$company->slug])}}'" class="inline-flex items-center mr-1 text-gray-500 border border-purple-500 transition duration-300 hover:bg-purple-500 hover:text-white hover:border-purple-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6 inline-block bg-purple-500 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                    <span class="mx-1 my-0 text-gray-500 text-sm hover:text-white">View More</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                @empty
                    <h1 class="text-gray-500 text-4xl text-center mt-10">No Company Found</h1>
                @endforelse
                <!-- Pagination -->
                {{ $companies->links() }}
            </div>
        </div>
        @include('includes.sidebar')
    </div>
@endsection

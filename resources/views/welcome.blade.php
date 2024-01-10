@php use App\classes\HelperFunctions; @endphp
@php use Carbon\Carbon; @endphp
@extends('layouts.user')

@section('head')
    <style>
        .s-form > [type="text"]:focus {
            outline: none;
            border: none;
            --tw-ring-color: #fff;
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 4px 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1;
        }

        .search-results a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
            text-align: start;
        }

        .search-results a:hover {
            background-color: #f0f0f0;
        }
    </style>
@endsection

@section('page-scripts')
    <script>
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', async function () {
            const inputValue = this.value.trim().toLowerCase();

            // Check if inputValue is at least 3 characters
            if (inputValue.length >= 3) {
                const searchURL = "{{ route('api.search', ['search' => '__input__']) }}".replace('__input__', inputValue);

                try {
                    // Fetch data from the search endpoint
                    const response = await fetch(searchURL);
                    const searchData = await response.json();
                    const data = searchData.data;
                    console.log(data)

                    // Clear previous results
                    searchResults.innerHTML = '';

                    // Filter and display results
                    data.forEach(result => {
                        const [name, slug, type] = result;
                        const resultElement = document.createElement('a');
                        resultElement.textContent = name;

                        // Generate a link based on the type of item
                        if (type === 'company') {
                            resultElement.href = "{{ route('view.company', ['slug' => '__slug__']) }}".replace('__slug__', slug);
                        } else if (type === 'product') {
                            resultElement.href = "{{ route('view.product', ['slug' => '__slug__']) }}".replace('__slug__', slug);
                        }
                        console.log(resultElement.href)

                        searchResults.appendChild(resultElement);
                        // Show or hide the result container based on the input length
                        searchResults.style.display = inputValue.length >= 3 ? 'block' : 'none';
                    });
                } catch (error) {
                    console.error('Error fetching search results:', error);
                }
            }
        });
        const card = document.getElementById('categoryCard');
    </script>
@endsection

@section('content')
    <!-- Search Section -->
    <section class="relative py-8 md:h-[60vh] flex flex-col items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-green-300 to-purple-500 opacity-25"></div>
        <div class="mx-auto text-center relative z-10 ">
            <h1 class="md:text-3xl text-xl lg:text-5xl font-semibold text-dark mb-2">Discover Top Companies and Products</h1>
            <p class="text-dark text-xs md:text-lg mb-4">Explore a vast network of five lakh+ businesses and products
                for your needs</p>
            <form action="{{ route('search') }}"
                  class="mt-2 md:mt-4 flex items-center justify-center rounded-full p-2 pl-1 relative bg-white w-[80vw] md:w-full m-auto md:p-4 md:pl-2">
                <div class="relative flex items-center justify-between w-full s-form">
                    <label for="searchInput" class="sr-only">Search</label>
                    <input id="searchInput" name="q" type="text" placeholder="Type at least 3 characters"
                           class="search-input focus:outline-none px-1 py-1 rounded-full border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full placeholder:text-xs md:placeholder:text-base md:px-6 md-py-2">
                    <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 w-auto rounded-full ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse">
                        <i class='bx bx-search-alt-2 md:hidden'></i>
                        <span class="hidden sm:block md:block lg:block">Search</span>
                    </button>
                </div>
                <div id="searchResults" class="search-results mt-2"></div>
            </form>
        </div>
    </section>
    <!-- Main Content -->
    <section class="container mx-auto">
        <!-- Top Categories -->
        <section class="p-2 my-1 md:p-8 md:my-4">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Categories</h1>
                    <a href="{{ route('company')}}"
                       class="md:bg-purple-700 text-white rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out underline md:no-underline md:px-4 md:py-2">
                        <span class="text-purple-500 md:text-white">Explore All</span>
                        {{-- Icon --}}
                        <i class='bx bx-link-external p-1 text-purple-500 md:hidden'></i>
                    </a>
                </div>
                <hr class="my-2 md:my-5">
                <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-6 gap-1 md:gap-3">
                    <!-- Category Card 1 -->
                    @forelse($category as $item)
                        <x-bladewind.card
                            class="cursor-pointer bg-indigo-100 hover:shadow-gray-400 flex flex-col items-center justify-center" :reducePadding="true">
                            <img src="{{ url('storage/' . $item->image) }}" alt="{{$item->name}}"
                                 class="w-[50px] h-[50px] md:w-[80px] md:h-[80px] object-contain rounded-full"/>
                            <p class="text-center text-xs md:text-base lg:text-xl bold italic mt-2">{{$item->name}}</p>
                            <p class="hidden md:block text-center text-base md:text-xl bold mt-2">({{$item->countItem()}})</p>
                        </x-bladewind.card>
                    @empty
                        <p class="text-gray-700">No categories available.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Featured Companies -->
        <section class="p-2 my-1 md:p-8 md:my-4">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Featured Companies</h1>
                    <a href="{{ route('company') }}"
                       class="md:bg-purple-700 text-white rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out underline md:no-underline md:px-4 md:py-2">
                        <span class="text-purple-500 md:text-white">Explore All</span>
                        {{-- Icon --}}
                        <i class='bx bx-link-external p-1 text-purple-500 md:hidden'></i>
                    </a>
                </div>
                <hr class="my-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-8">
                    @forelse($companies as $company)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 flex md:flex-col items-start md:items-center md:justify-center">
                            <a href="{{ route('view.company', [$company->slug]) }}" class="w-[150px] h-[150px] md:w-full md:p-4 md:m-auto md:block md:h-full object-contain">
                                <img alt="company photo" src="{{ url('storage/' . $company->logo) }}" class="w-[150px] h-[150px] md:w-full md:h-48 object-contain"/>
                            </a>
                            <div class="p-1 md:p-2 flex flex-col items-start md:items-center justify-center">
                                <h3 class="text-base md:text-lg font-bold md:text-center text-indigo-900 mb-2">{{ $company->name }}</h3>
                                <p class="text-red-700 text-center text-xs md:text-sm">{{ $company->address->country->name }}</p>
                                <h2 class="text-sm md:text-base bold italic underline text-indigo-700 mt-2">Deals In</h2>
                                <p class="text-gray-700 text-center text-xs md:text-sm">{{ $company->dealsIn() }}</p>
                            </div>
                            <div class="absolute bottom-0 right-1 mb-2 w-auto md:w-[calc(80%-1rem)]">
                                <a href="{{ route('view.company', [$company->slug]) }}"
                                   class="text-purple-500 mb-1 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center text-xs md:text-base">
                                    <span class="ml-1">View Profile &nbsp;</span>
                                    <i class='bx bx-link-external mr-2'></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700">No featured companies available.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Top Products -->
        <section class="p-2 my-1 md:p-8 md:my-4">
            <div class="flex justify-between items-center">
                <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Explore Top Products</h1>
                <a href="{{ route('products') }}"
                   class="md:bg-purple-700 text-white rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out underline md:no-underline md:px-4 md:py-2">
                    <span class="text-purple-500 md:text-white">Explore All</span>
                    {{-- Icon --}}
                    <i class='bx bx-link-external p-1 text-purple-500 md:hidden'></i>
                </a>
            </div>
            <hr class="my-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($products as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 flex flex-col items-center justify-center">
                        <a href="{{route('view.product', [$item->slug])}}"
                           class="w-full block h-full object-contain">
                            <img alt="product photo" src="{{ url('storage/' . $item->thumbnail) }}"
                                 class="w-full h-48 object-contain"/>
                        </a>
                        <header class="flex my-2 font-light text-base items-center">
                            <i class="bx bx-category text-indigo-500 mr-1"></i>
                            <p>{{$item->category->name}}</p>
                        </header>
                        <p class="text-xl font-medium mb-2">{{ $item->name }}</p>
                        <div class="mb-2 w-[calc(80%-1rem)]">
                            <a href="{{ route('view.product', [$item->slug]) }}"
                               class="text-purple-500 mb-1 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 mb-4 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center">
                                Enquire Now &nbsp;
                                <i class='bx bx-link-external text-2xl mr-2'></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-700 text-center col-span-full">No listings found.</p>
                @endforelse
            </div>
        </section>

        <!-- Featured Events -->
        <section class="p-2 my-1 md:p-8 md:my-4">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Featured Events</h1>
                    <a href="{{ route('events') }}"
                       class="md:bg-purple-700 text-white rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out underline md:no-underline md:px-4 md:py-2">
                        <span class="text-purple-500 md:text-white">Explore All</span>
                        {{-- Icon --}}
                        <i class='bx bx-link-external p-1 text-purple-500 md:hidden'></i>
                    </a>
                </div>
                <hr class="my-5">
                <div class="owl-carousel grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($events as $event)
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                            <div class="each relative">
                                <img src="{{ url('storage/'.$event->thumbnail) }}"
                                     class="w-full h-48 object-cover rounded-t-lg" alt="Event">
                                <div
                                    class="badge absolute top-0 right-0 bg-purple-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">
                                    @php
                                        $date = Carbon::parse($event->start);
                                    @endphp
                                    {{$date->diffForHumans()}}
                                </div>
                                <div class="desc p-4 text-gray-800">
                                    <div class="flex items-center mt-2">
                                        <img class='w-10 h-10 object-cover rounded-full' alt='User avatar'
                                             src='https://ui-avatars.com/api/?name={{$event->user->name}}'/>
                                        <div class="pl-3">
                                            <div class="font-medium">
                                                {{$event->user->name}}
                                            </div>
                                            <div class="text-gray-600 text-sm">
                                                {{$event->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('view.event', [$event->slug])}}" target="_new"
                                       class="my-3 title font-bold block cursor-pointer hover:underline">{{$event->title}}</a>
                                    <span class="description text-sm block py-2 border-gray-400 mb-2">
                                            @php
                                                $description = strip_tags($event->description);
                                                $description = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
                                            @endphp
                                        {!! $description !!}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700">No featured events available.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="text-gray-600 body-font mt-3">
            <div class="px-5 py-4 mx-auto">
                <div class="text-center mb-10">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">
                        Why Choose Us
                    </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500">
                        In the picturesque village of Jam Kalyanpur, we take pride in our commitment to excellence.
                        Explore why choosing us is a decision you won't regret.
                    </p>
                    <div class="flex mt-6 justify-center">
                        <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="hp-4 flex flex-col text-center items-center card">
                        <div
                            class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                            <i class="mdi mdi-earth"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Promote your business
                                worldwide</h2>
                            <p class="leading-relaxed text-base">
                                As a full-stack apprentice intern in the heart of Kathiawar,
                                specializing in Angular and .NET Core,
                                I bring the world to your business.
                            </p>
                        </div>
                    </div>
                    <div class="p-4 flex flex-col text-center items-center card">
                        <div
                            class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                            <i class="mdi mdi-chat-processing"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Direct Chat with business
                                lister</h2>
                            <p class="leading-relaxed text-base">
                                Engage in direct conversations with me, your dedicated full-stack developer, ensuring
                                your requirements are met efficiently.
                            </p>
                        </div>
                    </div>
                    <div class="p-4 flex flex-col text-center items-center card">
                        <div
                            class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 flex-shrink-0">
                            <i class="mdi mdi-account-group"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Find Millions of buyers</h2>
                            <p class="leading-relaxed text-base">
                                With a dream to become the best game developer and full-stack developer globally, my
                                skills attract millions of potential buyers to your projects.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@extends('layouts.main-user-list')

@section('head')
    <style>
        /* Additional custom styles go here */
        .search-dropdown {
            position: relative;
            display: inline-block;
        }

        .search-input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

                        // Generate link based on the type of item
                        if (type === 'company') {
                            resultElement.href = "{{ route('view.company', ['slug' => '__slug__']) }}".replace('__slug__', slug);
                        } else if (type === 'product') {
                            resultElement.href = "{{ route('view.product', ['slug' => '__slug__']) }}".replace('__slug__', slug);
                        }
                        console.log(resultElement.href)

                        searchResults.appendChild(resultElement);
                        // Show or hide the results container based on the input length
                        searchResults.style.display = inputValue.length >= 3 ? 'block' : 'none';
                    });
                } catch (error) {
                    console.error('Error fetching search results:', error);
                }
            }
        });
    </script>
@endsection

@section('content')
    <!-- Search Section -->
    <section class="bg-white py-4 md:h-[60vh] flex flex-col items-center justify-center">
        <div class="mx-auto w-full md:w-[90%] text-center">
            <h1 class="text-lg sm:text-xl md:text-5xl font-semibold text-blue-900">Discover Top Companies and
                Products</h1>
            <div class="text-gray-600 text-sm sm:text-base md:text-3xl my-4">Explore a vast network of 5 lakh+
                businesses and products for your needs
            </div>
            <div class="mt-2 md:mt-4 flex items-center justify-center">
                <div class="relative ml-2">
                    <label for="searchInput"></label>
                    <div class="search-dropdown">
                        <input id="searchInput"
                               class="search-input rounded-full p-2 md:p-4 w-full md:w-[50vw] focus:outline-none card-hovered"
                               type="text" placeholder="Type at least 3 characters">
                        <div id="searchResults" class="search-results"></div>
                    </div>
                </div>
                <button
                    class="bg-blue-500 text-white p-2 md:p-4 rounded-full ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out w-[40px] md:w-[60px]">
                    <i class='bx bx-search-alt-2 text-base md:text-lg'></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container mx-auto">
        <!-- Top Categories -->
        <section class="bg-neutral-100 p-2">
            <div class="flex justify-between items-center">
                <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Discover Top
                    Categories</h1>
                <a href="{{ url('/') }}"
                   class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                    <span class="hidden md:inline">Explore All</span>
                    {{-- Icon --}}
                    <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                </a>
            </div>
            <hr class="my-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <!-- Category Card 1 -->
                @forelse($category as $item)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{$item->name}}</div>
                            <p class="text-gray-700 text-base">
                                {{ $item->products->count() }}+ Items
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Explore
                                <i class="fas fa-arrow-alt-circle-right ml-2"></i>
                            </a>
                        </div>
                        <hr class="border-b-4 border-purple-500 w-full mt-4 gradient-border">

                    </div>
                @empty
                    <p class="text-gray-700">No categories available.</p>
                @endforelse
            </div>
        </section>

        <!-- Top Products -->
        <section class="mt-6">
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Explore Top
                        Products</h1>
                    <a href="{{ url('/') }}"
                       class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                        <span class="hidden md:inline">Explore All</span>
                        {{-- Icon --}}
                        <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                    </a>
                </div>
                <hr class="my-5">
                <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4">
                    @forelse($products as $item)
                        <div class="flex flex-wrap place-items-center transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                            <div class="overflow-hidden shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-5 hover:shadow-2xl rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                                <a href="{{route('view.product', [$item->slug])}}" class="w-full block h-full object-contain">
                                    <img alt="blog photo" src="{{ url('storage/' . $item->thumbnail) }}" class="max-h-40 w-full object-cover"/>
                                    <div class="bg-white w-full p-4">
                                        <header class="flex font-light text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#b91c1c">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                            </svg>
                                            <p>{{$item->category->name}}</p>
                                        </header>
                                        <div class="flex items-center mt-2">
                                            <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://ui-avatars.com/api/?name={{$item->user->name}}'/>
                                            <div class="pl-3">
                                                <div class="font-medium">
                                                    {{$item->user->name}}
                                                </div>
                                                <div class="text-gray-600 text-sm">
                                                    {{$item->created_at->diffForHumans()}}
                                                </div>
                                            </div>
                                            <div class="flex justify-end">
                                            </div>
                                        </div>
                                        <p class="text-indigo-500 text-2xl font-medium mt-2">{{ $item->name }}</p>
                                        <div class="py-4 border-t border-b text-xs text-gray-700">
                                            <div class="grid grid-cols-6 gap-1">
                                                <div class="col-span-2">
                                                    Rating:
                                                </div>
                                                <div class="col-span-2">
                                                    Views: {{\App\classes\HelperFunctions::getStat('view', 'product', $item->id)}}
                                                </div>
                                                <div class="col-span-2">
                                                    Likes: {{\App\classes\HelperFunctions::getStat('like', 'product', $item->id)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
                        </div>
                    @empty
                        <p class="text-gray-700 text-center col-span-full">No listings found.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Featured Companies -->
        <section class="bg-gray-100 p-8 mb-4 rounded-lg">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Featured Companies</h1>
                    <a href="{{ url('/') }}"
                       class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                        <span class="hidden md:inline">Explore All</span>
                        {{-- Icon --}}
                        <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                    </a>
                </div>
                <hr class="my-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse($companies as $company)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                            <img src="{{ url('storage/' . $company->logo) }}" class="w-full h-48 object-contain"
                                 alt="Company Name">

                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-indigo-900 mb-2">{{$company->name}}</h3>

                                <p class="text-gray-700">{{$company->summary}}</p>

                                <div class="mt-4">
                                    <span
                                        class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">4.5 Rating</span>
                                    <span class="text-gray-600 text-sm">12 reviews</span>
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
                        <p class="text-gray-700">No featured companies available.</p>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Featured Events -->
        <section class="bg-gray-100 p-8 mb-4 rounded-lg">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-base sm:text-2xl md:text-3xl font-semibold inline-block text-blue-900">Featured
                        Events</h1>
                    <a href="{{ url('/') }}"
                       class="bg-purple-700 text-white px-4 py-2 rounded-full flex items-center hover:bg-purple-600 transition duration-300 ease-in-out">
                        <span class="hidden md:inline">Explore All</span>
                        {{-- Icon --}}
                        <i class="mdi mdi-arrow-right-bold-circle-outline text-2xl ml-2"></i>
                    </a>
                </div>
                <hr class="my-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($events as $event)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
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
                    <div class="p-4 flex flex-col text-center items-center card">
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

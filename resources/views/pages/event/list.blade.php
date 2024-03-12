@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Events', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">Search for Events</h1>
        <br>
        <form action=""
              class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Search for Events here! 🚀✨" autocomplete="off"
                       class="search-input focus:outline-none md:px-6 md:py-2 border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full placeholder:text-xs md:placeholder:text-base">
                <button type="submit"
                        class="mx-2 md:mx-0 bg-green-400 text-white md:py-2 md:px-4 w-auto md:w-[calc(100%-700px)] ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse rounded">
                    <span class="flex items-center justify-center">
                        <span class="hidden md:block">Search</span>
                        <!--search icon svg-->
                        <i class='bx bx-search-alt-2 md:hidden p-1'></i>
                    </span>
                </button>
            </div>
            <div id="searchResults" class="search-results mt-2 overflow-auto max-h-[30vh] md:max-h-[40vh] lg:max-h-[50vh]"></div>
        </form>
    </div>
    <div class="container flex items-center justify-between my-4 mx-2 md:mx-auto w-[95vw]">
        {{-- Category Filter--}}
        <div class="flex items-center justify-between mb-4 md:mb-0">
            <label for="product-category-filter" class="text-gray-500 text-lg hidden md:block">
                <i class='bx bx-filter-alt w-5 h-5'></i>
            </label>
            <select name="category" id="product-category-filter"
                    class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-500 w-[125px]"
                    onchange="doFilter()">
                <option value="all" selected>All</option>
                @foreach($categories as $category)
                    @if(request()->get('category') == $category->name)
                        <option selected value="{{ $category->name }}">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="hidden sm:block text-center md:text-left mb-4 md:mb-0">
            <p>
                Showing {{ $events->firstItem() }} - {{ $events->lastItem() }} of {{ $events->total() }} results
            </p>
        </div>
        {{-- Sort By --}}
        <div class="flex items-center justify-between mb-4 md:mb-0">
            <label for="job-country" class="text-gray-500 text-lg hidden md:block">
                <i class='bx bx-filter w-5 h-5 text-lg'></i>
            </label>
            <select name="sort" id="job-country"
                    class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-500 w-[125px]"
                    onchange="doSort()">
                <option value="" @if(!request()->get('country')) selected @endif>By Country</option>
                @forelse($countries as $country)
                    @if(request()->get('country') == $country->id)
                        <option selected value="{{ $country->id }}">{{ $country->name }}</option>
                    @else
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endif
                @empty
                    <option value="all" selected>All</option>
                @endforelse
            </select>
        </div>
    </div>
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2">
            <!-- Event Items-->
            @forelse($events as $event)
                <div class="reveal bg-white rounded-lg shadow-md overflow-hidden mx-2 my-2">
                    <a href="{{route('view.event', [$event->slug])}}" class="each relative">
                        <img src="{{ url('storage/'.$event->thumbnail) }}" class="w-full h-48 object-contain"
                             alt="Event">
                        <div class="desc p-4 text-gray-800">
                            <div class="flex items-center mt-2">
                                <img class='w-10 h-10 object-cover rounded-full' alt='User avatar'
                                     src='https://ui-avatars.com/api/?name={{$event->company->name}}'/>
                                <div class="pl-3">
                                    <div class="font-medium">
                                        {{$event->company->name}}
                                    </div>
                                    <div class="text-gray-600 text-sm">
                                        {{$event->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('view.event', [$event->slug])}}"
                               class="my-3 title font-bold block cursor-pointer hover:underline">{{$event->title}}</a>
                            <div class="md:block flex items-center justify-between">
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center">
                                        <i class='bx bx-calendar text-gray-600'></i>
                                        @php
                                            $date = \Carbon\Carbon::parse($event->start);
                                            $date = $date->format('M d, Y');
                                        @endphp
                                        <span class="text-gray-600 text-sm ml-1">{{$date}}</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center">
                                        <i class='bx bx-current-location text-gray-600'></i>
                                        <span class="text-gray-600 text-sm ml-1">{{$event->address->country->name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-gray-700">No featured events available.</p>
            @endforelse
        </div>
        <hr class="my-5">
        {{$events->links()}}
    </div>
    <x-related-keywords :seo="$seo" :route="'events'"/>
@endsection
@section('page-scripts')
    <script>
        function doFilter() {
            let categoryValue = document.getElementById('product-category-filter').value;
            let sortValue = document.getElementById('job-country').value;
            applyFilters(categoryValue, sortValue);
        }

        function doSort() {
            let sortValue = document.getElementById('job-country').value;
            let categoryValue = document.getElementById('product-category-filter').value;
            applyFilters(categoryValue, sortValue);
        }

        function applyFilters(category, sort) {
            let url = "{{ route('events') }}";
            let params = [];

            if (category !== 'all') {
                params.push('category=' + category);
            }

            if (sort !== 'all') {
                params.push('country=' + sort);
            }

            if (params.length > 0) {
                url += '?' + params.join('&');
            }

            window.location.href = url;
        }
    </script>
    <script>
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', async function () {
            const inputValue = this.value.trim().toLowerCase();

            // Check if inputValue is at least 3 characters
            if (inputValue.length >= 3) {
                const searchURL = "{{ route('api.search.events', ['search' => '__input__']) }}".replace('__input__', inputValue);

                try {
                    await fetch(searchURL)
                        .then(response => response.json())
                        .then(data => {
                            // Clear previous results
                            searchResults.innerHTML = '';
                            // Handle no results
                            if (data.length === 0) {
                                const noResults = document.createElement('p');
                                noResults.textContent = 'No results found';
                                searchResults.appendChild(noResults);
                                // styling padding and margin
                                noResults.style.padding = '8px';
                                noResults.style.margin = '0';
                                searchResults.style.display = 'block';
                                return;
                            }

                            // Filter and display results
                            data.forEach(result => {
                                const resultElement = document.createElement('a');
                                resultElement.textContent = result;
                                resultElement.href = "{{ route('events', ['q' => '__slug__']) }}".replace('__slug__', result);
                                console.log(resultElement.href)

                                searchResults.appendChild(resultElement);
                                // Show or hide the result container based on the input length
                                searchResults.style.display = inputValue.length >= 3 ? 'block' : 'none';
                            });
                        });
                } catch (error) {
                    console.error('Error fetching search results:', error);
                }
            }else{
                searchResults.style.display = 'none';
            }
        });
    </script>
@endsection

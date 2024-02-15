@php
    use App\classes\HelperFunctions;
@endphp
@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Deals', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">Search for thousands of deals & Offers!</h1>
        <br>
        <form action=""
              class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Search for deals here! 🚀✨" autocomplete="off"
                       class="search-input focus:outline-none md:px-6 md:py-2 border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full placeholder:text-xs md:placeholder:text-base">
                <button type="submit"
                        class="mx-2 md:mx-0 bg-green-400 text-white md:py-2 md:px-4 w-auto md:w-[calc(100%-700px)] ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse rounded">
                    <span class="flex items-center justify-center">
                        <span class="hidden md:block">Find Deals</span>
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
        <div class="flex items-center justify-between mb-4 md:mb-0 w-[125px]">
            <label for="deals-category-filter" class="text-gray-500 text-lg hidden md:block">
                <i class='bx bx-filter-alt w-5 h-5'></i>
            </label>
            <select name="category" id="deals-category-filter"
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
                Showing {{ $deals->firstItem() }} - {{ $deals->lastItem() }} of {{ $deals->total() }} results
            </p>
        </div>
        {{-- Sort By --}}
        <div class="flex items-center justify-between mb-4 md:mb-0 w-[125px]">
            <label for="deals-country" class="text-gray-500 text-lg hidden md:block">
                <i class='bx bx-filter w-5 h-5 text-lg'></i>
            </label>
            <select name="sort" id="deals-country"
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
    <div class="container flex flex-col items-center justify-center">
        <!-- Deals List -->
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($deals as $item)
                <div class="reveal flex flex-col items-center justify-center bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 w-[90vw] md:w-full">
                    <!-- Discount ribbon -->
                    @if($item->discount_type !== null && $item->discount_value !== null)
                        <div class="absolute top-0 left-0 bg-red-500 text-white p-1">
                            @if($item->discount_type == 'fixed')
                                <p class="text-xs font-bold">{{ $item->discount_value }}₹ off</p>
                            @endif
                            @if($item->discount_type == 'percentage')
                                <p class="text-xs font-bold">{{ $item->discount_value }}% off</p>
                            @endif
                        </div>
                    @endif
                    <a href="{{ route('view.deal', [$item->slug]) }}"
                       class="h-100 mx-auto p-2">
                        <img alt="deal thumbnail" src="{{ url('storage/' . $item->thumbnail) }}"
                             class="w-[150px] h-[150px] md:w-full md:h-48 object-contain"/>
                    </a>
                    <div class="p-2 flex flex-col items-center justify-center w-full">
                        <p class="text-xs text-gray-400">{{ $item->category->name }}</p>
                        <p class="text-sm font-medium mb-2 text-center h-[55px] overflow-hidden">
                            {{ strlen($item->title) > 80 ? substr($item->title, 0, 80) . '...' : $item->title }}
                        </p>
                        <p class="text-gray-700 text-center text-xs md:text-sm flex justify-center items-center">
                            <span class="text-sm text-red-500 mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525"/>
                                </svg>
                            </span>
                            {{ $item->user->company->address->country->name }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between w-full px-5">
                        <p class="text-xs text-gray-400 line-through">
                            ₹{{ HelperFunctions::formatCurrency($item->price) }}
                        </p>
                        <p class="text-lg font-bold text-gray-700">
                            ₹{{ HelperFunctions::getDiscountedPrice($item->price, $item->discount_type, $item->discount_value) }}
                        </p>
                    </div>
                    <!-- Published time -->
                    <div class="flex items-center justify-center w-full px-5">
                        <p class="text-xs text-gray-400 flex items-center justify-center">
                            <i class='bx bx-time text-lg'></i>
                            {{ $item->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-gray-700 text-center col-span-full">No listings found.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <hr class="my-5">
        {{ $deals->links() }}
    </div>
    <x-related-keywords :seo="$seo" :route="'deals'"/>
@endsection
@section('page-scripts')
    <script>
        function doFilter() {
            let categoryValue = document.getElementById('deals-category-filter').value;
            let sortValue = document.getElementById('deals-country').value;
            applyFilters(categoryValue, sortValue);
        }

        function doSort() {
            let sortValue = document.getElementById('deals-country').value;
            let categoryValue = document.getElementById('deals-category-filter').value;
            applyFilters(categoryValue, sortValue);
        }

        function applyFilters(category, sort) {
            let url = "{{ route('deals') }}";
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
                const searchURL = "{{ route('api.search.deals', ['search' => '__input__']) }}".replace('__input__', inputValue);

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
                                resultElement.href = "{{ route('deals', ['q' => '__slug__']) }}".replace('__slug__', result);
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

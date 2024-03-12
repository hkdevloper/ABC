@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Product', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">Search for thousands of products</h1>
        <br>
        <form action="" class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Search for products here! 🚀✨" autocomplete="off"
                       class="search-input focus:outline-none md:px-6 md:py-2 border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full placeholder:text-xs md:placeholder:text-base">
                <button type="submit" class="mx-2 md:mx-0 bg-green-400 text-white md:py-2 md:px-4 w-auto md:w-[calc(100%-700px)] ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse rounded">
                    <span class="flex items-center justify-center">
                        <span class="hidden md:block">Find Product</span>
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
        {{-- Total Products --}}
        <div class="hidden sm:block text-center md:text-left mb-4 md:mb-0">
            <p>
                Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results
            </p>
        </div>
        {{-- Sort By --}}
        <div class="flex items-center justify-between mb-4 md:mb-0">
            <label for="product-sort-by" class="text-gray-500 text-lg hidden md:block">
                <i class='bx bx-filter w-5 h-5 text-lg'></i>
            </label>
            <select name="sort" id="product-sort-by"
                    class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-500 w-[125px]"
                    onchange="doSort()">
                <option value="" @if(!request()->get('sort')) selected @endif>Sorting</option>
                <option value="name" @if(request()->get('sort') == 'name') selected @endif>Name</option>
                <option value="price-low-to-high" @if(request()->get('sort') == 'price-low-to-high') selected @endif>
                    Price low to high
                </option>
                <option value="price-high-to-low" @if(request()->get('sort') == 'price-high-to-low') selected @endif>
                    Price high to low
                </option>
            </select>
        </div>
    </div>
    <div class="container">
        <!-- Product List -->
        @forelse($products as $key => $item)
            <div class="reveal card p-4 my-4 mx-3 shadow border border-b border-solid border-gray-100 flex flex-col md:flex-row items-center">
                <div class="w-full flex flex-col md:flex-row items-center justify-center">
                    <div class="overflow-hidden mb-4 p-2 md:border-r border-r-1 border-solid border-gray-300">
                        <img class="w-full h-40 object-contain overflow-hidden"
                             src="{{ url('storage/' . $item->thumbnail) }}" width="250"
                             alt="">
                    </div>
                    <div class="flex items-start justify-start flex-col w-full ml-6">
                        <span class="text-base text-gray-500 -mb-1">{{$item->category_name}}</span>
                        <a href="{{ route('view.product', [$item->slug]) }}"
                           class="font-semibold text-xl">{{ $item->name }}</a>
                        <span class="text-base text-gray-500 -mb-1">Condition: {{$item->condition}}</span>
                        <span class="text-base text-gray-500 -mb-1">Brand: {{$item->brand}}</span>
                        <span
                            class="bg-white rounded-full text-orange-500 text-base font-bold px-3 py-2 leading-none flex items-center">₹ {{$item->price}}</span>
                    </div>
                </div>
                <!-- Product List Action -->
                <div class="text-center md:w-[calc(20%-1rem)] text-base flex justify-center items-center my-5 md:my-0">
                    <a href="{{ route('view.product', [$item->slug]) }}"
                       class="text-white bg-green-400 hover:bg-purple-500 hover:text-white rounded-full px-3 py-2 transition duration-300 ease-in-out flex items-center transform hover:-translate-y-1 hover:scale-110">
                    <span class="mr-1 text-center">
                        Enquire Now
                    </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"/>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="w-full text-center">
                <p class="text-gray-500 text-center">No Products Found</p>
            </div>
        @endforelse

        <!-- Pagination -->
        <hr class="my-5">
        {{ $products->links() }}
    </div>
    <div class="container bg-white shadow-md rounded-lg py-4 mt-5 mx-auto w-[90vw]">
        <div class="mx-auto px-4">
            <h2 class="text-lg font-semibold mb-4">Related Keywords:</h2>
            <div class="flex flex-wrap gap-2">
                @forelse($seo as $item)
                    @php
                        $keywordUrl = route('products', ['q' => $item]);
                    @endphp
                    <a href="{{ $keywordUrl }}"
                       class="text-gray-700 bg-gray-200 hover:bg-gray-500 hover:text-white rounded-full px-3 py-1 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                        {{ $item }}
                    </a>
                @empty
                    <p class="text-gray-500">No Related Keywords</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script>
        function doSort() {
            let sortValue = document.getElementById('product-sort-by').value;
            let categoryValue = document.getElementById('product-category-filter').value;
            applyFilters(categoryValue, sortValue);
        }

        function doFilter() {
            let categoryValue = document.getElementById('product-category-filter').value;
            let sortValue = document.getElementById('product-sort-by').value;
            applyFilters(categoryValue, sortValue);
        }

        function applyFilters(category, sort) {
            let url = '{{ route('products') }}';
            let params = [];
            if (category !== 'all') {
                params.push('category=' + category);
            }

            if (sort !== 'default') {
                params.push('sort=' + sort);
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
                    const searchURL = "{{ route('api.search.product', ['search' => '__input__']) }}".replace('__input__', inputValue);

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
                                    resultElement.href = "{{ route('products', ['search' => '__slug__']) }}".replace('__slug__', result);
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

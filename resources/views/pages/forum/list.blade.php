@php use App\classes\HelperFunctions; @endphp
@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Forums', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-2xl w-full text-center font-bold">🔍 Dive into Forum Treasures!</h1>
        <br>
        <form action=""
              class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Unearth knowledge and discussions! 🚀✨" autocomplete="off"
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
        <div class="flex items-center justify-between md:mb-0 w-[125px]">
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
        {{-- Total Forums --}}
        <div class="hidden sm:block text-center md:text-left mb-4 md:mb-0">
            <p>
                Showing {{ $forums->firstItem() }} - {{ $forums->lastItem() }} of {{ $forums->total() }} results
            </p>
        </div>
        {{-- Sort By --}}
        <div class="flex items-center justify-between md:mb-0 w-[125px]">
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
    <div class="container py-6 mx-auto w-[95vw]">
        @forelse($forums as $forum)
            <div class="reveal bg-white card p-2 md:p-6 flex items-start w-full mb-5">
                <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                     class="w-8 h-8 md:w-10 md:h-10 rounded-full mr-2 md:mr-4">
                <div class="w-full">
                    <div class="flex md:flex-row flex-col items-start justify-between mb-2 md:mb-4">
                        <div class="flex items-center">
                            <div>
                                <h2 class="text-sm md:text-base font-semibold text-gray-800">{{$forum->company->name}}</h2>
                                <p class="text-gray-500 text-xs md:text-sm">Posted on {{date_format($forum->created_at, 'd M y')}}</p>
                            </div>
                        </div>
                        <div>
                                <span class="text-gray-600 text-xs md:text-sm">Category:
                                    <span class="text-purple-500">
                                        {{$forum->category->name}}
                                    </span>
                                </span>
                        </div>
                    </div>
                    <h1 class="text-base md:text-lg font-semibold text-gray-900 mb-4">{{$forum->title}}</h1>
                    <div class="text-gray-700 text-xs md:text-sm w-full h-[130px] overflow-hidden">
                        {!! $forum->body !!}
                    </div>
                    <hr class="my-4 border-t-2 border-gray-200">
                    <div class="flex justify-center md:justify-between items-center">
                        <div class="md:block hidden">
                            <span class="block text-gray-600 text-xs md:text-sm">
                                Answers: {{$forum->countAnswers()}}
                            </span>
                        </div>
                        <button onclick="window.location.href = '{{route('view.forum', [$forum->id, \Illuminate\Support\Str::slug($forum->title)])}}'"
                                class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-xs px-3 py-2 md:px-4 md:py-2 rounded-full focus:outline-none">
                            Leave an Answer
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white card p-2 md:p-6">
                <h1 class="text-lg font-semibold text-gray-900 mb-4 text-center">No Forum Found</h1>
            </div>
        @endforelse
        <!-- Pagination -->
        {{$forums->links()}}
    </div>
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
            let url = "{{ route('forum') }}";
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
                const searchURL = "{{ route('api.search.forums', ['search' => '__input__']) }}".replace('__input__', inputValue);

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
                                resultElement.href = "{{ route('forum', ['q' => '__slug__']) }}".replace('__slug__', result);
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

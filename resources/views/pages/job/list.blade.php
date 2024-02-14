@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Jobs', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-2xl w-full text-center font-bold">Explore the Depths: Find Your Next Fascinating JOB!</h1>
        <br>
        <form action="" class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Uncover Your Professional Destiny! 🚀✨" autocomplete="off"
                       class="search-input focus:outline-none md:px-6 md:py-2 border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full placeholder:text-xs md:placeholder:text-base">
                <button type="submit" class="mx-2 md:mx-0 bg-green-400 text-white md:py-2 md:px-4 w-auto md:w-[calc(100%-700px)] ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse rounded">
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
{{--    <x-user.bread-crumb :data="['Home', 'Job', 'List']"/>--}}
    <div class="container mx-2 md:mx-auto flex items-center justify-between my-8">
        {{-- Category Filter--}}
        <div class="">
            <label for="product-category-filter" class="text-gray-500 text-lg">
                <i class='bx bx-filter-alt w-5 h-5'></i>
            </label>
            <select name="category" id="product-category-filter" class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-500 w-[150px]" onchange="doFilter()">
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
        <div class="mx-4 md:mx-0">
            <p class="text-xs md:text-base">
                Showing {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} of {{ $jobs->total() }} results
            </p>
        </div>
        {{-- Sort By --}}
        <div class="overflow-hidden">
            <label for="job-country" class="text-gray-500 text-lg">
                <i class='bx bx-filter w-5 h-5 text-lg'></i>
            </label>
            <select name="sort" id="job-country"
                    class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-500 w-[150px]"
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
    <div class="container mx-auto py-6 w-[90vw] md:w-full">
        <!-- Existing content remains unchanged -->
        @forelse($jobs as $job)
            <div class="reveal flex flex-col md:flex-row company-card bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 items-center justify-center p-4 md:p-2 mb-5">
                <div class="mb-4 p-2 md:pr-3">
                    <img class="w-full h-40 md:h-20 object-contain overflow-hidden" src="{{ url('storage/' . $job->thumbnail) }}" alt="">
                </div>
                <div class="w-full mx-2 ml-5 pl-3 flex flex-col items-start justify-stretch md:flex-grow border-r border-solid border-r-gray-300">
                    <a href="{{ route('view.job', [$job->slug]) }}" class="flex flex-nowrap items-center mb-3">
                        <span class="text-2xl mr-3">{{$job->title}}</span>
                    </a>
                    <div class="text-base text-gray-500 mb-3">
                        <i class='bx bx-been-here text-red-500'></i> {{$job->address->state->name}}, {{$job->address->country->name}}
                    </div>
                    <div class="text-purple-600">
                        {{$job->organization}}
                    </div>
                </div>
                <div class="w-full mx-auto md:w-[calc(20%-1rem)]">
                    <a href="{{ route('view.job', [$job->slug]) }}" class="text-purple-500 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 mt-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center">
                        {{$job->employment_type}} &nbsp;
                    </a>
                </div>
            </div>
        @empty
            <h1 class="text-gray-500 text-4xl text-center mt-10">No Jobs Found</h1>
        @endforelse
        <!-- Pagination -->
        <hr class="my-5">
        {{ $jobs->links() }}
    </div>
    <x-related-keywords :seo="$seo" :route="'jobs'"/>
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
            let url = "{{ route('jobs') }}";
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
                const searchURL = "{{ route('api.search.jobs', ['search' => '__input__']) }}".replace('__input__', inputValue);

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
                                resultElement.href = "{{ route('jobs', ['q' => '__slug__']) }}".replace('__slug__', result);
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

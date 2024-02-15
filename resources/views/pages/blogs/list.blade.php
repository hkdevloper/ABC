@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Blogs', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-2xl w-full text-center font-bold">Explore the Depths: Find Your Next Fascinating Read!</h1>
        <br>
        <form action="" class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Unleash your creativity and start typing your masterpiece here! 🚀✨" autocomplete="off"
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
    <div class="container flex items-center justify-between my-4 md:my-8 mx-2 md:mx-auto">
        {{-- Category Filter--}}
        <div class="flex items-center justify-between md:mb-4 md:mb-0">
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
        {{-- Total blogs --}}
        <div class="flex items-center justify-center">
            <p class="text-sm md:text-base">
                Showing {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} of {{ $blogs->total() }} results
            </p>
        </div>
    </div>
    <div class="container">
        <!-- Blog List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse($blogs as $item)
                <div class="reveal bg-white rounded-lg shadow-md flex flex-col items-center justify-between mx-4">
                    <div class="p-6  flex flex-col items-center justify-between">
                        <img src="{{url('storage/'.$item->thumbnail)}}" alt="Blog Thumbnail" class="w-full h-40 object-cover mb-4 rounded-md">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{$item->title}}</h2>
                        <p class="text-gray-600 mb-4">
                            {!! Str::limit($item->summary, 80) !!}
                        </p>
                    </div>

                    <a href="{{route('view.blog', $item->slug)}}" class="text-blue-500 hover:underline text-center accent-auto mx-auto my-4 pt-2 w-full" style="border-top: 1px solid lightgray;">
                        Continue Reading
                    </a>
                </div>
            @empty
                <div class="w-full text-center">
                    <p class="text-gray-500 text-center">No Blogs Found</p>
                </div>
            @endforelse
        </div>
        <!-- Pagination -->
        <hr class="my-5">
        {{$blogs->links()}}
    </div>
    <x-related-keywords :seo="$seo" :route="'blogs'"/>
@endsection

@section('page-scripts')
    <script>
        function doFilter() {
            let categoryValue = document.getElementById('product-category-filter').value;
            applyFilters(categoryValue);
        }

        function applyFilters(category) {
            let url = '{{ route('blogs') }}';
            let params = [];

            if (category !== 'all') {
                params.push('category=' + category);
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
                const searchURL = "{{ route('api.search.blogs', ['search' => '__input__']) }}".replace('__input__', inputValue);

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
                                resultElement.href = "{{ route('blogs', ['q' => '__slug__']) }}".replace('__slug__', result);
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


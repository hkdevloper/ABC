@extends('layouts.user')

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
                    await fetch(searchURL)
                        .then(response => response.json())
                        .then(data => {
                            // Clear previous results
                            searchResults.innerHTML = '';

                            // Filter and display results
                            data.forEach(result => {
                                const resultElement = document.createElement('a');
                                resultElement.textContent = result;
                                resultElement.href = "{{ route('search', ['q' => '__slug__']) }}".replace('__slug__', result);
                                console.log(resultElement.href)

                                searchResults.appendChild(resultElement);
                                // Show or hide the result container based on the input length
                                searchResults.style.display = inputValue.length >= 3 ? 'block' : 'none';
                            });
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
    <section class="relative py-8 md:h-[60vh] flex flex-col items-center justify-center overflow-visible">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-green-300 to-purple-500 opacity-25"></div>
        <div class="mx-auto text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-semibold text-dark mb-2">Discover Top Companies and Products</h1>
            <p class="text-dark text-base md:text-lg mb-4">Explore a vast network of five lakh+ businesses and products
                for your needs</p>
            <form action="{{ route('search') }}"
                  class="mt-2 md:mt-4 flex items-center justify-center rounded-full p-4 pl-2 relative bg-white w-100">
                <div class="relative flex items-center justify-between w-full s-form">
                    <label for="searchInput" class="sr-only">Search</label>
                    <input id="searchInput" name="q" type="text" placeholder="Type at least 3 characters" autocomplete="off"
                           class="search-input focus:outline-none px-6 py-2 rounded-full border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full">
                    <button type="submit"
                            class="bg-blue-500 text-white py-2 px-4 w-auto rounded-full ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse">
                        <span class="inline">Search</span>
                    </button>
                </div>
                <div id="searchResults" class="search-results mt-2"></div>
            </form>
        </div>
    </section>
    <!-- Main Content -->
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Product List -->
        @forelse($products as $key => $item)
            <div class="reveal card p-4 my-4 mx-3 shadow border border-b border-solid border-gray-100 flex flex-col md:flex-row items-center w-full">
                <div class="w-full flex flex-col md:flex-row items-center justify-center">
                    <div class="overflow-hidden mb-4 p-2 md:border-r border-r-1 border-solid border-gray-300">
                        <img class="w-full h-40 object-contain overflow-hidden"
                             src="{{ url('storage/' . $item->thumbnail) }}" width="250"
                             alt="">
                    </div>
                    <div class="flex items-start justify-start flex-col w-full ml-6">
                        <a href="{{ route('view.product', [$item->slug]) }}"
                           class="font-semibold text-2xl">{{ $item->name }}</a>
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
    <div class="container bg-white shadow-md rounded-lg py-4">
        <div class=" mx-auto px-4">
            <h2 class="text-lg font-semibold mb-2">Related Keywords:</h2>
            <div class="flex flex-wrap">
                @forelse($seo as $item)
                    <a href="{{route('search', ['q' => $item])}}" class="bg-purple-500 hover:bg-blue-600 text-white text-base py-1 px-2 rounded-full mr-2 mb-2">
                        {{ $item }}
                    </a>
                @empty
                    <p>No Related Keywords</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

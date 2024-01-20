@extends('layouts.user')

@section('content')
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-2xl w-full text-center font-bold">Explore the Depths: Find Your Next Fascinating Read!</h1>
        <br>
        <form action="" class="mt-2 md:mt-4 flex items-center justify-center p-4 pl-2 relative bg-white w-2/3 shadow">
            <div class="relative flex items-center justify-between w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Unleash your creativity and start typing your masterpiece here! 🚀✨"
                       class="typing-placeholder search-input focus:outline-none px-6 py-2 border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full">
                <button type="submit" class="bg-green-400 text-white py-2 px-4 w-[calc(100%-700px)] ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse rounded">
                    <span class="inline">Search</span>
                </button>
            </div>
            <div id="searchResults" class="search-results mt-2"></div>
        </form>
    </div>
    <div class="container flex items-center justify-between my-8">
        {{-- Category Filter--}}
        <div class="">
            <label for="product-category-filter" class="text-gray-500">Filter by Category</label>
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
        <div class="">
            <p>
                Showing {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} of {{ $blogs->total() }} results
            </p>
        </div>
    </div>
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
    <div class="container">
        <!-- Blog List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
            @forelse($blogs as $item)
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-between">
                    <img src="{{url('storage/'.$item->thumbnail)}}" alt="Blog Thumbnail" class="w-full h-40 object-cover mb-4 rounded-md">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">{{$item->title}}</h2>
                    <p class="text-gray-600 mb-4">
                        {{Str::limit($item->description, 80)}}
                    </p>
                    <hr>
                    <a href="{{route('view.blog', $item->slug)}}" class="text-blue-500 hover:underline text-center accent-auto">Read More</a>
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
@endsection

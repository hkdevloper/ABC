@extends('layouts.user')

@section('content')
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-2xl w-full text-center font-bold">Explore the Depths: Find Your Next Fascinating Read!</h1>
        <br>
        <form action="" class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Unleash your creativity and start typing your masterpiece here! 🚀✨"
                       class="search-input focus:outline-none md:px-6 md:py-2 border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full placeholder:text-xs md:placeholder:text-base">
                <button type="submit" class="mx-2 md:mx-0 bg-green-400 text-white md:py-2 md:px-4 w-auto md:w-[calc(100%-700px)] ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse rounded">
                    <span class="flex items-center justify-center">
                        <span class="hidden md:block">Search</span>
                        <!--search icon svg-->
                        <i class='bx bx-search-alt-2 md:hidden p-1'></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
    <div class="container flex items-center justify-between my-4 md:my-8 mx-2 md:mx-auto">
        {{-- Category Filter--}}
        <div class="overflow-hidden">
            <label for="product-category-filter" class="text-gray-500 text-lg">
                <i class='bx bx-filter-alt w-5 h-5'></i>
            </label>
            <select name="category" id="product-category-filter"
                    class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-500 w-[150px]"
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
        <div class="hidden md:block">
            <p>
                Showing {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} of {{ $blogs->total() }} results
            </p>
        </div>
    </div>
    <div class="block w-full my-2 md:hidden">
        <p class="text-center">
            Showing {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} of {{ $blogs->total() }} results
        </p>
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
@endsection

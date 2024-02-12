@php use App\classes\HelperFunctions; @endphp
@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Forums', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-2xl w-full text-center font-bold">🔍 Dive into Forum Treasures!</h1>
        <br>
        <form action="" class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Unearth knowledge and discussions! 🚀✨"
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
        {{-- Total Products --}}
        <div class="hidden md:block">
            <p>
                Showing {{ $forums->firstItem() }} - {{ $forums->lastItem() }} of {{ $forums->total() }} results
            </p>
        </div>
    </div>
    <script>
        function doFilter() {
            let categoryValue = document.getElementById('product-category-filter').value;
            applyFilters(categoryValue);
        }

        function applyFilters(category) {
            let url = "{{ route('forum') }}";
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
    <div class="container py-6 mx-auto">
        <div class="w-full">
            <!-- Forum list Item -->
            @forelse($forums as $forum)
                <div class="reveal bg-white card p-6 flex items-start w-full mb-5">
                    <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                         class="w-10 h-10 rounded-full mr-4">
                    <div class="w-full">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div>
                                    <h2 class="text-base font-semibold text-gray-800">{{$forum->user->name}}</h2>
                                    <p class="text-gray-500 text-sm">Posted on {{date_format($forum->created_at, 'd M y')}}</p>
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-600 text-sm">Category: <span class="text-purple-500">{{$forum->category->name}}</span></span>
                            </div>
                        </div>
                        <h1 class="text-lg font-semibold text-gray-900 mb-4">{{$forum->title}}</h1>
                        <p class="text-gray-700 text-sm">
                            {!! \Illuminate\Support\Str::limit($forum->body, 200) !!}
                        </p>
                        <hr class="my-4 border-t-2 border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-600 text-sm">{{$forum->countAnswers()}} Answers</span>
                                <span class="ml-4 text-gray-600 text-sm">{{HelperFunctions::getStat('view', 'forum', $forum->id)}} Views</span>
                            </div>
                            <div>
                                <button onclick="window.location.href = '{{route('view.forum', [$forum->id, \Illuminate\Support\Str::slug($forum->title)])}}'"
                                        class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded-full focus:outline-none">
                                    Leave an Answer
                                </button>
                                <button class="text-purple-500 hover:underline ml-2">
                                    <i class='bx bx-share-alt'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white card p-6">
                    <h1 class="text-lg font-semibold text-gray-900 mb-4 text-center">No Forum Found</h1>
                </div>
            @endforelse
        </div>
        <!-- Pagination -->
        {{$forums->links()}}
    </div>
@endsection

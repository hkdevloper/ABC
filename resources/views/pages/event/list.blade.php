@extends('layouts.user')

@section('content')
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">Search for Events</h1>
        <br>
        <form action="{{ route('search') }}"
              class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Search for Events here! 🚀✨"
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
                Showing {{ $events->firstItem() }} - {{ $events->lastItem() }} of {{ $events->total() }} results
            </p>
        </div>
        {{-- Sort By --}}
        <div class="overflow-hidden">
            <label for="product-sort-by" class="text-gray-500 text-lg">
                <i class='bx bx-filter w-5 h-5 text-lg'></i>
            </label>
            <select name="sort" id="product-sort-by"
                    class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm text-gray-500 w-[150px]"
                    onchange="doSort()">
                <option value="" @if(!request()->get('sort')) selected @endif>Select sorting</option>
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
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2">
            <!-- Event Items-->
            @forelse($events as $event)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="each relative">
                        <img src="{{ url('storage/'.$event->thumbnail) }}" class="w-full h-48 object-contain"
                             alt="Event">
                        <div class="desc p-4 text-gray-800">
                            <div class="flex items-center mt-2">
                                <img class='w-10 h-10 object-cover rounded-full' alt='User avatar'
                                     src='https://ui-avatars.com/api/?name={{$event->user->name}}'/>
                                <div class="pl-3">
                                    <div class="font-medium">
                                        {{$event->user->name}}
                                    </div>
                                    <div class="text-gray-600 text-sm">
                                        {{$event->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('view.event', [$event->slug])}}"
                               class="my-3 title font-bold block cursor-pointer hover:underline">{{$event->title}}</a>
                            <span class="description text-sm block py-2 border-gray-400 mb-2">
                                        @php
                                            $description = strip_tags($event->description);
                                            $description = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
                                        @endphp
                                {!! $description !!}
                                    </span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-700">No featured events available.</p>
            @endforelse
        </div>
        {{$events->links()}}
    </div>
@endsection

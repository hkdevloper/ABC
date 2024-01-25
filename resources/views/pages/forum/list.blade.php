@php use App\classes\HelperFunctions; @endphp
@extends('layouts.user')

@section('content')
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
            </select>
        </div>
        {{-- Total Products --}}
        <div class="hidden md:block">
            <p>
                Showing {{ $forums->firstItem() }} - {{ $forums->lastItem() }} of {{ $forums->total() }} results
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
            </select>
        </div>
    </div>
    <div class="container py-6 mx-auto">
        <div class="w-full">
            <!-- Forum list Item -->
            @forelse($forums as $forum)
                <div class="bg-white card p-6 flex items-start w-full">
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
                        <p class="text-gray-700 text-sm"></p>
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

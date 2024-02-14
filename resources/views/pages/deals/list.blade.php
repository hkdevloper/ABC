@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Deals', 'List']"/>
    <div class="flex flex-col justify-center items-center bg-green-50 h-[200px]">
        <h1 class="block text-lg md:text-4xl w-full text-center font-bold">Search for thousands of deals & Offers!</h1>
        <br>
        <form action="{{ route('search') }}" class="mt-2 md:mt-4 flex items-center justify-center md:p-4 md:pl-2 relative bg-white md:w-2/3 shadow">
            <div class="relative flex items-center justify-between md:w-full s-form">
                <label for="searchInput" class="sr-only">Search</label>
                <input id="searchInput" name="q" type="text" placeholder="Search for deals here! 🚀✨"
                       class="search-input focus:outline-none md:px-6 md:py-2 border-none outline-none focus:border-none transition-all duration-300 ease-in-out w-full placeholder:text-xs md:placeholder:text-base">
                <button type="submit" class="mx-2 md:mx-0 bg-green-400 text-white md:py-2 md:px-4 w-auto md:w-[calc(100%-700px)] ml-2 hover:bg-blue-600 transition-all duration-300 ease-in-out flex items-center justify-center flex-row-reverse rounded">
                    <span class="flex items-center justify-center">
                        <span class="hidden md:block">Find Deals</span>
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
                Showing {{ $deals->firstItem() }} - {{ $deals->lastItem() }} of {{ $deals->total() }} results
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
    <div class="block w-full my-2 md:hidden">
        <p class="text-center">
            Showing {{ $deals->firstItem() }} - {{ $deals->lastItem() }} of {{ $deals->total() }} results
        </p>
    </div>
    <div class="container">
        <!-- Deals List -->
        @forelse($deals as $item)
            <div class="reveal hidden md:flex bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 flex-col items-center justify-center w-[90vw] md:w-full">
                @if($item->is_featured)
                    <div class="absolute top-0 left-0 bg-red-500 text-white p-1 px-2 text-xs font-bold rounded">
                        Featured
                    </div>
                @endif
                <a href="{{ route('view.product', [$item->slug]) }}"
                   class="w-[150px] h-[150px] md:w-full md:p-4 md:m-auto md:block md:h-full object-contain">
                    <img alt="company photo" src="{{ url('storage/' . $item->thumbnail) }}"
                         class="w-[150px] h-[150px] md:w-full md:h-48 object-contain"/>
                </a>
                <div class="p-2 flex flex-col items-center justify-center">
                    <header class="flex my-2 font-light text-base items-center">
                        <i class="bx bx-category text-indigo-500 mr-1"></i>
                        <p>{{ $item->category->name }}</p>
                    </header>
                    <p class="text-xl font-medium mb-2 text-center">{{ $item->name }}</p>
                    <p class="text-red-700 text-center text-xs md:text-sm">{{ $item->company->name }}</p>
                    <p class="text-gray-700 text-center text-xs md:text-sm">{{ $item->company->address->country->name }}</p>
                    <p class="text-gray-700 text-center text-xs md:text-sm">Price:
                        ₹{{ HelperFunctions::formatCurrency($item->price) }}</p>
                </div>
            </div>
            <div class="reveal bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 flex md:flex-col items-start md:items-center md:justify-center">
                @if($item->is_featured)
                    <div class="absolute top-0 left-0 bg-red-500 text-white p-1 px-2 text-xs font-bold rounded" style="z-index: 99">
                        Featured
                    </div>
                @endif
                <a href="{{ route('view.product', [$item->slug]) }}" class="w-[100px] md:w-full h-[80px] md:p-4 md:m-auto md:block md:h-full object-contain">
                    <img alt="company photo" src="{{ url('storage/' . $item->thumbnail) }}" class="w-full h-full object-cover img-remove-bg"/>
                </a>
                <div class="p-1 ml-2 md:p-2 flex flex-col items-start md:items-center md:justify-center w-full">
                    <header class="flex my-2 font-light text-xs md:text-base items-center">
                        <i class="bx bx-category text-indigo-500 mr-1"></i>
                        <p>{{ $item->category->name }}</p>
                    </header>
                    <p class="text-sm md:text-xl font-medium mb-2">{{ $item->name }}</p>
                    <p class="text-red-700 text-xs md:text-sm">{{ $item->company ? $item->company->name: '' }}</p>
                    <p class="text-gray-700 text-xs md:text-sm">{{ $item->company? $item->company->address->country->name : '' }}</p>
                    <p class="text-gray-700 text-xs md:text-sm">Price: ₹{{ HelperFunctions::formatCurrency($item->price) }}</p>
                    <div class="block md:hidden md:static mb-2 w-full">
                        <a href="{{ route('view.product', [$item->slug]) }}" class="text-purple-500 mb-1 rounded-full p-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center text-xs md:text-base">
                            <span class="ml-1">Enquire Now &nbsp;</span>
                            <i class='bx bx-link-external mr-2'></i>
                        </a>
                    </div>
                </div>
                <div class="hidden md:block absolute bottom-0 md:static right-1 mb-2 w-full md:w-[calc(80%-1rem)]">
                    <a href="{{ route('view.product', [$item->slug]) }}" class="text-purple-500 mb-1 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center text-xs md:text-base">
                        <span class="ml-1">Enquire Now &nbsp;</span>
                        <i class='bx bx-link-external mr-2'></i>
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-700 text-center col-span-full">No listings found.</p>
        @endforelse

        <!-- Pagination -->
        <hr class="my-5">
        {{ $deals->links() }}
    </div>
@endsection

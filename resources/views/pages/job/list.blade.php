@extends('layouts.user')

@section('content')
    <x-user.bread-crumb :data="['Home', 'Job', 'List']"/>
    <div class="container mx-2 md:mx-0 flex items-center justify-between my-8">
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
        <div class="mx-4 md:mx-0">
            <p class="text-xs md:text-base">
                Showing {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} of {{ $jobs->total() }} results
            </p>
        </div>
    </div>
    <script>
        function doFilter() {
            let categoryValue = document.getElementById('product-category-filter').value;
            applyFilters(categoryValue);
        }

        function applyFilters(category) {
            let url = '{{ route('jobs') }}';
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
    <div class="container mx-2 md:md-auto py-6">
        <!-- Existing content remains unchanged -->
        @forelse($jobs as $job)
            <div class="hidden md:flex company-card bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 items-center justify-center p-2 mb-5">
                <div class="mb-4 p-2 pr-3">
                    <img class="w-full h-20 object-contain overflow-hidden" src="{{ url('storage/' . $job->thumbnail) }}"
                         alt="">
                </div>
                <div class="w-full mx-3 ml-5 flex flex-col items-start justify-stretch" style="border-right: 1px solid lightgray">
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
                <div class="w-[calc(20%-1rem)]">
                    <a href="{{ route('view.job', [$job->slug]) }}"
                       class="text-purple-500 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 mt-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center">
                        {{$job->employment_type}} &nbsp;
                    </a>
                </div>
            </div>
            <div class="flex md:hidden company-card bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 p-2 mb-5">
                <div class="overflow-hidden mb-4 p-2 md:border-r border-r-1 border-solid border-gray-300" style="width: 80px; height: 80px">
                    <img class="object-contain overflow-hidden"
                         src="{{ url('storage/' . $job->thumbnail) }}" width="250"
                         alt="">
                </div>
                <div class="flex justify-center items-center flex-col">
                    <div class="w-full mx-3 ml-5 flex flex-col items-start justify-center" style="border-right: 1px solid lightgray">
                        <a href="{{ route('view.job', [$job->slug]) }}" class="flex flex-nowrap items-center mb-3">
                            <span class="text-base mr-3">{{$job->title}}</span>
                        </a>
                            <div class="text-sm text-gray-500 mb-3">
                            <i class='bx bx-been-here text-red-500'></i> {{$job->address->state->name}}, {{$job->address->country->name}}
                        </div>
                        <div class="text-purple-600 text-base">
                            {{$job->organization}}
                        </div>
                    </div>
                    <div class="w-full">
                        <a href="{{ route('view.job', [$job->slug]) }}"
                           class="text-purple-500 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 mt-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center">
                            {{$job->employment_type}} &nbsp;
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <h1 class="text-gray-500 text-4xl text-center mt-10">No Jobs Found</h1>
        @endforelse
        <!-- Pagination -->
        <hr class="my-5">
        {{ $jobs->links() }}
    </div>
@endsection

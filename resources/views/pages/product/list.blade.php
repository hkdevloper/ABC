@extends('layouts.main-user-list')

@section('content')
    <x-user.header :title="'Products'" :breadcrumb="['Home', 'Product', 'List']"/>
    <div class="container py-6 mx-auto flex flex-wrap">
        <!-- Product List Block -->
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <!-- Product List Filter -->
            <div class="w-full flex flex-nowrap justify-between items-center">
                <p class="text-base text-gray-500">Search Results for <br> <span class="text-xl text-purple-500">Products</span></p>
                <p class="text-base text-gray-500">About {{count($products)}} Result</p>
            </div>
            <hr class="my-5">
            <!-- Product List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($products as $item)
                    <div class="flex flex-wrap place-items-center">
                        <div class="overflow-hidden shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-5 hover:shadow-2xl rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
                            <a href="{{route('view.product', [$item->slug])}}" class="w-full block h-full object-contain">
                                <img alt="blog photo" src="{{ url('storage/' . $item->thumbnail) }}" class="max-h-40 w-full object-cover"/>
                                <div class="bg-white w-full p-4">
                                    <header class="flex font-light text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#b91c1c">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                        <p>{{$item->category->name}}</p>
                                    </header>
                                    <div class="flex items-center mt-2">
                                        <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://ui-avatars.com/api/?name={{$item->user->name}}'/>
                                        <div class="pl-3">
                                            <div class="font-medium">
                                                {{$item->user->name}}
                                            </div>
                                            <div class="text-gray-600 text-sm">
                                                {{$item->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                        </div>
                                    </div>
                                    <p class="text-indigo-500 text-base sm:text-md md:text-lg lg:text-xl font-medium mt-2">{{ $item->name }}</p>
                                    <div class="py-4 border-t border-b text-xs text-gray-700">
                                        <div class="grid grid-cols-6 gap-1">
                                            <div class="col-span-2">
                                                Rating:
                                            </div>
                                            <div class="col-span-2">
                                                Views: {{\App\classes\HelperFunctions::getStat('view', 'product', $item->id)}}
                                            </div>
                                            <div class="col-span-2">
                                                Likes: {{\App\classes\HelperFunctions::getStat('like', 'product', $item->id)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="border border-solid border-t border-b-0 border-r-0 border-l-0 border-gray-900">
                                <div class="flex items-stretch w-full">
                                    <button type="button"
                                            class="flex-1 inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent hover:bg-gray-900 hover:text-white focus:ring-gray-500 focus:bg-gray-900 focus:text-white border border-solid border-r border-b-0 border-l-0 border-t-0 border-gray-900">
                                        <i class="fas fa-eye mr-3"></i>
                                        View
                                    </button>

                                    <button type="button"
                                            class="flex-1 inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent hover:bg-gray-900 hover:text-white focus:ring-gray-500 focus:bg-gray-900 focus:text-white border border-solid border-r border-b-0 border-l-0 border-t-0 border-gray-900">
                                        <i class="fas fa-bookmark mr-3"></i>
                                        Save
                                    </button>

                                    <button type="button"
                                            class="flex-1 inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent hover:bg-gray-900 hover:text-white focus:ring-gray-500 focus:bg-gray-900 focus:text-white">
                                        <i class="fas fa-heart mr-3"></i>
                                        Like
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center">
                        <p class="text-gray-500 text-center">No Products Found</p>
                    </div>
                @endforelse
            </div>
            <!-- Pagination -->
            <hr class="my-5">
            {{ $products->links() }}
        </div>
        <!-- Side Block -->
        @include('includes.sidebar')
    </div>
@endsection

@php use App\classes\HelperFunctions; @endphp
@extends('layouts.user')
@section('content')
    <div class="container mx-auto">
        <x-user.bread-crumb :data="['Home', 'Deals',$deal->name]"/>
        <div class="flex justify-center items-center">
            <!--Image Side-->
            <div class="mx-auto">
                <div class="w-full overflow-hidden rounded-lg">
                    <img src="{{ url('storage/'.$deal->thumbnail) }}" alt="Product Image" id="main-image"
                         class="h-80 w-full max-w-full object-contain img-remove-bg">
                </div>
                <div class="mt-2 w-full lg:order-1 flex items-center justify-center">
                    <div class="grid grid-cols-3 md:grid-cols-5 gap-4">
                        <button type="button"
                                class="thumbnail-button flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center"
                                data-image="{{ url('storage/'.$deal->thumbnail) }}">
                            <img src="{{ url('storage/'.$deal->thumbnail) }}" alt="Product Image"
                                 class="h-full w-full max-w-full object-contain bg-transparent img-remove-bg">
                        </button>

                        @forelse($deal->gallery as $image)
                            <button type="button"
                                    class="thumbnail-button flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center"
                                    data-image="{{ url('storage/'.$image) }}">
                                <img src="{{ url('storage/'.$image) }}" alt="Product Image"
                                     class="h-full w-full max-w-full object-contain bg-transparent img-remove-bg">
                            </button>
                        @empty
                            <!-- No Gallery Images -->
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Deals Details -->
            <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2 flex flex-col md:items-center justify-between p-4">
                <div class="flex flex-auto">
                    <img src="{{ url('storage/'.$deal->company->logo) }}" alt="Company Logo"
                         class="h-16 w-16 rounded-full object-contain mr-4">
                    <!-- Published Details  -->
                    <div class="flex flex-col">
                    <span class="text-base md:text-xl sm:text-base font-bold">{{$deal->name }}
                        @if($deal->is_featured)
                            <span>
                                <button
                                    class="inline-flex items-center bg-neutral-100 mr-1 text-white border border-solid-400 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="w-4 h-4 text-white bg-green-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                                    </svg>
                                    <span class="mx-1 text-gray-500 text-xs">Featured</span>
                                </button>
                            </span>
                        @endif
                    </span>
                        <span class="text-xs md:text-sm text-gray-500">Published by {{$deal->company->name }}</span>
                        <span class="text-xs md:text-sm text-gray-500">Published on {{$deal->created_at->format('d M Y') }} ({{$deal->updated_at->diffForHumans() }})</span>
                        <a href="{{route('view.company', [$deal->company->slug])}}"
                           class="border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white py-1 px-2 text-center mt-2 rounded-full hover:rounded-full transition-all duration-300 ease-in-out md:w-auto w-full md:hidden">
                            Contact Now
                            <i class='bx bx-link-external ml-2'></i>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center mt-4">
                    <div class="flex items-center justify-center">
                        <p class="text-2xl md:text-3xl font-bold text-purple-500">
                            ₹{{ HelperFunctions::getDiscountedPrice($deal->price, $deal->discount_type, $deal->discount_value) }}</p>
                        @if($deal->discount_type !== null && $deal->discount_value !== null)
                            <p class="text-xs md:text-sm text-gray-400 line-through ml-2">
                                ₹{{ HelperFunctions::formatCurrency($deal->price) }}</p>
                        @endif
                    </div>
                    <div class="flex items-center justify-center mt-2">
                        <p class="text-xs md:text-sm text-gray-400">Inclusive of all taxes</p>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="flex items-center justify-center mx-1 mt-4">
                        <a href="{{route('view.company', [$deal->company->slug])}}"
                           class="hidden md:flex text-purple-600 md:bg-purple-500 md:text-white md:py-2 md:px-4 rounded focus:outline-none focus:shadow-outline-blue">
                            Contact Now
                            <i class='bx bx-link-external ml-2'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <x-bladewind.tab-group name="product-info">
            <x-slot name="headings">
                <x-bladewind.tab-heading active="true" name="desc" label="Description"/>
                <x-bladewind.tab-heading name="tos" label="Terms & Condition"/>
            </x-slot>

            <x-bladewind.tab-body>
                <x-bladewind.tab-content name="desc" active="true">
                    <table class="w-full border border-collapse rounded-lg">
                        <!-- Category Section -->
                        <tr>
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <div class="flex items-center justify-start">
                                <span
                                    class="text-lg font-semibold text-indigo-500 mr-2 border border-collapse rounded-full p-2 flex items-center justify-center">
                                    <i class='bx bx-category'></i>
                                </span>
                                    <div>
                                        <span class="text-sm md:text-base font-semibold text-gray-500">Category</span>
                                    </div>
                                </div>
                            </td>
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <span
                                    class="text-sm md:text-base text-justify text-purple-500">{{$deal->category->name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <!-- Location Section -->
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <div class="flex items-center justify-start">
                                <span
                                    class="text-lg font-semibold text-indigo-500 mr-2 border border-collapse rounded-full p-2 flex items-center justify-center">
                                    <i class='bx bx-map'></i>
                                </span>
                                    <div>
                                        <span class="text-sm md:text-base font-semibold text-gray-500">Location</span>
                                    </div>
                                </div>
                            </td>
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <span
                                    class="text-sm: md:text-base text-gray-500">{{$deal->company->address->country->name }}</span>
                            </td>
                        </tr>
                    </table>
                    <hr class="my-4">
                    <p class="text-sm text-gray-500">{!!$deal->description !!}</p>
                </x-bladewind.tab-content>
                <x-bladewind.tab-content name="tos">
                    <table class="w-full border border-collapse rounded-lg">
                        <tr>
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <div class="flex items-center justify-start">
                                <span
                                    class="text-lg font-semibold text-indigo-500 mr-2 border border-collapse rounded-full p-2 flex items-center justify-center">
                                    <i class='bx bx-file-text'></i>
                                </span>
                                    <div>
                                        <span class="text-sm md:text-base font-semibold text-gray-500">Terms & Conditions</span>
                                    </div>
                                </div>
                            </td>
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <span
                                    class="text-sm md:text-base text-justify text-purple-500">{!! $deal->terms_and_conditions !!}</span>
                            </td>
                        </tr>
                    </table>
                </x-bladewind.tab-content>
            </x-bladewind.tab-body>
        </x-bladewind.tab-group>
        <!-- Related Deals Section -->
        <section class="mx-auto mt-8 p-4 bg-white">
            <h2 class="text-2xl font-semibold">Related Deals</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
                @forelse($related_deals as $item)
                    <div
                        class="reveal flex flex-col items-center justify-center bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 w-[90vw] md:w-full">
                        <!-- Discount ribbon -->
                        @if($item->discount_type !== null && $item->discount_value !== null)
                            <div class="absolute top-0 left-0 bg-red-500 text-white p-1">
                                @if($item->discount_type == 'fixed')
                                    <p class="text-xs font-bold">{{ $item->discount_value }}₹ off</p>
                                @endif
                                @if($item->discount_type == 'percentage')
                                    <p class="text-xs font-bold">{{ $item->discount_value }}% off</p>
                                @endif
                            </div>
                        @endif
                        <a href="{{ route('view.deal', [$item->slug]) }}"
                           class="h-100 mx-auto p-2">
                            <img alt="deal thumbnail" src="{{ url('storage/' . $item->thumbnail) }}"
                                 class="w-[150px] h-[150px] md:w-full md:h-48 object-contain"/>
                        </a>
                        <div class="p-2 flex flex-col items-center justify-center w-full">
                            <p class="text-xs text-gray-400">{{ $item->category->name }}</p>
                            <p class="text-sm font-medium mb-2 text-center h-[55px] overflow-hidden">
                                {{ strlen($item->title) > 80 ? substr($item->title, 0, 80) . '...' : $item->title }}
                            </p>
                            <p class="text-gray-700 text-center text-xs md:text-sm flex justify-center items-center">
                            <span class="text-sm text-red-500 mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525"/>
                                </svg>
                            </span>
                                {{ $item->user->company->address->country->name }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between w-full px-5">
                            <p class="text-xs text-gray-400 line-through">
                                ₹{{ HelperFunctions::formatCurrency($item->price) }}
                            </p>
                            <p class="text-lg font-bold text-gray-700">
                                ₹{{ HelperFunctions::getDiscountedPrice($item->price, $item->discount_type, $item->discount_value) }}
                            </p>
                        </div>
                        <!-- Published time -->
                        <div class="flex items-center justify-center w-full px-5">
                            <p class="text-xs text-gray-400 flex items-center justify-center">
                                <i class='bx bx-time text-lg'></i>
                                {{ $item->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-700 text-center col-span-full">No listings found.</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection

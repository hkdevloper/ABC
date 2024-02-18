@extends('layouts.user')
@php
    use App\Classes\HelperFunctions;
@endphp
@section('content')
    <div class="container mx-auto">
        <x-user.bread-crumb :data="['Home', 'Deals', $deal->name]"/>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Image Side -->
            <div class="md:flex md:flex-row-reverse items-center justify-between">
                <div class="overflow-hidden rounded-lg md:w-3/4">
                    <img src="{{ url('storage/'.$deal->thumbnail) }}" alt="Product Image" id="main-image" class="h-80 w-full object-contain img-remove-bg">
                </div>
                <div class="lg:order-1 lg:mt-2 lg:pl-4">
                    <div class="hidden lg:block">
                        <div class="grid grid-cols-1 gap-4">
                            <button type="button" class="thumbnail-button aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center" data-image="{{ url('storage/'.$deal->thumbnail) }}">
                                <img src="{{ url('storage/'.$deal->thumbnail) }}" alt="Product Image" class="h-full w-full object-contain bg-transparent img-remove-bg">
                            </button>
                            @forelse($deal->gallery as $image)
                                <button type="button" class="thumbnail-button aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center" data-image="{{ url('storage/'.$image) }}">
                                    <img src="{{ url('storage/'.$image) }}" alt="Product Image" class="h-full w-full object-contain bg-transparent img-remove-bg">
                                </button>
                            @empty
                                <!-- No Gallery Images -->
                            @endforelse
                        </div>
                    </div>
                    <div class="lg:hidden mt-2">
                        <div class="grid grid-cols-1 gap-4">
                            <button type="button" class="thumbnail-button aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center" data-image="{{ url('storage/'.$deal->thumbnail) }}">
                                <img src="{{ url('storage/'.$deal->thumbnail) }}" alt="Product Image" class="h-full w-full object-contain bg-transparent img-remove-bg">
                            </button>
                            @forelse($deal->gallery as $image)
                                <button type="button" class="thumbnail-button aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center" data-image="{{ url('storage/'.$image) }}">
                                    <img src="{{ url('storage/'.$image) }}" alt="Product Image" class="h-full w-full object-contain bg-transparent img-remove-bg">
                                </button>
                            @empty
                                <!-- No Gallery Images -->
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deals Details -->
            <div class="flex flex-col p-4">
                <div class="flex items-center">
                    <img src="{{ url('storage/'.$deal->company->logo) }}" alt="Company Logo" class="h-16 w-16 rounded-full object-contain mr-4">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold">{{ $deal->name }}
                            @if($deal->is_featured)
                                <span class="inline-flex items-center bg-green-500 text-white rounded ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="text-xs">Featured</span>
                                </span>
                            @endif
                        </span>
                        <span class="text-sm text-gray-500">Published by {{ $deal->company->name }}</span>
                        <span class="text-sm text-gray-500">Published on {{ $deal->created_at->format('d M Y') }} ({{ $deal->updated_at->diffForHumans() }})</span>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center mt-4">
                    <div class="flex items-center justify-center">
                        <p class="text-3xl font-bold text-purple-500">
                            ₹{{ HelperFunctions::getDiscountedPrice($deal->price, $deal->discount_type, $deal->discount_value) }}</p>
                        @if($deal->discount_type && $deal->discount_value)
                            <p class="text-sm text-gray-400 line-through ml-2">
                                ₹{{ HelperFunctions::formatCurrency($deal->price) }}</p>
                        @endif
                    </div>
                    <div class="flex items-center justify-center mt-2">
                        <p class="text-sm text-gray-400">Inclusive of all taxes</p>
                    </div>
                </div>
                <table class="w-full rounded-lg mt-4">
                    <!-- Category Section -->
                    <tr>
                        <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                            <div class="flex items-center">
                                <i class="bx bx-category text-lg text-indigo-500 mr-2 border border-collapse rounded-full p-2"></i>
                                <span class="text-base font-semibold text-gray-500">Category</span>
                            </div>
                        </td>
                        <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                            <span class="text-base text-purple-500">{{ $deal->category->name }}</span>
                        </td>
                    </tr>
                    <!-- Location Section -->
                    <tr>
                        <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                            <div class="flex items-center">
                                <i class="bx bx-map text-lg text-indigo-500 mr-2 border border-collapse rounded-full p-2"></i>
                                <span class="text-base font-semibold text-gray-500">Location</span>
                            </div>
                        </td>
                        <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                            <span class="text-base text-gray-500">{{ $deal->company->address->country->name }}</span>
                        </td>
                    </tr>
                </table>
                <div class="flex justify-center items-center mt-4">
                    <a href="{{route('view.company', [$deal->company->slug])}}" class="hidden md:flex text-purple-600 md:bg-purple-500 md:text-white md:py-2 md:px-4 rounded focus:outline-none focus:shadow-outline-blue">
                        Contact Now
                        <i class='bx bx-link-external ml-2'></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tab Group -->
        <x-bladewind.tab-group name="product-info">
            <x-slot name="headings">
                <x-bladewind.tab-heading active="true" name="desc" label="Description"/>
                <x-bladewind.tab-heading name="tos" label="Terms & Condition"/>
            </x-slot>

            <x-bladewind.tab-body>
                <x-bladewind.tab-content name="desc" active="true">
                    <hr class="my-4">
                    <p class="text-sm text-gray-500">{!! $deal->description !!}</p>
                </x-bladewind.tab-content>
                <x-bladewind.tab-content name="tos">
                    <table class="w-full border border-collapse rounded-lg">
                        <tr>
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <div class="flex items-center">
                                    <i class="bx bx-file-text text-lg text-indigo-500 mr-2 border border-collapse rounded-full p-2"></i>
                                    <span class="text-base font-semibold text-gray-500">Terms & Conditions</span>
                                </div>
                            </td>
                            <td class="w-1/2 py-3 px-4 border-b border-lightgray">
                                <span class="text-base text-purple-500">{!! $deal->terms_and_conditions !!}</span>
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
                    <div class="reveal flex flex-col items-center justify-center bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 w-full">
                        <!-- Discount ribbon -->
                        @if($item->discount_type && $item->discount_value)
                            <div class="absolute top-0 left-0 bg-red-500 text-white p-1">
                                <p class="text-xs font-bold">{{ $item->discount_type === 'fixed' ? $item->discount_value.'₹ off' : $item->discount_value.'% off' }}</p>
                            </div>
                        @endif
                        <a href="{{ route('view.deal', [$item->slug]) }}" class="h-100 mx-auto p-2">
                            <img alt="deal thumbnail" src="{{ url('storage/' . $item->thumbnail) }}" class="w-48 h-48 object-contain md:w-full md:h-48"/>
                        </a>
                        <div class="p-2 flex flex-col items-center justify-center w-full">
                            <p class="text-xs text-gray-400">{{ $item->category->name }}</p>
                            <p class="text-sm font-medium mb-2 text-center h-16 overflow-hidden">{{ strlen($item->title) > 80 ? substr($item->title, 0, 80) . '...' : $item->title }}</p>
                            <p class="text-gray-700 text-center text-xs md:text-sm flex justify-center items-center">
                                <span class="text-sm text-red-500 mr-1">
                                    <i class="bx bx-time text-lg"></i>
                                </span>
                                {{ $item->created_at->diffForHumans() }}
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
                    </div>
                @empty
                    <p class="text-gray-700 text-center col-span-full">No listings found.</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection

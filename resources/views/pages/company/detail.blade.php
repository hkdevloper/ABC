@php
    use App\classes\HelperFunctions;
@endphp
@extends('layouts.user')
@section('head')
    <style>
        #slot-btn {
            height: 30px;
            margin: auto 0 auto auto;
        }
    </style>
@endsection

@section('content')
    <!-- Company Header Section -->
    <section class="bg-blue-50 p-4 py-12">
        <div class="container flex items-center justify-self-center">
            <div class="w-100">
                <img alt="" src="{{url('storage/', $company->logo)}}"
                     class="company-logo w-32 h-32 object-contain rounded-full mx-auto my-4">
            </div>
            <div class="flex items-center w-2/4 mx-10">
                <div class="flex items-start justify-start flex-col w-full">
                    <div class="flex items-center justify-center">
                        @if($company->is_featured)
                            <span class="p-1 bg-green-200 text-green-500 rounded px-2">Featured
                            <i class="fas fa-check text-green-500 ml-2"></i>
                        </span>
                        @endif
                        @if($company->is_approved)
                            <span class="p-1 bg-blue-200 text-blue-500 rounded px-2 m-1">Verified
                            <i class="fas fa-check text-blue-500 ml-2"></i>
                        </span>
                        @endif
                    </div>
                    <h1 class="text-2xl font-bold text-center text-blue-950">{{ $company->name }}</h1>
                    <p>
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-map-marker-alt text-purple-500 mr-2"></i>
                        </span>
                        <span class="text-sm text-gray-500 font-semibold">{{ $company->address->country->name }},
                        {{ $company->address->zip_code}}
                        </span>
                    </p>
                    <div class="text-sm text-gray-500 flex items-center justify-between">
                        <p class="">
                            <span class="text-sm text-gray-500">
                                Business Type:
                            </span>
                            <span class="text-sm text-gray-500 font-semibold">{{ $company->business_type }}</span>
                        </p>
                        <p class="mx-5">
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-tag text-purple-500 mr-1"></i>
                            </span>
                            <span class="text-sm text-gray-500 font-semibold">{{ $company->category->name }}</span>
                        </p>
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="flex flex-col items-center justify-center">
                            <h1 class="text-sm text-gray-500">Reviews</h1>
                            <span class="text-xl font-semibold">{{ $company->getReviewsCount() }}</span>
                        </div>
                        <div class="flex flex-col items-center justify-center mx-5">
                            <h1 class="text-sm text-gray-500">Rating</h1>
                            <span class="text-xl font-semibold">{{ $company->getAverageRating() }}</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <h1 class="text-sm text-gray-500">Products</h1>
                            <span class="text-xl font-semibold">{{ $company->products->count() }}</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-1/4">
                <div class="flex items-center justify-self-end">
                    <button class="m-1 bg-gray-300 hover:bg-purple-400 px-2 py-1 text-sm rounded"
                            style="min-width: max-content">
                        <i class="fas fa-share text-purple-500"></i>&nbsp; Share
                    </button>
                    <button class="m-1 bg-gray-300 hover:bg-purple-400 px-2 py-1 text-sm rounded"
                            style="min-width: max-content">
                        <i class="fas fa-heart text-purple-500"></i>&nbsp; Add to favourite
                    </button>
                    <button class="m-1 bg-gray-300 hover:bg-purple-400 px-2 py-1 text-sm rounded"
                            style="min-width: max-content">
                        <i class="fas fa-bookmark text-purple-500"></i>&nbsp; Add to Bookmark
                    </button>
                </div>
                <button class="m-1 bg-purple-500 hover:bg-purple-900 px-2 py-1 text-base text-white rounded">
                    Direct message
                </button>
            </div>
        </div>
    </section>
    <div class="container mx-auto">
        <div class="flex flex-row flex-wrap py-4">
            <main role="main" class="w-full sm:w-2/3 md:w-3/4 pt-1 px-2">
                <!-- Company Details Section -->
                <x-bladewind.tab-group name="company-info">
                    <x-slot name="headings">
                        <x-bladewind.tab-heading active="true" name="desc" label="About"/>
                        <x-bladewind.tab-heading name="product" label="Products"/>
                        <x-bladewind.tab-heading name="contact" label="Contact"/>
                        <x-bladewind.tab-heading name="rate" label="Rate & Reviews"/>
                        <button id="slot-btn" class="bg-blue-100 text-blue-950 px-2 text-xs text-right"
                                style="height: 30px;">
                            Your Company?
                            <span class="text-sm text-blue-950 font-semibold">Claim Now</span>
                        </button>
                    </x-slot>

                    <x-bladewind.tab-body>
                        <x-bladewind.tab-content name="desc" active="true">
                            <section class="card p-4 mx-[-15px]">
                                <p class="text-sm">{!! $company->description !!}</p>
                            </section>
                        </x-bladewind.tab-content>
                        <x-bladewind.tab-content name="product">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
                                @forelse($company->products as $item)
                                    <div
                                        class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 flex md:flex-col items-start md:items-center md:justify-center">
                                        @if($item->is_featured)
                                            <div
                                                class="absolute top-0 left-0 bg-red-500 text-white p-1 px-2 text-xs font-bold rounded">
                                                Featured
                                            </div>
                                        @endif
                                        <a href="{{ route('view.product', [$item->slug]) }}"
                                           class="w-[150px] h-[150px] md:w-full md:p-4 md:m-auto md:block md:h-full object-contain">
                                            <img alt="company photo" src="{{ url('storage/' . $item->thumbnail) }}"
                                                 class="w-[150px] h-[150px] md:w-full md:h-48 object-contain img-remove-bg"/>
                                        </a>
                                        <div
                                            class="p-1 md:p-2 flex flex-col items-start md:items-center justify-center">
                                            <header class="flex my-2 font-light text-base items-center">
                                                <i class="bx bx-category text-indigo-500 mr-1"></i>
                                                <p>{{ $item->category->name }}</p>
                                            </header>
                                            <p class="text-xl font-medium mb-2">{{ $item->name }}</p>
                                            <p class="text-red-700 text-center text-xs md:text-sm">{{ $item->company ? $item->company->name: '' }}</p>
                                            <p class="text-gray-700 text-center text-xs md:text-sm">{{ $item->company? $item->company->address->country->name : '' }}</p>
                                            <p class="text-gray-700 text-center text-xs md:text-sm">Price:
                                                ₹{{ HelperFunctions::formatCurrency($item->price) }}</p>
                                        </div>
                                        <div
                                            class="absolute bottom-0 md:static right-1 mb-2 w-auto md:w-[calc(80%-1rem)]">
                                            <a href="{{ route('view.product', [$item->slug]) }}"
                                               class="text-purple-500 mb-1 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center text-xs md:text-base">
                                                <span class="ml-1">Enquire Now &nbsp;</span>
                                                <i class='bx bx-link-external mr-2'></i>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="dark:bg-neutral-700">
                                        <div class="p-4">
                                            <h2 class="text-gray-900 text-base font-semibold mb-1">No Product Found</h2>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </x-bladewind.tab-content>
                        <x-bladewind.tab-content name="contact">
                            <section class="card p-4 mx-[-15px]">
                                <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Contact Us</h2>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Address</label>
                                    <p class="mt-1 text-sm text-gray-500">{{ $company->fullAddress() }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <p class="mt-1 text-sm text-gray-500">{{ $company->email }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                                    <p class="mt-1 text-sm text-gray-500">{{ $company->phone }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Website</label>
                                    <p class="mt-1 text-sm text-gray-500">{{ $company->website }}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Social Media</label>
                                    <div class="mt-1 text-sm text-gray-500">
                                        <a href="{{ $company->facebook }}" target="_blank"
                                           class="text-blue-500 hover:text-blue-700">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                        <a href="{{ $company->twitter }}" target="_blank"
                                           class="text-blue-500 hover:text-blue-700">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                        <a href="{{ $company->linkedin }}" target="_blank"
                                           class="text-blue-500 hover:text-blue-700">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                        <a href="{{ $company->instagram }}" target="_blank"
                                           class="text-blue-500 hover:text-blue-700">
                                            <i class="fab fa-instagram-square"></i>
                                        </a>
                                        <a href="{{ $company->youtube }}" target="_blank"
                                           class="text-blue-500 hover:text-blue-700">
                                            <i class="fab fa-youtube-square"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- direct message button -->
                                <button class="m-1 bg-purple-500 hover:bg-purple-900 px-2 py-1 text-base text-white rounded">
                                    Direct message
                                </button>
                            </section>
                        </x-bladewind.tab-content>
                        <x-bladewind.tab-content name="rate">
                            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                                <div>
                                    <div class="rounded-lg border p-4">
                                        <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Customer
                                            Reviews</h2>

                                        <div class="mb-0.5 flex items-center gap-2">
                                            @php
                                                // Count Average Rating
                                                $total_rating = 0;
                                                $average_rating = 1;
                                                try{
                                                    foreach($company->getReviews() as $item){
                                                        $total_rating += $item->rating;
                                                    }
                                                    $count = $company->getReviewsCount() ? $company->getReviewsCount() : 1;
                                                    $average_rating = $total_rating / $count;
                                                }catch (Exception $e){
                                                    $average_rating = 1;
                                                }
                                            @endphp
                                            <x-bladewind.rating name="star-rating" size="medium" clickable="false"
                                                                rating="{{$average_rating}}"/>
                                            <span class="text-sm font-semibold">{{$average_rating}}/5</span>
                                        </div>

                                        <span class="block text-sm text-gray-500">Bases on {{$company->getReviews()->count()}} reviews</span>

                                        <hr class="my-4 border-t-2 border-gray-200">

                                        @auth
                                            @if(auth()->user()->hasRated("company", $company->id))
                                                <p class="text-sm text-gray-500">You have already rated this
                                                    company.</p>
                                            @else
                                                <a href="#" onclick="showModal('rate')"
                                                   class="mt-2 block rounded-lg border px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 bg-gray-100 hover:bg-gray-300 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Write
                                                    a review</a>
                                            @endif
                                        @else
                                            <a href="{{route('auth.login')}}"
                                               class="mt-2 block rounded-lg border px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 bg-gray-100 hover:bg-gray-300 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Login
                                                to write a review</a>
                                        @endauth
                                    </div>
                                </div>
                                <div class="lg:col-span-2">
                                    <div class="border-b pb-4 md:pb-6">
                                        <h2 class="text-lg font-bold text-gray-800 lg:text-xl">Top Reviews</h2>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="divide-y">
                                        @forelse($company->getReviews() as $item)
                                            <div class="flex flex-col gap-3 p-4 mb-2 bg-gray-100">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <span
                                                            class="block text-sm font-bold">{{$item->user->name}}</span>
                                                        <span
                                                            class="block text-sm text-gray-500">{{$item->created_at->diffForHumans()}}</span>
                                                    </div>
                                                    <x-bladewind.rating name="star-rating" size="small"
                                                                        clickable="false"
                                                                        rating="{{$item->rating}}"/>
                                                </div>
                                                <p class="text-gray-600">{{$item->review}}</p>
                                            </div>
                                        @empty
                                            <div class="flex flex-col gap-3 p-4 mb-2 bg-gray-100">
                                                <p class="text-gray-600">No reviews yet.</p>
                                            </div>
                                        @endforelse
                                    </div>
                                    <!-- Pagination -->
                                    {{ $company->getReviews()->links() }}
                                </div>
                            </div>
                        </x-bladewind.tab-content>
                    </x-bladewind.tab-body>
                </x-bladewind.tab-group>
                <!-- Gallery Grid -->
                <section class="card p-4 mb-4">
                    <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Gallery</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-4">
                        @php
                            // if a gallery is array, convert it to string
                            if(is_array($company->gallery)){
                                $company->gallery = json_encode($company->gallery);
                            }
                        @endphp
                        @forelse(json_decode($company->gallery) as $item)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                                <a href="{{ url('storage/' . $item) }}"
                                   class="w-full h-[150px] object-contain">
                                    <img alt="company photo" src="{{ url('storage/' . $item) }}"
                                         class="w-full h-[150px] object-contain img-remove-bg"/>
                                </a>
                            </div>
                        @empty
                            <div class="dark:bg-neutral-700 w-full">
                                <div class="p-4 w-full">
                                    <h2 class="text-gray-900 text-base font-semibold mb-1">No Image Found</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </section>
                <!-- Our Products Section -->
                <section class="card p-4 mb-4">
                    <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Our Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
                        @forelse($company->products as $item)
                            <div
                                class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 ease-in-out hover:-translate-y-2 flex md:flex-col items-start md:items-center md:justify-center">
                                @if($item->is_featured)
                                    <div
                                        class="absolute top-0 left-0 bg-red-500 text-white p-1 px-2 text-xs font-bold rounded">
                                        Featured
                                    </div>
                                @endif
                                <a href="{{ route('view.product', [$item->slug]) }}"
                                   class="w-[150px] h-[150px] md:w-full md:p-4 md:m-auto md:block md:h-full object-contain">
                                    <img alt="company photo" src="{{ url('storage/' . $item->thumbnail) }}"
                                         class="w-[150px] h-[150px] md:w-full md:h-48 object-contain img-remove-bg"/>
                                </a>
                                <div
                                    class="p-1 md:p-2 flex flex-col items-start md:items-center justify-center">
                                    <header class="flex my-2 font-light text-base items-center">
                                        <i class="bx bx-category text-indigo-500 mr-1"></i>
                                        <p>{{ $item->category->name }}</p>
                                    </header>
                                    <p class="text-xl font-medium mb-2">{{ $item->name }}</p>
                                    <p class="text-red-700 text-center text-xs md:text-sm">{{ $item->company ? $item->company->name: '' }}</p>
                                    <p class="text-gray-700 text-center text-xs md:text-sm">{{ $item->company? $item->company->address->country->name : '' }}</p>
                                    <p class="text-gray-700 text-center text-xs md:text-sm">Price:
                                        ₹{{ HelperFunctions::formatCurrency($item->price) }}</p>
                                </div>
                                <div
                                    class="absolute bottom-0 md:static right-1 mb-2 w-auto md:w-[calc(80%-1rem)]">
                                    <a href="{{ route('view.product', [$item->slug]) }}"
                                       class="text-purple-500 mb-1 bg-purple-100 hover:bg-purple-500 hover:text-white rounded-full p-1 transition duration-300 ease-in-out flex items-center justify-center transform hover:-translate-y-1 hover:scale-60 text-center text-xs md:text-base">
                                        <span class="ml-1">Enquire Now &nbsp;</span>
                                        <i class='bx bx-link-external mr-2'></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="dark:bg-neutral-700">
                                <div class="p-4">
                                    <h2 class="text-gray-900 text-base font-semibold mb-1">No Product Found</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </section>
                <!--  Contact Section -->
                <section class="card p-4 mb-4">
                    <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Contact Us</h2>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <p class="mt-1 text-sm text-gray-500">{{ $company->fullAddress() }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-sm text-gray-500">{{ $company->email }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <p class="mt-1 text-sm text-gray-500">{{ $company->phone }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Website</label>
                        <p class="mt-1 text-sm text-gray-500">{{ $company->website }}</p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Social Media</label>
                        <div class="mt-1 text-sm text-gray-500">
                            <a href="{{ $company->facebook }}" target="_blank"
                               class="text-blue-500 hover:text-blue-700">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="{{ $company->twitter }}" target="_blank"
                               class="text-blue-500 hover:text-blue-700">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                            <a href="{{ $company->linkedin }}" target="_blank"
                               class="text-blue-500 hover:text-blue-700">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="{{ $company->instagram }}" target="_blank"
                               class="text-blue-500 hover:text-blue-700">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                            <a href="{{ $company->youtube }}" target="_blank"
                               class="text-blue-500 hover:text-blue-700">
                                <i class="fab fa-youtube-square"></i>
                            </a>
                        </div>
                    </div>
                    <!-- direct message button -->
                    <button class="m-1 bg-purple-500 hover:bg-purple-900 px-2 py-1 text-base text-white rounded">
                        Direct message
                    </button>
                </section>
                <!-- Rate & Reviews Section -->
                <section class="mb-4 card p-4">
                    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                        <div>
                            <div class="rounded-lg border p-4">
                                <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Customer
                                    Reviews</h2>

                                <div class="mb-0.5 flex items-center gap-2">
                                    @php
                                        // Count Average Rating
                                        $total_rating = 0;
                                        $average_rating = 1;
                                        try{
                                            foreach($company->getReviews() as $item){
                                                $total_rating += $item->rating;
                                            }
                                            $count = $company->getReviewsCount() ? $company->getReviewsCount() : 1;
                                            $average_rating = $total_rating / $count;
                                        }catch (Exception $e){
                                            $average_rating = 1;
                                        }
                                    @endphp
                                    <x-bladewind.rating name="star-rating" size="medium" clickable="false"
                                                        rating="{{$average_rating}}"/>
                                    <span class="text-sm font-semibold">{{$average_rating}}/5</span>
                                </div>

                                <span class="block text-sm text-gray-500">Bases on {{$company->getReviews()->count()}} reviews</span>

                                <hr class="my-4 border-t-2 border-gray-200">

                                @auth
                                    @if(auth()->user()->hasRated("company", $company->id))
                                        <p class="text-sm text-gray-500">You have already rated this
                                            company.</p>
                                    @else
                                        <a href="#" onclick="showModal('rate')"
                                           class="mt-2 block rounded-lg border px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 bg-gray-100 hover:bg-gray-300 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Write
                                            a review</a>
                                    @endif
                                @else
                                    <a href="{{route('auth.login')}}"
                                       class="mt-2 block rounded-lg border px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 bg-gray-100 hover:bg-gray-300 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Login
                                        to write a review</a>
                                @endauth
                            </div>
                        </div>
                        <div class="lg:col-span-2">
                            <div class="border-b pb-4 md:pb-6">
                                <h2 class="text-lg font-bold text-gray-800 lg:text-xl">Top Reviews</h2>
                            </div>
                            <hr>
                            <br>
                            <div class="divide-y">
                                @forelse($company->getReviews() as $item)
                                    <div class="flex flex-col gap-3 p-4 mb-2 bg-gray-100">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                        <span
                                                            class="block text-sm font-bold">{{$item->user->name}}</span>
                                                <span
                                                    class="block text-sm text-gray-500">{{$item->created_at->diffForHumans()}}</span>
                                            </div>
                                            <x-bladewind.rating name="star-rating" size="small"
                                                                clickable="false"
                                                                rating="{{$item->rating}}"/>
                                        </div>
                                        <p class="text-gray-600">{{$item->review}}</p>
                                    </div>
                                @empty
                                    <div class="flex flex-col gap-3 p-4 mb-2 bg-gray-100">
                                        <p class="text-gray-600">No reviews yet.</p>
                                    </div>
                                @endforelse
                            </div>
                            <!-- Pagination -->
                            {{ $company->getReviews()->links() }}
                        </div>
                    </div>
                </section>
                <!-- Claim listing section -->
                <section class="card p-4 mb-4">
                    <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Is this your Listing?</h2>
                    <div class="card bg-gray-50 p-4">
                        <h2 class="mb-3 text-large text-gray-800 lg:text-xl">Claim it To:</h2>
                        <ul class="list-disc list-inside pl-4">
                            <li class="mb-2 flex items-start">
                                <i class='bx bx-badge-check text-blue-950 mx-2'></i>
                                Update your company information
                            </li>
                            <li class="mb-2 flex items-start">
                                <i class='bx bx-badge-check text-blue-950 mx-2'></i>
                                Respond to reviews
                            </li>
                            <li class="mb-2 flex items-start">
                                <i class='bx bx-badge-check text-blue-950 mx-2'></i>
                                Access exclusive tools for free
                            </li>
                            <li class="mb-2 flex items-start">
                                <i class='bx bx-badge-check text-blue-950 mx-2'></i>
                                And much more...
                            </li>
                        </ul>
                    </div>
                    <button class="m-4 bg-purple-500 hover:bg-purple-700 px-4 py-2 text-base text-white rounded-full focus:outline-none focus:shadow-outline-purple">
                        Claim Now
                    </button>
                </section>

            </main>
            <aside class="w-full sm:w-1/3 md:w-1/4 px-2">
                @include('includes.sidebar')
            </aside>
        </div>
    </div>
    <x-bladewind::modal
        backdrop_can_close="false"
        name="rate"
        ok_button_action="saveRating('rate-company')"
        ok_button_label="Submit"
        close_after_action="false"
        center_action_buttons="true">
        <form method="post" action="" id="rate-form">
            @csrf
            <b class="mt-0">Add your review</b>
            <x-bladewind.rating name="rate-company" rating="1"/>
            <x-bladewind.textarea name="review" label="Review" rows="3"/>
            <input type="hidden" name="item_id" value="{{$company->id}}">
        </form>
        <x-bladewind::processing
            name="rate-processing"
            message="Submitting your rating..."/>

        <x-bladewind::process-complete
            name="rate-complete"
            process_completed_as="passed"
            button_label="Done"
            button_action="hideModal('rate')"
            message="Your rating has been submitted successfully."/>
    </x-bladewind::modal>
    <!-- Add this script at the end of your HTML file -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Gallery View
            const thumbnailButtons = document.querySelectorAll(".thumbnail-button");
            const mainImage = document.getElementById("main-image");

            thumbnailButtons.forEach((button) => {
                button.addEventListener("click", function () {
                    mainImage.src = button.getAttribute("data-image");
                });
            });
        });

        @auth
            saveRating = async function (element) {
            let form = document.getElementById('rate-form');
            let item_id = form.querySelector('input[name="item_id"]').value;
            let rating = dom_el(`.rating-value-${element}`).value;
            let review = form.querySelector('textarea[name="review"]').value;
            let url = '{{route('api.product.rate', ['type'=>'company'])}}';
            let headersList = {
                "Accept": "application/json",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "item_id": item_id,
                "rating": rating,
                "review": review,
                "user_id": "{{auth()->user()->id}}"
            });

            let response = await fetch(url, {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            if (data.status === 'success') {
                hideModal('rate');
                showModal('rate-complete');
                window.location.reload();
            }
        }
        @endauth
    </script>
@endsection

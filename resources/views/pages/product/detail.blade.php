@extends('layouts.main-user-details')

@section('content')
    <div class="container py-6 mx-auto flex flex-wrap">
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <x-user.bread-crumb :data="['Home', 'Products', $product->name]"/>

            <div class="lg:col-gap-6 xl:col-gap-8 mt-4 grid grid-cols-1 gap-6 lg:mt-6 lg:grid-cols-4 lg:gap-8">
                <div class="lg:col-span-3 lg:row-end-1">
                    <div class="lg:flex lg:items-start">
                        <div class="lg:order-2 lg:ml-5">
                            <div class="max-w-xl overflow-hidden rounded-lg">
                                <img src="{{ url('storage/'.$product->thumbnail) }}" alt="Product Image" id="main-image"
                                     class="h-full w-full max-w-full object-cover">
                            </div>
                        </div>

                        <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
                            <div class="flex flex-row items-start lg:flex-col">
                                <button type="button"
                                        class="thumbnail-button flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center"
                                        data-image="{{ url('storage/'.$product->thumbnail) }}">
                                    <img src="{{ url('storage/'.$product->thumbnail) }}" alt="Product Image"
                                         class="h-full w-full max-w-full object-cover">
                                </button>
                                @forelse($product->gallery as $image)
                                    <button type="button"
                                            class="thumbnail-button flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center"
                                            data-image="{{ url('storage/'.$image) }}">
                                        <img src="{{ url('storage/'.$image) }}" alt="Product Image"
                                             class="h-full w-full max-w-full object-cover">
                                    </button>
                                @empty
                                    <!-- No Gallery Images -->
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
                    <h1 class="text-base sm:text-md md:text-lg lg:text-xl font-bold text-gray-900">{{$product->name}}
                        @if($product->is_featured)
                            <span>
                                <button
                                    class="inline-flex items-center bg-neutral-100 mr-1 text-white border border-solid-400 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-4 h-4 text-white bg-green-500">
                                      <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                                    </svg>
                                    <span class="mx-1 text-gray-500 text-xs">Featured</span>
                                </button>
                            </span>
                        @endif
                    </h1>

                    <div class="mt-5 flex items-center">
                        <div class="flex items-center">
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                            <svg class="block h-4 w-4 align-middle text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    class=""></path>
                            </svg>
                        </div>
                        <p class="ml-2 text-sm font-medium text-gray-500">1,209 Reviews</p>
                    </div>

                    <div class="grid grid-cols-1 gap-2 text-sm text-gray-500">
                        <!-- User -->
                        <p class="mb-2"><span class="font-bold">User:</span> {{$product->user->name}}</p>
                        <!-- Company Name -->
                        @if($product->user->company)
                            <p class="mb-2"><span
                                    class="font-bold">Company Name:</span> {{$product->user->company->name}}</p>
                        @endif
                        <!-- Condition Label -->
                        <p class="mb-2"><span class="font-bold">Condition:</span> {{$product->condition}}</p>
                        <!-- Brand Label -->
                        <p class="mb-2"><span class="font-bold">Brand:</span> {{$product->brand}}</p>
                        <!-- Category Label -->
                        <p class="mb-2"><span class="font-bold">Category:</span> {{$product->category->name}}</p>
                    </div>
                </div>
            </div>
            <x-bladewind.tab-group name="product-info">
                <x-slot name="headings">
                    <x-bladewind.tab-heading
                        name="desc" label="Description"/>
                    <x-bladewind.tab-heading
                        name="rate" label="Rate & Reviews"/>
                </x-slot>

                <x-bladewind.tab-body>
                    <x-bladewind.tab-content name="desc">
                        {!! $product->description !!}
                    </x-bladewind.tab-content>
                    <x-bladewind.tab-content name="rate">
                        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                            <div>
                                <div class="rounded-lg border p-4">
                                    <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Customer Reviews</h2>

                                    <div class="mb-0.5 flex items-center gap-2">
                                        @php
                                            // Count Average Rating
                                            $total_rating = 0;
                                            foreach($product->getReviews() as $item){
                                                $total_rating += $item->rating;
                                            }
                                            $average_rating = $total_rating / $product->getReviews()->count();
                                        @endphp
                                        <x-bladewind.rating name="star-rating" size="medium" clickable="false" rating="{{$average_rating}}"/>
                                        <span class="text-sm font-semibold">{{$average_rating}}/5</span>
                                    </div>

                                    <span class="block text-sm text-gray-500">Bases on {{$product->getReviews()->count()}} reviews</span>

                                    <hr class="my-4 border-t-2 border-gray-200">

                                    @auth
                                        <a href="#" onclick="showModal('rate')"
                                           class="mt-2 block rounded-lg border px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 bg-gray-100 hover:bg-gray-300 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Write a review</a>
                                    @else
                                        <a href="{{route('login')}}"
                                           class="mt-2 block rounded-lg border px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 bg-gray-100 hover:bg-gray-300 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Login to write a review</a>
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
                                    @forelse($product->getReviews() as $item)
                                        <div class="flex flex-col gap-3 p-4 mb-2 bg-gray-100">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="block text-sm font-bold">{{$item->user->name}}</span>
                                                    <span
                                                        class="block text-sm text-gray-500">{{$item->created_at}}</span>
                                                </div>
                                                <x-bladewind.rating name="star-rating" size="small" clickable="false" rating="{{$item->rating}}"/>
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
                                {{ $product->getReviews()->links() }}
                            </div>
                        </div>
                    </x-bladewind.tab-content>
                </x-bladewind.tab-body>
            </x-bladewind.tab-group>
            <!-- Related Products Section -->
            <section class="mx-auto mt-8 p-4 bg-white">
                <h2 class="text-2xl font-semibold">Related Products</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
                    <!-- Related Product 1 -->
                    @forelse($related_products as $product)
                        <div class="card dark:bg-neutral-700">
                            <!-- Product Thumbnail -->
                            <div class="overflow-hidden w-full h-40">
                                <img src="{{ url('storage/'.$product->thumbnail) }}" alt="Product Image"
                                     class="object-contain w-full h-full">
                            </div>
                            <!-- Product Details -->
                            <div class="p-4">
                                <h2 class="text-gray-900 text-base font-semibold mb-1">{{ $product->name }}</h2>
                                <p class="text-gray-900 text-base mb-1">Brand: {{ $product->brand }}</p>
                                <p class="text-base mb-2">Condition:
                                    <span class="text-green-500">{{ ucfirst($product->condition) }}</span>
                                </p>
                                <div class="mt-2 text-xs">
                                    @php
                                        $description = $product->description;
                                        $limit = 50; // You can adjust the character limit
                                    @endphp
                                    <p>{!! strlen($description) > $limit ? substr($description, 0, $limit).'...' : $description !!}</p>
                                </div>
                            </div>
                            <!-- Product Actions -->
                            <div class="flex items-center justify-between p-4 border-t border-gray-300">
                                <!-- View Button -->
                                <a href="{{ route('view.product', [$product->slug]) }}"
                                   class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full p-2 transition duration-300 ease-in-out text-xs">
                                    View <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                                <!-- Like, Share, Bookmark Icons -->
                                <div class="flex space-x-2">
                                    <!-- Like Icon -->
                                    <button class="text-gray-500 hover:text-purple-500"><i
                                            class="fa-solid fa-heart"></i>
                                    </button>
                                    <!-- Share Icon -->
                                    <button class="text-gray-500 hover:text-purple-500"><i
                                            class="fa-solid fa-share"></i>
                                    </button>
                                    <!-- Bookmark Icon -->
                                    <button class="text-gray-500 hover:text-purple-500"><i
                                            class="fa-solid fa-bookmark"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card dark:bg-neutral-700">
                            <div class="p-4">
                                <h2 class="text-gray-900 text-base font-semibold mb-1">No Product Found</h2>
                            </div>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
        @include('includes.sidebar')
    </div>
    <x-bladewind::modal
        backdrop_can_close="false"
        name="rate"
        ok_button_action="saveRating()"
        ok_button_label="Submit"
        close_after_action="false"
        center_action_buttons="true">
        <form method="post" action="" id="rate-form">
            @csrf
            <b class="mt-0">Add your review</b>
            <x-bladewind.rating name="rate" rating="1"/>
            <x-bladewind.textarea name="review" label="Review" rows="3"/>
            <input type="hidden" name="item_id" value="{{$product->id}}">
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

        saveRating = async function () {
            let form = document.getElementById('rate-form');
            let item_id = form.querySelector('input[name="item_id"]').value;
            let rating = 1;
            let review = form.querySelector('textarea[name="review"]').value;
            let url = '{{route('api.product.rate', ['type'=>'product'])}}';
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
    </script>
@endsection

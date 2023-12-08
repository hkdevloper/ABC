@extends('layouts.main-user-list')

@section('head')
    <style>
        .company-banner {
            background-size: cover;
            background-position: center;
            background-image: url('{{url('storage/', $company->banner)}}')
        }

        .company-banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: inherit;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .company-logo {
            border: 2px solid #fff;
            shape-image-threshold: 0.5;
            shape-outside: circle();
            clip-path: circle();
        }
    </style>
@endsection

@section('content')
    <!-- Company Header Section -->
    <section class="company-banner text-white p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                {{ $company->name }}
            </h1>

            <div class="flex space-x-4">
                <div>
                    <i class="fas fa-check-circle"></i>
                    <span v-if="is_approved">Approved</span>
                </div>

                <div>
                    <i class="fas fa-star"></i>
                    <span v-if="is_featured">Featured</span>
                </div>
            </div>

        </div>

        <img alt="" src="{{url('storage/', $company->logo)}}"
             class="company-logo w-32 h-32 object-cover rounded-full mx-auto my-4">

        <p v-if="description" class="text-gray-300 hidden">
            description
        </p>

        <div class="flex justify-center space-x-4 text-lg my-4">
            <a href="#">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
                <i class="fab fa-instagram"></i>
            </a>
        </div>

        <div class="flex justify-between text-gray-300 text-sm">
            <div>
                <i class="fas fa-map-marker-alt mr-2"></i>
                {{ $company->address->country->name }}
            </div>

            <div>
                <i class="fas fa-phone mr-2"></i>
                {{ $company->phone }}
            </div>

            <div>
                <i class="fas fa-globe mr-2"></i>
                <a href="{{$company->website}}">website</a>
            </div>
        </div>

    </section>
    <div class="container mx-auto">
        <div class="flex flex-row flex-wrap py-4">
            <main role="main" class="w-full sm:w-2/3 md:w-3/4 pt-1 px-2">
                <!-- Company Details Section -->
                <section class="my-8 bg-neutral-100 p-8 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">About {{ $company->name }}</h2>
                    <p class="w-2/4 text-sm">{!! $company->description !!}</p>
                </section>
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-12">
                    <div>
                        <div class="rounded-lg border p-4">
                            <h2 class="mb-3 text-lg font-bold text-gray-800 lg:text-xl">Customer Reviews</h2>

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
                                    <p class="text-sm text-gray-500">You have already rated this company.</p>
                                @else
                                    <a href="#" onclick="showModal('rate')"
                                       class="mt-2 block rounded-lg border px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 bg-gray-100 hover:bg-gray-300 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">Write
                                        a review</a>
                                @endif
                            @else
                                <a href="{{route('login')}}"
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
                                            <span class="block text-sm font-bold">{{$item->user->name}}</span>
                                            <span
                                                class="block text-sm text-gray-500">{{$item->created_at->diffForHumans()}}</span>
                                        </div>
                                        <x-bladewind.rating name="star-rating" size="small" clickable="false"
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
            </main>
            <aside class="w-full sm:w-1/3 md:w-1/4 px-2">
                <div class="sticky top-0 p-4 w-full">
                    <!-- navigation -->
                    <ul class="flex flex-col overflow-hidden">
                        <li class="my-4">
                            <h2 class="text-xl font-bold mb-4">Basic Information</h2>
                            <ul class="list-disc list-inside">
                                <li class="mb-2"><strong>Category:</strong> {{ $company->category->name }}</li>
                                <li class="mb-2"><strong>Phone:</strong> {{ $company->phone }}</li>
                                <li class="mb-2"><strong>Email:</strong> {{ $company->email }}</li>
                                <li class="mb-2"><strong>Website:</strong>
                                    <a href="{{ $company->website }}">{{$company->website}}</a>
                                </li>
                                <!-- Add other basic information fields -->
                            </ul>
                        </li>
                        <li class="my-4">
                            <h2 class="text-xl font-bold mb-4">Social Media</h2>
                            <ul class="flex space-x-4">
                                <li><a href="{{ $company->facebook }}" class="text-purple-600" target="_blank"><i
                                            class="fab fa-facebook"></i></a></li>
                                <li><a href="{{ $company->twitter }}" class="text-purple-600" target="_blank"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $company->instagram }}" class="text-purple-600" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $company->linkedin }}" class="text-purple-600" target="_blank"><i
                                            class="fab fa-linkedin"></i></a></li>
                                <li><a href="{{ $company->youtube }}" class="text-purple-600" target="_blank"><i
                                            class="fab fa-youtube"></i></a></li>
                                <!-- Add other social media links -->
                            </ul>
                        </li>
                        <li>
                            <h2 class="text-xl font-bold mb-4">Address</h2>
                            <p>{{ $company->address->address_line_1 }}, {{ $company->address->city }}
                                , {{ $company->address->state->name }}, {{ $company->address->country->name }}
                                @if($company->address->address_line_2)
                                    , {{ $company->address->address_line_2 }}
                                @endif
                            </p>
                        </li>
                    </ul>
                </div>
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

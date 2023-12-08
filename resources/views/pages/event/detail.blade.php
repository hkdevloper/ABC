@extends('layouts.main-user-details')

@section('content')
    <div class="container py-6 mx-auto flex flex-wrap">
        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
            <x-user.bread-crumb :data="['Home', 'Events', $event->title]"/>
            <div class="">
                <img src="{{url('storage/' . $event->thumbnail)}}" alt="Event Thumbnail" style="width: 100%; height: 400px;" class="mb-6 rounded-lg shadow-lg object-contain">
                <h1 class="text-3xl font-semibold mb-4">{{$event->title}}</h1>
                <p class="text-gray-500 mb-4">on {{ date('d M Y h:i a', (int)$event->start) }} Onwards</p>
                <p class="text-gray-500 mb-4">Organized by {{$event->user->name}}</p>
                <div class="flex items-center mb-4">
                    <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://ui-avatars.com/api/?name={{$event->user->name}}'/>
                    <div class="pl-3">
                        <div class="font-medium">
                            {{$event->user->name}}
                        </div>
                        <div class="text-gray-600 text-sm">
                            {{$event->created_at->diffForHumans()}}
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
                            {!! $event->description !!}
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
                                                $average_rating = 1;
                                                try{
                                                    foreach($event->getReviews() as $item){
                                                        $total_rating += $item->rating;
                                                    }
                                                    $count = $event->getReviewsCount() ? $event->getReviewsCount() : 1;
                                                    $average_rating = $total_rating / $count;
                                                }catch (Exception $e){
                                                    $average_rating = 1;
                                                }
                                            @endphp
                                            <x-bladewind.rating name="star-rating" size="medium" clickable="false"
                                                                rating="{{$average_rating}}"/>
                                            <span class="text-sm font-semibold">{{$average_rating}}/5</span>
                                        </div>

                                        <span class="block text-sm text-gray-500">Bases on {{$event->getReviews()->count()}} reviews</span>

                                        <hr class="my-4 border-t-2 border-gray-200">

                                        @auth
                                            @if(auth()->user()->hasRated("product", $event->id))
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
                                        @forelse($event->getReviews() as $item)
                                            <div class="flex flex-col gap-3 p-4 mb-2 bg-gray-100">
                                                <div class="flex justify-between items-center">
                                                    <div>
                                                        <span class="block text-sm font-bold">{{$item->user->name}}</span>
                                                        <span
                                                            class="block text-sm text-gray-500">{{$item->created_at}}</span>
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
                                    {{ $event->getReviews()->links() }}
                                </div>
                            </div>
                        </x-bladewind.tab-content>
                    </x-bladewind.tab-body>
                </x-bladewind.tab-group>
            </div>
            <!-- Related Events Section -->
            <section class="mt-8 p-4 bg-white">
                <h2 class="text-2xl font-semibold text-center underline">Related Events</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-2">
                    <!-- Event Items-->
                    @forelse($related_events as $event)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="each relative">
                                <img src="{{ url('storage/'.$event->thumbnail) }}" class="w-full h-48 object-contain" alt="Event">
                                <div class="badge absolute top-0 right-0 bg-purple-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">
                                    @php
                                        $date = \Carbon\Carbon::parse($event->start);
                                    @endphp
                                    {{$date->diffForHumans()}}
                                </div>
                                <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                                    <span class="mr-1 p-1 px-2 font-bold">105 Watching</span>
                                    <span class="mr-1 p-1 px-2 font-bold border-0 border-solid border-l border-gray-400">105 Likes</span>
                                    <span class="mr-1 p-1 px-2 font-bold border-0 border-solid border-l border-gray-400">105 Views</span>
                                </div>
                                <div class="desc p-4 text-gray-800">
                                    <div class="flex items-center mt-2">
                                        <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://ui-avatars.com/api/?name={{$event->user->name}}'/>
                                        <div class="pl-3">
                                            <div class="font-medium">
                                                {{$event->user->name}}
                                            </div>
                                            <div class="text-gray-600 text-sm">
                                                {{$event->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('view.event', [$event->slug])}}" target="_new" class="my-3 title font-bold block cursor-pointer hover:underline">{{$event->title}}</a>
                                    <span class="description text-sm block py-2 border-gray-400 mb-2">
                                        @php
                                            $description = strip_tags($event->description);
                                            $description = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
                                        @endphp
                                        {!! $description !!}
                                    </span>
                                </div>
                            </div>
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
                    @empty
                        <div class="w-full text-center">
                            <p class="text-gray-500 text-center w-full">No Events Found</p>
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
        ok_button_action="saveRating('rate-event')"
        ok_button_label="Submit"
        close_after_action="false"
        center_action_buttons="true">
        <form method="post" action="" id="rate-form">
            @csrf
            <b class="mt-0">Add your review</b>
            <x-bladewind.rating name="rate-event" rating="1"/>
            <x-bladewind.textarea name="review" label="Review" rows="3"/>
            <input type="hidden" name="item_id" value="{{$event->id}}">
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
        @endauth
    </script>
@endsection

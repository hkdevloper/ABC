@extends('layouts.main-user-list')

@section('content')
    <!-- Company Header Section -->
    <section class="bg-[url('{{url('storage/', $company->banner)}}')]] text-white p-4" style="background-image: url('{{url('storage/', $company->banner)}}')">

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

        <img alt="" src="{{url('storage/', $company->logo)}}" class="w-32 h-32 object-cover rounded-full mx-auto my-4">

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
                <section class="mt-8 bg-neutral-100 p-8 rounded shadow">
                    <h2 class="text-xl font-bold mb-4">About {{ $company->name }}</h2>
                    <p class="w-2/4 text-sm">{!! $company->description !!}</p>
                </section>
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
                                <li><a href="{{ $company->facebook }}" class="text-purple-600" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{{ $company->twitter }}" class="text-purple-600" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $company->instagram }}" class="text-purple-600" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $company->linkedin }}" class="text-purple-600" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="{{ $company->youtube }}" class="text-purple-600" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <!-- Add other social media links -->
                            </ul>
                        </li>
                        <li>
                            <h2 class="text-xl font-bold mb-4">Address</h2>
                            <p>{{ $company->address->address_line_1 }}, {{ $company->address->city }}, {{ $company->address->state->name }}, {{ $company->address->country->name }}
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
@endsection

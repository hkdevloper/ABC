@extends('layouts.main-user-list')

@section('head')

@endsection

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- User Profile Block -->
                        <div class="w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <section class="flex items-center justify-center">
                                <div class="container mx-auto">

                                    <!-- User Profile Card -->
                                    <div class="card bg-light-purple p-4 mb-4">
                                        <div class="flex md:flex-row items-center justify-between">
                                            <div class="mb-4 md:mb-0 md:mr-4">
                                                <h2 class="text-lg font-semibold">{{$user->first_name}} {{$user->last_name}}</h2>
                                                <p class="text-gray-500 text-base">Balance: <span
                                                        class="text-purple-500 text-base">{{$user->balance}}</span></p>
                                                <p class="text-gray-500 text-base">Email: {{$user->email}}</p>
                                            </div>
                                            <div
                                                class="rounded-b-full h-16 w-40 md:h-[160px] md:w-[160px] overflow-hidden">
                                                <img src="https://via.placeholder.com/500x500" alt="User Profile Image"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>


                                    <ul class="mb-4 flex list-none flex-row border-b-0 pl-0 w-[100vw] overflow-hidden"
                                        id="tabs-tab3" role="tablist" data-te-nav-ref>
                                        {{-- Dashboard --}}
                                        <li role="presentation">
                                            <a
                                                href="#tabs-home3"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase  leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-home-tab3"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-home3"
                                                data-te-nav-active
                                                role="tab"
                                                aria-controls="tabs-home3"
                                                aria-selected="true"
                                            >Home</a
                                            >
                                        </li>
                                        {{-- Listings --}}
                                        <li role="presentation">
                                            <a href="#tabs-listings3"
                                               class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                               id="tabs-listings-tab3" data-te-toggle="pill"
                                               data-te-target="#tabs-listings3" role="tab"
                                               aria-controls="tabs-listings3" aria-selected="false">Listings</a>
                                        </li>
                                        {{-- Messages --}}
                                        <li role="presentation">
                                            <a href="#tabs-messages3"
                                               class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                               id="tabs-messages-tab3" data-te-toggle="pill"
                                               data-te-target="#tabs-messages3" role="tab"
                                               aria-controls="tabs-messages3" aria-selected="false">Messages</a>
                                        </li>
                                        {{-- Settings --}}
                                        <li role="presentation">
                                            <a href="#tabs-settings"
                                               class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                               id="tabs-messages-tab4" data-te-toggle="pill"
                                               data-te-target="#tabs-settings" role="tab" aria-controls="tabs-settings"
                                               aria-selected="false">Settings</a>
                                        </li>
                                    </ul>


                                    <!--Tabs content-->
                                    <div>
                                        {{--Dashboard Tab--}}
                                        <div
                                            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:flex justify-between"
                                            id="tabs-home3"
                                            role="tabpanel"
                                            data-te-tab-active
                                            aria-labelledby="tabs-home-tab3">
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                                <!-- Card 1 -->
                                                <div class="bg-white p-4 rounded-lg card">
                                                    <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-3xl font-semibold text-purple-500">{{rand(10,999)}}</span>
                                                        <i class="fas fa-flag text-2xl text-purple-500"></i>
                                                    </div>
                                                    <h2 class="text-lg font-semibold mt-2">Pending Listings</h2>
                                                </div>

                                                <!-- Card 2 -->
                                                <div class="bg-white p-4 rounded-lg card">
                                                    <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-3xl font-semibold text-purple-500">{{rand(10,999)}}</span>
                                                        <i class="fas fa-flag text-2xl text-purple-500"></i>
                                                    </div>
                                                    <h2 class="text-lg font-semibold mt-2">Pending Listings</h2>
                                                </div>

                                                <!-- Card 3 -->
                                                <div class="bg-white p-4 rounded-lg card">
                                                    <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-3xl font-semibold text-purple-500">{{rand(10,999)}}</span>
                                                        <i class="fas fa-flag text-2xl text-purple-500"></i>
                                                    </div>
                                                    <h2 class="text-lg font-semibold mt-2">Pending Claims</h2>
                                                </div>

                                                <!-- Card 4 -->
                                                <div class="bg-white p-4 rounded-lg card">
                                                    <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-3xl font-semibold text-purple-500">{{rand(10,999)}}</span>
                                                        <i class="fas fa-flag text-2xl text-purple-500"></i>
                                                    </div>
                                                    <h2 class="text-lg font-semibold mt-2">Unpaid Invoices</h2>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Listings Tab--}}
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:flex justify-between"
                                            id="tabs-listings3"
                                            role="tabpanel"
                                            aria-labelledby="tabs-listings-tab3">
                                            <div class="w-1/7">
                                                <!--Tabs navigation-->
                                                <ul
                                                    class="mr-2 flex list-none flex-col flex-wrap pl-0 card rounded-none"
                                                    role="tablist"
                                                    data-te-nav-ref>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-company03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-company03"
                                                            data-te-nav-active
                                                            role="tab"
                                                            aria-controls="tabs-company03"
                                                            aria-selected="true"
                                                        >Company</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-product03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-product03"
                                                            role="tab"
                                                            aria-controls="tabs-product03"
                                                            aria-selected="false"
                                                        >Products</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-jobs03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-jobs03"
                                                            role="tab"
                                                            aria-controls="tabs-jobs03"
                                                            aria-selected="false"
                                                        >Jobs</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-event03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-event03"
                                                            role="tab"
                                                            aria-controls="tabs-event03"
                                                            aria-selected="false"
                                                        >Events</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-blog03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-blog03"
                                                            role="tab"
                                                            aria-controls="tabs-blog03"
                                                            aria-selected="false"
                                                        >Blogs</a
                                                        >
                                                    </li>
                                                    <li role="presentation" class="flex-grow text-center">
                                                        <a
                                                            href="#tabs-deal03"
                                                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-green-500 data-[te-nav-active]:text-green-500 border border-1 border-solid data-[te-nav-active]:border-success dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                            data-te-toggle="pill"
                                                            data-te-target="#tabs-deal03"
                                                            role="tab"
                                                            aria-controls="tabs-deal03"
                                                            aria-selected="false"
                                                        >Deals</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>

                                            <!--Tabs content-->
                                            <div class="mx-2 w-full p-2 h-auto card rounded-none">
                                                {{--Company Tab--}}
                                                <div
                                                    class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block w-full"
                                                    id="tabs-company03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-company-tab03"
                                                    data-te-tab-active>
                                                    <!-- Company Logo and Title -->
                                                    <div class="flex items-center justify-between">
                                                        <!-- Company Logo -->
                                                        <div class="flex items-center mb-3">
                                                            <img src="https://via.placeholder.com/500x500"
                                                                 alt="Company Logo" class="w-20 h-20 rounded-full mr-4">
                                                            <!-- Company Title -->
                                                            <div>
                                                                <h2 class="text-4xl font-semibold text-purple-800">
                                                                    Company Name</h2>
                                                                <p class="text-gray-600">Industry: Technology</p>
                                                            </div>
                                                        </div>
                                                        <!-- Highlight Buttons -->
                                                        <div class="space-x-4">
                                                            <button
                                                                class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600">
                                                                Edit
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- Location -->
                                                    <p class="text-gray-600 mt-4">
                                                        <i class="fas fa-map-marker-alt mr-2 text-purple-600"></i>
                                                        Location: City, State
                                                    </p>

                                                    <!-- About Us -->
                                                    <div class="mt-4">
                                                        <h3 class="text-2xl font-semibold text-purple-800">About Us</h3>
                                                        <p class="text-gray-600 mt-2">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                                            eget nisl sed mauris auctor ultrices. Nullam scelerisque
                                                            quam ac ultrices.
                                                        </p>
                                                    </div>

                                                    <!-- Contact Information -->
                                                    <div class="mt-4">
                                                        <h3 class="text-2xl font-semibold text-purple-800">Contact
                                                            Information</h3>
                                                        <p class="text-gray-600 mt-2">
                                                            <i class="fas fa-envelope mr-2 text-purple-600"></i>
                                                            Email: info@company.com
                                                        </p>
                                                        <p class="text-gray-600 mt-2">
                                                            <i class="fas fa-phone-alt mr-2 text-purple-600"></i>
                                                            Phone: +1 (123) 456-7890
                                                        </p>
                                                    </div>
                                                </div>
                                                {{--Products Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-product03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-product-tab03">
                                                    <!-- Product List -->
                                                    <div
                                                        class="p-4 bg-purple-100 rounded-lg flex justify-between items-center">
                                                        <h1 class="text-xl font-semibold mb-2 ">Products</h1>
                                                        <a href="#" class="text-blue-500 hover:underline">Add New</a>
                                                    </div>
                                                    <div class="datatable" data-table="product"></div>
                                                </div>
                                                {{--Jobs Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-jobs03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-job-tab03">
                                                    <!-- Job List -->
                                                    <div
                                                        class="p-4 bg-purple-100 rounded-lg flex justify-between items-center">
                                                        <h1 class="text-xl font-semibold mb-2 ">Jobs</h1>
                                                        <a href="#" class="text-blue-500 hover:underline">Add New</a>
                                                    </div>
                                                    <div class="datatable" data-table="jobs"></div>
                                                </div>
                                                {{--Events Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-event03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-event-tab03">
                                                    <!-- Event List -->
                                                    <div
                                                        class="p-4 bg-purple-100 rounded-lg flex justify-between items-center">
                                                        <h1 class="text-xl font-semibold mb-2 ">Events</h1>
                                                        <a href="#" class="text-blue-500 hover:underline">Add New</a>
                                                    </div>
                                                    <div class="datatable" data-table="events"></div>
                                                </div>
                                                {{--Blogs Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-blog03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-blog-tab03">
                                                    <!-- Blog List -->
                                                    <div
                                                        class="p-4 bg-purple-100 rounded-lg flex justify-between items-center">
                                                        <h1 class="text-xl font-semibold mb-2 ">Blogs</h1>
                                                        <a href="#" class="text-blue-500 hover:underline">Add New</a>
                                                    </div>
                                                    <div class="datatable" data-table="blog"></div>
                                                </div>
                                                {{--Deals Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-deal03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-deal-tab03">
                                                    <!-- Deal List -->
                                                    <div
                                                        class="p-4 bg-purple-100 rounded-lg flex justify-between items-center">
                                                        <h1 class="text-xl font-semibold mb-2 ">Deals</h1>
                                                        <a href="#" class="text-blue-500 hover:underline">Add New</a>
                                                    </div>
                                                    <div class="datatable" data-table="deals"></div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--Messages Tab--}}
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-messages3"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab3">
                                            <div class="bg-white p-4 rounded-lg card">
                                                <!-- Card Header -->
                                                <div class="flex justify-between items-center">
                                                    <h2 class="text-lg font-semibold">Important Message</h2>
                                                    <i class="fas fa-exclamation-circle text-2xl text-red-500"></i>
                                                </div>
                                                <!-- Card Content -->
                                                <p class="text-gray-600 mt-2">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget
                                                    nisl sed mauris auctor ultrices. Nullam scelerisque quam ac
                                                    ultrices.
                                                </p>
                                            </div>
                                        </div>
                                        {{--Settings Tab--}}
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-settings"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab4">
                                            <div class="py-12">
                                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                                        <div class="max-w-xl">
                                                            <livewire:profile.update-profile-information-form/>
                                                        </div>
                                                    </div>

                                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                                        <div class="max-w-xl">
                                                            <livewire:profile.update-password-form/>
                                                        </div>
                                                    </div>

                                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                                        <div class="max-w-xl">
                                                            <livewire:profile.delete-user-form/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')

@endsection

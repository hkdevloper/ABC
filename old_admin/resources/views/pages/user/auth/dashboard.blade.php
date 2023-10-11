@extends('layouts.main-user-list')

@section('head')

@endsection

@section('content')
    <div class="flex flex-no-wrap container p-6">
        <!--Menu List -->
        <ul class="w-2/8 mb-4 mx-3 flex list-none flex-col border-b-0 pl-0"
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
                >Dashboard</a>
            </li>
            {{-- Products --}}
            <li role="presentation">
                <a href="#tabs-product03"
                   class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                   id="tabs-messages-tab4" data-te-toggle="pill"
                   data-te-target="#tabs-product03" role="tab" aria-controls="tabs-product03"
                   aria-selected="false">Products</a>
            </li>
            {{--Jobs--}}
            <li role="presentation">
                <a href="#tabs-jobs03"
                   class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                   id="tabs-messages-tab4" data-te-toggle="pill"
                   data-te-target="#tabs-jobs03" role="tab" aria-controls="tabs-jobs03"
                   aria-selected="false">Jobs</a>
            </li>
            {{--Event--}}
            <li role="presentation">
                <a href="#tabs-event03"
                   class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                   id="tabs-messages-tab4" data-te-toggle="pill"
                   data-te-target="#tabs-event03" role="tab" aria-controls="tabs-event03"
                   aria-selected="false">Events</a>
            </li>
            {{--Blogs--}}
            <li role="presentation">
                <a href="#tabs-blog03"
                   class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                   id="tabs-messages-tab4" data-te-toggle="pill"
                   data-te-target="#tabs-blog03" role="tab" aria-controls="tabs-blog03"
                   aria-selected="false">Blogs</a>
            </li>
            {{--Deals--}}
            <li role="presentation">
                <a href="#tabs-deal03"
                   class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-3 md:px-7 py-2 md:py-3.5 text-xs md:text-sm font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                   id="tabs-messages-tab4" data-te-toggle="pill"
                   data-te-target="#tabs-deal03" role="tab" aria-controls="tabs-deal03"
                   aria-selected="false">Deals</a>
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
        <div class="w-full ml-2">
            {{--Dashboard Tab--}}
            <div
                class="hidden p-6 opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block w-full"
                id="tabs-home3"
                role="tabpanel"
                data-te-tab-active
                aria-labelledby="tabs-home-tab3">
                <h1 class="text-4xl font-semibold text-blue-500">Hello, {{$user->first_name}}!</h1>
                <p class="text-gray-600 mt-2">Welcome on board!!!</p>
                <br>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-100">
                    <div class="bg-white p-4 rounded-lg card w-full">
                        <div class="flex justify-between items-center">
                                                        <span class="text-4xl font-semibold">{{rand(10,999)}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-12 h-12 text-cyan-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold mt-2">Pending Products</h2>
                    </div>

                    <div class="bg-white p-4 rounded-lg card">
                        <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-4xl font-semibold">{{rand(10,999)}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-12 h-12 text-pink-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                            </svg>


                        </div>
                        <h2 class="text-xl font-semibold mt-2">Pending Jobs</h2>
                    </div>

                    <div class="bg-white p-4 rounded-lg card">
                        <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-4xl font-semibold">{{rand(10,999)}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-12 h-12 text-orange-300">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M10.5 8.25h3l-3 4.5h3"/>
                            </svg>

                        </div>
                        <h2 class="text-xl font-semibold mt-2">Pending Messages</h2>
                    </div>

                    <div class="bg-white p-4 rounded-lg card">
                        <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-4xl font-semibold">{{rand(10,999)}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-12 h-12 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                            </svg>

                        </div>
                        <h2 class="text-xl font-semibold mt-2">Pending Deals</h2>
                    </div>
                    <div class="bg-white p-4 rounded-lg card">
                        <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-4xl font-semibold">{{rand(10,999)}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-12 h-12 text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                        </div>
                        <h2 class="text-xl font-semibold mt-2">Pending Events</h2>
                    </div>

                    <div class="bg-white p-4 rounded-lg card">
                        <div class="flex justify-between items-center">
                                                        <span
                                                            class="text-4xl font-semibold">{{rand(10,999)}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-12 h-12 text-purple-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                            </svg>

                        </div>
                        <h2 class="text-xl font-semibold mt-2">Unpaid Invoices</h2>
                    </div>
                </div>
            </div>
            {{--Products Tab--}}
            <div
                class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block w-full"
                id="tabs-product03"
                role="tabpanel"
                style="border: 1px solid red"
                aria-labelledby="tabs-product-tab03">
                <!-- Product List -->
                <div
                    class="p-4 bg-purple-100 rounded-lg flex justify-between items-center">
                    <h1 class="text-xl font-semibold mb-2 ">Products</h1>
                    <a href="#" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded">
                        Add New
                    </a>
                </div>
                <div class="datatable w-full" data-table="product"></div>
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
            {{--Event Tab--}}
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
            {{--Messages Tab--}}
            <div
                class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                id="tabs-messages3"
                role="tabpanel"
                aria-labelledby="tabs-profile-tab3">
                <div class="bg-white p-4 rounded-lg card">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold">Important Message</h2>
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
@endsection

@section('page-scripts')

@endsection

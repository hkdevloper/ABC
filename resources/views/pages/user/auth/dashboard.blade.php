@extends('layouts.main-user-list')

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
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h2 class="text-2xl font-semibold">{{$user->first_name}} {{$user->last_name}}</h2>
                                                <p class="text-gray-500">DOB: 14/09/2002</p>
                                                <p class="text-gray-500">Location: Jam Kalyanpur, Gujarat</p>
                                                <p class="text-gray-500">Email: {{$user->email}}</p>
                                            </div>
                                            <div class="rounded-b-full h-[160px] w-[160px] overflow-hidden mr-4">
                                                <img src="https://via.placeholder.com/500x500" alt="User Profile Image"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Tabs navigation-->
                                    <ul
                                        class="mb-4 flex list-none flex-row flex-wrap border-b-0 pl-0"
                                        id="tabs-tab3"
                                        role="tablist"
                                        data-te-nav-ref>
                                        <li role="presentation">
                                            <a
                                                href="#tabs-home3"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
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
                                        <li role="presentation">
                                            <a
                                                href="#tabs-profile3"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-profile-tab3"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-profile3"
                                                role="tab"
                                                aria-controls="tabs-profile3"
                                                aria-selected="false"
                                            >Profile</a
                                            >
                                        </li>
                                        <li role="presentation">
                                            <a
                                                href="#tabs-messages3"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-messages-tab3"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-messages3"
                                                role="tab"
                                                aria-controls="tabs-messages3"
                                                aria-selected="false"
                                            >Messages</a
                                            >
                                        </li>
                                        <li role="presentation">
                                            <a
                                                href="#tabs-settings"
                                                class="my-2 block border-solid border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-purple-500 data-[te-nav-active]:text-purple-600 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                                id="tabs-messages-tab4"
                                                data-te-toggle="pill"
                                                data-te-target="#tabs-settings"
                                                role="tab"
                                                aria-controls="tabs-settings"
                                                aria-selected="false"
                                            >Settings</a
                                            >
                                        </li>
                                    </ul>

                                    <!--Tabs content-->
                                    <div>
                                        {{--Home Tab--}}
                                        <div
                                            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:flex justify-between"
                                            id="tabs-home3"
                                            role="tabpanel"
                                            data-te-tab-active
                                            aria-labelledby="tabs-home-tab3">
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
                                                    class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-company03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-company-tab03"
                                                    data-te-tab-active>
                                                    <!-- Company List -->
                                                    {{$dataTable->table()}}
                                                </div>
                                                {{--Products Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-product03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-product-tab03">
                                                    <!-- Product List -->
                                                    Product
                                                </div>
                                                {{--Jobs Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-jobs03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-job-tab03">
                                                    <!-- Job List -->
                                                    Job
                                                </div>
                                                {{--Events Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-event03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-event-tab03">
                                                    <!-- Event List -->
                                                    Event
                                                </div>
                                                {{--Blogs Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-blog03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-blog-tab03">
                                                    <!-- Blog List -->
                                                    Blog
                                                </div>
                                                {{--Deals Tab--}}
                                                <div
                                                    class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                                    id="tabs-deal03"
                                                    role="tabpanel"
                                                    aria-labelledby="tabs-deal-tab03">
                                                    Deals
                                                </div>
                                            </div>
                                        </div>
                                        {{--Profile Tab--}}
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-profile3"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab3">
                                            <div class="mx-auto bg-white p-6 rounded shadow-md">
                                                <h2 class="text-2xl font-semibold mb-4">Edit Profile</h2>
                                                <form action="{{ route('user.profile') }}" method="POST">
                                                    @csrf
                                                    <div class="mb-4">
                                                        <label for="first_name" class="block text-gray-600">First
                                                            Name</label>
                                                        <input type="text" id="first_name" name="first_name"
                                                               value="{{ $user->first_name }}"
                                                               class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:border-blue-400"
                                                               required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="last_name" class="block text-gray-600">Last
                                                            Name</label>
                                                        <input type="text" id="last_name" name="last_name"
                                                               value="{{ $user->last_name }}"
                                                               class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:border-blue-400"
                                                               required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="email" class="block text-gray-600">Email</label>
                                                        <input type="email" id="email" name="email"
                                                               value="{{ $user->email }}"
                                                               class="w-full rounded border border-gray-300 px-3 py-2 focus:outline-none focus:border-blue-400"
                                                               required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="block text-gray-600">Email Verified</label>
                                                        <div
                                                            class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                                            <input type="checkbox" readonly disabled id="email_verified"
                                                                   name="email_verified"
                                                                   {{ $user->email_verified ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer">
                                                            <label for="email_verified"
                                                                   class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                                        </div>
                                                        <label for="email_verified" class="text-gray-700">Verify Email</label>
                                                    </div>
                                                    <!-- Add other fields and indicators as needed -->
                                                    <div class="mt-6">
                                                        <button type="submit"
                                                                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-700">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{--Messages Tab--}}
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-messages3"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab3">
                                            <div id="datatable"></div>
                                        </div>
                                        {{--Settings Tab--}}
                                        <div
                                            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                            id="tabs-settings"
                                            role="tabpanel"
                                            aria-labelledby="tabs-profile-tab4">
                                            <div class="relative mb-4 flex flex-wrap items-stretch">
  <span
      class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
      id="basic-addon1"
  >@</span
  >
                                                <input
                                                    type="text"
                                                    class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                                    placeholder="Username"
                                                    aria-label="Username"
                                                    aria-describedby="basic-addon1"/>
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
    {{ $dataTable->scripts() }}
@endsection

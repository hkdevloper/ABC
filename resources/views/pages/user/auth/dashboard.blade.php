@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <section class="text-gray-600 body-font">
                    <div class="container lg:px-24 md:px-12 py-6 mx-auto flex flex-wrap">
                        <!-- User Profile Block -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <section class="flex items-center justify-center">
                                <div class="container mx-auto p-4">

                                    <!-- User Profile Card -->
                                    <div class="card bg-light-purple p-4 mb-4">
                                        <div class="flex items-center">
                                            <div class="rounded-full h-16 w-16 overflow-hidden mr-4">
                                                <img src="https://via.placeholder.com/400x400" alt="User Profile Image"
                                                     class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <h2 class="text-2xl font-semibold">Hardik</h2>
                                                <p class="text-gray-500">DOB: 14/09/2002</p>
                                                <p class="text-gray-500">Location: Jam Kalyanpur, Gujarat</p>
                                                <p class="text-gray-500">Email: hardik@example.com</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabbed Navigation -->
                                    <ul class="flex border-b-2 border-light-purple mb-4">
                                        <li class="mr-1">
                                            <a href="#profile" class="tab tab-active">Profile</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#company" class="tab">Company</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#job" class="tab">Job</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#products" class="tab">Products</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#event" class="tab">Event</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#blog" class="tab">Blog</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#contact" class="tab">Contact</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#settings" class="tab">Settings</a>
                                        </li>
                                        <li class="mr-1">
                                            <a href="#billing" class="tab">Billing</a>
                                        </li>
                                    </ul>

                                    <!-- Content for each tab -->
                                    <div class="tab-content">
                                        <!-- Profile Tab Content -->
                                        <div class="tab-pane tab-active" id="profile">
                                            <!-- Your profile content goes here -->
                                            <h1>Profile Tab</h1>
                                        </div>

                                        <!-- Company Tab Content -->
                                        <div class="tab-pane" id="company">
                                            <!-- Company information goes here -->
                                            <h1>Company Tab</h1>
                                        </div>

                                        <!-- Job Tab Content -->
                                        <div class="tab-pane" id="job">
                                            <!-- Job-related content goes here -->
                                            <h1>Job Tab</h1>
                                        </div>

                                        <!-- Products Tab Content -->
                                        <div class="tab-pane" id="products">
                                            <!-- Product information goes here -->
                                            <h1>Products Tab</h1>
                                        </div>

                                        <!-- Event Tab Content -->
                                        <div class="tab-pane" id="event">
                                            <!-- Event-related content goes here -->
                                            <h1>Event Tab</h1>
                                        </div>

                                        <!-- Blog Tab Content -->
                                        <div class="tab-pane" id="blog">
                                            <!-- Blog content goes here -->
                                            <h1>Blog Tab</h1>
                                        </div>

                                        <!-- Contact Tab Content -->
                                        <div class="tab-pane" id="contact">
                                            <!-- Contact information goes here -->
                                            <h1>Contact Tab</h1>
                                        </div>

                                        <!-- Settings Tab Content -->
                                        <div class="tab-pane" id="settings">
                                            <!-- Settings options go here -->
                                            <h1>Settings Tab</h1>
                                        </div>

                                        <!-- Billing Tab Content -->
                                        <div class="tab-pane" id="billing">
                                            <!-- Billing information goes here -->
                                            <h1>Billing Tab</h1>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    {{-- Page Level Script --}}
    <script>
        // JavaScript code for handling tab navigation
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-pane');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();

                tabs.forEach((t) => t.classList.remove('tab-active'));
                tab.classList.add('tab-active');

                tabContents.forEach((content) => content.classList.remove('tab-active'));
                tabContents[index].classList.add('tab-active');
            });
        });
    </script>
@endsection

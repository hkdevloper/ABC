@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font container">
                    <!-- Content Box -->
                    <div class="px-2 py-6 mx-auto flex flex-wrap">
                        <!-- Forum Answer BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="container mx-auto px-4 py-8">
                                <div class="bg-white card p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center">
                                            <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                                                 class="w-10 h-10 rounded-full mr-4">
                                            <div>
                                                <h2 class="text-lg font-semibold text-gray-800">John Doe</h2>
                                                <p class="text-gray-500 text-sm">Posted on September 22, 2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-gray-600 text-sm">Category: General</span>
                                        </div>
                                    </div>
                                    <h1 class="text-xl font-semibold text-gray-900 mb-4">Was the origin positioning
                                        'box' removed from Xcode 6?</h1>
                                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Nulla facilisi. Sed euismod sapien a libero tincidunt, nec bibendum arcu
                                        convallis.</p>
                                    <hr class="my-4 border-t-2 border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="text-gray-600 text-sm">{{rand(0, 999)}} Answers</span>
                                            <span class="ml-4 text-gray-600 text-sm">{{rand(0, 999)}} Views</span>
                                        </div>
                                        <div>
                                            <a href="#answer-block"
                                               class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded-full focus:outline-none">
                                                Answer
                                            </a>
                                            <button class="text-purple-500 hover:underline ml-2">
                                                Share
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white card p-6 mt-4">
                                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Answers</h2>

                                    <div class="p-6 card bg-white mb-5">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-4">No Answers Yet</h2>
                                        <p class="text-gray-700">There are currently no answers to this question. Be the
                                            first to provide an answer!</p>
                                    </div>
                                    @for($i=1; $i<rand(1,5);$i++)
                                        <!-- Answer 1 -->
                                        <div class="mb-6 p-4 card card-hovered bg-white relative">
                                            <!-- Report Button (Top Right) -->
                                            <a href="#" class="absolute top-2 right-2 flex items-center text-red-500">
                                                <i class="fas fa-exclamation-circle mr-1"></i></a>

                                            <!-- User Details (Left) -->
                                            <div class="flex items-start mb-2">
                                                <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                                                     class="w-10 h-10 rounded-full mr-4">
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-800">Jane Smith</h3>
                                                    <p class="text-gray-500 text-sm">Answered on September 23, 2023</p>
                                                </div>
                                            </div>

                                            <!-- Answer Text -->
                                            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Nulla facilisi. Sed euismod sapien a libero tincidunt, nec
                                                bibendum arcu convallis.</p>
                                        </div>

                                    @endfor

                                    <!-- Reply Form -->
                                    <div id="answer-block" class="mb-6 card p-2">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Submit your Answer</h3>
                                        <form>
                                            <div class="mb-4">
                                                <label for="reply" class="block text-gray-800 font-semibold mb-2">Your
                                                    Reply</label>
                                                <textarea id="reply" name="reply" rows="4"
                                                          class="ck-editor__editable w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                                                          required></textarea>
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="submit"
                                                        class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-sm px-4 py-2 rounded-full focus:outline-none">
                                                    Submit Reply
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Side Block -->
                        @include('includes.sidebar')
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

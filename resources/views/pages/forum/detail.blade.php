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
                                                <h2 class="text-lg font-semibold text-gray-800">{{$forum->user->name}}</h2>
                                                <p class="text-gray-500 text-sm">Posted on {{date_format($forum->created_at, 'd M y')}}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="text-gray-600 text-sm">Category: {{$forum->category->name}}</span>
                                        </div>
                                    </div>
                                    <h1 class="text-xl font-semibold text-gray-900 mb-4">{{$forum->title}}</h1>
                                    <p class="text-gray-700">{!! $forum->body !!}</p>
                                    <hr class="my-4 border-t-2 border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="text-gray-600 text-sm">{{$forum->countAnswers()}} Answers</span>
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

                                    @if($forum->forumReplies == null)
                                        <div class="p-6 card bg-white mb-5">
                                            <h2 class="text-xl font-semibold text-gray-800 mb-4">No Answers Yet</h2>
                                            <p class="text-gray-700">There are currently no answers to this question. Be the
                                                first to provide an answer!</p>
                                        </div>
                                    @else
                                        @foreach($forum->forumReplies as $ans)
                                            <div class="mb-6 p-4 card card-hovered bg-white relative">
                                                <!-- User Details (Left) -->
                                                <div class="flex items-start mb-2">
                                                    <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                                                         class="w-10 h-10 rounded-full mr-4">
                                                    <div>
                                                        <h3 class="text-lg font-semibold text-gray-800">{{$ans->user->name}}</h3>
                                                        <p class="text-gray-500 text-sm">Answered on {{date_format($ans->created_at, 'd M y')}}</p>
                                                        <!-- Answer Text -->
                                                        <p class="text-gray-700">{{$ans->body}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <!-- Reply Form -->
                                    <div id="answer-block" class="mb-6 card p-2">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Submit your Answer</h3>
                                        <form action="{{route('forum.reply')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="forum_id" value="{{$forum->id}}" required>
                                            <div class="mb-4">
                                                <label for="reply" class="block text-gray-800 font-semibold mb-2">Your
                                                    Reply</label>
                                                <textarea id="reply" name="body" rows="4"
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

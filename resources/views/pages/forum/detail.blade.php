@extends('layouts.user')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <style>
        #container {
            margin: 0 auto;
        }
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* Block images */
            max-width: 100%;
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')
    <div class="container py-6 mx-auto flex flex-wrap">
        <x-user.bread-crumb :data="['Home', 'Events', $forum->title]"/>
        <div class="w-full">
            <div class="bg-white card p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                             class="w-10 h-10 rounded-full mr-4">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">{{$forum->user->name}}</h2>
                            <p class="text-gray-500 text-sm">Posted
                                on {{date_format($forum->created_at, 'd M y')}}</p>
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
                        <span class="ml-4 text-gray-600 text-sm">{{$viewCount}} Views</span>
                    </div>
                    <div>
                        <button class="text-purple-500 hover:underline ml-2">
                            Share
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full my-5 p-2">
            <a href="#answer-block"
               class="block text-white bg-purple-500 hover:bg-purple-800 font-bold uppercase text-xs px-4 py-2 rounded-full focus:outline-none w-full text-center p-2">
                Leave an Answer
            </a>
        </div>
        <!-- Reply Form -->
        <div id="answer-block" class="mb-6 p-2">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Submit your Answer</h3>
            <form id="replyForm" action="{{ route('forum.reply') }}" method="post">
                @csrf
                <input type="hidden" name="forum_id" value="{{ $forum->id }}" required>
                <div class="mb-4">
                    <label for="reply" class="block text-gray-800 font-semibold mb-2">Your Reply</label>
                    <textarea id="reply" name="body" rows="4" class="hidden" required></textarea>
                    <div id="container">
                        <div id="editor"></div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" id="submitReply" class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-sm px-4 py-2 rounded-full focus:outline-none">
                        Submit Reply
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white mt-4 p-2">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Answers</h2>
            @forelse($forum->forumReplies as $ans)
                <div class="mb-6 p-4 card card-hovered bg-white relative">
                    <!-- User Details (Left) -->
                    <div class="flex items-start mb-2">
                        <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                             class="w-10 h-10 rounded-full mr-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{$ans->user->name}}</h3>
                            <p class="text-gray-500 text-sm">Answered
                                on {{date_format($ans->created_at, 'd M y')}}</p>
                            <!-- Answer Text -->
                            <p class="text-gray-700">{!! $ans->body !!}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-6 card bg-white mb-5">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">No Answers Yet</h2>
                    <p class="text-gray-700">There are currently no answers to this question. Be
                        the
                        first to provide an answer!</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection

@section('page-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get CKEditor instance
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                    editor.model.document.on('change:data', () => {
                        // Update hidden textarea with CKEditor content
                        document.querySelector('#reply').value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection

@extends('layouts.user')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet" />

    <style>
        #container {
            margin: 0 auto;
        }

        #editor {
            height: 200px;
            width: 100%;
            background: white;
        }

        #content img {
            max-width: 100%;
            height: auto;
        }

        #content p{
            margin: 10px 0;
            width: 100%;
            text-wrap: pretty;
        }
    </style>
@endsection
@section('content')
    <x-user.bread-crumb :data="['Home', 'Events', $forum->title]"/>
    <div class="container py-6 mx-auto flex flex-wrap items-center justify-center">
        <div class="w-[95vw] md:w-full mx-auto">
            <div class="bg-white card md:p-6 p-2">
                <div class="flex md:flex-row flex-col md:items-center md:justify-between mb-4">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                             class="w-8 h-8 md:w-10 md:h-10 rounded-full mr-2 md:mr-4">
                        <div>
                            <h2 class="text-base md:text-lg font-semibold text-gray-800">{{$forum->company->name}}</h2>
                            <p class="text-gray-500 text-xs md:text-sm">Posted on {{date_format($forum->created_at, 'd M y')}}</p>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <span class="text-gray-600 text-xs md:text-sm">Category: {{$forum->category->name}}</span>
                    </div>
                </div>
                <h1 class="text-lg md:text-xl font-semibold text-gray-900 mb-4">{{$forum->title}}</h1>
                <div id="content" class="text-xs md:text-sm text-gray-700">{!! $forum->body !!}</div>
                <hr class="my-4 border-t-2 border-gray-200">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-600 text-sm">{{$forum->countAnswers()}} Answers</span>
                        <span class="ml-4 text-gray-600 text-sm">{{$viewCount}} Views</span>
                    </div>
                </div>
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
        <div class="w-full my-5 p-2">
            <button onclick="showAnswerForm()"
                    class="block text-white bg-purple-500 hover:bg-purple-800 font-bold uppercase text-xs px-4 py-2 rounded-full focus:outline-none w-full text-center p-2">
                @auth
                    @if(auth()->id() === $forum->user_id)
                        <span class="text-white">You cannot answer your own question</span>
                    @else

                    @endif
                @endauth
                    Leave an Answer
            </button>
        </div>
        <!-- Reply Form -->
        <div id="answer-block" class="mb-6 p-2 w-full hidden">
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
                    <button type="submit" id="submitReply"
                            class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-sm px-4 py-2 rounded-full focus:outline-none">
                        Submit Reply
                    </button>
                </div>
            </form>
        </div>
        <div class="w-full mt-4 p-2">
            <h2 class="text-lg md:text-xl font-semibold text-gray-900 mb-4">Answers</h2>
            @forelse($forum->forumReplies as $ans)
                <div class="mb-3 md:mb-6 p-2 md:p-4 card card-hovered bg-white relative">
                    <!-- User Details (Left) -->
                    <div class="flex items-start mb-2">
                        <img src="https://via.placeholder.com/100x100" alt="User Avatar"
                             class="w-8 h-8 md:w-10 md:h-10 rounded-full mr-2 md:mr-4">
                        <div class="w-full">
                            <h3 class="text-base md:text-lg font-semibold text-gray-800">{{$ans->user->name}}</h3>
                            <p class="text-gray-500 text-xs md:text-sm">Answered on {{date_format($ans->created_at, 'd M y')}}</p>
                            <!-- Answer Text -->
                            <div class="text-sm text-gray-700 mt-3 w-100">{!! $ans->body !!}</div>
                            <hr class="my-3 w-100">
                            <!-- Action Buttons -->
                            <div class="flex items center mt-2">
                                @auth
                                    @if(auth()->id() === $ans->user_id)
                                    <button class="text-blue-500 hover:underline text-xs md:text-sm ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                    <button class="text-red-500 hover:underline text-xs md:text-sm ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                    @endif
                                @endauth
                                <button class="flex justify-center items-center text-red-600 hover:underline text-xs md:text-sm ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                    </svg> &nbsp;Report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="w-full md:p-2 p-6 card bg-white mb-5">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">No Answers Yet</h2>
                    <p class="text-gray-700">There are currently no answers to this question. Be the first to provide an answer!</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>

    <script>
        let content = document.getElementById('content');
        let images = content.getElementsByTagName('img');
        for (let i = 0; i < images.length; i++) {
            images[i].classList.add('fixed-img');
        }
    </script>
    <script>
        //import { Base64UploadAdapter } from '@ckeditor/ckeditor5-upload';
        function showAnswerForm() {
            let checkAuth = '{{auth()->id()}}';
            if (checkAuth === '' || checkAuth === 'null') {
                window.location.href = '{{route('auth.login')}}';
                return;
            }
            // Toggle visibility of an answer form
            let answerBlock = document.getElementById('answer-block');
            answerBlock.classList.toggle('hidden');
        }

        document.addEventListener("DOMContentLoaded", function () {
            const toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote'],
                ['link', 'image'],

                [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'align': [] }],
            ];
            const options = {
                debug: 'info',
                modules: {
                    toolbar: toolbarOptions,
                },
                placeholder: 'Compose an answer...',
                theme: 'snow'
            };
            const quill = new Quill('#editor', options);
        });
    </script>
@endsection

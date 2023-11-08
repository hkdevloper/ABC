@extends('layouts.main-user-details')

@section('content')
    <div class="w-full mb-10 lg:mb-0 overflow-hidden px-2">
        <div class="my-2 mx-auto md:px-6">
            <img src="{{url('storage/' . $blog->thumbnail)}}"
                 class="mb-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="image" />

            <div class="mb-6 flex items-center">
                <img src="https://ui-avatars.com/api/?name={{$blog->user->name}}" class="mr-2 h-8 rounded-full" alt="avatar"
                     loading="lazy" />
                <div>
                    <span> Published <u>{{$blog->created_at}}</u> by </span>
                    <a href="#" class="font-medium">{{$blog->user->name}}</a>
                </div>
            </div>
            <h1 class="mb-6 text-3xl font-bold">{{$blog->title}}</h1>
            <p>{!! $blog->content !!}</p>
        </div>
        <!-- Comment Section -->
        <section class="my-8">
            <h5 class="mb-10 text-xl font-semibold md:mb-6">
                Comments: 3
            </h5>

            <!-- Comment -->
            <div class="mb-12 flex flex-wrap md:mb-0">
                <div class="w-full md:w-2/12 shrink-0 grow-0 basis-auto">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(24).jpg"
                         class="mb-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="Avatar" />
                </div>

                <div class="w-full md:w-10/12 shrink-0 grow-0 basis-auto md:pl-6">
                    <p class="mb-3 font-semibold">Marta Dolores</p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Distinctio est ab iure inventore dolorum consectetur? Molestiae
                        aperiam atque quasi consequatur aut? Repellendus alias dolor ad
                        nam, soluta distinctio quis accusantium!
                    </p>
                </div>
            </div>
        </section>
        <!-- Leave Reply -->
        <section class="my-8">
            <h5 class="mb-10 text-center text-xl font-semibold">Leave a reply</h5>
            <form>
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <x-bladewind::input type="text" name="name" placeholder="Name" />
                </div>
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <x-bladewind::input type="email" name="email" placeholder="Email" />
                </div>
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <x-bladewind::textarea type="text" id="message" placeholder="Message" name="message"/>
                </div>

                <x-bladewind::button class="w-full bg-purple-500 text-white" type="submit">Submit</x-bladewind::button>
            </form>
        </section>
        <!-- Related Products Section -->
        <section class="mt-8 p-1 bg-white">
            <h2 class="text-2xl font-semibold">Related Blogs</h2>
            @if($related_blogs->count() == 0)
                <p class="text-gray-500 text-center mt-10">No related blogs found.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                    @foreach($related_blogs as $blog)
                        <div class="bg-white card overflow-hidden w-full mb-4">
                            <div class="relative">
                                <img class="w-full h-60 object-cover"
                                     src="{{url('storage/'.$blog->thumbnail)}}" alt="Blog Thumbnail">
                            </div>
                            <div class="px-4 py-3">
                                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{$blog->title}}</h2>
                                <p class="text-gray-700 text-sm mb-4">
                                    @php
                                        $content = $blog->content;
                                        $limit = 75; // You can adjust the character limit
                                    @endphp

                                    @if(strlen($content) > $limit)
                                        {!!  substr($content, 0, $limit) !!}...
                                    @else
                                        {!! $content !!}
                                    @endif
                                </p>
                                <div class="flex flex-wrap mb-4">
                                    @php
                                        $color = [
                                        'bg-purple-100 text-purple-600',
                                        'bg-blue-100 text-blue-600',
                                        'bg-green-100 text-green-600',
                                        'bg-yellow-100 text-yellow-600',
                                        'bg-red-100 text-red-600',
                                        'bg-indigo-100 text-indigo-600',
                                        'bg-pink-100 text-pink-600',
                                        'bg-gray-100 text-gray-600',
                                        ]
                                    @endphp
                                    @foreach($blog->tags as $tag)
                                        <span class="{{$color[rand(0,7)]}} px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">{{$tag}}</span>
                                    @endforeach
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex space-x-4">
                                        <button
                                            class="border border-purple-200 p-1 rounded-full hover:bg-purple-500 text-purple-500 hover:text-white transition duration-300 ease-in-out text-xs">
                                            <i class="fas fa-thumbs-up"></i> Like
                                        </button>
                                        <button
                                            class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out text-xs">
                                            <i class="fas fa-share"></i> Share
                                        </button>
                                    </div>
                                    <a href="{{route('view.blog', [$blog->slug])}}"
                                       class="text-purple-500 hover:text-white rounded-full px-2 py-1 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                       style="border: 1px solid;">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
@endsection

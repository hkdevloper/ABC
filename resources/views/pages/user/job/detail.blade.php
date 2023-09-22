@extends('layouts.main-user-details')

@section('content')
    <div class="bg-blue-100 p-4 rounded-lg shadow-lg flex items-center">
        <div class="flex-grow">
            <h1 class="text-2xl font-semibold text-blue-900">Full Stack Developer Intern</h1>
            <p class="text-gray-600">Company Name</p>
            <div class="mt-4">
                <button
                    class="border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white py-2 px-4 rounded-full hover:rounded-full transition-all duration-300 ease-in-out">
                    Apply for job
                </button>
            </div>
        </div>
        <div class="ml-4">
            <div class="relative">
                <img src="https://via.placeholder.com/160x160" alt="job thumbnail image" width="150" height="150"
                     class="rounded-t-full">
                <p class="absolute bottom-0 left-0 right-0 bg-orange-400 rounded-b-lg text-white text-center py-1 text-sm font-semibold">
                    Company Name</p>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <h1 class="text-3xl text-black">Job Overview</h1>
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <!-- Job Overview Card 1 -->
        @for($i=1;$i<7;$i++)
            <div class="bg-white p-4 card flex">
                <div class="flex-shrink-0 mr-4">
                    <img src="https://via.placeholder.com/60x60" alt="Icon" width="60" height="60" class="rounded-full">
                </div>
                <div>
                    <p class="text-lg font-semibold">Title {{$i}}</p>
                    <p class="text-gray-600">Value {{$i}}</p>
                </div>
            </div>
        @endfor
    </div>
    <hr class="my-4">
    <h1 class="text-3xl text-black">Job Description</h1>
    <div class="mt-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium ad adipisci alias amet
            aperiam asperiores atque autem blanditiis commodi consequatur consequuntur corporis cumque cupiditate
            delectus deleniti dicta dignissimos dolor doloremque doloribus ducimus ea earum eius eligendi error esse est
            et eum eveniet excepturi exercitationem expedita explicabo facere fugiat fugit harum hic id illum impedit in
            incidunt ipsa ipsum iste iure iusto laboriosam laborum laudantium libero magnam magni maiores maxime minima
            minus molestiae mollitia natus necessitatibus nemo neque nihil nisi nobis non nostrum nulla numquam
            obcaecati odio officia officiis omnis optio pariatur perferendis perspiciatis placeat porro possimus
            praesentium provident quae quam quasi quia quibusdam quisquam quod quos ratione recusandae rem repellat
            repellendus reprehenderit repudiandae rerum saepe sapiente sequi similique sint sit soluta sunt suscipit
            tempora tenetur totam ullam unde vel veniam veritatis voluptas voluptate voluptatem voluptates voluptatibus
            voluptatum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium ad adipisci
            alias amet aperiam asperiores atque autem blanditiis commodi consequatur consequuntur corporis cumque
            cupiditate delectus deleniti dicta dignissimos dolor doloremque doloribus ducimus ea earum eius eligendi
            error esse est et eum eveniet excepturi exercitationem expedita explicabo facere fugiat fugit harum hic id
            illum impedit in incidunt ipsa ipsum iste iure iusto laboriosam laborum laudantium libero magnam magni
            maiores maxime minima minus molestiae mollitia natus necessitatibus nemo neque nihil nisi nobis non nostrum
            nulla numquam obcaecati odio officia officiis omnis optio pariatur perferendis perspiciatis placeat porro
            possimus praesentium provident quae quam quasi quia quibusdam quisquam quod quos ratione recusandae rem
            repellat repellendus reprehenderit repudiandae rerum saepe sapiente sequi similique sint sit soluta sunt
            suscipit tempora tenetur totam ullam unde vel veniam veritatis voluptas voluptate voluptatem voluptates
            voluptatibus voluptatum.</p>
    </div>
    <hr class="my-4">
    <h1 class="text-3xl text-black">Job Requirements</h1>
    <div class="mt-8">
        <ul class="list-disc" style="list-style-type: disc !important;">
            @for($i=1;$i<7;$i++)
                <li class="mb-2 list-disc" style="list-style-type: disc !important;">
                    <p class="text-sm font-semibold">Requirement {{$i}}</p>
                </li>
            @endfor
        </ul>
    </div>
    <hr class="my-4">
    <h1 class="text-3xl text-black">Job Responsibilities</h1>
    <div class="mt-8">
        <ul class="list-disc" style="list-style-type: disc !important;">
            @for($i=1;$i<7;$i++)
                <li class="mb-2 list-disc" style="list-style-type: disc !important;">
                    <p class="text-sm font-semibold">Responsibility {{$i}}</p>
                </li>
            @endfor
        </ul>
    </div>
    <hr class="my-4">
    <div class="mt-4">
        <button
            class="border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white py-2 px-4 rounded-full hover:rounded-full transition-all duration-300 ease-in-out">
            Apply for job
        </button>
    </div>

@endsection

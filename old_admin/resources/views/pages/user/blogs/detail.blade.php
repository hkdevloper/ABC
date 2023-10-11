@extends('layouts.main-user-list')

@section('content')
    <section class="homepage">
        <div class="widget-placeholder">
            <div class="hkdevs-wdgt-section">
                <!-- Content Section -->
                <section class="text-gray-600 body-font container">
                    <!-- Content Box -->
                    <div class="px-2 py-6 mx-auto flex flex-wrap">

                        <!-- Product List BLock -->
                        <div class="lg:w-3/4 w-full mb-10 lg:mb-0 overflow-hidden px-2">
                            <div class="container mx-auto px-4 py-8">
                                <h1 class="text-3xl font-semibold mb-4">Unlocking the Magic of Code: Exploring
                                    hkdevlopers' Awesome Portfolio</h1>
                                <p class="text-gray-500 mb-4">Published on September 22, 2023</p>
                                <img src="https://via.placeholder.com/800x400" alt="Blog Thumbnail"
                                     class="w-full h-auto mb-6 rounded-lg shadow-lg">
                                <div class="prose mx-auto">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, architecto
                                        doloribus nulla sequi possimus assumenda quas, iste voluptas reprehenderit
                                        asperiores vel officia suscipit repellat aspernatur labore molestiae maxime!
                                        Perferendis magni corporis eligendi natus officiis dolore ea molestias placeat
                                        sapiente eum esse nam repellat eaque, dicta minima totam modi ipsum accusantium,
                                        recusandae neque magnam. Excepturi accusamus fugit porro quidem. Ullam rem
                                        facilis esse veniam perspiciatis voluptatem fuga, modi eaque sequi! Consequuntur
                                        porro exercitationem asperiores voluptate dignissimos culpa possimus vel
                                        reprehenderit sunt accusamus fugiat quas officia voluptas atque nemo, omnis
                                        nobis! Consequuntur officiis repudiandae rem ipsa dolorem molestiae asperiores
                                        sed? Dolorem pariatur, at blanditiis consectetur perferendis neque ab dolore
                                        esse, quo vero, nulla culpa similique placeat! Nulla itaque minus laboriosam
                                        dicta quibusdam fugiat culpa, magni sunt laborum dignissimos! Tenetur eveniet
                                        voluptates cum. Quos ratione odio alias in. Ex voluptatem animi nostrum eveniet
                                        ipsam nulla eius sed rem placeat minima impedit sunt iusto accusamus quia optio
                                        est praesentium architecto odio perferendis magnam, ad dolore iure! Molestias ab
                                        cumque repellendus nemo dolorum veritatis aut eius ex dignissimos eligendi iure,
                                        totam, repudiandae ullam maxime dolorem, nobis dicta ea? Illo, adipisci minus et
                                        alias facere ratione modi tenetur ea ut quod consectetur veniam, maiores fugiat
                                        commodi, iure dolorum facilis quisquam deserunt reprehenderit autem dolore
                                        quidem provident. Quas in ab, atque autem deleniti corporis eligendi accusantium
                                        quis expedita repellendus, eveniet quam velit mollitia enim sint maiores eos
                                        eius harum sequi tenetur illo dolore? Nemo autem architecto dolorem est
                                        exercitationem hic aliquid pariatur itaque deleniti eaque libero fugit voluptas
                                        eveniet vitae iure voluptates cumque, nobis inventore unde quia in eos veniam
                                        fuga? Alias exercitationem aliquam voluptatem officiis quaerat eum iure
                                        distinctio ex eos nobis explicabo dolore, nihil nemo doloribus mollitia libero
                                        iste corrupti laboriosam eligendi. Adipisci officiis ullam, nulla earum est
                                        distinctio at quia maiores iusto repellendus unde pariatur atque eos vitae,
                                        cumque accusamus beatae! Cum dolores quas voluptates maiores sed numquam,
                                        officiis obcaecati iure. Perferendis commodi, nisi labore repudiandae voluptatem
                                        necessitatibus cum maxime unde officia mollitia exercitationem quis ea laborum
                                        rem eum. Accusamus deserunt, praesentium aut quidem modi sunt harum quaerat
                                        obcaecati alias possimus? Culpa ipsum temporibus molestiae, blanditiis sed quas
                                        suscipit odio quisquam assumenda nisi cum ea iure dolorum quod voluptas,
                                        nesciunt corrupti ex. Facilis ipsum iure optio ducimus architecto sapiente quae,
                                        distinctio consequatur rem eligendi officiis nisi aliquam numquam harum.
                                        Obcaecati illum commodi odio ipsum deserunt pariatur velit ad cum modi omnis
                                        quisquam amet incidunt corrupti iusto voluptatem minus quod, voluptates quam.
                                        Commodi, odio deleniti earum beatae aperiam facilis natus placeat obcaecati
                                        tempore odit repellendus reiciendis possimus quis porro corrupti aspernatur
                                        temporibus pariatur? Laudantium doloribus eos possimus, facilis expedita
                                        voluptatum. Deserunt recusandae molestias unde doloribus asperiores non facilis
                                        sapiente nesciunt, quas consequatur labore dolore vitae, sint ratione ipsam
                                        inventore distinctio veniam. Dignissimos officiis, omnis eligendi obcaecati
                                        facilis rem numquam voluptate vitae iure nisi! Vel minima reiciendis atque
                                        suscipit laboriosam dicta error quas, odio, obcaecati minus, cum aliquid.
                                    </p>
                                    <!-- Add more content here -->
                                </div>
                            </div>
                            <!-- Related Products Section -->
                            <section class="container mx-auto mt-8 p-4 bg-white">
                                <h2 class="text-2xl font-semibold">Related Products</h2>
                                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-8 mt-4">
                                    <!-- Related Product 1 -->
                                    @for($i=1; $i<=6; $i++)
                                        <div class="bg-white card overflow-hidden w-full mb-4">
                                            <div class="relative">
                                                <img class="w-full h-60 object-cover"
                                                     src="https://via.placeholder.com/600x400" alt="Blog Thumbnail">
                                            </div>
                                            <div class="px-4 py-3">
                                                <h2 class="text-lg font-semibold text-gray-800 mb-2">Blog Post Title</h2>
                                                <p class="text-gray-700 text-sm mb-4">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                                                    Sed euismod sapien a libero
                                                    tincidunt, nec bibendum arcu convallis.
                                                </p>
                                                <div class="flex flex-wrap mb-4">
                                                <span
                                                    class="bg-purple-100 text-purple-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Tech</span>
                                                    <span
                                                        class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs font-semibold mr-2 mb-2">Coding</span>
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
                                                    <a href="{{route('view.blog', ['something'])}}"
                                                       class="text-purple-500 hover:text-white hover:bg-purple-500 rounded-full px-2 py-1 hover:bg-purple-600 transition duration-300 ease-in-out text-xs"
                                                       style="border: 1px solid;">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
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

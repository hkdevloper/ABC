<div class="w-100 bg-neutral-100 mx-auto p-4">
    <div class="container sm:flex sm:flex-wrap lg:grid lg:grid-cols-6 justify-between items-center">
        <div class="cols-span-1">
            <h1 class="text-xl font-medium mb-2">Category</h1>

            <div class="flex flex-col gap-2">
                @forelse($category as $index => $item)
                    <a href="{{route('company', ['category'=>$item->name])}}">
                        <h5 class="text-gray-600">{{$item->name}}</h5>
                    </a>
                    <hr>
                    @if($index == 3)
                        @break
                    @endif
                @empty
                    <h5 class="text-gray-600">No Category Found</h5>
                    <hr>
                @endforelse
                <a href="#" x-on:click="$dispatch('open-modal', { id: 'category' })" class="text-sm text-gray-400 hover:underline hover:text-black">More Categories...</a>
            </div>
        </div>
        <div class="col-span-4 flex flex-col items-center justify-around" style="width: 90%; margin: 0 auto;">
            @if(session()->get('menu') == 'product' || session()->get('menu') == 'jobs')
                <p class="text-base font-medium">
                    Not finding what you are looking for? <br>
                </p>
                <form action="" method="get" class="w-full relative text-gray-600">
                    @csrf
                    <input type="search" name="serch" placeholder="Search"
                           class="bg-white h-10 px-5 pr-10 w-full rounded-full text-sm focus:outline-none">
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" id="Capa_1" x="0px" y="0px"
                             viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                             xml:space="preserve" width="512px" height="512px">
                          <path
                              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                        </svg>
                    </button>
                </form>
            @else
                <div class="ad-container hidden md:block">
                    <div id="multi-size-ad" class="ad-slot"></div>
                </div>
                <script>
                    googletag.cmd.push(function() {
                        googletag.display('multi-size-ad');
                    });
                </script>
            @endif

            <div class="flex flex-nowrap justify-between items-center" style="margin-top: 10px">
                <div class="">
                    <h1 class="text-lg font-medium">Show By</h1>
                    <div class="flex flex-col gap-2">
                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="show-all" @if(request('show') == 'all') checked @endif id="show-all" value="show-all" class="mr-2">
                            Show All
                        </label>

                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="show-active" @if(request('filter') == 'active') checked @endif id="filter-active" value="show-active" class="mr-2">
                            Show Active
                        </label>

                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="show-in-active" @if(request('filter') == 'in-active') checked @endif id="filter-in-active" value="show-latest" class="mr-2">
                            Show In Active
                        </label>
                    </div>
                </div>
                <div class="hidden sm:hidden md:block lg:block mx-6">
                    <div class="ad-container">
                        <div id="fixed-size-banner" class="ad-slot"></div>
                    </div>
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('fixed-size-banner');
                        });
                    </script>
                </div>
                <div>
                    <h1 class="text-xl font-medium">Sort By</h1>
                    <div class="flex flex-col gap-2">
                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" @if(request('sort') == 'name') checked @endif  name="sort-by-name" id="sort-by-name" value="sort-by-name"
                                   class="mr-2">
                            Sort By Name
                        </label>

                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" @if(request('sort') == 'date') checked @endif  name="sort-by-date" id="sort-by-date" value="sort-by-date"
                                   class="mr-2">
                            Sort By Date
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <p> Want to list your company? <a href="#" class="text-sm text-gray-400 hover:underline hover:text-black">Click
                    Here</a></p>
            <p>
                <a href="#" class="text-sm text-gray-400 hover:underline hover:text-black">About Us</a> |
                <a href="#" class="text-sm text-gray-400 hover:underline hover:text-black">Contact Us</a>
            </p>
            <p>Have Custom Req?<br>
                <button x-on:click="$dispatch('open-modal', { id: 'Requirement' })" class="bg-purple-500 hover:bg-purple-600 w-full text-white rounded-md p-2">Send Requirements
                    Now
                </button>
            </p>
        </div>
    </div>
</div>
<script>
    document.getElementById('show-all').addEventListener('change', function () {
        if (this.checked) {
            window.location.href = "{{route('company', ['show'=>'all'])}}";
        } else {
            window.location.href = "{{route('company')}}";
        }
    });

    document.getElementById('filter-active').addEventListener('change', function () {
        if (this.checked) {
            window.location.href = "{{route('company', ['filter'=>'active'])}}";
        } else {
            window.location.href = "{{route('company')}}";
        }
    });

    document.getElementById('filter-in-active').addEventListener('change', function () {
        if (this.checked) {
            window.location.href = "{{route('company', ['filter'=>'in-active'])}}";
        } else {
            window.location.href = "{{route('company')}}";
        }
    });

    document.getElementById('sort-by-name').addEventListener('change', function () {
        if (this.checked) {
            window.location.href = "{{route('company', ['sort'=>'name'])}}";
        } else {
            window.location.href = "{{route('company')}}";
        }
    });

    document.getElementById('sort-by-date').addEventListener('change', function () {
        if (this.checked) {
            window.location.href = "{{route('company', ['sort'=>'date'])}}";
        } else {
            window.location.href = "{{route('company')}}";
        }
    });
</script>

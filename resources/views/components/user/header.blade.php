<x-user.bread-crumb :data="$breadcrumb"/>
<div class="container bg-neutral-100 mx-auto p-4">
    <div class="grid grid-cols-4 justify-between items-center">
        <div class="cols-span-1">
            <h1 class="text-xl font-medium mb-2">Category</h1>

            <div class="flex flex-col gap-2">
                <h5 class="text-gray-600">Category 1</h5>
                <hr>
                <h5 class="text-gray-600">Category 2</h5>
                <hr>
                <h5 class="text-gray-600">Category 3</h5>
                <hr>
                <h5 class="text-gray-600">Category 4</h5>
                <hr>
                <a href="#" class="text-sm text-gray-400 hover:underline hover:text-black">More Categories...</a>
            </div>
        </div>

        <div class="col-span-2" style="width: 90%; margin: 0 auto;">
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
            <div class="flex flex-wrap justify-between items-center" style="margin-top: 10px">
                <div>
                    <h1 class="text-lg font-medium">Show By</h1>
                    <div class="flex flex-col gap-2">
                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="show-all" id="show-all" value="show-all" class="mr-2">
                            Show All
                        </label>

                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="show-active" id="show-active" value="show-active" class="mr-2">
                            Show Active
                        </label>

                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="show-latest" id="show-latest" value="show-latest" class="mr-2">
                            Show Latest
                        </label>
                    </div>
                </div>
                <div>
                    <h1 class="text-xl font-medium">Sort By</h1>
                    <div class="flex flex-col gap-2">
                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="sort-by-name" id="sort-by-name" value="sort-by-name"
                                   class="mr-2">
                            Sort By Name
                        </label>

                        <label class="flex items-center text-gray-600">
                            <input type="checkbox" name="sort-by-date" id="sort-by-date" value="sort-by-date"
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
                <button class="bg-purple-500 hover:bg-purple-600 w-full text-white rounded-md p-2">Send Requirements
                    Now
                </button>
            </p>
        </div>
    </div>

</div>

<div class="border flex justify-between items-center mt-2"
     style="width: 100%; height: 100px; background: rgb(15, 12, 114);">
    <h1 class="text-white text-4xl mx-12">{{$title}}</h1>
    <!-- Filter Section -->
    <div class="p-4 md:flex md:justify-between">

        <!-- Category Filter -->
        <div class="mb-4 md:mb-0 mx-1">
            <select
                class="rounded-md bg-white py-2 px-4 focus:outline-none">
                <option value="">All Categories</option>
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <!-- Add more category options as needed -->
            </select>
        </div>

        <!-- Pricing Filter -->
        <div class="mb-4 md:mb-0 mx-1">
            <select
                class=" rounded-md bg-white py-2 px-4 focus:outline-none">
                <option value="">All Locations</option>
                <option value="price1">Location 1</option>
                <option value="price2">Location 2</option>
                <!-- Add more pricing options as needed -->
            </select>
        </div>
    </div>
</div>

<div class="container mx-auto">
    <div style="background-image: url('{{url('/')}}/user/assets/img/bg-header-5-1.png');" class="mt-20 shadow-search-bar bg-none bg-gray-100 bg-cover lg:py-20 pb-0 pt-10 bg-center rounded-lg dark:bg-foreground dark:text-gray-300">
        <div class="flex lg:flex-row flex-col 2xl:pt-0 pt-10 items-center">
            <!-- main-header-div  -->
            <div class="px-10">
                <div class="text-center lg:text-left">
                    <h1 class="capitalize lg:text-5xl text-2xl dark:text-gray-800 font-normal mb-4"> find Nearby Anything </h1>
                    <p class="text-gray-500 dark:text-gray-400 lg:text-lg text-sm font-normal mb-9"> The best way to find yourself in the service of others. </p>
                    <div class="container mx-auto pt-9 lg:hidden block">
                        <input type="text" class="border border-gray-200 rounded-full px-4 py-2 focus:outline-none w-full mb-4" placeholder="What are you looking for ?">
                        <select name="cars" class="border border-gray-200 text-gray-400 rounded-full px-4 py-2 focus:outline-none w-full mb-4">
                            <option value="volvo">Location</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                        </select>
                        <select name="cars" class="border border-gray-200 text-gray-400 rounded-full px-4 py-2 focus:outline-none w-full mb-4">
                            <option value="volvo">Category</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                        </select>
                        <button type="button" class="bg-blue-500 rounded-full text-white hover:bg-blue-600 w-full py-2 px-4 mb-4"> Search </button>
                    </div>
                </div>
                <!-- header-search  -->
                <div class="lg:inline-flex hidden py-3 bg-white dark:bg-background overflow-hidden rounded-full mb-6 text-gray-900">
                    <input type="text" class="pl-7 py-2 border-r pr-4 dark:bg-background dark:placeholder:text-gray-100 dark:text-gray-100 border-gray-200 focus:outline-none" placeholder="What are you  looking for ?">
                    <select name="cars" class="pl-4 py-2 pr-20 mr-4 dark:bg-background dark:text-gray-100 text-gray-400 focus:outline-none">
                        <option value="volvo">Location</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
                    <select name="cars" class="text-gray-400 border-l dark:bg-background dark:text-gray-100 border-gray-200 focus:outline-none pl-4 py-2 pr-20 mr-4">
                        <option value="volvo">Category</option>
                        <option value="saab">Saab</option>
                        <option value="opel">Opel</option>
                        <option value="audi">Audi</option>
                    </select>
                    <button type="button" class="bg-blue-500 hover:bg-blue-600 rounded-full text-white px-8 py-3 mr-3"> Search </button>
                </div>
                <p class="text-gray-500 text-lg mb-3 dark:text-gray-400 lg:block hidden"> Or browse featured categories: </p>
                <div class="lg:flex hidden flex-wrap pb-20">
                    <button type="button" class="flex bg-gray-700 hover:bg-gray-500 hover:text-white dark:text-gray-300 dark:bg-background text-white text-xs items-center py-1 px-2 rounded-full mr-2">
                        <svg class="w-3 h-3 mr-2" width="9" height="10" viewbox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.6199 0.199997C8.1499 0.199997 8.5799 0.602934 8.5799 1.1V8.9C8.5799 9.39687 8.1499 9.8 7.6199 9.8H5.6999V8.3C5.6999 7.80312 5.2699 7.4 4.7399 7.4C4.2099 7.4 3.7799 7.80312 3.7799 8.3V9.8H1.8599C1.3297 9.8 0.899902 9.39687 0.899902 8.9V1.1C0.899902 0.602934 1.3297 0.199997 1.8599 0.199997H7.6199ZM2.1799 5.3C2.1799 5.465 2.3231 5.6 2.4999 5.6H3.1399C3.3159 5.6 3.4599 5.465 3.4599 5.3V4.7C3.4599 4.535 3.3159 4.4 3.1399 4.4H2.4999C2.3231 4.4 2.1799 4.535 2.1799 4.7V5.3ZM4.4199 4.4C4.2439 4.4 4.0999 4.535 4.0999 4.7V5.3C4.0999 5.465 4.2439 5.6 4.4199 5.6H5.0599C5.2359 5.6 5.3799 5.465 5.3799 5.3V4.7C5.3799 4.535 5.2359 4.4 5.0599 4.4H4.4199ZM6.0199 5.3C6.0199 5.465 6.1639 5.6 6.3399 5.6H6.9799C7.1559 5.6 7.2999 5.465 7.2999 5.3V4.7C7.2999 4.535 7.1559 4.4 6.9799 4.4H6.3399C6.1639 4.4 6.0199 4.535 6.0199 4.7V5.3ZM2.4999 2C2.3231 2 2.1799 2.135 2.1799 2.3V2.9C2.1799 3.065 2.3231 3.2 2.4999 3.2H3.1399C3.3159 3.2 3.4599 3.065 3.4599 2.9V2.3C3.4599 2.135 3.3159 2 3.1399 2H2.4999ZM4.0999 2.9C4.0999 3.065 4.2439 3.2 4.4199 3.2H5.0599C5.2359 3.2 5.3799 3.065 5.3799 2.9V2.3C5.3799 2.135 5.2359 2 5.0599 2H4.4199C4.2439 2 4.0999 2.135 4.0999 2.3V2.9ZM6.3399 2C6.1639 2 6.0199 2.135 6.0199 2.3V2.9C6.0199 3.065 6.1639 3.2 6.3399 3.2H6.9799C7.1559 3.2 7.2999 3.065 7.2999 2.9V2.3C7.2999 2.135 7.1559 2 6.9799 2H6.3399Z" fill="currentColor"></path>
                        </svg><span class="font-medium">Apartment</span>
                    </button>
                    <button type="button" class="flex bg-gray-700 hover:bg-gray-500 hover:text-white dark:text-gray-300 dark:bg-background text-white text-xs items-center py-1 px-2 rounded-full mr-2">
                        <svg class="w-3 h-3 mr-2" width="13" height="12" viewbox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.7002 9.77143C1.7002 10.3543 2.14591 10.8 2.72877 10.8H10.2716C10.8545 10.8 11.3002 10.3543 11.3002 9.77143V4.62857H1.7002V9.77143ZM10.2716 1.88571H9.92877V1.54285C9.92877 1.33714 9.79162 1.2 9.58591 1.2C9.38019 1.2 9.24305 1.33714 9.24305 1.54285V1.88571H7.87162V1.54285C7.87162 1.33714 7.73448 1.2 7.52877 1.2C7.32305 1.2 7.18591 1.33714 7.18591 1.54285V1.88571H5.81448V1.54285C5.81448 1.33714 5.67734 1.2 5.47162 1.2C5.26591 1.2 5.12877 1.33714 5.12877 1.54285V1.88571H3.75734V1.54285C3.75734 1.33714 3.6202 1.2 3.41448 1.2C3.20877 1.2 3.07162 1.33714 3.07162 1.54285V1.88571H2.72877C2.14591 1.88571 1.7002 2.33143 1.7002 2.91428V3.94285H11.3002V2.91428C11.3002 2.33143 10.8545 1.88571 10.2716 1.88571ZM8.55734 3.25714H4.44305C4.23734 3.25714 4.1002 3.12 4.1002 2.91428C4.1002 2.70857 4.23734 2.57143 4.44305 2.57143H8.55734C8.76305 2.57143 8.90019 2.70857 8.90019 2.91428C8.90019 3.12 8.76305 3.25714 8.55734 3.25714Z" fill="currentColor"></path>
                        </svg><span class="font-medium">Event</span>
                    </button>
                    <button type="button" class="flex bg-gray-700 hover:bg-gray-500 hover:text-white dark:bg-background dark:text-gray-300 text-white text-xs items-center py-1 px-2 rounded-full mr-2">
                        <svg class="w-3 h-3 mr-2" width="13" height="12" viewbox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.68337 3.6H2.30062C2.13191 3.6 1.97024 3.67265 1.85531 3.79687C1.74281 3.92343 1.68659 4.08975 1.703 4.2585L2.30281 10.2416C2.33343 10.5656 2.59124 10.8 2.90062 10.8H7.08375C7.39312 10.8 7.65094 10.5656 7.68131 10.2587L8.28131 4.27556C8.29772 4.10681 8.24149 3.9405 8.12899 3.81393C8.03025 3.67312 7.85212 3.6 7.68337 3.6ZM6.90712 6H3.09412L2.97524 4.8H7.02525L6.90712 6ZM8.60025 1.2C7.42612 1.2 6.4365 1.95468 6.06712 3H7.0515C7.36312 2.46562 7.93744 2.1 8.60062 2.1C9.5775 2.1 10.4004 2.90625 10.4004 3.9C10.4004 4.83993 9.67631 5.604 8.75756 5.68368L8.66616 6.59306C10.1265 6.55875 11.3003 5.37 11.3003 3.9C11.3003 2.40937 10.0909 1.2 8.60025 1.2Z" fill="currentColor"></path>
                        </svg>
                        <span class="font-medium">Eat & Drink</span>
                    </button>
                    <button type="button" class="flex bg-gray-700 hover:bg-gray-500 hover:text-white dark:bg-background dark:text-gray-300 text-white text-xs items-center py-1 px-2 rounded-full mr-2">
                        <svg class="w-3 h-3 mr-2" width="13" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.2602 3.82286H2.5402C2.34145 3.82286 2.1802 3.96171 2.1802 4.13143V5.46857C1.91515 5.46857 1.7002 5.65243 1.7002 5.88C1.7002 6.10719 1.91515 6.29143 2.1667 6.29143L2.1802 7.62857C2.1802 7.79957 2.34145 7.93714 2.5402 7.93714H3.2602C3.4597 7.93714 3.6202 7.79957 3.6202 7.62857V4.13143C3.6202 3.96171 3.4597 3.82286 3.2602 3.82286ZM8.54019 3H7.82019C7.62219 3 7.46019 3.13821 7.46019 3.30857V5.46857H5.54019V3.30857C5.54019 3.13821 5.3797 3 5.1802 3H4.4602C4.2622 3 4.1002 3.13821 4.1002 3.30857V8.45143C4.1002 8.62243 4.2622 8.76 4.4602 8.76H5.1802C5.3797 8.76 5.54019 8.62243 5.54019 8.45143V6.29143H7.46019V8.45143C7.46019 8.62179 7.62144 8.76 7.82019 8.76H8.54019C8.73894 8.76 8.90019 8.62179 8.90019 8.45143V3.30857C8.90019 3.13821 8.73969 3 8.54019 3ZM10.8202 5.46857V4.13143C10.8202 3.96171 10.6597 3.82286 10.4602 3.82286H9.74019C9.54219 3.82286 9.38019 3.96171 9.38019 4.13143V7.62857C9.38019 7.79893 9.54144 7.93714 9.74019 7.93714H10.4602C10.6589 7.93714 10.8202 7.79893 10.8202 7.62857V6.29143C11.0852 6.29143 11.3002 6.10719 11.3002 5.88C11.3002 5.65243 11.0857 5.46857 10.8202 5.46857Z" fill="currentColor"></path>
                        </svg>
                        <span class="font-medium">Fitness</span>
                    </button>
                </div>
            </div>
            <img class="w-full lg:hidden block flex-shrink object-cover" src="{{url('/')}}/user/assets/img/bg-header-5.png" alt="">
        </div>
    </div>
</div>

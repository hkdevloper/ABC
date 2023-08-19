<div class="mobile-navbar overflow-y-auto fixed bg-white dark:bg-background -left-full top-0 h-full w-full transition-all z-[100]">
    <div class="flex justify-end py-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-gray-500 close-navbar-btn" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </div>
    <ul class="mx-5">
        <li class="">
            <div class="dropdown dropdown-mobile dark:bg-foreground rounded-lg">
                <button class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200"> Home
                </button>
            </div>
        </li>
        <li class="">
            <div class="dropdown dropdown-mobile dark:bg-foreground rounded-lg">
                <button class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200"> Listings
                </button>
            </div>
        </li>
        <li class="">
            <div class="dropdown dropdown-mobile dark:bg-foreground rounded-lg">
                <button class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200"> Categories
                </button>
            </div>
        </li>
        <li class="">
            <div class="dropdown dropdown-mobile dark:bg-foreground rounded-lg">
                <button class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200"> Products
                </button>
            </div>
        </li>
        <li class="">
            <div class="dropdown dropdown-mobile dark:bg-foreground rounded-lg">
                <button class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200"> About Us
                </button>
            </div>
        </li>
        <li class="">
            <div class="dropdown dropdown-mobile dark:bg-foreground rounded-lg">
                <button class="link w-full py-3 flex dark:border-gray-800 pb-5 justify-between items-center border-b border-gray-200 font-normal text-gray-500 dark:text-gray-200"> Contact Us
                </button>
            </div>
        </li>
    </ul>
</div>
<header class="border-b pb-20 dark:text-white border-gray-200 dark:border-foreground dark:bg-background">
    <div class="w-full navbar h-20 flex items-center hero-sticky-header left-0 dark:text-gray-100 bg-white fixed -top-20 dark:bg-background text-gray-800 z-50 slideDown">
        <nav class="container mx-auto lg:px-0 px-5 flex items-center justify-between transition-all">
            <button type="button" class="lg:hidden block menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <a href="{{url('/')}}" class="flex items-center">
                <img class="w-11 h-11 mr-3" src="{{url('/')}}/user/assets/img/logo.svg" alt="">
                <h6 class="text-base font-medium block md:hidden">{{config()->get('app.name')}}</h6>
            </a>
            <button type="button" class="text-white hover:text-blue-500 flex items-center lg:hidden">
            <span class="lg:mr-3 mr-0 relative">
              <img class="w-8 h-8 rounded-full border border-white" src="{{url('/')}}/user/assets/img/faces/1.jpg" alt="">
              <span class="w-2 h-2 bg-green-500 rounded-full border absolute bottom-0 right-0"></span>
            </span>
            </button>
            <div class="hidden lg:flex items-center">
                <ul class="flex items-center">
                    <li class="mr-9">
                        <div class="dropdown" data-dropdown="">
                            <button class="link hover:text-blue-500 flex items-center" data-dropdown-button="">
                    <span class="lg:mr-3 mr-0 relative">
                      <img class="w-8 h-8 rounded-full border border-white" src="{{url('/')}}/user/assets/img/faces/10.jpg" data-dropdown-button="" alt="">
                      <span class="w-2 h-2 bg-green-500 rounded-full border absolute bottom-0 right-0"></span>
                    </span>
                            </button>
                            <div class="dropdown-menu bg-white dark:bg-foreground dark:text-gray-300 text-gray-700">
                                <div>
                                    <div class="dropdown-links max-w-xs w-48 rounded-md py-3">
                                        <a href="#" class="link hover:text-blue-500 px-4 py-1 flex items-center text-sm text-gray-700 dark:text-gray-300"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>Account </a>
                                        <a href="#" class="link hover:text-blue-500 px-4 py-1 flex items-center text-sm text-gray-700 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                            </svg> Settings </a>
                                        <a href="#" class="link hover:text-blue-500 px-4 py-1 flex items-center text-sm text-gray-700 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg> Sign Out </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @include('includes.hero')
</header>

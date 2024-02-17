<!-- Navbar Section -->
<header class="bg-neutral-100 py-2 shadow">
    <div class="mx-auto flex flex-wrap items-center justify-between px-4">
        <a alt="company Logo" href="{{url('/')}}" class="flex items-center">
            <img alt="company Logo" src="https://via.placeholder.com/50x50" width="50" height="50" class="object-cover overflow-hidden">
        </a>
        <div class="lg:hidden flex ">
            @if(auth()->user() && auth()->user()->name != "")
                <div class="lg:flex md:flex items-center">
                    <div class="relative">
                        <a href="{{auth()->user()->type == 'Admin' ? url('admin') : url('user')}}"
                           class="flex items-center">
                            <span class="text-gray-700">{{ auth()->user()->name }}</span>
                            <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}" alt="User Avatar"
                                 class="w-10 h-10 rounded-full mx-2">
                        </a>
                    </div>
                </div>
            @else
                <div class="md:hidden flex space-x-4 items-center">
                    <a href="{{url('user/dashboard/login')}}" class="text-gray-700 hover:text-purple-600">Login</a>
                    <a href="{{url('user/dashboard/register')}}"
                       class="text-white bg-purple-600 hover:bg-purple-700 py-2 px-4 rounded-full transition-all duration-300 ease-in-out hover:text-white">Register</a>
                </div>
            @endif
            <button id="menu-toggle" class="text-gray-700 hover:text-purple-600 focus:outline-none">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M3 18h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0-5h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0-5h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
        <nav class="hidden lg:flex md:flex space-x-4 items-center">
            <ul class="hidden lg:flex space-x-10 items-center">
                <li>
                    <a href="{{ url('/') }}"
                       class="text-gray-700 hover:text-purple-600 rounded-full {{ session()->get('menu') == 'home' ? 'text-purple-500 p-2 underline font-bold text-xl' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('company') }}"
                       class="text-gray-700 hover:text-purple-600 border-purple-500 rounded-full {{ session()->get('menu') == 'company' ? 'text-purple-500 p-2 underline font-bold text-xl' : '' }}">Companies</a>
                </li>
                <li>
                    <a href="{{ route('products') }}"
                       class="text-gray-700 hover:text-purple-600 border-purple-500 rounded-full {{ session()->get('menu') == 'product' ? 'text-purple-500 p-2 underline font-bold text-xl' : '' }}">Products</a>
                </li>
                <li>
                    <a href="{{ route('deals') }}"
                       class="text-gray-700 hover:text-purple-600 border-purple-500 rounded-full {{ session()->get('menu') == 'deal' ? 'text-purple-500 p-2 underline font-bold text-xl' : '' }}">Deals</a>
                </li>
                <li>
                    <a href="{{ route('events') }}"
                       class="text-gray-700 hover:text-purple-600 border-purple-500 rounded-full {{ session()->get('menu') == 'event' ? 'text-purple-500 p-2 underline font-bold text-xl' : '' }}">Events</a>
                </li>
                <li>
                    <a href="{{ route('jobs') }}"
                       class="text-gray-700 hover:text-purple-600 border-purple-500 rounded-full {{ session()->get('menu') == 'job' ? 'text-purple-500 p-2 underline font-bold text-xl' : '' }}">Jobs</a>
                </li>
                <li>
                    <a href="{{ route('blogs') }}"
                       class="text-gray-700 hover:text-purple-600 border-purple-500 rounded-full {{ session()->get('menu') == 'blog' ? 'text-purple-500 p-2 underline bold-bold text-xl' : '' }}">Blogs</a>
                </li>
                <li>
                    <a href="{{ route('forum') }}"
                       class="text-gray-700 hover:text-purple-600  border-purple-500 rounded-full {{ session()->get('menu') == 'forum' ? 'text-purple-500 p-2 underline font-bold text-xl' : '' }}">Forum</a>
                </li>
            </ul>
        </nav>
        @if(auth()->user() && auth()->user()->name != "")
            <div class="hidden md:flex items-center">
                <div class="relative" data-te-dropdown-ref>
                    <a href="{{auth()->user()->type == 'Admin' ? url('admin') : url('user')}}"
                       class="flex items-center">
                        <span class="text-gray-700">{{ auth()->user()->name }}</span>
                        <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}" alt="User Avatar"
                             class="w-10 h-10 rounded-full mx-2">
                    </a>
                </div>
            </div>
        @else
            <div class="hidden lg:flex space-x-4 items-center">
                <a href="{{url('user/login')}}" class="text-gray-700 hover:text-purple-600">Login</a>
                <a href="{{url('user/register')}}"
                   class="text-white bg-purple-600 hover:bg-purple-700 py-2 px-4 rounded-full transition-all duration-300 ease-in-out hover:text-white">Register</a>
            </div>
        @endif
    </div>
    <!-- Mobile Menu (Hamburger Menu) -->
    <div id="mobile-menu" class="lg:hidden hidden bg-white shadow-lg p-4 rounded-md border border-gray-300">
        <ul class="text-gray-700">
            <li>
                <a href="{{ url('/') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4 border-b border-gray-300">Home</a>
            </li>
            <li>
                <a href="{{ route('company') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4 border-b border-gray-300">Companies</a>
            </li>
            <li>
                <a href="{{ route('products') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4 border-b border-gray-300">Products</a>
            </li>
            <li>
                <a href="{{ route('deals') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4 border-b border-gray-300">Deals</a>
            </li>
            <li>
                <a href="{{ route('events') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4 border-b border-gray-300">Events</a>
            </li>
            <li>
                <a href="{{ route('jobs') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4 border-b border-gray-300">Jobs</a>
            </li>
            <li>
                <a href="{{ route('blogs') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4 border-b border-gray-300">Blogs</a>
            </li>
            <li>
                <a href="{{ route('forum') }}" class="block text-gray-700 hover:text-purple-600 py-2 px-4">Forum</a>
            </li>
        </ul>
    </div>
</header>
<script>
    // JavaScript for toggling the mobile menu
    document.getElementById('menu-toggle').addEventListener('click', function () {
        let mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>


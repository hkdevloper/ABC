<!-- Navbar Section -->
<header class="bg-white shadow-md py-2">
    <div class="container mx-auto flex items-center justify-between px-4">
        <a alt="company Logo" href="{{url('/')}}" class="flex items-center">
            <img alt="company Logo" src="https://via.placeholder.com/100x100" width="50" height="50"
                 class="object-cover overflow-hidden">
        </a>
        <div class="lg:hidden">
            <button id="menu-toggle" class="text-gray-700 hover:text-purple-600 focus:outline-none">
                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M3 18h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0-5h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2zm0-5h18a1 1 0 0 1 0 2H3a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
        <nav class="hidden lg:flex md:flex space-x-4 items-center">
            <ul class="hidden lg:flex md:flex space-x-4 items-center">
                <li>
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-purple-600">Home</a>
                </li>
                <li>
                    <a href="{{ route('company') }}" class="text-gray-700 hover:text-purple-600">Companies</a>
                </li>
                <li>
                    <a href="{{ route('products') }}" class="text-gray-700 hover:text-purple-600">Products</a>
                </li>
                <li>
                    <a href="{{ route('events') }}" class="text-gray-700 hover:text-purple-600">Events</a>
                </li>
                <li>
                    <a href="{{ route('jobs') }}" class="text-gray-700 hover:text-purple-600">Jobs</a>
                </li>
                <li>
                    <a href="{{ route('blogs') }}" class="text-gray-700 hover:text-purple-600">Blogs</a>
                </li>
            </ul>
        </nav>
        <div class="hidden lg:flex space-x-4 items-center">
            <a href="#" class="text-gray-700 hover:text-purple-600">Login</a>
            <a href="#"
               class="text-white bg-purple-600 hover:bg-purple-700 py-2 px-4 rounded-full transition-all duration-300 ease-in-out hover:text-white">Register</a>
        </div>
    </div>
    <!-- Mobile Menu (Hamburger Menu) -->
    <div id="mobile-menu" class="lg:hidden hidden bg-white">
        <ul class="text-gray-700">
            <li>
                <a href="{{ url('/') }}" class="block py-2 px-4 hover:bg-purple-100">Home</a>
            </li>
            <li>
                <a href="{{ route('company') }}" class="block py-2 px-4 hover:bg-purple-100">Companies</a>
            </li>
            <li>
                <a href="{{ route('products') }}" class="block py-2 px-4 hover:bg-purple-100">Products</a>
            </li>
            <li>
                <a href="{{ route('events') }}" class="block py-2 px-4 hover:bg-purple-100">Events</a>
            </li>
            <li>
                <a href="{{ route('jobs') }}" class="block py-2 px-4 hover:bg-purple-100">Jobs</a>
            </li>
            <li>
                <a href="{{ route('blogs') }}" class="block py-2 px-4 hover:bg-purple-100">Blogs</a>
            </li>
        </ul>
    </div>
</header>
<script>
    // JavaScript for toggling the mobile menu
    document.getElementById('menu-toggle').addEventListener('click', function () {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>

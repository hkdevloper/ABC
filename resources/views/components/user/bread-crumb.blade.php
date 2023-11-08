<nav class="container w-auto px-3 sm:px-5 py-2 sm:py-3 dark:bg-neutral-600">
    <ol class="list-reset flex">
        @foreach ($data as $index => $crumb)
            <li>
                <a href="#"
                   class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                    {{ $crumb }}
                </a>
            </li>
            @if ($index < count($data) - 1)
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-300">/</span>
                </li>
            @endif
        @endforeach
    </ol>
    {{-- Button For Collapcing Filter Panel--}}
    <button class="absolute right-0 top-0 mt-3 mr-4 lg:hidden" id="filter-collapse-btn">
        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" id="Capa_1" x="0px" y="0px"
             viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
             xml:space="preserve" width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
        </svg>
    </button>
</nav>

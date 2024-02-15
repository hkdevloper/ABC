<nav class="container w-auto px-3 sm:px-5 py-2 sm:py-3 dark:bg-neutral-600">
    <ol class="list-reset flex">
        @foreach ($data as $index => $crumb)
            <li>
                @switch($crumb)
                    @case('Company')
                        <a href="{{route('company')}}"
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                    @break
                    @case('Product')
                        <a href="{{route('products')}}"
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                    @break
                    @case('Event')
                        <a href="{{route('events')}}"
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                    @break
                    @case('Jobs')
                        <a href="{{route('jobs')}}"
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                    @break
                    @case('Blogs')
                        <a href="{{route('blogs')}}"
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                    @break
                    @case('Forum')
                        <a href="{{route('forum')}}"
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                    @break
                    @case('Deal')
                        <a href="{{route('deals')}}"
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                    @break
                    @default
                        <a href=""
                           class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                            {{ $crumb }}
                        </a>
                @endswitch
            </li>
            @if ($index < count($data) - 1)
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-300">/</span>
                </li>
            @endif
        @endforeach
    </ol>
</nav>

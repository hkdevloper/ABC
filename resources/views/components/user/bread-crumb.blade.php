<nav class="w-auto rounded-md bg-neutral-100 px-5 py-3 dark:bg-neutral-600">
    <ol class="list-reset flex">
        @foreach ($data as $index => $crumb)
            <li>
                <a href="#" class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
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
</nav>

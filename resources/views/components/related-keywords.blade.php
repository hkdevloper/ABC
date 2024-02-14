@props(['seo'])
@props(['route'])

<div class="container bg-white shadow-md rounded-lg py-4 mt-5">
    <div class="mx-auto px-4">
        <h2 class="text-lg font-semibold mb-4">Related Keywords:</h2>
        <div class="flex flex-wrap gap-2">
            @forelse($seo as $item)
                @foreach($item->meta_keywords as $keyword)
                    @php
                        $keywordUrl = route($route, ['q' => $keyword]);
                    @endphp
                    <a href="{{ $keywordUrl }}"
                       class="text-gray-700 bg-gray-200 hover:bg-gray-500 hover:text-white rounded-full px-3 py-1 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                        {{ $keyword }}
                    </a>
                @endforeach
            @empty
                <p class="text-gray-500">No Related Keywords</p>
            @endforelse
        </div>
    </div>
</div>

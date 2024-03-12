<x-filament::modal id="category">
    <x-slot name="heading">
        Categories
    </x-slot>
    @php
    $category = \App\Models\Category::where('type', session()->get('menu'))->get();
    @endphp
    @foreach($category as $item)
        <x-bladewind.list-view>
            <x-bladewind.list-item>
                <a href="{{route('company', ['category'=>$item->name])}}" class="text-sm font-medium text-slate-900">
                    {{$item->name}}
                </a>
            </x-bladewind.list-item>
        </x-bladewind.list-view>
    @endforeach
</x-filament::modal>

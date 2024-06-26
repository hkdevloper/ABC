<div>
    <form wire:submit="create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            {{$this->form}}
        </div>
        <div class="flex justify-end">
            <button type="submit"
                    class="text-white bg-purple-500 hover:bg-purple-600 font-bold uppercase text-sm px-4 py-2 rounded-full focus:outline-none">
                Submit Reply
            </button>
        </div>
    </form>
    <x-filament-actions::modals />
</div>

<x-filament-panels::page>
    <form wire:submit.prevent="submit" class="w-full">
        {{ $this->form }}

        <center>
            <x-filament::button type="submit" style="margin-top: 10px;">
                Submit for Approval
            </x-filament::button>
        </center>
    </form>
</x-filament-panels::page>

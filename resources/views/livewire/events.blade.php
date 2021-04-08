<div>
    @if($updateMode)
    @include('livewire.update-event')
    @else
    @include('livewire.create-event')
    @endif

    <div class="px-4 py-6 pl-0">
        <button wire:click="show()"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <a class="flex items-center">
                <x-icons.add /> &nbsp;Add New Event</a>
        </button>
    </div>
    <div class="w-full ">
        <div class="container items-center justify-center mx-auto">
            <livewire:events-table />
        </div>
    </div>
</div>

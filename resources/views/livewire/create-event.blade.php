<div>
    @if($show)

    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">
            Add New Event
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="mt-6 shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-dark sm:p-6">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-light">Event
                                    Name</label>
                                <x-jet-input type="text" required wire:model="title" name="title" id="title"
                                    autocomplete="title" placeholder="Type Event Name" />
                                @error('title') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="closeModal()" wire:loading.attr="disabled">
                Nevermind
            </x-jet-danger-button>

            <x-jet-button wire:click.prevent="store()" class="ml-2" type="button" wire:loading.attr="disabled">
                Add Contact
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    @endif
</div>

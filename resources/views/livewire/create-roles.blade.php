<div>
    @if(!$updateMode)
    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">
            Add New Role
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-dark sm:p-6">
                        <div class="grid grid-cols-9 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="role"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Role</label>
                                <x-jet-input type="text" required wire:model="title" name="role" id="role"
                                    autocomplete="role" placeholder="User role" />
                                @error('role') <span
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

            <x-jet-button wire:click="addRole()" class="ml-2" wire:loading.attr="disabled">
                Add Role
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    @endif
</div>

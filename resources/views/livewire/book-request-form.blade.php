<div>
    @if($show)
    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">
            Request Book
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="mt-6 shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            @if(Auth::check())
                            <div class="col-span-6 sm:col-span-3">
                                <label for="requested_by" class="block text-sm font-medium text-gray-700">Requested
                                    By</label>
                                <input type="text" wire:model="requested_by" name="requested_by" id="requested_by"
                                    placeholder="{{Auth::user()->name}}"
                                    class="default-value block w-full mt-1 @error('name') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                            </div>
                            @else
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Reuested
                                    By</label>
                                <input type="text" wire:model="name" name="name" id="name"
                                    class="block w-full mt-1 @error('name') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('name') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>
                            @endif
                            <div class="col-span-6 sm:col-span-3">
                                <label for="book_name" class="block text-sm font-medium text-gray-700">Book
                                    Name</label>
                                <input type="text" required wire:model="book_name" name="book_name" id="book_name"
                                    placeholder="Enter Book Name"
                                    class=" typehead block w-full mt-1 @error('book_name') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                @error('book_name') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col sm:col-span-6">
                                <label for="message" class="block text-sm font-medium text-gray-700">Message
                                    (optional)</label>
                                <div class="grow-wrap">
                                    <textarea wire:model="message" name="message" id="message"
                                        placeholder="Enter Your Message.."
                                        class="block w-full mt-1 @error('message') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="requestBook()" class="ml-2" wire:loading.attr="disabled">
                Send Request
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @endif
</div>

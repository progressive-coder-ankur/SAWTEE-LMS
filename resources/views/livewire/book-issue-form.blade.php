<div>
    @if($show)
    <x-jet-dialog-modal class="dark:text-gray-700" wire:model="show">
        <x-slot name="title">
            Issue Book
        </x-slot>

        <x-slot name="content">

            @error('request_id')
            <div class="flex justify-between p-2 space-x-1 overflow-hidden text-white bg-gray-700 rounded">
                <div class="flex items-center flex-grow">
                    <p class="text-xs leading-tight md:text-sm">
                        {{$message}}.
                    </p>
                </div>
            </div>
            @enderror


            <form>
                <div class="mt-6 shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="hidden col-span-6 sm:col-span-3">
                                <label for="request_id" class="block text-sm font-medium text-gray-700">Request
                                    ID</label>
                                <input type="text" wire:model="request_id" name="request_id" id="request_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm default-value focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="issued_by" class="block text-sm font-medium text-gray-700">Issued
                                    By</label>
                                <input type="text" wire:model="issued_by" name="issued_by" id="issued_by"
                                    placeholder="{{Auth::user()->name}}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm default-value focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="issued_to" class="block text-sm font-medium text-gray-700">Requested
                                    By</label>
                                <input type="text" wire:model="issued_to" name="issued_to" id="issued_to"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="book_name" class="block text-sm font-medium text-gray-700">Book
                                    Name</label>
                                <input type="text" required wire:model="book_name" name="book_name" id="book_name"
                                    placeholder="Enter Book Name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm typehead focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                            </div>

                            <div class="col sm:col-span-3">
                                <label for="return_date" class="block text-sm font-medium text-gray-700">Return
                                    date</label>
                                <div class="grow-wrap">
                                    <input required type="date" wire:model="return_date" name="return_date"
                                        id="return_date"
                                        class="block w-full mt-1 @error('return_date') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                    @error('return_date') <span
                                        class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col sm:col-span-3">
                                <label for="issued_at" class="block text-sm font-medium text-gray-700">Issued Date
                                </label>
                                <div class="grow-wrap">
                                    <input type="text" wire:model="issued_at" name="issued_at" id="issued_at"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
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

            <x-jet-button wire:click="issueBook()" class="ml-2" wire:loading.attr="disabled">
                Issue
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    @endif
</div>

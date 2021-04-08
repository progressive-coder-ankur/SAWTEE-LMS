<div>
    @if($show)
    <x-jet-dialog-modal wire:model="show">
        <x-slot name="title">
            Return Book
        </x-slot>

        <x-slot name="content">

            @error('issue_id')
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
                                <label for="issue_id" class="block text-sm font-medium text-gray-700">Issue
                                    ID</label>
                                <input type="text" wire:model="issue_id" name="issue_id" id="issue_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm default-value focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="returned_by" class="block text-sm font-medium text-gray-700">Returned
                                    By</label>
                                <input type="text" wire:model="returned_by" name="returned_by" id="returned_by"
                                    placeholder="Enter User Name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm default-value focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="returned_to" class="block text-sm font-medium text-gray-700">Retruned
                                    To</label>
                                <input type="text" wire:model="returned_to" name="returned_to" id="returned_to"
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
                                <label for="return_date" class="block text-sm font-medium text-gray-700">Returned
                                    date</label>
                                <div class="grow-wrap">
                                    <input type="text" wire:model="returned_date" name="returned_date"
                                        id="returned_date"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />

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

            <x-jet-button wire:click="returnBook()" class="ml-2" wire:loading.attr="disabled">
                Return
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    @endif
</div>

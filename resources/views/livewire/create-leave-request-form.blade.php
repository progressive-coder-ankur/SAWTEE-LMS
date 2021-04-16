<div>
    <x-jet-dialog-modal>
        <x-slot name="title">
            Request Leave
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-dark sm:p-6">
                        <div class="grid grid-cols-12 gap-6">

                            <div class="col-span-6 ">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">
                                    Title</label>
                                <x-jet-input type="text" required wire:model="title" name="title" id="title"
                                    autocomplete="title" placeholder="Title/Designation" />

                            </div>

                            <div class="col-span-6 ">
                                <label for="requested_by"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Requested By</label>
                                <x-jet-input type="text" value="{{Auth::user()->name}}" name="requested_by" id="requested_by"
                                    autocomplete="requested_by" />

                            </div>

                            <div class="col-span-6 ">
                                <label for="leave_type"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Leave Type</label>
                                    <select id="leave_type" wire:model="leave_type" name="leave_type" autocomplete="leave_type"
                                    class="block w-full px-3 py-2 mt-1 bg-white dark:bg-dark border @error('leave_type') border-red-300 @else border-gray-300 @enderror  rounded-md shadow-sm focus:outline-none focus:ring-0 focus:ring-gray-300 focus:border-none focus:border-gray-300 ">
                                    <option selected>Select a leave type</option>
                                    <option>Annual</option>
                                    <option>Sick</option>
                                    <option>Festive</option>

                                </select>

                            </div>

                            <div class="col-span-6 ">
                                <label for="from"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">From</label>
                                <x-jet-input type="date" wire:model="from" name="from" id="from"
                                     />
                            </div>

                            <div class="col-span-6 ">
                                <label for="to"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">To</label>
                                <x-jet-input type="date" required wire:model.lazy="to"
                                    wire:model.debounce.500ms="to" name="to" id="to" />


                            </div>


                            <div class="col-span-6 ">
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Message</label>
                                <textarea type="textarea" rows="5" class= "border-gray-300 rounded-md shadow-sm resize dark:border-gray-700 focus:border-primary focus:ring-0 focus:ring-primary dark:focus:ring-primary-darker dark:bg-dark dark:focus:border-primary-darker focus:ring-opacity-50 focus:shadow-md" wire:model="message" name="message" id="message"></textarea>

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

            <x-jet-button wire:click="request()" class="ml-2" wire:loading.attr="disabled">
                Send Request
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

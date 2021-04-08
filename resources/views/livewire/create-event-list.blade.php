<div>
    @if($show)

    <x-create-event-list wire:model="show">
        <x-slot name="title">
            Add New Event List
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="mt-6 shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-dark sm:p-6">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-6">
                                <label for="event_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Event
                                    Name</label>
                                <select id="event_name" name="event_name" autocomplete="off" wire:model="selectedEvent"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm dark:bg-dark focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option>Select Gender</option>
                                    @foreach($events as $event)
                                    <option>{{$event->title}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input hidden type="text" wire:model="event_id" />
                                @error('event_id') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-6">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Name</label>
                                <x-jet-input type="text" required wire:model="name" name="name" id="name"
                                    autocomplete="name" placeholder="Type Participant Name" />
                                @error('name') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-6">
                                <label for="designation"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Designation</label>
                                <x-jet-input type="text" required wire:model="designation" name="designation"
                                    id="designation" autocomplete="designation" />

                            </div>

                            <div class="col-span-6">
                                <label for="orgname"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Org.
                                    Name</label>
                                <x-jet-input type="text" required wire:model="orgname" name="orgname" id="orgname"
                                    autocomplete="orgname" />

                            </div>

                            <div class="col-span-6">
                                <label for="mobile"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Mobile
                                    No.</label>
                                <x-jet-input type="tel" name="mobile" id="mobile" autocomplete="off"
                                    wire:model.lazy="mobile" wire:model.debounce.500ms="mobile" />
                                @error('mobile') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror

                            </div>

                            <div class="col-span-6">
                                <label for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Landline
                                    No.</label>
                                <x-jet-input type="tel" name="phone" id="phone" autocomplete="off" wire:model="phone" />

                            </div>
                            <div class="col-span-6">
                                <label for="country"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Gender</label>
                                <select id="country" name="country" autocomplete="off" wire:model="gender"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm dark:bg-dark focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                @error('gender') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror

                            </div>
                            <div class="col-span-6">
                                <label for="fax"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Fax</label>
                                <x-jet-input type="tel" name="fax" id="fax" autocomplete="off" wire:model="fax" />

                            </div>
                            <div class="col-span-6">
                                <label for="email_address1"
                                    class="block text-sm font-medium text-gray-700 dark:text-light">Email</label>
                                <x-jet-input type="email" name="email_address1" id="email_address1" autocomplete="off"
                                    wire:model="email1" />
                                @error('email1') <span
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
    </x-create-event-list>

    @endif
</div>

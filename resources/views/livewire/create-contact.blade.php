<div>
    @if($show)

    <x-create-contact-form wire:model="show">
        <x-slot name="title">
            Add New Contact
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                    Personal Information
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Personal information about the contact.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="title"
                                                class="block text-sm font-medium text-gray-700">Title</label>
                                            <select id="title" name="title" autocomplete="off" wire:model="title"
                                                placeholder="Select Title"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-0 focus:ring-gray-300 focus:border-gray-300 sm:text-sm">

                                                <option selected>Mr.</option>
                                                <option>M/S</option>
                                                <option>Ms</option>
                                                <option>H/E</option>
                                                <option>Dr.</option>
                                                <option>Prof.</option>
                                                <option>Hon'ble</option>
                                            </select>
                                            @error('title') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700">Name</label>
                                            <x-jet-input type="text" name="name" id="name" autocomplete="off"
                                                wire:model="name" />
                                            @error('name') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-4 sm:col-span-2">
                                            <label for="designation"
                                                class="block text-sm font-medium text-gray-700">Designation</label>
                                            <x-jet-input type="text" name="designation" id="designation"
                                                autocomplete="off" wire:model="designation" />
                                            @error('designation') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="email_address1"
                                                class="block text-sm font-medium text-gray-700">Primary Email</label>
                                            <x-jet-input type="email" name="email_address1" id="email_address1"
                                                autocomplete="off" wire:model="email1" />
                                            @error('email1') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="email_address2"
                                                class="block text-sm font-medium text-gray-700">Optional Email</label>
                                            <x-jet-input type="email" name="email_address2" id="email_address2"
                                                autocomplete="off" wire:model="email2" />
                                            @error('email2') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="phone" class="block text-sm font-medium text-gray-700">Landline
                                                No.</label>
                                            <x-jet-input type="tel" name="phone" id="phone" autocomplete="off"
                                                wire:model="phone" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile
                                                No.</label>
                                            <x-jet-input type="tel" name="mobile" id="mobile" autocomplete="off"
                                                wire:model.lazy="mobile" wire:model.debounce.500ms="mobile" />
                                            @error('mobile') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="country"
                                                class="block text-sm font-medium text-gray-700">Country</label>

                                            <x-jet-input type="text" name="country" id="country" autocomplete="off"
                                                wire:model="country" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="city"
                                                class="block text-sm font-medium text-gray-700">Region</label>

                                            <x-jet-input type="text" name="region" id="region" autocomplete="off"
                                                wire:model="region" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="country"
                                                class="block text-sm font-medium text-gray-700">Gender</label>
                                            <select id="country" name="country" autocomplete="off" wire:model="gender"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-300 focus:border-gray-300 sm:text-sm">
                                                <option>Select Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                            @error('gender') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="city"
                                                class="block text-sm font-medium text-gray-700">City</label>
                                            <x-jet-input type="text" name="city" id="city" wire:model="city" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="state" class="block text-sm font-medium text-gray-700">State /
                                                Province</label>
                                            <x-jet-input type="text" name="state" id="state" wire:model="state" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP
                                                / Postal</label>
                                            <x-jet-input type="text" name="postal_code" id="postal_code"
                                                autocomplete="off" wire:model="zip" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="street_address"
                                                class="block text-sm font-medium text-gray-700">Street address</label>
                                            <x-jet-input type="text" name="street_address" id="street_address"
                                                autocomplete="off" wire:model="address1" />
                                            @error('address1') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="street_address2"
                                                class="block text-sm font-medium text-gray-700">Street address 2</label>
                                            <x-jet-input type="text" name="street_address2" id="street_address2"
                                                autocomplete="off" wire:model="address2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                    Organization Information
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Info about the contact Organization.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="orgname"
                                                class="block text-sm font-medium text-gray-700">Organizaton
                                                Name</label>
                                            <x-jet-input type="text" name="orgname" id="orgname" autocomplete="off"
                                                wire:model="orgname" />
                                            @error('orgname') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="orgdept"
                                                class="block text-sm font-medium text-gray-700">Organization
                                                Department</label>
                                            <x-jet-input type="text" name="orgdept" id="orgdept" autocomplete="off"
                                                wire:model="orgdept" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="orgaddress"
                                                class="block text-sm font-medium text-gray-700">Organization
                                                address</label>
                                            <x-jet-input type="text" name="orgaddress" id="orgaddress"
                                                autocomplete="off" wire:model="orgaddress" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="category"
                                                class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" name="category" autocomplete="off"
                                                wire:model="category"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-300 focus:border-gray-300 sm:text-sm">
                                                <option value="" selected>Select Category</option>
                                                <option>SAWTEE</option>
                                                <option>National</option>
                                                <option>International</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="list"
                                                class="block text-sm font-medium text-gray-700">List</label>
                                            <select id="list" name="list" autocomplete="off" wire:model="list"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-300 focus:border-gray-300 sm:text-sm">
                                                <option value="" selected>Select List</option>
                                                <option>Advisory Board</option>
                                                <option>Member
                                                    Institution</option>
                                                <option>Board Members</option>
                                                <option>Staffs</option>
                                                <option>Sawtee Members</option>

                                                <option>Government/Semi</option>
                                                <option>Inter
                                                    Government</option>
                                                <option>Private Sector</option>
                                                <option>Non Government</option>
                                                <option>Academic, Political &
                                                    Professional</option>
                                                <option>Media</option>
                                                <option>Donors/Partners</option>
                                                <option>Diplomats</option>

                                                <option>Zone 1</option>
                                                <option>Zone 2</option>
                                                <option>Zone 3</option>
                                                <option>Zone 4</option>

                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="pobox"
                                                class="block text-sm font-medium text-gray-700">PO.BOX</label>
                                            <x-jet-input type="text" name="pobox" id="pobox" autocomplete="off"
                                                wire:model="pobox" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fax" class="block text-sm font-medium text-gray-700">Fax</label>
                                            <x-jet-input type="text" name="fax" id="fax" autocomplete="off"
                                                wire:model="fax" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="language"
                                                class="block text-sm font-medium text-gray-700">Language</label>
                                            <select id="language" name="language" autocomplete="off"
                                                wire:model="language"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-300 focus:border-gray-300 sm:text-sm">
                                                <option>English</option>
                                                <option>Nepali</option>
                                                <option>Both</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="ext" class="block text-sm font-medium text-gray-700">Ext</label>
                                            <x-jet-input type="number" name="ext" id="ext" autocomplete="off"
                                                wire:model="ext" />
                                            @error('ext') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
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

            <x-jet-button wire:click.prevent="addContact()" class="ml-2" type="button" wire:loading.attr="disabled">
                Add Contact
            </x-jet-button>
        </x-slot>
    </x-create-contact-form>

    @endif
</div>

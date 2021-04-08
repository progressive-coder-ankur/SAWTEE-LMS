<div>
    @if($updateMode)
    @include('livewire.update-contact')
    @else
    @include('livewire.create-contact')
    @endif

    <div class="px-4 py-6 pl-0">
        <button wire:click="show()"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <a class="flex items-center">
                <x-icons.add /> &nbsp;Add New Contacts</a>
        </button>

        <button
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-reds-500">
            <a href="{{ route('contact.deleted') }}" class="flex items-center">
                <x-icons.trash-can /> &nbsp;View Trash</a>
        </button>
    </div>
    <div class="w-full xl:overflow-x-hidden ">
        <livewire:contacts-table sort="id|desc" exportable searchable="name, orgname, category, email1" />
    </div>
</div>

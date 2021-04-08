<div>
    <div class="container px-4 py-6 pl-0">
        <button
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <a href="{{ route('contact') }}" class="flex items-center">
                <x-icons.back /> &nbsp;Back to Contacts</a>
        </button>

        <button wire:click="restoreAll()"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-reds-500">
            <a class="flex items-center">
                <x-icons.restore /> &nbsp;Restore All</a>
        </button>

        <button wire:click="emptyTrash()"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-reds-500">
            <a class="flex items-center">
                <x-icons.trash-can /> &nbsp;Empty Trash</a>
        </button>
    </div>
</div>

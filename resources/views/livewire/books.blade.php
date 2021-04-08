<div>
    @if($updateMode)
    @include('livewire.update-book')
    @else
    @include('livewire.create-book')
    @endif

    <div class="px-4 py-6 pl-0">
        <button wire:click="show()"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <a class="flex items-center">
                <x-icons.add /> &nbsp;Add Book</a>
        </button>

        <button
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-reds-500">
            <a href="{{ route('books.deleted') }}" class="flex items-center">
                <x-icons.trash-can /> &nbsp;View Trash</a>
        </button>
    </div>
    <div class="w-full xl:overflow-x-hidden">
        <div>
            <livewire:books-table hideable="inline" sort="id|desc" searchable="title, author, category" />
        </div>
    </div>
</div>

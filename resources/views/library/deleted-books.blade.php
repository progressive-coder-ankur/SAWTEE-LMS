<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <h2 class="mr-6 text-xl font-semibold leading-tight text-gray-800 dark:text-light">
                {{ __('Trashed Books') }}

            </h2>
            <div
                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto rounded-full bg-primary dark:bg-primary-dark sm:mx-0 sm:h-10 sm:w-10">
                <x-icons.trash />
            </div>
        </div>
    </x-slot>

    <div class="flex justify-center">
        <div class="flex flex-col p-6 my-12 min-w-7xl max-w-7xl">
            <livewire:trashed-books-table-top />
            <livewire:trashed-books-table model="App\Models\Book" sort="id|desc" searchable="title, author, category" />
        </div>
    </div>
</x-app-layout>

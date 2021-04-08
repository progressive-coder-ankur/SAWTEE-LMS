<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <h2 class="mr-6 text-xl font-semibold leading-tight text-gray-800 dark:text-light">
                {{ __('Library Management') }}

            </h2>
            <div
                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto rounded-full bg-primary dark:bg-primary-dark sm:mx-0 sm:h-10 sm:w-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="px-6 mx-auto mb-6 max-w-7xl sm:px-6 lg:px-8">
            @livewire('books')
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <h2 class="mr-6 text-xl font-semibold leading-tight text-gray-800">
                {{ __('Users Role Management') }}

            </h2>
            <div
                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl px-6 mx-auto mb-6 sm:px-6 lg:px-8">
            <livewire:roles />
        </div>
    </div>
</x-app-layout>

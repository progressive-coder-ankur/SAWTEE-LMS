<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <h2 class="mr-6 text-xl font-semibold leading-tight text-gray-800 dark:text-light">
                {{ __('Contact Categories') }}

            </h2>
        </div>
    </x-slot>

    <div class="flex justify-center">
        <div class="flex flex-col p-6 my-12 max-w-9xl">
            @livewire('contact-categories')
        </div>
    </div>
</x-app-layout>

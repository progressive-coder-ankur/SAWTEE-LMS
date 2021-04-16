<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center ">
            <h2 class="mr-6 text-xl font-semibold leading-tight text-gray-800 dark:text-light">
              @if(Auth::user()->is_admin)  {{ __('Leave Management') }} @else {{ __('Leave Request') }} @endif

            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="px-6 mx-auto mb-6 max-w-7xl sm:px-6 lg:px-8">
            @livewire('leaves')
        </div>
    </div>
</x-app-layout>

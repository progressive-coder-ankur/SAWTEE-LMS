<div>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center justify-between ">
                <h2 class="mr-6 text-xl font-semibold leading-tight text-gray-800">
                    {{ __('View Event') }}

                </h2>


            </div>
        </x-slot>


        <div class="flex justify-center bg-gray-300">
            {{-- <livewire:event-participant-list-table /> --}}
        </div>
    </x-app-layout>
</div>

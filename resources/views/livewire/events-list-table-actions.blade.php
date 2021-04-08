<div class="flex items-center justify-center">

    {{-- <button class="p-1 text-green-600 rounded hover:bg-green-600 hover:text-white">
        <a href="{{ route('event.show', $id) }}">
    <svg class="w-5 h-5" height="20" width="20" class="cursor-pointer icon icon-tabler icon-tabler-edit" fill="none"
        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
        </path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
        </path>
    </svg>
    </a>
    </button> --}}

    <button wire:click="editList({{$id}})" class="p-1 text-blue-600 rounded hover:bg-blue-600 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer icon icon-tabler icon-tabler-edit" width="20"
            class="w-5 h-5" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
            <line x1="16" y1="5" x2="19" y2="8" />
        </svg>
    </button>


    <div x-data="{ open: {{ isset($open) && $open ? 'true' : 'false' }}, working: false }" x-cloak wire:key="{{ $id}}">
        <span x-on:click="open = true">
            <button class="p-1 text-red-600 rounded hover:bg-red-600 hover:text-white">
                <x-icons.trash /></button>
        </span>

        <div x-show="open"
            class="fixed inset-x-0 bottom-0 z-50 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div x-show="open" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-gray-100 rounded-lg shadow-xl sm:max-w-lg sm:w-full sm:p-6">
                <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                    <button @click="open = false" type="button"
                        class="text-gray-400 transition duration-150 ease-in-out hover:text-gray-500 focus:outline-none focus:text-gray-500">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="w-full">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Delete {{ $id }}
                        </h3>
                        <div class="mt-2">
                            <div class="mt-10 text-gray-700">
                                Are you sure?
                            </div>
                            <div class="flex justify-center mt-10">
                                <span class="mr-2">
                                    <button x-on:click="open = false" x-bind:disabled="working"
                                        class="inline-flex items-center justify-center w-32 px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-teal active:bg-gray-700">
                                        No
                                    </button>
                                </span>
                                <span x-on:click="working = !working">
                                    <button wire:click="delete({{ $id }})"
                                        class="inline-flex items-center justify-center w-32 px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:border-red-700 focus:shadow-outline-teal active:bg-red-700">
                                        Yes
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

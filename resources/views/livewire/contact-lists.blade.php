<div>

    <div class="px-4 py-4 pl-0">
        <div x-data="{ open: {{ isset($open) && $open ? 'true' : 'false' }}, working: false }" x-cloak>
            <span x-on:click="open = true">
                <button
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <a class="flex items-center">
                        <x-icons.add /> &nbsp;Add List</a>
                </button>
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
                        <form>
                            <div class="mt-6 shadow sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Category
                                                Name</label>
                                            <input type="text" required wire:model="name" name="name" id="name"
                                                autocomplete="name" placeholder="Type List Name"
                                                class="block w-full mt-1 @error('name') border-red-300 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                            @error('name') <span
                                                class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="category"
                                                class="block text-sm font-medium text-gray-700">Category</label>
                                            <select id="category" wire:model="category" name="category"
                                                autocomplete="category"
                                                class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option selected>Select a category</option>
                                                @foreach( $categories as $category )
                                                <option>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="flex justify-center mt-10">
                            <span class="mr-2">
                                <button x-on:click="open = false" x-bind:disabled="working"
                                    class="inline-flex items-center justify-center w-32 px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-teal active:bg-gray-700">
                                    Cancel
                                </button>
                            </span>
                            <span x-on:click="working = !working">
                                <button x-on:click="open = false" wire:click="store()"
                                    class="inline-flex items-center justify-center w-32 px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:border-red-700 focus:shadow-outline-teal active:bg-red-700">
                                    Add List
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full xl:overflow-x-hidden">
        <div>
            <livewire:contact-lists-table dates="created_at, updated_at" hideable="inline"
                searchable="name, category.name" />
        </div>
    </div>
</div>

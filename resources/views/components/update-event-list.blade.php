@props(['id' => null, 'maxWidth' => '5xl'])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-4 pt-5 pb-4 bg-white dark:bg-dark sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div
                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full dark:bg-red-500 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </div>

            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg">
                    {{ $title }}
                </h3>

                <div class="mt-2">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-4 text-right bg-gray-100 dark:bg-darker">
        {{ $footer }}
    </div>
</x-jet-modal>

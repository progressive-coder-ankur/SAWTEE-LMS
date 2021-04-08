@props(['id' => null, 'maxWidth' => '5xl'])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-4 pt-5 pb-4 bg-white dark:bg-darker sm:p-6 sm:pb-4">
        <div class="items-center justify-center sm:flex sm:items-start">


            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <div class="flex flex-row items-center mb-5">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto rounded-full bg-primary dark:bg-primary-dark sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex ml-6">
                        <h3 class="text-lg dark:text-light dark:font-semibold">
                            {{ $title }}
                        </h3>
                    </div>
                </div>


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

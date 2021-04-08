<div>
    @if(!$updateMode)
    <x-create-book-form wire:model="show">
        <x-slot name="title">
            Add New Book
        </x-slot>

        <x-slot name="content">
            <form>
                <div class="shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white dark:bg-dark sm:p-6">
                        <div class="grid grid-cols-9 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Book
                                    Title</label>
                                <x-jet-input type="text" required wire:model="title" name="title" id="title"
                                    autocomplete="title" placeholder="Book Title" />
                                @error('title') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="author"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Author</label>
                                <x-jet-input type="text" wire:model="author" name="author" id="author"
                                    autocomplete="author" placeholder="Author/s Name" />

                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="shelf"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Shelf Id</label>
                                <x-jet-input type="text" wire:model.lazy="shelf" wire:model.debounce.500ms="shelf"
                                    name="shelf" id="shelf" autocomplete="shelf" placeholder="Self Id" />
                                @error('shelf') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="publisher"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Publisher</label>
                                <x-jet-input type="text" wire:model="publisher" name="publisher" id="publisher"
                                    placeholder="Publisher Name" autocomplete="publisher" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="ISBN"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">ISBN</label>
                                <x-jet-input type="text" required wire:model.lazy="ISBN"
                                    wire:model.debounce.500ms="ISBN" name="ISBN" id="ISBN"
                                    placeholder="111-11-11111-11-1" />

                                @error('ISBN')<span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="category"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Category</label>
                                <select id="category" wire:model="category" name="category" autocomplete="category"
                                    class="block w-full px-3 py-2 mt-1 bg-white dark:bg-dark border @error('category') border-red-300 @else border-gray-300 @enderror  rounded-md shadow-sm focus:outline-none focus:ring-0 focus:ring-gray-300 focus:border-none focus:border-gray-300 ">
                                    <option selected>Select a category</option>
                                    <option>English Books</option>
                                    <option>Nepali Books</option>
                                    <option>Publication</option>
                                    <option>Sawtee-Report</option>
                                    <option>Other-Report</option>
                                </select>
                                @error('category') <span
                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-span-3 sm:col-span-3 lg:col-span-3">
                                <label for="published_year"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-100">Published
                                    Year</label>
                                <x-jet-input type="text" wire:model="published_year" name="published_year" id="year"
                                    placeholder="Published Year" />

                            </div>
                            <div class="col-span-3 sm:col-span-3 lg:col-span-2">
                                <div class="w-32 h-8 custom-number-input">
                                    <label for="custom-input-number"
                                        class="w-full text-sm font-semibold text-gray-700 dark:text-gray-100">Book Count
                                    </label>
                                    <div class="relative flex flex-row w-full h-8 mt-1 bg-transparent rounded-lg">
                                        <a wire:click="decrement"
                                            class="w-20 h-full text-center text-white bg-gray-700 outline-none cursor-pointer dark:bg-darker">
                                            <span class="m-auto text-2xl font-thin">−</span>
                                        </a>
                                        <input type="number"
                                            class="flex items-center w-full font-semibold text-center text-gray-700 outline-none dark:bg-dark dark:text-gray-100 focus:outline-none text-md hover:text-black focus:text-black md:text-basecursor-default"
                                            name="custom-input-number" wire:model="bookCount" readonly>
                                        <a wire:click="increment"
                                            class="w-20 h-full text-center text-white bg-gray-700 outline-none cursor-pointer dark:bg-darker">
                                            <span class="m-auto text-2xl font-thin">+</span>
                                        </a>
                                        @error('bookCount') <span
                                            class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="closeModal()" wire:loading.attr="disabled">
                Nevermind
            </x-jet-danger-button>

            <x-jet-button wire:click="addBook()" class="ml-2" wire:loading.attr="disabled">
                Add Book
            </x-jet-button>
        </x-slot>
    </x-create-book-form>

    @endif
</div>

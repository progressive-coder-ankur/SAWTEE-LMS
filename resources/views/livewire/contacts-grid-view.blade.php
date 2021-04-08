<div>
    <div class="flex">
        <div class="relative pt-2 mx-auto text-gray-600">
            <input
                class="h-10 px-5 pr-16 text-sm bg-white border-2 rounded-lg dark:bg-darker border-primary dark:border-primary-dark focus:outline-none focus:shadow focus:ring-1 focus:ring-primary"
                type="search" name="search" wire:model="search" placeholder="Search">
            <button type="submit" class="absolute top-0 right-0 mt-5 mr-4">
                <svg class="w-4 h-4 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-12">

        @foreach($contacts as $person)
        <div class="col-span-1 font-light gap-y-4 md:gap-4 md:col-span-6 lg:col-span-6 xl:col-span-4">
            <div
                class="relative flex m-2 bg-white border-l-4 border-white rounded-lg shadow-md cursor-pointer dark:bg-dark hover:shadow-2xl hover:border-primary">
                <div class="p-4 pr-6 leading-normal">
                    <div class="text-xl font-medium truncate dark:text-light">{{$person->title}}&nbsp;{{$person->name}}
                    </div>
                    <div class="pb-2 text-xs font-semibold tracking-widest text-gray-500 uppercase truncate">
                        {{$person->orgname}}</div>
                    <div class="dark:text-gray-500">{{$person->mobile}}</div>
                    <a class="block mr-4 text-blue-600 hover:text-blue-700"
                        href="mailto:{{$person->email1}}">{{$person->email1}}</a>
                    <a class="block text-blue-600 hover:text-blue-700"
                        href="mailto:{{$person->email2}}">{{$person->email2}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex items-center justify-center h-24 mt-6">{{ $contacts->links('pagination-links') }}</div>
</div>

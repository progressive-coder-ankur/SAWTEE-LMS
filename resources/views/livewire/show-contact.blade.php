<div>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex items-center ">
                <h2 class="mr-6 text-xl font-semibold leading-tight text-gray-800 dark:text-light">
                    {{ __('View Contact') }}

                </h2>
                <div
                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto rounded-full bg-primary dark:bg-primary-dark sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </div>
            </div>
        </x-slot>


        <div class="flex justify-center bg-gray-300 dark:bg-darker">
            <div class="flex flex-col w-2/3 my-12 bg-white rounded-lg shadow-lg dark:bg-dark">
                <div class="px-6 py-4 text-lg text-gray-700 bg-gray-200 dark:text-light dark:bg-dark">
                    {{$contact->name}}</div>

                <div class="flex items-center justify-between px-6 py-4">
                    <div
                        class="px-2 py-1 text-xs font-bold text-gray-200 uppercase border border-gray-200 rounded-full bg-primary dark:bg-primary-dark">
                        Category-{{$contact->category}}</div>
                    <div
                        class="px-2 py-1 text-xs font-bold text-gray-200 uppercase border border-gray-200 rounded-full bg-primary dark:bg-primary-dark">
                        List-{{$contact->list}}</div>
                    <div
                        class="px-2 py-1 text-xs font-bold text-gray-200 uppercase border border-gray-200 rounded-full bg-primary dark:bg-primary-dark">
                        {{$contact->updated_at->diffForHumans()}}</div>
                </div>

                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="p-4 rounded-lg">
                        <div class="border-t border-gray-200">
                            <dl>
                                <div
                                    class="px-4 py-5 bg-gray-50 dark:bg-darker sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Full name
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->title}}&nbsp;{{$contact->name}}
                                    </dd>
                                </div>
                                <div class="px-4 py-5 bg-white dark:bg-dark sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Designation
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->designation}}
                                    </dd>
                                </div>
                                <div
                                    class="px-4 py-5 bg-gray-50 dark:bg-darker sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Email address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->email1}}
                                    </dd>
                                </div>
                                <div class="px-4 py-5 bg-white dark:bg-dark sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Address
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->address1}}, {{$contact->state}}, {{$contact->city}},
                                        {{$contact->country}}
                                    </dd>
                                </div>
                                <div
                                    class="px-4 py-5 bg-gray-50 dark:bg-darker sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Category
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->category}}
                                    </dd>
                                </div>
                                <div
                                    class="px-4 py-5 bg-gray-50 dark:bg-darker sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Language
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->language}}
                                    </dd>
                                </div>
                                <div
                                    class="px-4 py-5 bg-gray-50 dark:bg-darker sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        List
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->list}}
                                    </dd>
                                </div>
                                <div
                                    class="px-4 py-5 bg-gray-50 dark:bg-darker sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Gender
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        {{$contact->gender}}
                                    </dd>
                                </div>
                                <div class="px-4 py-5 bg-white dark:bg-dark sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Oranization Info
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-light sm:mt-0 sm:col-span-2">
                                        <ul class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex items-center flex-1 w-0">

                                                    <span class="flex-1 w-0 ml-2 truncate">
                                                        <strong class="text-md">Org Name:</strong>
                                                        {{$contact->orgname}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex items-center flex-1 w-0">
                                                    <span class="flex-1 w-0 ml-2 truncate">
                                                        <strong class="text-md">Org Dept:</strong>
                                                        {{$contact->orgdept}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex items-center flex-1 w-0">
                                                    <span class="flex-1 w-0 ml-2 truncate">
                                                        <strong class="text-md">Org Address:</strong>
                                                        {{$contact->orgaddress}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex items-center flex-1 w-0">
                                                    <span class="flex-1 w-0 ml-2 truncate">
                                                        <strong class="text-md">Fax: </strong>{{$contact->fax}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                                <div class="flex items-center flex-1 w-0">
                                                    <span class="flex-1 w-0 ml-2 truncate">
                                                        <strong class="text-md">POBOX No:</strong> {{$contact->pobox}}
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-200 dark:bg-darker">
                    <div class="text-xs font-bold text-gray-600 uppercase dark:text-light">Updated By</div>

                    <div class="flex flex-col pt-3">
                        <div class="ml-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                <img class="object-cover w-12 h-12 rounded-full"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-light dark:bg-dark hover:text-gray-700 focus:outline-none">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                            <p class="font-bold">{{$contact->updated_by}}</p>
                            <p class="mt-1 text-sm text-gray-700 dark:text-light">Admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>

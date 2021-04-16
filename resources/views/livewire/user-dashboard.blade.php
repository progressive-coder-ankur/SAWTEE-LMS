<div class="">
    <div class="grid grid-cols-1 col-span-10 pb-20 bg-blue-100">
        <div class="flex px-2 py-2 text-xs font-normal text-gray-400 bg-gray-50">
            <div class="px-4 text-sm font-semibold text-gray-700">Welcome back!&nbsp; <span
                    class="px-2 py-2 text-lg font-bold text-primary-dark bg-primary-100">{{ Auth::user()->name }}</span>
            </div>
            <div class="flex items-center px-4 ml-auto space-x-2">
                {{-- <span
                    class="px-2 py-1 transition-all duration-300 ease-in-out rounded-sm cursor-pointer hover:text-green-500 hover:bg-gray-200">Today</span>
                <span
                    class="px-2 py-1 duration-300 ease-in-out rounded-sm cursor-pointertransition-all hover:text-green-500 hover:bg-gray-200">Month</span>
                <span
                    class="px-2 py-1 transition-all duration-300 ease-in-out rounded-sm cursor-pointer hover:text-green-500 hover:bg-gray-200">Year</span> --}}
                <span
                    class="px-2 py-1 text-gray-400 transition-all duration-300 ease-in-out bg-gray-200 rounded-sm cursor-pointer ">Today:
                    <span class="ml-1 text-green-500"> {{ $today }} </span>
                </span>
                <span class="px-2 py-1 text-green-500 rounded cursor-pointer hover:bg-gray-200">
                    <svg class="block w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="container px-4 mx-auto mt-6 md:p-0">

            <div class="grid grid-cols-1 lg:gap-4 gap-y-4 lg:grid-cols-12">
                <div class="grid grid-cols-2 col-span-8 gap-4 p-4 md:grid-cols-3 rounded-2xl">
                    {{-- <div class="col-span-2 -m-4 bg-red-400 card-header h-52 rounded-t-2xl"></div> --}}
                    <!-- State cards -->

                    <!-- Book card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-lg dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Books
                            </h6>
                            <span class="text-xl font-semibold">{{$book->count()}}</span>

                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 stroke-current dark:text-primary-dark" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Users card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-lg dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Users
                            </h6>
                            <span class="text-xl font-semibold">{{$user->count()}}</span>

                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 stroke-current dark:text-primary-dark"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Book Request card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-lg dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Book Requests
                            </h6>
                            <span class="text-xl font-semibold">{{$bookRequests->count()}}</span>

                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Books Issued card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-lg dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Book Issued
                            </h6>
                            <span class="text-xl font-semibold">{{$issued->count()}}</span>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Contacts card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-lg dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Total Contacts
                            </h6>
                            <span class="text-xl font-semibold">{{$contact->count()}}</span>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Events card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md shadow-lg dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Events
                            </h6>
                            <span class="text-xl font-semibold">{{$events->count()}}</span>
                        </div>
                        <div>
                            <span>
                                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid col-span-1 bg-white shadow-lg md:gap-4 md:col-span-4 dark:bg-dark rounded-2xl">
                    <div class="text-white bg-gray-900 rounded-lg shadow-xl">
                        <div class="px-8 py-3 border-b border-gray-800">
                            <div class="inline-block w-3 h-3 mr-2 bg-red-500 rounded-full"></div>
                            <div class="inline-block w-3 h-3 mr-2 bg-yellow-300 rounded-full"></div>
                            <div class="inline-block w-3 h-3 mr-2 bg-green-400 rounded-full"></div>
                        </div>
                        <div class="px-8 py-6">
                            <p><em class="text-blue-400">const</em> <span class="text-green-400">currentUser</span>
                                <span class="text-pink-500">=</span> <em class="text-blue-400">function</em>() {</p>
                            <p>&nbsp;&nbsp;<span class="text-pink-500">return</span> {</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;name: <span
                                    class="text-yellow-300">'{{Auth::user()->name}}'</span>,</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;role: <span
                                    class="text-yellow-300">@if(auth()->user()->is_admin)'Admin'@else
                                    'User'@endif</span>,</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;email: <span class="text-yellow-300">'<a
                                        href="mailto:{{auth()->user()->email}}" target="_blank"
                                        class="text-yellow-300 hover:underline focus:border-none">{{auth()->user()->email}}</a>'</span>,
                            </p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;last login: <span
                                    class="text-yellow-300">{{\Carbon\Carbon::parse(auth()->user()->last_login_at)->format('F j, Y')}}</span>,
                            </p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;last login IP: <span
                                    class="text-yellow-300">{{auth()->user()->last_login_ip}}</span>,
                            </p>
                            <p>&nbsp;&nbsp;}</p>
                            <p>}</p>
                        </div>
                    </div>

                </div>
            </div>


            {{-- <div class="grid gap-4 mt-6 md:grid-cols-12 sm:grid-cols-1">

                <div class="grid h-auto col-span-8 rounded">
                    <div class="w-full h-full card-header bg-gray-50 rounded-2xl">
                        <div class="">
                            <div class="flex items-center justify-center mb-6">
                                <svg class="w-8 h-8 text-indigo-500 stroke-current" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <h4 class="ml-3 text-lg font-semibold">Requests Made By you</h4>
                            </div>
                            <div class="my-6 bg-white rounded shadow-md">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                                            <th class="px-6 py-3 text-left">ID</th>
                                            <th class="px-6 py-3 text-left">Book</th>
                                            <th class="px-6 py-3 text-left">Request Date</th>
                                            <th class="px-6 py-3 text-center">Issued Status</th>
                                            <th class="px-6 py-3 text-left">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm font-light text-gray-600">
                                        @forelse($bookRequests as $request)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{$loop->index+1}}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{$request->book_name}}</span>
                                                </div>
                                            </td>

                                            <td class="px-6 py-3 text-left">
                                                <div class="flex items-center">
                                                    <div class="mr-2">
                                                                <img class="w-6 h-6 rounded-full"
                                                                    src="https://randomuser.me/api/portraits/men/1.jpg" />
                                                            </div>
                                                    <span>{{\Carbon\Carbon::parse($request->requested_at)->format('j F, Y')}}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3 text-center">
                                                @if($request->issued
                                                == 1)
                                                <span
                                                    class="px-3 py-1 text-xs text-green-600 bg-green-200 rounded-full">
                                                    Issued</span>
                                                @else <span
                                                    class="px-3 py-1 text-xs text-red-600 bg-red-200 rounded-full">Not
                                                    Issued</span> @endif
                                            </td>

                                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{$request->message}}</span>
                                                </div>
                                            </td>

                                        </tr>
                                        @empty
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">NO requests.</tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <div
                                                    class="bg-white border-b border-gray-200 rounded-lg rounded-t-none max-w-screen">
                                                    <div class="items-center justify-between p-2 sm:flex">
                                                        {{$bookRequests->links()}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid h-auto col-span-4 rounded">

                    <div
                        class="w-full h-full overflow-x-hidden overflow-y-scroll text-sm text-gray-400 card-header bg-gray-50 rounded-2xl custom-scroll">
                        <h3 class="flex p-4 ">
                            <div class="pt-5">
                                <span class="block text-base font-semibold text-gray-800 ">
                                    My activities
                                </span>
                                <span class="text-xs ">
                                    Total: {{$activities->count()}}
                                </span>
                            </div>
                            <div
                                class="flex items-center px-3 ml-auto transition-all duration-300 ease-in-out rounded cursor-pointer hover:bg-gray-200">
                                <svg class="block w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg>

                            </div>
                        </h3>

                        @forelse($activities->where('type', 'App\Models\Book') as $activity)
                        <ul class="font-medium">
                            <li class="grid grid-cols-8 px-4 mb-6 text-xs ">
                                <span
                                    class="col-span-2 font-semibold text-gray-800 ">{{\Carbon\Carbon::parse($activity->created_at)->format('F j, Y')}}</span>
                                <span
                                    class="relative z-10 block w-3 h-3 col-span-1 bg-gray-100 border-2 border-green-500 rounded-full">
                                    <span
                                        class="@if($loop->last) hidden @else absolute w-1 h-16 bg-gray-300 opacity-25 inset-x-1/4 slashed-zero @endif"></span>
                                </span>
                                <span class="col-span-5 ">
                                    {{$activity->title}} titled
                                    @if($activity->activityable)
                                    {{$activity->activityable->title}}
                                    @endif
                                </span>
                            </li>
                        </ul>
                        @empty
                        No activities Yet.
                        @endforelse


                    </div>

                </div>
            </div> --}}

            <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-12">

                <div class="grid grid-cols-1 rounded md:col-span-8">
                    <div class="w-full bg-gray-50 rounded-2xl">
                        <div class="flex flex-col card-header max-h-96">
                            <div class="flex items-center justify-center py-6">
                                <svg class="w-8 h-8 text-indigo-500 stroke-current" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <h4 class="ml-3 text-lg font-semibold">Requests Made By you</h4>
                            </div>
                            <div class="relative p-6 overflow-auto bg-white rounded shadow-md">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                                            <th class="px-6 py-3 text-left">ID</th>
                                            <th class="px-6 py-3 text-left">Book</th>
                                            <th class="px-6 py-3 text-left">Request Date</th>
                                            <th class="px-6 py-3 text-center">Issued Status</th>
                                            <th class="px-6 py-3 text-left">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm font-light text-gray-600">
                                        @forelse($bookRequests as $request)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{$loop->index+1}}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{$request->book_name}}</span>
                                                </div>
                                            </td>

                                            <td class="px-6 py-3 text-left">
                                                <div class="flex items-center">
                                                    {{-- <div class="mr-2">
                                                                <img class="w-6 h-6 rounded-full"
                                                                    src="https://randomuser.me/api/portraits/men/1.jpg" />
                                                            </div> --}}
                                                    <span>{{\Carbon\Carbon::parse($request->requested_at)->format('j F, Y')}}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-3 text-center">
                                                @if($request->issued
                                                == 1)
                                                <span
                                                    class="px-3 py-1 text-xs text-green-600 bg-green-200 rounded-full">
                                                    Issued</span>
                                                @else <span
                                                    class="px-3 py-1 text-xs text-red-600 bg-red-200 rounded-full">Not
                                                    Issued</span> @endif
                                            </td>

                                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{$request->message}}</span>
                                                </div>
                                            </td>

                                        </tr>
                                        @empty
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">NO requests.</tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="bg-white border-b border-gray-200 rounded-lg rounded-t-none max-w-screen">
                                    <div class="p-4 ">
                                        {{$bookRequests->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid bg-white max-h-96 dark:bg-dark rounded-2xl md:col-span-4">
                    <div class="flex items-center justify-center" x-data="temp()" x-init="init()">
                        <template x-if="`${temp}`">
                            <div class="flex flex-col w-full max-w-xs p-4 rounded ">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="text-xl font-bold dark:text-light" x-text="`${temp.name}`">n/a
                                    </div>
                                    <div class="ml-4 text-sm font-medium dark:text-light"> &nbsp;Feels Like <span
                                            class="p-2 text-sm font-semibold rounded text-primary-dark bg-primary-50"
                                            x-text="`${temp.main.feels_like}`">n/a</span></div>
                                </div>
                                <div class="flex flex-row justify-between px-3 mt-3">
                                    <img :src="`https://openweathermap.org/img/w/${temp.weather[0].icon}.png`"
                                        class="w-20 h-20 p-1 rounded-full bg-dark dark:bg-gray-400"
                                        alt="`${temp.weather[0].description}`" title="`${temp.weather[0].description}`">
                                    <div class="flex flex-col items-center ml-6">
                                        <div class="flex mt-1">
                                            <span class="block text-sm"><svg class="w-6 h-6" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"></path>
                                                </svg></span>
                                            <span class="text-xl font-semibold text-green-300 "
                                                x-text="`${parseInt(temp.main.temp_max)}°C (max)`">n/a</span>
                                        </div>
                                        <div class="flex">
                                            <span class="block text-sm"><svg class="w-6 h-6" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3"></path>
                                                </svg></span>
                                            <span class="text-xl font-semibold text-red-300 "
                                                x-text="`${parseInt(temp.main.temp_min)}°C (min)`">n/a</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center justify-between mt-6">
                                    <div class="text-5xl font-medium dark:text-light" x-text="`${parseInt(temp.main.temp)}°C`">n/a
                                    </div>
                                    <div class="px-2 py-1 text-xl font-semibold bg-gray-700 text-light"
                                        x-text="`${temp.weather[0].main}`">n/a</div>

                                </div>
                                <div class="flex flex-row justify-between mt-6">
                                    <div class="flex flex-col items-center">
                                        <div class="wind dark:text-light"></div>
                                        <div class="text-sm font-medium dark:text-light">Wind</div>
                                        <div class="text-sm text-gray-500 dark:text-light" x-text="`${temp.wind.speed}k/h`">n/a
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="humidity dark:text-light"></div>
                                        <div class="text-sm font-medium dark:text-light">Humidity</div>
                                        <div class="text-sm text-gray-500 dark:text-light" x-text="`${temp.main.humidity}%`">n/a
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div class="pressure dark:text-light"></div>
                                        <div class="text-sm font-medium dark:text-light">Pressure</div>
                                        <div class="text-sm text-gray-500 dark:text-light" x-text="`${parseInt(temp.main.pressure)}°C`">
                                            n/a</div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@push('styles')
<style>
    .wind::before {
        display: block;
        opacity: 0.6;
        width: 1.3em;
        height: 1.3em;
        margin-right: 0.5em;
        content: url('data:image/svg+xml;charset=utf-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22%3E %3Cg fill=%22currentColor%22 fill-rule=%22nonzero%22%3E %3Cpath d=%22M6 11.5h5.688a3.75 3.75 0 1 0-1.95-6.954.75.75 0 0 0 .781 1.28A2.25 2.25 0 1 1 11.688 10L6 10.001a.75.75 0 1 0 0 1.5zM2 15h9.966a1.5 1.5 0 1 1-.779 2.782.75.75 0 0 0-.78 1.281 3 3 0 1 0 1.56-5.563H1.999A.75.75 0 1 0 2 15zM16.667 13h2.251a3 3 0 1 0-1.56-5.563.75.75 0 0 0 .781 1.28 1.5 1.5 0 1 1 .779 2.782l-2.251.001a.75.75 0 1 0 0 1.5z%22/%3E %3C/g%3E %3C/svg%3E');
    }

    .humidity::before {
        display: block;
        opacity: 0.6;
        width: 1.3em;
        height: 1.3em;
        margin-right: 0.5em;
        content: url('data:image/svg+xml;charset=utf-8,%3Csvg width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22 fill=%22none%22 xmlns=%22http://www.w3.org/2000/svg%22%3E %3Cg%3E %3Cpath fill-rule=%22evenodd%22 clip-rule=%22evenodd%22 d=%22M17.5487 8.0001C16.7829 6.74175 15.1271 4.67011 12.5637 1.75476C12.2645 1.41448 11.7342 1.41518 11.4359 1.75625C8.88065 4.67783 7.22597 6.74805 6.45489 7.99571C3.91532 12.1049 3.72409 15.9389 6.56528 18.751C9.63862 21.793 14.3621 21.792 17.4355 18.7512C20.2743 15.9425 20.0858 12.169 17.5487 8.0001ZM7.73087 8.78429C8.39019 7.71747 9.8183 5.91206 12.0019 3.39071C14.1889 5.90415 15.6153 7.70851 16.2673 8.77991C18.4829 12.4205 18.6344 15.4548 16.3805 17.6849C13.8915 20.1475 10.1092 20.1483 7.62047 17.685C5.36463 15.4522 5.51867 12.3638 7.73087 8.78429Z%22 fill=%22currentColor%22/%3E %3Cpath d=%22M12.7366 17.2967C14.3588 16.7579 15.4749 15.2362 15.4749 13.5C15.4749 13.0858 15.1391 12.75 14.7249 12.75C14.3107 12.75 13.9749 13.0858 13.9749 13.5C13.9749 14.5852 13.277 15.5366 12.2638 15.8732C11.8707 16.0038 11.6579 16.4283 11.7884 16.8214C11.919 17.2145 12.3436 17.4273 12.7366 17.2967Z%22 fill=%22currentColor%22/%3E %3C/g%3E %3C/svg%3E');
    }

    .pressure::before {
        display: block;
        opacity: 0.6;
        width: 1.3em;
        height: 1.3em;
        margin-right: 0.5em;
        content: url('data:image/svg+xml;charset=utf-8,%3Csvg width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22 fill=%22none%22 xmlns=%22http://www.w3.org/2000/svg%22%3E %3Cg%3E %3Cpath d=%22M14.1314 2.22778C14.5361 2.31569 14.793 2.71509 14.7051 3.11986C14.6172 3.52464 14.2178 3.78152 13.813 3.69362C13.2222 3.56532 12.6156 3.5 12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 16.6944 7.30558 20.5 12 20.5C16.6944 20.5 20.5 16.6944 20.5 12C20.5 11.4103 20.4401 10.8289 20.3222 10.2616C20.238 9.85608 20.4985 9.45902 20.904 9.37478C21.3096 9.29054 21.7067 9.55101 21.7909 9.95657C21.9295 10.624 22 11.3077 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C12.7228 2 13.4361 2.07681 14.1314 2.22778Z%22 fill=%22currentColor%22/%3E %3Cpath fill-rule=%22evenodd%22 clip-rule=%22evenodd%22 d=%22M13.348 10.6533C13.6409 10.9461 14.1158 10.946 14.4086 10.6531L18.0304 7.03025C18.3233 6.73732 18.3232 6.26244 18.0303 5.96959C17.7373 5.67674 17.2624 5.67681 16.9696 5.96975L13.3478 9.59259C13.055 9.88553 13.055 10.3604 13.348 10.6533ZM8.21961 15.7803C8.51248 16.0732 8.98735 16.0732 9.28028 15.7804L10.5308 14.5301C10.8237 14.2373 10.8238 13.7624 10.5309 13.4695C10.238 13.1766 9.76315 13.1765 9.47023 13.4694L8.21972 14.7196C7.9268 15.0125 7.92675 15.4874 8.21961 15.7803Z%22 fill=%22currentColor%22/%3E %3Cpath fill-rule=%22evenodd%22 clip-rule=%22evenodd%22 d=%22M14.75 5.75C14.75 5.33579 15.0858 5 15.5 5H18.25C18.6642 5 19 5.33579 19 5.75C19 6.16421 18.6642 6.5 18.25 6.5H15.5C15.0858 6.5 14.75 6.16421 14.75 5.75Z%22 fill=%22currentColor%22/%3E %3Cpath fill-rule=%22evenodd%22 clip-rule=%22evenodd%22 d=%22M17.5 5.75C17.5 5.33579 17.8358 5 18.25 5C18.6642 5 19 5.33579 19 5.75V8.5C19 8.91421 18.6642 9.25 18.25 9.25C17.8358 9.25 17.5 8.91421 17.5 8.5V5.75Z%22 fill=%22currentColor%22/%3E %3Cpath fill-rule=%22evenodd%22 clip-rule=%22evenodd%22 d=%22M9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12ZM13.5 12C13.5 12.8284 12.8284 13.5 12 13.5C11.1716 13.5 10.5 12.8284 10.5 12C10.5 11.1716 11.1716 10.5 12 10.5C12.8284 10.5 13.5 11.1716 13.5 12Z%22 fill=%22currentColor%22/%3E %3C/g%3E %3C/svg%3E');
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript">
    window.addEventListener('swal',function(e){
        Swal.fire(e.detail);
    });

    function temp() {
    return {
        temp: [],
        init() {

            fetch(
                "https://api.openweathermap.org/data/2.5/weather?q=kathmandu&appid=9681c4b68a89ed3c67e4d73c3c8e1c2d&units=metric"
            )
                .then((response) => response.json())
                .then((response) => {
                    this.temp = response;
                });
        }
    };
}

</script>
@endpush

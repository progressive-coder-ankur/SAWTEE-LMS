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
        <div class="container px-8 m-auto mt-6">

            <div class="grid gap-4 md:grid-cols-12 sm:grid-cols-1">
                <div class="grid grid-cols-2 col-span-6 gap-4 p-4 shadow bg-dark rounded-2xl">
                    {{-- <div class="col-span-2 -m-4 bg-red-400 card-header h-52 rounded-t-2xl"></div> --}}
                    <!-- State cards -->

                    <!-- Value card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Books
                            </h6>
                            <span class="text-xl font-semibold">{{$book->count()}}</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                +4.4%
                            </span>
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
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Users
                            </h6>
                            <span class="text-xl font-semibold">{{$user->count()}}</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                +2.6%
                            </span>
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

                    <!-- Orders card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Book Requests
                            </h6>
                            <span class="text-xl font-semibold">{{$bookRequests->count()}}</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                +3.1%
                            </span>
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

                    <!-- Tickets card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                        <div>
                            <h6
                                class="font-semibold leading-none tracking-wider text-gray-500 uppercase text-md dark:text-primary-light">
                                Book Returned
                            </h6>
                            <span class="text-xl font-semibold">{{$returned->count()}}</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                                +3.1%
                            </span>
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


            <div class="grid gap-4 mt-6 md:grid-cols-12 sm:grid-cols-1">

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
            </div>

        </div>
    </div>
</div>

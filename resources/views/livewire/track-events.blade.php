<div>
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col w-full h-full">
            <div class="w-full h-full p-4 overflow-auto bg-transparent shadow" id="journal-scroll">
                <table class="w-full">
                    <tbody class="">
                        @forelse($activities as $activity)
                        <tr class="relative py-1 text-xs transform scale-100 cursor-default">
                            <td class="pl-5 pr-3 whitespace-no-wrap">
                                <div class="text-gray-400 dark:text-light">{{$activity->created_at->diffForHumans()}}</div>
                                <div>{{\Carbon\Carbon::parse($activity->created_at)->format('h:m A')}}</div>
                            </td>
                            @if($activity->activityable_type == 'App\Models\Book')
                                <td class="px-2 py-2 whitespace-no-wrap">
                                    <div class="font-medium leading-5 text-gray-500 dark:text-light">By: {{App\Models\User::find($activity->user_id)->name}}</div>
                                    <div class="leading-5 text-gray-900 dark:text-light">{{$activity->title}}

                                    <div class="leading-5 text-gray-800 dark:text-light">@if($activity->activityable)
                                        Book Title: {{$activity->activityable->title}}
                                        @endif</div>
                                </td>
                            @elseif($activity->activityable_type == 'App\Models\Contact')
                                <td class="px-2 py-2 whitespace-no-wrap">
                                    <div class="font-medium leading-5 text-gray-500 dark:text-light">By: {{App\Models\User::find($activity->user_id)->name}}</div>
                                    <div class="leading-5 text-gray-900 dark:text-light">{{$activity->title}}

                                    <div class="leading-5 text-gray-800 dark:text-light">@if($activity->activityable)
                                    Contact: {{$activity->activityable->title}}&nbsp;{{$activity->activityable->name}}
                                        @endif</div>
                                </td>
                            @elseif($activity->activityable_type == 'App\Models\Event')
                                <td class="px-2 py-2 whitespace-no-wrap">
                                    <div class="font-medium leading-5 text-gray-500 dark:text-light">By: {{App\Models\User::find($activity->user_id)->name}}</div>
                                    <div class="leading-5 text-gray-900 dark:text-light">{{$activity->title}}

                                    <div class="leading-5 text-gray-800 dark:text-light">@if($activity->activityable)
                                        Event: {{$activity->activityable->title}}
                                        @endif</div>
                                </td>
                            @endif
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="space-y-4" x-show.transition.in="activeTabe == 'user'">

        @forelse(auth()->user()->unreadNotifications->where('type' , 'App\Notifications\NewRequestNotification')
        as
        $notification)
        <div class="block alert">
            <div class="flex flex-row px-4 space-x-4">
                <div class="relative flex-shrink-0">
                    <span
                        class="inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </span>

                    <div
                        class=" @if($loop->last) hidden @else absolute h-24 p-px -mt-3 -ml-px bg-primary-dark left-1/2 dark:bg-primary-light @endif">
                    </div>
                </div>
                <div class="flex flex-col overflow-hidden">
                    <div class="justify-start flex-1 mb-2">
                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                            {{$notification->data['message']}}
                        </h5>
                        <p class="mt-3 mb-1 text-sm font-normal text-gray-400 dark:text-primary-lighter">
                            User {{ $notification->data['userName'] }} requested for
                            <span
                                class="px-2 py-1 text-sm font-semibold bg-primary-50 text-primary-light dark:bg-primary-darker">{{ $notification->data['bookName'] }}</span>
                            Book. @if(isset($notification->data['requestId'] ))<span
                                class="px-2 py-1 text-sm font-semibold bg-primary-50 text-primary-light dark:bg-primary-darker">Request
                                ID:{{ $notification->data['requestId'] }}</span>@endif
                        </p>
                    </div>
                    <div class="flex justify-between ">
                        <span class="text-sm font-normal text-gray-400 dark:text-primary-light">
                            [{{$notification->created_at->diffForHumans()}}] </span>
                        <span
                            class="ml-10 text-sm font-normal text-gray-400 dark:text-primary-light justify-items-end mark-as-read">

                            <button class="p-1 px-2 rounded-md bg-primary-50 text-primary-light dark:bg-primary-darker"
                                wire:click="markAsRead('{{ $notification->id }}')">
                                Mark as read
                            </button>

                        </span>
                    </div>

                </div>

            </div>
        </div>
        @if($loop->last)
        <div class="flex justify-center">
            <button class="p-1 px-2 rounded-md bg-primary-50 text-primary-light dark:bg-primary-darker"
                @click="{{ route('admin.markall') }}">
                Mark all as read
            </button>
        </div>
        @endif
        @empty
        <div class="flex items-center justify-center h-32 p-4 bg-primary-50">
            <div class="text-2xl font-semibold text-primary-dark"> No New Notifications.</div>
        </div>
        @endforelse

    </div>
</div>

<div>
    @if($notificationsCount > 0)
    <span class="absolute inset-0 object-right-top -mr-6">
        <div
            class="inline-flex items-center px-1.5 py-0.5 border-2 border-white rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
            {{$notificationsCount}}
        </div>
    </span>
    @endif
</div>

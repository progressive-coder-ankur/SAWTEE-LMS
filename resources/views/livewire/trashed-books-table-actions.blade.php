<div>
    <div class="flex items-center justify-center">
        <button wire:click="restoreDeleted({{$id}})" title="Restore"
            class="p-1 text-blue-600 rounded hover:bg-blue-600 hover:text-white">

            <svg class="w-5 h-5 cursor-pointer icon icon-tabler icon-tabler-edit" width="20" height="20" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4">
                </path>
            </svg>
        </button>
        <button wire:click="$emit('triggerDelete',{{ $id }})" title="Delete"
            class="p-1 text-red-600 rounded hover:bg-red-600 hover:text-white">

            <x-icons.trash />
        </button>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {

        @this.on('triggerDelete', id => {
            Swal.fire({
                title: 'Are You Sure ?',
                text: 'This book record will be deleted permanently. Cannot revert this action !!',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DC2626',
                cancelButtonColor: '#777',
                confirmButtonText: 'Yes, Delete!'
            }).then((result) => {
		//if user clicks on delete
                if (result.value) {
		     // calling destroy method to delete
                    @this.call('permanentDelete',id)
		    // success response

                } else {
                    @this.call('showSwalModalCanceled')
                }
            });
        });
    })
</script>
@endpush

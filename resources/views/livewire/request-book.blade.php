<div>


    @include('livewire.book-request-form')

    <div class="w-full xl:overflow-x-hidden">
        <div>
            <livewire:book-request-table hideable="inline" sort="id|desc" searchable="title, author, category" />
        </div>
    </div>


</div>

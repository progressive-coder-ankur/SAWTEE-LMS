<div>
    @if($show)
    @include('livewire.create-leave-request-form')
    @endif

    <div class="px-4 py-6 pl-0">
        <button wire:click="show"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <a class="flex items-center">
                <x-icons.add /> &nbsp;Request for leave</a>
        </button>
    </div>

    @if(Auth::user()->is_user)
    <livewire:user-leave-table />

    @else
    <div x-data="{
        openTab: 1,
        activeClasses: 'border-l border-t border-r border-primary rounded-t text-blue-700 outline-none',
        inactiveClasses: 'text-primary hover:text-primary-dark'
      }"
        class="col-span-1 p-6 overflow-y-auto bg-white max-h-96 lg:col-span-8 rounded-2xl dark:bg-darker ">
        <ul class="flex border-b border-primary">
            <li @click="openTab = 1" class="mr-1 -mb-px" :class="{ '-mb-px': openTab === 1 }">
                <button :class="openTab === 1 ? activeClasses : inactiveClasses"
                    class="inline-block px-4 py-2 font-semibold bg-white rounded-t focus:outline-none hover:text-primary-dark text-primary dark:bg-darker dark:border-primary dark:text-primary-dark ">New
                    Leave Requests</button>
            </li>
            <li @click="openTab = 2" class="mr-1" :class="{ '-mb-px': openTab === 2 }">
                <button :class="openTab === 2 ? activeClasses : inactiveClasses"
                    class="inline-block px-4 py-2 font-semibold bg-white focus:outline-none text-primary dark:bg-darker hover:text-primary-dark dark:border-primary dark:text-primary-dark">Approved
                    Leave Requests</button>
            </li>
        </ul>
        <div class="w-full">
            <div x-show="openTab === 1">
                <livewire:leaves-table hideable="inline" searchable="requested_by" />
            </div>
            <div x-show="openTab === 2">
                <livewire:approved-leaves-table />
            </div>
        </div>

    </div>

    @endif
</div>
{{-- @push('scripts')
<script>
    const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        function date() {
        return {
            showDatepicker: false,
            datepickerValue: '',
            month: '',
            year: '',
            no_of_days: [],
            blankdays: [],
            days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            initDate() {
            let today = new Date();
            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
            },
            isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);
            return today.toDateString() === d.toDateString() ? true : false;
            },
            getDateValue(date) {
            let selectedDate = new Date(this.year, this.month, date);
            this.datepickerValue = selectedDate.toDateString();
            this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
            console.log(this.$refs.date.value);
            this.showDatepicker = false;
            },
            getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
            // find where to start calendar day of week
            let dayOfWeek = new Date(this.year, this.month).getDay();
            let blankdaysArray = [];
            for (var i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }
            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }
            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
            }
        }
        }
</script>
@endpush --}}

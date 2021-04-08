<div>
    <!--Toast-->
    <div class="fixed bottom-0 right-0 z-10 w-5/6 max-w-sm m-8 alert-toast md:w-full">
        <input type="checkbox" class="hidden" id="footertoast">

        <label
            class="flex items-center justify-between w-full h-16 p-6 text-white rounded shadow-lg cursor-pointer bg-primary dark:bg-primary-darker close"
            title="close" for="footertoast">
            Welcome &nbsp; {{ Auth::user()->name }}

            <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
        </label>
    </div>
</div>

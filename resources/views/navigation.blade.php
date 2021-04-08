<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0 ">
                    <a href="{{ route('dashboard') }}">
                        <x-logo class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->


                @if (Route::has('login'))
                <div class="flex">
                    <div class="flex items-center ml-10 space-x-4">


                        @auth

                        @if(Auth::user()->role === 'admin')
                        <x-jet-nav-link href="{{ url('/admin/dashboard') }}" aria-label="Dashboard" title="Dashboard">
                            Dashboard
                        </x-jet-nav-link>
                        @else
                        <x-jet-nav-link href="{{ url('/dashboard') }}" aria-label="Dashboard" title="Dashboard">
                            Dashboard
                        </x-jet-nav-link>
                        @endif
                        @else
                        <x-jet-nav-link href="{{ route('login') }}" aria-label="LogIn" title="LogIn">LogIn
                        </x-jet-nav-link>
                        @if (Route::has('register'))
                        <x-jet-nav-link href="{{ route('register') }}" aria-label="Register" title="Register">Register
                        </x-jet-nav-link>
                        @endif
                        @endauth

                    </div>
                </div>
                @endif

            </div>


            <!-- Hamburger -->
            {{-- <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @if (Route::has('login'))
        <div class="pt-2 pb-3 space-y-1">
            @auth

            @if(Auth::user()->role === 'admin')
            <x-jet-nav-link href="{{ url('/admin/dashboard') }}" aria-label="Dashboard" title="Dashboard">
    Dashboard
    </x-jet-nav-link>
    @else
    <x-jet-nav-link href="{{ url('/user/dashboard') }}" aria-label="Dashboard" title="Dashboard">
        Dashboard
    </x-jet-nav-link>
    @endif
    @else
    <x-jet-nav-link href="{{ route('login') }}" aria-label="LogIn" title="LogIn">LogIn
    </x-jet-nav-link>
    @if (Route::has('register'))
    <x-jet-nav-link href="{{ route('register') }}" aria-label="Register" title="Register">Register
    </x-jet-nav-link>
    @endif
    @endauth
    </div>
    @endif
    </div> --}}
</nav>

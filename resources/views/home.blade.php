<x-guest-layout>
    @if(Auth::check())
    <x-welcome-alert />
    @endif
    <div class="min-h-screen px-12 mx-auto max-w-screen-2xl sm:px-3 font-custom">
        <header class="absolute top-0 left-0 right-0 z-10 px-6 py-4">
            <div class="container mx-auto">
                <div class="flex items-center">
                    <div class="flex-1">
                        <x-logo />
                    </div>
                    <div class="flex items-center -mr-2 sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            @if (Route::has('login'))
                            <nav class="items-center">
                                @auth
                                @if(Auth::user()->is_admin)
                                <a href="{{ route('dashboard') }}"
                                    class="px-6 py-3 font-bold uppercase border-b-2 text-primary border-primary">Dashboard</a>
                                @else
                                <a href="{{ route('user-dashboard') }}"
                                    class="px-6 py-3 font-bold uppercase text-primary hover:text-secondary">Dashboard</a>
                                @endif
                                @else
                                <a href="{{ route('login') }}"
                                    class="px-6 py-3 font-bold uppercase text-primary hover:text-secondary">LogIn</a>
                                <a href="{{ route('register') }}"
                                    class="px-6 py-3 font-bold uppercase text-primary hover:text-secondary">Register</a>
                                @endauth
                            </nav>
                            @endif
                        </div>
                    </div>
                    @if (Route::has('login'))
                    <nav class="items-center hidden md:flex">
                        @auth
                        @if(Auth::user()->is_admin)
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-3 font-bold uppercase border-b-2 text-primary border-primary">Dashboard</a>
                        @else
                        <a href="{{ route('user-dashboard') }}"
                            class="px-6 py-3 font-bold uppercase text-primary hover:text-secondary">Dashboard</a>
                        @endif
                        @else
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 font-bold uppercase text-primary hover:text-secondary">LogIn</a>
                        <a href="{{ route('register') }}"
                            class="px-6 py-3 font-bold uppercase text-primary hover:text-secondary">Register</a>
                        @endauth
                    </nav>
                    @endif
                </div>
            </div>
        </header>
        <div class="relative px-6 pb-6 overflow-hidden">
            <img src="/images/wave.svg" class="absolute top-0 left-2/5">
            <div class="container relative mx-auto">
                <div class="flex flex-col items-center pt-32 pb-16 md:flex-row md:pb-0">
                    <div class="mb-4 md:w-1/2 sm:mb-16 md:mb-0">
                        <h2 class="mb-2 text-xl font-bold uppercase text-primary-600">{{config('app.name')}}</h2>
                        <h1 class="mb-6 text-4xl font-bold leading-tight md:text-5xl text-primary md:mb-10">Library,
                            Address Book & Leave Management System </h1>
                        @if(Auth::check())
                        <a href="#our-process"
                            class="px-6 py-3 text-lg font-bold text-white uppercase bg-blue-500 rounded-md md:px-8 md:py-4 md:text-xl hover:bg-blue-700">More
                            info</a>
                        @else
                        <a href="{{route('register')}}"
                            class="px-6 py-3 text-lg font-bold text-white uppercase bg-blue-500 rounded-md md:px-8 md:py-4 md:text-xl hover:bg-blue-700">Register
                            Now</a>
                        @endif

                    </div>
                    <div class="flex justify-end flex-1 mt-16 sm:mt-0">
                        <img src="/images/hero.svg">
                    </div>
                </div>
            </div>
        </div>
        <div id="our-process" class="relative">
            <img src="/images/circle2.svg" class="absolute top-0 left-0 hidden -mx-32 sm:block">
            <div class="container relative px-6 pt-6 pb-12 mx-auto">
                <h3 class="flex flex-col items-center mb-12 text-4xl font-bold text-primary">Our Book request process
                    <span class="block w-20 h-1 mt-4 bg-primary"></span></h3>
                <div class="flex flex-col md:flex-row xl:px-32">
                    <div class="flex flex-col items-center md:px-6 lg:px-12">
                        <span class="text-6xl text-primary">1</span>
                        <h4 class="mb-2 text-2xl font-semibold text-primary">Register</h4>
                        <p class="leading-relaxed text-center text-primary-700">Register with your email address ,
                            verify your email address. </p>
                    </div>
                    <div class="flex flex-col items-center md:px-6 lg:px-12">
                        <span class="text-6xl text-primary">2</span>
                        <h4 class="mb-2 text-2xl font-semibold text-primary">Log In</h4>
                        <p class="leading-relaxed text-center text-primary-700">Log In with your creadendtials and
                            click the book-request link from navigation. </p>
                    </div>
                    <div class="flex flex-col items-center md:px-6 lg:px-12">
                        <span class="text-6xl text-primary">3</span>
                        <h4 class="mb-2 text-2xl font-semibold text-primary">Send Request</h4>
                        <p class="leading-relaxed text-center text-primary-700">Search for the book from the database
                            and send
                            your request to be issued by our admin.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="about-us" class="py-12 mt-32 bg-blue-100">
            <div class="container px-6 mx-auto">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/2 md:pr-8 lg:pr-16">
                        <img src="/images/about-us.svg" class="mb-16 -mt-24 md:mt-0 lg:-mt-24 md:mb-0">
                    </div>
                    <div class="md:w-1/2">
                        <h3 class="flex flex-col mb-6 text-4xl font-bold text-primary">About us <span
                                class="block w-20 h-1 mt-4 bg-primary"></span></h3>
                        <p class="mb-4 text-lg text-primary-700">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris
                            efficitur lacinia.</p>
                        <p class="text-lg text-primary-700">Aliquam eget semper mi. Mauris magna risus, viverra in
                            nulla id, placerat fermentum tellus. Aliquam non.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="services" class="relative">
            <img src="/images/circle.svg" class="absolute top-0 right-0 hidden mt-64 md:block">
            <div class="container relative px-6 py-32 mx-auto">
                <h3 class="flex flex-col items-center text-4xl font-bold text-primary">Services we offer <span
                        class="block w-20 h-1 mt-4 bg-primary"></span></h3>
                <div
                    class="flex flex-col items-center mt-16 mb-24 md:flex-row md:mb-16 xl:mb-8 md:mt-0 md:mt-16 lg:mt-0">
                    <img src="/images/service1.svg" class="md:w-1/3">
                    <div class="md:ml-16 xl:ml-32">
                        <h4 class="mb-4 text-2xl font-bold md:text-3xl text-primary-800">Library Management</h4>
                        <p class="mb-4 text-lg text-primary-700">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris
                            efficitur lacinia.</p>
                        <p class="text-lg text-primary-700">Aliquam eget semper mi. Mauris magna risus, viverra in
                            nulla id, placerat fermentum tellus. Aliquam non felis eu dui fermentum auctor. Aenean sed
                            ante congue, facilisis ipsum eu, gravida lacus.</p>
                    </div>
                </div>
                <div class="flex flex-col-reverse items-center mb-24 md:flex-row md:mb-16 xl:mb-8">
                    <div class="md:mr-16 xl:mr-32">
                        <h4 class="mb-4 text-2xl font-bold md:text-3xl text-primary-800">Contacts Management
                        </h4>
                        <p class="mb-4 text-lg text-primary-700">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris
                            efficitur lacinia.</p>
                        <p class="text-lg text-primary-700">Aliquam eget semper mi. Mauris magna risus, viverra in
                            nulla id, placerat fermentum tellus. Aliquam non felis eu dui fermentum auctor. Aenean sed
                            ante congue, facilisis ipsum eu, gravida lacus.</p>
                    </div>
                    <img src="/images/service2.svg" class="md:w-1/3">
                </div>
                <div class="flex flex-col items-center md:flex-row">
                    <img src="/images/service3.svg" class="md:w-1/3">
                    <div class="md:ml-16 xl:ml-32">
                        <h4 class="mb-4 text-2xl font-bold md:text-3xl text-primary-800">Leave Management</h4>
                        <p class="mb-4 text-lg text-primary-700">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nam imperdiet est tellus, et consequat sem sodales id. Quisque molestie et mauris
                            efficitur lacinia.</p>
                        <p class="text-lg text-primary-700">Aliquam eget semper mi. Mauris magna risus, viverra in
                            nulla id, placerat fermentum tellus. Aliquam non felis eu dui fermentum auctor. Aenean sed
                            ante congue, facilisis ipsum eu, gravida lacus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-blue-100">
        <div class="container px-6 py-12 mx-auto text-center border-t border-gray-300 text-primary-500">
            <p>Copyright ©<?php echo date("Y"); ?> SAWTEE_LMS. All rights reserved. | Designed <a
                    href="https://ankursingh.com.cp/" class="font-bold underline text-primary-900">Ankur Singh</a>
            </p>
        </div>
    </footer>
</x-guest-layout>

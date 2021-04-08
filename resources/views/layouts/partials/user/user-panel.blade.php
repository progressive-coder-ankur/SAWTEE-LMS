<!-- User panel -->
<section x-show="isUserPanelOpen" x-transition:enter="transition duration-300 ease-in-out transform"
    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition duration-300 ease-in-out transform" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full" @keydown.escape="window.innerWidth <= 1024 ? isUserPanelOpen = false : ''"
    tabindex="-1" x-ref="userPanel"
    class="fixed inset-y-0 top-0 right-0 z-10 flex-shrink-0 bg-white xl:z-0 xl:sticky w-80 dark:bg-darker dark:text-light xl:border-l dark:border-primary-darker focus:outline-none">
    <h2 class="sr-only">User panel</h2>
    <!-- Close button -->
    <div class="absolute left-0 p-2 transform -translate-x-full xl:hidden">
        <button @click="isUserPanelOpen = false"
            class="p-2 rounded-md text-dark dark:text-light focus:outline-none focus:ring">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="flex flex-col h-screen">
        <!-- Panel header -->
        <div class="flex-shrink-0 p-4">
            <!-- Settings button -->
            <button @click="openSettingsPanel"
                class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                <span class="sr-only">Open settings panel</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
        </div>
        <!-- Panel content -->
        <div class="flex-1 p-4 space-y-8 overflow-y-hidden hover:overflow-y-auto">
            <!-- content -->
            <div class="flex flex-col items-center space-y-2">
                <!-- User avatar -->
                <img class="w-20 h-20 rounded-full dark:opacity-75" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                <h2 class="text-xl font-medium text-gray-600 dark:text-light">{{ Auth::user()->name }}</h2>
            </div>
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-normal text-gray-600 dark:text-light">Messages</h3>
                    <a href="#" class="text-blue-500 hover:underline">View all</a>
                </div>

                <div class="space-y-4">
                    <a href="#" class="flex items-start space-x-2 group">
                        <img class="flex-shrink-0 object-cover w-12 h-12 rounded-full" src="images/avatar-1.jpg"
                            alt="Avatar" />
                        <div class="overflow-hidden">
                            <h4
                                class="font-semibold text-gray-400 transition-colors dark:text-primary-dark group-hover:text-gray-900 dark:group-hover:text-primary-lighter">
                                John Doe
                            </h4>
                            <p class="text-sm text-gray-400 truncate">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis voluptas eaque nesciunt
                                doloremque ullam
                            </p>
                        </div>
                        <span class="text-xs text-gray-500 whitespace-nowrap dark:text-primary-light">1h ago</span>
                    </a>
                    <a href="#" class="flex items-start space-x-2 group">
                        <img class="flex-shrink-0 object-cover w-12 h-12 rounded-full" src="{{('images/cover.jpg')}}"
                            alt="John Doe" />
                        <div class="overflow-hidden">
                            <h4
                                class="font-semibold text-gray-400 transition-colors dark:text-primary-dark group-hover:text-gray-900 dark:group-hover:text-primary-lighter">
                                Someone
                            </h4>
                            <p class="text-sm text-gray-400 truncate">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis voluptas eaque nesciunt
                                doloremque ullam
                            </p>
                        </div>
                        <span class="text-xs text-gray-500 whitespace-nowrap dark:text-primary-light">1h ago</span>
                    </a>
                    <a href="#" class="flex items-start space-x-2 group">
                        <img class="flex-shrink-0 object-cover w-12 h-12 rounded-full" src="{{('images/cover-3.jpg')}}"
                            alt="John Doe" />
                        <div class="overflow-hidden">
                            <h4
                                class="font-semibold text-gray-400 transition-colors dark:text-primary-dark group-hover:text-gray-900 dark:group-hover:text-primary-lighter">
                                Another Person
                            </h4>
                            <p class="text-sm text-gray-400 truncate">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis voluptas eaque nesciunt
                                doloremque ullam
                            </p>
                        </div>
                        <span class="text-xs text-gray-500 whitespace-nowrap dark:text-primary-light">1h ago</span>
                    </a>
                    <a href="#" class="flex items-start space-x-2 group">
                        <img class="flex-shrink-0 object-cover w-12 h-12 rounded-full" src="{{('images/cover-2.jpg')}}"
                            alt="John Doe" />
                        <div class="overflow-hidden">
                            <h4
                                class="font-semibold text-gray-400 transition-colors dark:text-primary-dark group-hover:text-gray-900 dark:group-hover:text-primary-lighter">
                                Another Name
                            </h4>
                            <p class="text-sm text-gray-400 truncate">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis voluptas eaque nesciunt
                                doloremque ullam
                            </p>
                        </div>
                        <span class="text-xs text-gray-500 whitespace-nowrap dark:text-primary-light">1h ago</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

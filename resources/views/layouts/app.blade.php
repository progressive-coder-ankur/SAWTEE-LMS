<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer>

    </script>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="overflow-hidden">
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
        <div class="flex h-screen antialiased text-gray-900 bg-white dark:bg-dark dark:text-light">
            @include('layouts.partials.loading')
            @if(Auth::user()->is_admin)
            @include('layouts.partials.admin.sidebar')
            @else
            @include('layouts.partials.user.mini-column-sidebar')
            @endif
            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">

                @if(Auth::user()->is_admin)
                @include('layouts.partials.admin.navigation')
                @else
                @include('layouts.partials.user.user-header')
                @endif
                <!-- Page Heading -->

                <header class="bg-white dark:bg-dark shadow @if(request()->routeIs('dashboard')) hidden @endif ">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                <main class="min-h-screen text-gray-900 dark:text-gray-100">

                    {{ $slot }}

                </main>
                <div>
                    @include('layouts.partials.footer')
                </div>
            </div>
            @if(Auth::user()->is_admin)
            @include('layouts.partials.admin.panels')
            @else
            @include('layouts.partials.user.panels')
            @endif

        </div>
    </div>

    @stack('styles')
    @stack('modals')
    @livewireScripts
    @stack('scripts')


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



    <script>
        const SwalModal = (icon, title, html) => {
            Swal.fire({
                icon,
                title,
                html
            })
        }

        const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
            Swal.fire({
                icon,
                title,
                html,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText,
                reverseButtons: true,
            }).then(result => {
                if (result.value) {
                    return livewire.emit(method, params)
                }

                if (callback) {
                    return livewire.emit(callback)
                }
            })
        }

        const SwalAlert = (icon, title, text, timeout = 7000) => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: timeout,
                timerProgressBar: true,
                onOpen: toast => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon,
                title,
                text,
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('swal:modal', data => {
                SwalModal(data.icon, data.title, data.text)
            })

            this.livewire.on('swal:confirm', data => {
                SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
            })

            this.livewire.on('swal:alert', data => {
                SwalAlert(data.icon, data.title, data.text, data.timeout)
            })
        })
    </script>

    @if(Auth::user()->is_admin)
    <script>
        const setup = () => {
          const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
              return JSON.parse(window.localStorage.getItem('dark'))
            }

            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
          }

          const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
          }

          const getColor = () => {
            if (window.localStorage.getItem('color')) {
              return window.localStorage.getItem('color')
            }
            return 'cyan'
          }



          const setColors = (color) => {
            const root = document.documentElement
            root.style.setProperty('--color-primary', `var(--color-${color})`)
            root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
            root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
            root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
            root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
            root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
            root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
            this.selectedColor = color
            window.localStorage.setItem('color', color)
            //
          }

          return {
            loading: true,
            isDark: getTheme(),
            toggleTheme() {
              this.isDark = !this.isDark
              setTheme(this.isDark)
            },
            markThis(){
                this.markThis = true

            },
            markAll(){
                this.markAll = true
            },
            setLightTheme() {
              this.isDark = false
              setTheme(this.isDark)
            },
            setDarkTheme() {
              this.isDark = true
              setTheme(this.isDark)
            },
            color: getColor(),
            selectedColor: 'cyan',
            setColors,
            toggleSidbarMenu() {
              this.isSidebarOpen = !this.isSidebarOpen
            },
            isSettingsPanelOpen: false,
            openSettingsPanel() {
              this.isSettingsPanelOpen = true
              this.$nextTick(() => {
                this.$refs.settingsPanel.focus()
              })
            },
            isNotificationsPanelOpen: false,
            openNotificationsPanel() {
              this.isNotificationsPanelOpen = true
              this.$nextTick(() => {
                this.$refs.notificationsPanel.focus()
              })
            },
            isSearchPanelOpen: false,
            openSearchPanel() {
              this.isSearchPanelOpen = true
              this.$nextTick(() => {
                this.$refs.searchInput.focus()
              })
            },
            isMobileSubMenuOpen: false,
            openMobileSubMenu() {
              this.isMobileSubMenuOpen = true
              this.$nextTick(() => {
                this.$refs.mobileSubMenu.focus()
              })
            },
            isMobileMainMenuOpen: false,
            openMobileMainMenu() {
              this.isMobileMainMenuOpen = true
              this.$nextTick(() => {
                this.$refs.mobileMainMenu.focus()
              })
            },



          }
        }

    </script>

    @else
    <script>
        const setup = () => {
          const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
              return JSON.parse(window.localStorage.getItem('dark'))
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
          }

          const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
          }

          const getColor = () => {
            if (window.localStorage.getItem('color')) {
              return window.localStorage.getItem('color')
            }
            return 'cyan'
          }

          const setColors = (color) => {
            const root = document.documentElement
            root.style.setProperty('--color-primary', `var(--color-${color})`)
            root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
            root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
            root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
            root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
            root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
            root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
            this.selectedColor = color
            window.localStorage.setItem('color', color)
          }

          return {
            loading: true,
            isDark: getTheme(),
            color: getColor(),
            selectedColor: 'cyan',
            toggleTheme() {
              this.isDark = !this.isDark
              setTheme(this.isDark)
            },
            setLightTheme() {
              this.isDark = false
              setTheme(this.isDark)
            },
            setDarkTheme() {
              this.isDark = true
              setTheme(this.isDark)
            },
            setColors,
            watchScreen() {
              if (window.innerWidth <= 768) {
                this.isSidebarOpen = false
                this.isUserPanelOpen = false
              } else if (window.innerWidth >= 768 && window.innerWidth < 1280) {
                this.isSidebarOpen = true
                this.isUserPanelOpen = false
              } else if (window.innerWidth >= 1280) {
                this.isSidebarOpen = true
                this.isUserPanelOpen = true
              }
            },
            isSidebarOpen: window.innerWidth >= 768 ? true : false,
            toggleSidbarMenu() {
              this.isSidebarOpen = !this.isSidebarOpen
            },
            isUserPanelOpen: window.innerWidth >= 1280 ? true : false,
            openUserPanel() {
              this.isUserPanelOpen = true
              this.$nextTick(() => {
                this.$refs.userPanel.focus()
              })
            },
            isSettingsPanelOpen: false,
            openSettingsPanel() {
              this.isSettingsPanelOpen = true
              this.$nextTick(() => {
                this.$refs.settingsPanel.focus()
              })
            },
            isNotificationsPanelOpen: false,
            openNotificationsPanel() {
              this.isNotificationsPanelOpen = true
              this.$nextTick(() => {
                this.$refs.notificationsPanel.focus()
              })
            },
            isSearchPanelOpen: false,
            openSearchPanel() {
              this.isSearchPanelOpen = true
              this.$nextTick(() => {
                this.$refs.searchInput.focus()
              })
            },
          }
        }
    </script>
    @endif
</body>

</html>

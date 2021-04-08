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

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="bg-gray-100 ">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="min-h-screen">
            {{ $slot }}
        </main>

        <footer class="bg-blue-100 ">
            <div class="container px-6 py-12 mx-auto text-center border-t border-gray-300 text-secondary-500">
                <p>Copyright ©<?php echo date("Y"); ?> SAWTEE-LMS. All rights reserved. | Designed <a
                        href="https://ankursingh.com.cp/" class="font-bold underline text-secondary-900">Ankur Singh</a>
                </p>
            </div>
        </footer>
    </div>
    @stack('modals')
    @livewireScripts
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        window.addEventListener('swal',function(e){
            Swal.fire(e.detail);
        });

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

          const updateBarChart = (on) => {
            const data = {
              data: randomData(),
              backgroundColor: 'rgb(207, 250, 254)',
            }
            if (on) {
              barChart.data.datasets.push(data)
              barChart.update()
            } else {
              barChart.data.datasets.splice(1)
              barChart.update()
            }
          }

          const updateDoughnutChart = (on) => {
            const data = random()
            const color = 'rgb(207, 250, 254)'
            if (on) {
              doughnutChart.data.labels.unshift('Seb')
              doughnutChart.data.datasets[0].data.unshift(data)
              doughnutChart.data.datasets[0].backgroundColor.unshift(color)
              doughnutChart.update()
            } else {
              doughnutChart.data.labels.splice(0, 1)
              doughnutChart.data.datasets[0].data.splice(0, 1)
              doughnutChart.data.datasets[0].backgroundColor.splice(0, 1)
              doughnutChart.update()
            }
          }

          const updateLineChart = () => {
            lineChart.data.datasets[0].data.reverse()
            lineChart.update()
          }

          return {
            loading: true,
            isDark: getTheme(),
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
            updateBarChart,
            updateDoughnutChart,
            updateLineChart,
          }
        }
    </script>
</body>

</html>

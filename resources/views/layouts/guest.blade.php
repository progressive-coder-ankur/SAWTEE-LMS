<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,400i,600,600i,700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js">
    </script>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="bg-gray-100 ">

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

    </div>
    @stack('styles')
    @stack('modals')
    @livewireScripts
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>

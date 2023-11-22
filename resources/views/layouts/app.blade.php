<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
        <span class="isolate inline-flex rounded-md shadow-sm">

           <x-atoms.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <x-atoms.svg.home />
        </x-atoms.nav-link>

        <x-atoms.nav-link href="{{ route('photos.index') }}" :active="request()->routeIs(['photos.index','photos.create','photos.edit'])">
            <x-atoms.svg.camera />
        </x-atoms.nav-link>
          </span>
        </div>
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')




            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        @stack('scripts')
    </body>
</html>

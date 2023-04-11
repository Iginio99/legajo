<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
       
        @vite(['resources/css/app.css', 'resources/js/app.js'])
          
    </head>
    <body class="font-sans antialiased">
       
        <div class="min-h-screen bg-white">
            @include('layouts.navigation')
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-sky-100 shadow font-bold text-black">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <!-- Navigation Links -->
                <div class=" hidden space-x-12 sm:-my-px sm:ml-10 sm:flex">

                    @role('admin')
                        <x-nav-link :href="url('add-docente')" :active="request()->routeIs('add-docente')">
                            {{ __('Agregar Docente') }}
                        </x-nav-link>
                    @endrole
                    @role('docente|admin')
                        <x-nav-link :href="url('docentes')" :active="request()->routeIs('docentes')">
                            {{ __('Docentes') }}
                        </x-nav-link>
                    @endrole
                    <x-nav-link :href="url('formaciones')" :active="request()->routeIs('formaciones')">
                        {{ __('Formacion Profesional') }}
                    </x-nav-link>
                    <x-nav-link :href="url('experiencias')" :active="request()->routeIs('experiencias')">
                        {{ __('Experiencia Profesional') }}
                    </x-nav-link>
                    <x-nav-link :href="url('producciones')" :active="request()->routeIs('producciones')">
                        {{ __('Producción Intelectual') }}
                    </x-nav-link>
                    <x-nav-link :href="url('meritos')" :active="request()->routeIs('meritos')">
                        {{ __('Méritos y Reconocimientos') }}
                    </x-nav-link>
                </div>
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

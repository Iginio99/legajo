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
    <body class="font-bold antialiased">
       
        <div class="min-h-screen bg-white">
            @include('layouts.navigation')
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class=" bg-gray-100 shadow border-b border-black-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <!-- Navigation Links -->
                <div class=" hidden space-x-12 sm:-my-px sm:ml-10 sm:flex">

                    
                        <x-nav-link :href="url('add-docente')" :active="request()->routeIs('add-docente')">
                            {{ __('Datos personales') }}
                        </x-nav-link>
                    
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
    <footer class="bg-peda flex p-10">
        <div class="w-1/2">
            <h2 class="font-extrabold text white text-4x1">
                Contactanos:
            </h2>
            <div>
                    <div class="flex space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    <span class="text-black font-bold">(+51) 943 225 112</span>

                    </div>
                    

                    <div class="flex space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                    <span class="text-black font-bold">pedagogicochimbote@hotmail.com</span>

                    </div>

                    <div class="flex space-x-4">  
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                     <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <span class="text-black font-bold">los Alcatraces S/N Nuevo Chimbote</span>

                    </div>
            </div>

        </div>
        <div class="w-1/18">
            <h2 class="font-bold text white text-center text-4
            x1 px-20 py-5">
                Nuestras Redes Sociales
            </h2>
            <ul class="flex space-x-10">
                <li>
                    <a href="https://www.facebook.com/escuelapedagogicachimbote" class="mx-10">
                        <ion-icon name="logo-facebook"></ion-icon>  
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/escuelapedagogicachimbote/" class="mx-10">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/escuelapedagogicachimbote/" class="mx-10" >
                        <ion-icon name="logo-tiktok"></ion-icon>

                    </a>
                </li>
            </ul>

        </div>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producción Intelectual') }}
        </h2>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </x-slot>

    <div class="py-12">
        <div id="app-titulo" class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-successs-status class="mb-4" :status="session('status')" />

            @include('produccion.investigacion')
            @include('produccion.exposicion')
        </div>
    </div>
   
    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    estado_investigacion: false,
                    estado_exposicion: false
                }
            },
            methods: {
                addInvestigaciones() {
                    this.estado_investigacion = true;
                },
                removeInvestigacioness() {
                    this.estado_investigacion = false;
                },
                addExposiciones() {
                    this.estado_exposicion = true;
                },
                removeExposiciones() {
                    this.estado_exposicion = false;
                }
            }
        }).mount('#app-titulo')
    </script>
</x-app-layout>

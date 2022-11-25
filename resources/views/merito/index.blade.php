<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formacion Profesional') }}
        </h2>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </x-slot>

    <div class="py-12 bg-sky-100">
        <div id="app-titulo" class="max-w-7xl mx-auto bg-sky-100 sm:px-6 lg:px-8">

            <x-successs-status class="mb-4" :status="session('status')" />

            @include('merito.merito')
        </div>
    </div>
   
    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    estado_merito: false
                }
            },
            methods: {
                addMeritos() {
                    this.estado_merito = true;
                },
                removeMeritos() {
                    this.estado_merito = false;
                }
            }
        }).mount('#app-titulo')
    </script>
</x-app-layout>

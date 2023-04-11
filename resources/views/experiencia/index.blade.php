<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </x-slot>

    <div class="py-12">
        <div id="app-titulo" class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-successs-status class="mb-4" :status="session('status')" />

            @include('experiencia.docente')
            @include('experiencia.superior')
            @include('experiencia.conferencista')
            @include('experiencia.otro')
        </div>
    </div>

    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    estado_docente: false,
                    estado_superior: false,
                    estado_conferencista: false,
                    estado_otro: false
                }
            },
            methods: {
                addDocentes() {
                    this.estado_docente = true;
                },
                removeDocentes() {
                    this.estado_docente = false;
                },
                addSuperiores() {
                    this.estado_superior = true;
                },
                removeSuperiores() {
                    this.estado_superior = false;
                },
                addConferencistas() {
                    this.estado_conferencista = true;
                },
                removeConferencistas() {
                    this.estado_conferencista = false;
                },
                addOtros() {
                    this.estado_otro = true;
                },
                removeOtros() {
                    this.estado_otro = false;
                }
            }
        }).mount('#app-titulo')
    </script>
</x-app-layout>

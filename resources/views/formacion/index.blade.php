<x-app-layout>
    <x-slot name="header">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </x-slot>
    <div class="py-12">
        <div id="app-titulo" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-extrabold text-center flex text-2xl text-black ">II. FORMACIÓN PROFESIONAL: </h1>
            <x-successs-status class="mb-4" :status="session('status')" />

            @include('formacion.titulo')
            @include('formacion.grado')
            @include('formacion.diplomado')
            @include('formacion.capacitacion')
        </div>
    </div>
   
    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    estado_titulo: false,
                    estado_grado: false,
                    estado_diplomado: false,
                    estado_capacitacion: false
                }
            },
            methods: {
                addTitulos() {
                    this.estado_titulo = true;
                },
                removeTitulos() {
                    this.estado_titulo = false;
                },
                addGrados() {
                    this.estado_grado = true;
                },
                removeGrados() {
                    this.estado_grado = false;
                },
                addCapacitaciones() {
                    this.estado_capacitacion = true;
                },
                removeCapacitaciones() {
                    this.estado_capacitacion = false;
                },
                addDiplomados() {
                    this.estado_diplomado = true;
                },
                removeDiplomados() {
                    this.estado_diplomado = false;
                }
            }
        }).mount('#app-titulo')
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </x-slot>

    <div class="py-12">
        <div id="app-titulo" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-extrabold text-center flex text-2xl text-black ">V. MÉRITOS Y RECONOCIMIENTOS: </h1>
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

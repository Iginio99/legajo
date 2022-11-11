<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formacion Profesional') }}
        </h2>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-successs-status class="mb-4" :status="session('status')" />

            <div id="app-titulo" class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-primary-button v-if=!estado_titulo @click="addTitulos">Nuevo Titulo</x-primary-button>
                <form action="{{ url('add-formacion') }}" method="POST">
                    @csrf
                    <div v-if=estado_titulo class="flex items-center mt-4">
                        <div>
                            <x-input-label for="formacion" :value="__('Formacion')" />
                            <x-text-input id="formacion" class="block mt-1 w-full" type="text" name="formacion"
                                :value="old('formacion')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="denominacion" :value="__('Denominacion')" />
                            <x-text-input id="denominacion" class="block mt-1 w-full" type="text" name="denominacion"
                                :value="old('denominacion')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="institucion" :value="__('Institucion')" />
                            <x-text-input id="institucion" class="block mt-1 w-full" type="text" name="institucion"
                                :value="old('institucion')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="year" :value="__('Año')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year"
                                :value="old('year')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="otro" :value="__('Otro')" />
                            <x-text-input id="otro" class="block mt-1 w-full" type="text" name="otro"
                                :value="old('otro')" required autofocus />
                        </div>
                        <x-primary-button>Agregar</x-primary-button>
                    </div>
                </form>
                <x-primary-button v-if=estado_titulo @click="removeTitulos">Cancelar</x-primary-button>
            </div>
       
        </div>
    </div>
   
    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    tasks: [{
                            title: "Aprendiendo php",
                            completed: true
                        },
                        {
                            title: "Aprendiendo vue js",
                            completed: false
                        },
                        {
                            title: "Aprendiendo laravel",
                            completed: true
                        }
                    ],
                    estado_titulo: false
                }
            },
            methods: {
                addTitulos() {
                    this.estado_titulo = true;
                },
                removeTitulos() {
                    this.estado_titulo = false;
                }
            }
        }).mount('#app-titulo')
    </script>
</x-app-layout>

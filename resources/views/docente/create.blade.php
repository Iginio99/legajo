<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Docente') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-400">

        <x-successs-status class="mb-4" :status="session('status')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-blue-400">
            <div class="px-4 py-4 bg-blue-400 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ url('add-docente') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="flex items-center mt-4">
                        <div>
                            <x-input-label for="nombre" :value="__('Nombres')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="apellido" :value="__('Apellidos')" />
                            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus />
                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="dni" :value="__('DNI')" />
                            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus />
                            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="lugar_nacimiento" :value="__('Lugar de nacimiento')" />
                            <x-text-input id="lugar_nacimiento" class="block mt-1 w-full" type="text" name="lugar_nacimiento" :value="old('lugar_nacimiento')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autofocus />
                        </div>
                    </div>
                    
                    <div class="flex items-center mt-4">
                        <div>
                            <x-input-label for="domicilio_actual" :value="__('Domicilio Actual')" />
                            <x-text-input id="domicilio_actual" class="block mt-1 w-full" type="text" name="domicilio_actual" :value="old('domicilio_actual')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="telefono" :value="__('Telefono')" />
                            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="celular" :value="__('Celular')" />
                            <x-text-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="sistema_pension" :value="__('Sistema de Pensiones')" />
                            <x-text-input id="sistema_pension" class="block mt-1 w-full" type="text" name="sistema_pension" :value="old('sistema_pension')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="cuspp" :value="__('CUSPP')" />
                            <x-text-input id="cuspp" class="block mt-1 w-full" type="text" name="cuspp" :value="old('cuspp')" required autofocus />
                        </div>
                    </div>                  
                                       
                    <div>
                        <x-input-label for="correo" :value="__('Correo electrónico')" />
                        <x-text-input id="correo" class="form-input px-4 py-3 rounded-full" type="email" name="correo" :value="old('correo')" requiredCorreo autofocus />
                    </div>
                    <div>
                        <x-input-label for="idioma" :value="__('Idiomas')" />
                        <x-text-input id="idioma" class="block mt-1 w-full" type="text" name="idioma" :value="old('idioma')" required autofocus />
                    </div>
                    <div>
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')" autofocus />
                    </div>
                    <x-primary-button class="ml-3">
                        {{ __('Guardar Docente') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

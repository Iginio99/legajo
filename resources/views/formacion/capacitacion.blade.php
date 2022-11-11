<div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
    <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
        <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
            <tr>
                <th scope="col" class="py-3 px-6">ID</th>
                <th scope="col" class="py-3 px-6">Denominación</th>
                <th scope="col" class="py-3 px-6">Horas</th>
                <th scope="col" class="py-3 px-6">Institución</th>
                <th scope="col" class="py-3 px-6">Año</th>
            </tr>
        </thead>
        <tbody class="bg-blue-500 border-b border-blue-400">
            @forelse ($capacitaciones as $capacitacion)
                <tr class="bg-blue-500 border-b border-blue-400">
                    <td class="py-4 px-6">{{ $idCapacitacion++ }}</td>
                    <td class="py-4 px-6">{{ $capacitacion->denominacion }}</td>
                    <td class="py-4 px-6">{{ $capacitacion->otro }}</td>
                    <td class="py-4 px-6">{{ $capacitacion->institucion }}</td>
                    <td class="py-4 px-6">{{ $capacitacion->year }}</td>
                </tr>
            @empty
            @endforelse
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <x-primary-button v-if=!estado_capacitacion @click="addCapacitaciones">Nuevo Titulo</x-primary-button>
    <form action="{{ url('add-capacitacion') }}" method="POST">
        @csrf
        <div v-if=estado_capacitacion class="flex items-center mt-4">
            <div>
                <x-input-label for="denominacion" :value="__('Denominacion')" />
                <x-text-input id="denominacion" class="block mt-1 w-full" type="text" name="denominacion"
                    :value="old('denominacion')" required autofocus />
            </div>
            <div>
                <x-input-label for="otro" :value="__('Horas')" />
                <x-text-input id="otro" class="block mt-1 w-full" type="text" name="otro" :value="old('otro')"
                    required autofocus />
            </div>
            <div>
                <x-input-label for="institucion" :value="__('Institucion')" />
                <x-text-input id="institucion" class="block mt-1 w-full" type="text" name="institucion"
                    :value="old('institucion')" required autofocus />
            </div>
            <div>
                <x-input-label for="year" :value="__('Año')" />
                <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')"
                    required autofocus />
            </div>
            <x-primary-button>Agregar</x-primary-button>
        </div>
    </form>
    <x-primary-button v-if=estado_capacitacion @click="removeCapacitaciones">Cancelar</x-primary-button>

</div>

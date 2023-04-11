<div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
    <table class="w-full text-sm text-left text-black dark:text-black">
        <thead class="text-xs text-black uppercase bg-blue-400 dark:text-black">
            <tr>
                <th scope="col" class="py-3 px-6">ID</th>
                <th scope="col" class="py-3 px-6">Denominación</th>
                <th scope="col" class="py-3 px-6">Institución</th>
                <th scope="col" class="py-3 px-6">Año</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100 border-b border-black">
            @forelse ($diplomados as $diplomado)
                <tr class="bg-gray-100 border-b border-black">
                    <td class="py-4 px-6">{{ $idDiplomado++ }}</td>
                    <td class="py-4 px-6">{{ $diplomado->denominacion }}</td>
                    <td class="py-4 px-6">{{ $diplomado->institucion }}</td>
                    <td class="py-4 px-6">{{ $diplomado->year }}</td>
                </tr>
            @empty
            @endforelse
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <x-primary-button v-if=!estado_diplomado @click="addDiplomados">Nuevo Diplomado</x-primary-button>
    <form action="{{ url('add-diplomado') }}" method="POST">
        @csrf
        <div v-if=estado_diplomado class="flex items-center mt-4">
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
            <x-primary-button>Agregar</x-primary-button>
        </div>
    </form>
    <x-primary-button v-if=estado_diplomado @click="removeDiplomados">Cancelar</x-primary-button>
   
</div>
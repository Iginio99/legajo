<div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
    <table class="w-full text-sm text-left text-black dark:text-black">
        <thead class="text-xs text-black uppercase bg-blue-400 dark:text-black">
            <tr>
                <th scope="col" class="py-3 px-6">Grado</th>
                <th scope="col" class="py-3 px-6">Denominación</th>
                <th scope="col" class="py-3 px-6">Universidad</th>
                <th scope="col" class="py-3 px-6">Año</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100 border-b border-black">
            @forelse ($grados as $grado)
                <tr class="bg-gray-100 border-b border-black">
                    <td class="py-4 px-6">{{ $grado->otro }}</td>
                    <td class="py-4 px-6">{{ $grado->denominacion }}</td>
                    <td class="py-4 px-6">{{ $grado->institucion }}</td>
                    <td class="py-4 px-6">{{ $grado->year }}</td>
                </tr>
            @empty
            @endforelse
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <x-primary-button v-if=!estado_titulo @click="addGrados">Nuevo Grado</x-primary-button>
    <form action="{{ url('add-grado') }}" method="POST">
        @csrf
        <div v-if=estado_grado class="flex items-center mt-4">
            <div>
                <x-input-label for="otro" :value="__('Grado académico')" />
                <x-text-input id="ptro" class="block mt-1 w-full" type="text" name="otro"
                    :value="old('otro')" required autofocus />
            </div>
            <div>
                <x-input-label for="denominacion" :value="__('Denominacion')" />
                <x-text-input id="denominacion" class="block mt-1 w-full" type="text" name="denominacion"
                    :value="old('denominacion')" required autofocus />
            </div>
            <div>
                <x-input-label for="institucion" :value="__('Universidad')" />
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
    <x-primary-button v-if=estado_grado @click="removeGrados">Cancelar</x-primary-button>
</div>

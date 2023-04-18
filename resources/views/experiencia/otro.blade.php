<h1 class="font-extrabold text-center py-2 flex text-1xl text-black ">3.4  OTROS (ORGANIZADOR, JURADO, ESPECIALISTA, COORDINADOR, ASESOR, ETC). </h1>
<div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
    <table class="w-full text-sm text-left text-black dark:text-black">
        <thead class="text-xs text-white uppercase bg-peda2 dark:text-black">
            <tr>
                <th scope="col" class="py-3 px-6">ID</th>
                <th scope="col" class="py-3 px-6">Condición</th>
                <th scope="col" class="py-3 px-6">Institución</th>
                <th scope="col" class="py-3 px-6">Año</th>
                <th scope="col" class="py-3 px-6 text-center">Pdf</th>
                <th scope="col" class="py-3 px-6 text-center">Opciones</th>
            </tr>
        </thead>
        <tbody class="bg-gray-100 border-b border-black">
            @forelse ($otros as $otro)
                <tr class="bg-gray-100 border-b border-black">
                    <td class="py-4 px-6">{{ $idOtro++ }}</td>
                    <td class="py-4 px-6">{{ $otro->otro }}</td>
                    <td class="py-4 px-6">{{ $otro->institucion }}</td>
                    <td class="py-4 px-6">{{ $otro->year }}</td>
                    <td class="py-4 px-6">
                        <div class="grid grid-cols-2">
                            <div>
                                <a href="{{ $otro->documento }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <a href="javascript:window.print()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </td>
                    <td class="py-4 px-8">
                        <form action="{{ url('delete-otro/'.$otro->institucion.'/'.$otro->year.'/'.$otro->otro) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-primary-button class="ml-2">Eliminar</x-primary-button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    <x-primary-button v-if=!estado_otro @click="addOtros" class="bg-sky-500/50">Agregar Otras Experiencias</x-primary-button>
   
    <form action="{{ url('add-otro') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div v-if=estado_otro class="flex space-x-4 items-center mt-4">

            <div>
                <x-input-label for="otro" :value="__('Condición')" />
                <x-text-input id="ptro" class="block mt-1 w-full" type="text" name="otro"
                    :value="old('otro')" required autofocus />
            </div>
            <div>
                <x-input-label for="institucion" :value="__('Denominación')" />
                <x-text-input id="institucion" class="block mt-1 w-full" type="text" name="institucion"
                    :value="old('institucion')" required autofocus />
            </div>
            <div>
                <x-input-label for="year" :value="__('Año')" />
                <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')"
                    required autofocus />
            </div>

            <div>
                <x-input-label for="documento" :value="__('Documento')" />
                <x-text-input id="documento" class="block mt-1 w-full" type="file" name="documento" :value="old('documento')"
                    autofocus />
            </div>
            <x-primary-button>Agregar</x-primary-button>
        </div>
    </form>
    <x-primary-button v-if=estado_otro @click="removeOtros">Cancelar</x-primary-button>

</div>

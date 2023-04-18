<x-app-layout>
    <x-slot name="header">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </x-slot>
    <div class="py-2">
        <div id="app-titulo" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="javascript:window.print()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                </svg>
            </a>
            <x-successs-status class="mb-4" :status="session('status')" />
            <h1 class="font-light text-center py-2 flex text-1xl text-black ">2.1 TITULOS():</h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Denominación</th>
                            <th scope="col" class="py-3 px-6">Institución</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($titulos as $titulo)
                            <tr class="bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idTitulo++ }}</td>
                                <td class="py-4 px-6">{{ $titulo->denominacion }}</td>
                                <td class="py-4 px-6">{{ $titulo->institucion }}</td>
                                <td class="py-4 px-6">{{ $titulo->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">2.2 GRADOS:</h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">Grado</th>
                            <th scope="col" class="py-3 px-6">Denominación</th>
                            <th scope="col" class="py-3 px-6">Universidad</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($grados as $grado)
                            <tr class="bg-white border-b border-black">
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
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">2.3 DIPLOMADOS Y EXPOSICIONES:</h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Denominación</th>
                            <th scope="col" class="py-3 px-6">Institución</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($diplomados as $diplomado)
                            <tr class="bg-white border-b border-black">
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
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">2.4 CAPACITACIONES:</h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black-100 dark:text-black-100">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Denominación</th>
                            <th scope="col" class="py-3 px-6">Horas</th>
                            <th scope="col" class="py-3 px-6">Institución</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($capacitaciones as $capacitacion)
                            <tr class="bg-white border-b border-black">
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
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">3.1 DOCENTE: </h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Institución</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($expDocentes as $expDocente)
                            <tr class="bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idExpDocente++ }}</td>
                                <td class="py-4 px-6">{{ $expDocente->institucion }}</td>
                                <td class="py-4 px-6">{{ $expDocente->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <h1 class="font-light text-center py-2 flex text-1xl text-black ">3.2 DOCENTE DE EDUC.SUPERIOR: </h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Institución</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($superiores as $superior)
                            <tr class="bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idSuperior++ }}</td>
                                <td class="py-4 px-6">{{ $superior->institucion }}</td>
                                <td class="py-4 px-6">{{ $superior->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">3.3 CONFERENCISTA O PONENTE: </h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Evento</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class=" bg-white border-b border-black">
                        @forelse ($conferencistas as $conferencista)
                            <tr class=" bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idConferencista++ }}</td>
                                <td class="py-4 px-6">{{ $conferencista->institucion }}</td>
                                <td class="py-4 px-6">{{ $conferencista->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">3.4 OTROS (ORGANIZADOR, JURADO,
                ESPECIALISTA, COORDINADOR, ASESOR, ETC). </h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Condición</th>
                            <th scope="col" class="py-3 px-6">Institución</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                            <th scope="col" class="py-3 px-6 text-center">Pdf</th>
                            <th scope="col" class="py-3 px-6 text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($otros as $otro)
                            <tr class="bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idOtro++ }}</td>
                                <td class="py-4 px-6">{{ $otro->otro }}</td>
                                <td class="py-4 px-6">{{ $otro->institucion }}</td>
                                <td class="py-4 px-6">{{ $otro->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">4.1 INVESTIGACIÓN:</h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Denominación</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($investigaciones as $investigacion)
                            <tr class="bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idInvestigacion++ }}</td>
                                <td class="py-4 px-6">{{ $investigacion->institucion }}</td>
                                <td class="py-4 px-6">{{ $investigacion->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">4.2 ESPOSICIONES ARTÍSTICAS:</h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Evento</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($exposiciones as $exposicion)
                            <tr class="bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idExposicion++ }}</td>
                                <td class="py-4 px-6">{{ $exposicion->institucion }}</td>
                                <td class="py-4 px-6">{{ $exposicion->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h1 class="font-light text-center py-2 flex text-1xl text-black ">5.1 MÉRITOS</h1>
            <div class="py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="font-light w-full text-sm text-left text-black dark:text-black">
                    <thead class="text-xs text-white uppercase dark:text-black">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Denominación</th>
                            <th scope="col" class="py-3 px-6">Institución</th>
                            <th scope="col" class="py-3 px-6">Año</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border-b border-black">
                        @forelse ($meritos as $merito)
                            <tr class="bg-white border-b border-black">
                                <td class="py-4 px-6">{{ $idMerito++ }}</td>
                                <td class="py-4 px-6">{{ $merito->denominacion }}</td>
                                <td class="py-4 px-6">{{ $merito->institucion }}</td>
                                <td class="py-4 px-6">{{ $merito->year }}</td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>

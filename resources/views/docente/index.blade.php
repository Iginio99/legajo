<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Docente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-successs-status class="mb-4" :status="session('status')" />
            
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
                    <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Nombres</th>
                            <th scope="col" class="py-3 px-6">Apellidos</th>
                            <th scope="col" class="py-3 px-6">DNI</th>
                            <th scope="col" class="py-3 px-6">Celular</th>
                            <th scope="col" class="py-3 px-6">Correo</th>
                            <th scope="col" class="py-3 px-6">Editar</th>
                            <th scope="col" class="py-3 px-6">Borrar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-blue-500 border-b border-blue-400">
                        @forelse ($docentes as $docente)
                            <tr class="bg-blue-500 border-b border-blue-400">
                                <td class="py-4 px-6">{{ $docente->id }}</td>
                                <td class="py-4 px-6">{{ $docente->nombre }}</td>
                                <td class="py-4 px-6">{{ $docente->apellido }}</td>
                                <td class="py-4 px-6">{{ $docente->dni }}</td>
                                <td class="py-4 px-6">{{ $docente->celular }}</td>
                                <td class="py-4 px-6">{{ $docente->correo }}</td>
                                <td class="py-4 px-6">
                                    <a href="{{ url('/edit-docente/'.$docente->id) }}" class="btn btn-primary">Editar</a>
                                </td>
                                <td class="py-4 px-6">
                                    <form action="{{ url('delete-docente/'.$docente->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button class="ml-3">Eliminar</x-primary-button>
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
            </div>
        </div>
    </div>
</x-app-layout>
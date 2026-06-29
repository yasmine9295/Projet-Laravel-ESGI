<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Séances
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <thead>
                            <tr>
                                <th>Film</th>
                                <th>Début</th>
                                <th>Fin</th>
                                <th>Places disponibles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seances as $seance)
                                <tr>
                                    <td>{{ $seance->film->titre }}</td>
                                    <td>{{ $seance->debut_seance }}</td>
                                    <td>{{ $seance->fin_seance }}</td>
                                    <td>{{ $seance->places_disponibles }}</td>
                                    <td>
                                        <a href="{{ route('admin.seances.edit', $seance->id) }}">Modifier</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
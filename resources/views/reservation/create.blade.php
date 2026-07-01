<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Réserver - {{ $film->titre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>{{ $film->titre }}</h3>

                    @if($seances->isEmpty())
                        <p>Aucune séance disponible pour ce film.</p>
                    @else
                        <form method="POST" action="{{ route('reservations.store') }}">
                            @csrf

                            <div>
                                <label>Choisir une séance</label>
                                <select name="id_seance" class="text-black">
                                    @foreach($seances as $seance)
                                        <option value="{{ $seance->id }}">
                                            {{ $seance->debut_seance }} - {{ $seance->places_disponibles }} places restantes
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label>Nombre de places</label>
                                <input type="number" name="nombre_places" min="1" required class="text-black">
                            </div>

                            <br>
                            <button type="submit">Réserver</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier - {{ $film->titre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('films.update') }}">
                        @csrf
                        <input type="hidden" name="id_film" class="text-black" value="{{ $film->id_film }}">
                        <div>
                            <label>Titre</label>
                            <input type="text" name="titre" class="text-black" value="{{ $film->titre }}" required>
                        </div>
                        <div>
                            <label>Résumé</label>
                            <textarea name="resum" class="text-black">{{ $film->resum }}</textarea>
                        </div>
                        <div>
                            <label>Genre</label>
                            <select name="id_genre" class="text-black">
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id_genre }}" {{ $film->id_genre == $genre->id_genre ? 'selected' : '' }}>
                                        {{ $genre->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Date début affiche</label>
                            <input type="date" name="date_debut_affiche"    class="text-black"value="{{ $film->date_debut_affiche }}">
                        </div>
                        <div>
                            <label>Date fin affiche</label>
                            <input type="date" name="date_fin_affiche" class="text-black" value="{{ $film->date_fin_affiche }}">
                        </div>
                        <div>
                            <label>Durée (minutes)</label>
                            <input type="number" name="duree_minutes" class="text-black" value="{{ $film->duree_minutes }}">
                        </div>
                        <div>
                            <label>Année de production</label>
                            <input type="number" name="annee_production" class="text-black" value="{{ $film->annee_production }}">
                        </div>
                        <button type="submit">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
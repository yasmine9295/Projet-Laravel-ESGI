<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Film - {{ $film->titre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ $film->titre }}
                    </h3>

                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $film->description }}
                        <br>
                        <b>
                            durée : {{ $film->duree_minutes }} minutes <br>
                            genre : {{ $film->genre->nom }} <br>
                            realisé en {{ $film->annee_production }}
                        </b>
                        a laffiche du {{ $film->date_debut_affiche }} au {{ $film->date_fin_affiche }}
                    </p>

                    {{ $film->resum }}

                    <div class="flex flex-wrap items-center gap-4 mt-6">
                        <a href="{{ route('reservations.create', $film->id_film) }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition">
                            Réserver ce film
                        </a>

                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('films.edit', $film->id_film) }}" class="px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded-md hover:bg-yellow-600 transition">
                                Modifier ce film
                            </a>

                            <form method="POST" action="{{ route('films.delete', $film->id_film) }}">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                                    Supprimer ce film
                                </button>
                            </form>
                        @endif
                    </div>

                    <br><br>
                    Liste des films du meme genre : <br>
                    <ul>
                        @foreach ($film->genre->films as $autreFilm)
                            <li><a href="{{ route('film', $autreFilm) }}">{{ $autreFilm->titre }}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

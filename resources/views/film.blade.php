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
                    @if(session('status'))
                        <p>{{ session('status') }}</p>
                    @endif

                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ $film->titre }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $film->description }} <b> <br>
                        durée : {{ $film->duree_minutes }} minutes <br>
                        genre : {{ $film->genre->nom }} <br>
                        realisé en {{ $film->annee_production }} </b>
                        a laffiche du {{ $film->date_debut_affiche }} au {{ $film->date_fin_affiche }}
                    </p>
                    {{ $film->resum }}

                    <br><br>
                    <a href="{{ route('reservations.create', $film->id_film) }}">
                        Réserver ce film
                    </a>

                    <br><br>
                    Liste des films du meme genre : <br>
                    <ul>
                        @foreach ($film->genre->films as $autreFilm)
                            <li><a href="{{ route('film', $autreFilm) }}">{{ $autreFilm->titre }}</a></li>
                        @endforeach
                    </ul>

                    @if(auth()->user()->role === 'admin')
                        <br>
                        <a href="{{ route('films.edit', $film->id_film) }}">
                            Modifier ce film
                        </a>

                        <form method="POST" action="{{ route('films.delete', $film->id_film) }}">
                            @csrf
                            <button type="submit">Supprimer ce film</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

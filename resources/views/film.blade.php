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
                        {{ $film->description }} <b> <br>
                        durée : {{ $film->duree }} minutes <br>
                        genre : {{ $film->genre->nom }} <br>
                        realisé en {{ $film->annee_production }} </b>
                    a laffiche du {{ $film->date_debut_affiche }} au {{ $film->date_fin_affiche }} </b>
                    {{ $film->resum }} 

                    <br>
                    <br>
                    Liste des films du meme genre : <br>
                    <ul>
                         @foreach ($film-> genre->films as $film) 
                          <li> <a href="{{ route('film', $film) }}"> {{ $film->titre }} </a></li>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



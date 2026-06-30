<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            cinema
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="GET" action="{{ route('dashboard') }}">
                        <label >Rechercher par titre</label>
                        <input style="color: black" type="text" name="titre" value="{{ request('titre') }}">
                        <button style="background-color: black; padding: 8px; border-radius: 3px; margin: 5px" type="submit">Rechercher</button>
                        <label>Filtrer par genre</label>
                        <select name="id_genre" class="text-black">
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id_genre }}" {{ request('id_genre') == $genre->id_genre ? 'selected' : '' }}>
                                    {{ $genre->nom }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">Filtrer</button>
                            <a href="{{ route('dashboard') }}">Supprimer le filtre</a>
                    </form>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('films.create') }}">Ajouter un film</a>
                        @endif
                    <br>
                    liste des films :
                    <ul>
                        @foreach ($films as $film) 
                            <li><a href="{{ route('film', $film) }}">{{ $film->titre }}</a></li>
                        @endforeach 
                    </ul>
                    {{ $films->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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

                    <form method="GET" action="{{ route('dashboard') }}" class="flex flex-wrap items-end gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Filtrer par genre</label>
                            <select name="id_genre" class="text-black rounded-md border-gray-300 shadow-sm">
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id_genre }}" {{ request('id_genre') == $genre->id_genre ? 'selected' : '' }}>
                                        {{ $genre->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Filtrer par date de séance</label>
                            <input type="date" name="date_seance" value="{{ request('date_seance') }}" class="text-black rounded-md border-gray-300 shadow-sm">
                        </div>

                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition">
                            Filtrer
                        </button>

                        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-300 underline hover:text-white transition">
                            Supprimer le filtre
                        </a>
                    </form>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('films.create') }}" class="inline-block mb-4 px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition">
                            Ajouter un film
                        </a>
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

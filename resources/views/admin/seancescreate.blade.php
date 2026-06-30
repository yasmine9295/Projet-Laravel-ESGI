<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin - Ajouter une séance
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('status'))
                        <p>{{ session('status') }}</p>
                    @endif

                    <form method="POST" action="{{ route('admin.seances.store') }}">
                        @csrf

                        <div>
                            <label>Film</label>
                            <select name="id_film" class="text-black" required>
                                @foreach($films as $film)
                                    <option value="{{ $film->id_film }}">{{ $film->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Salle</label>
                            <select name="id_salle" class="text-black" required>
                                @foreach($salles as $salle)
                                    <option value="{{ $salle->id_salle }}">{{ $salle->nom_salle }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Début</label>
                            <input type="datetime-local" name="debut_seance" class="text-black" required>
                        </div>

                        <div>
                            <label>Fin</label>
                            <input type="datetime-local" name="fin_seance" class="text-black" required>
                        </div>

                        <br>
                        <button type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

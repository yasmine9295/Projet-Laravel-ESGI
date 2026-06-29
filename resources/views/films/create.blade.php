<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter un film
        </h2>
    </x-slot>

```
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <form method="POST" action="{{ route('films.store') }}">
                    @csrf

                    <!-- Titre -->
                    <div class="mb-4">
                        <label class="block">Titre</label>
                        <input type="text"
                               name="titre"
                               class="text-black w-full"
                               value="{{ old('titre') }}"
                               required>
                    </div>

                    <!-- Résumé -->
                    <div class="mb-4">
                        <label class="block">Résumé</label>
                        <textarea name="resum"
                                  class="text-black w-full">{{ old('resum') }}</textarea>
                    </div>

                    <!-- Genre -->
                    <div class="mb-4">
                        <label class="block">Genre</label>
                        <select name="id_genre" class="text-black w-full">
                            @foreach(($genres ?? []) as $genre)
                                <option value="{{ $genre->id_genre }}"
                                    {{ old('id_genre') == $genre->id_genre ? 'selected' : '' }}>
                                    {{ $genre->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date début -->
                    <div class="mb-4">
                        <label class="block">Date début affiche</label>
                        <input type="date"
                               name="date_debut_affiche"
                               class="text-black w-full"
                               value="{{ old('date_debut_affiche') }}">
                    </div>

                    <!-- Date fin -->
                    <div class="mb-4">
                        <label class="block">Date fin affiche</label>
                        <input type="date"
                               name="date_fin_affiche"
                               class="text-black w-full"
                               value="{{ old('date_fin_affiche') }}">
                    </div>

                    <!-- Durée -->
                    <div class="mb-4">
                        <label class="block">Durée (minutes)</label>
                        <input type="number"
                               name="duree_minutes"
                               class="text-black w-full"
                               value="{{ old('duree_minutes') }}">
                    </div>

                    <!-- Année -->
                    <div class="mb-4">
                        <label class="block">Année de production</label>
                        <input type="number"
                               name="annee_production"
                               class="text-black w-full"
                               value="{{ old('annee_production') }}">
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded">
                        Ajouter
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>
```

</x-app-layout>

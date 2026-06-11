<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin - Modifier la séance
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.seances.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $seance->id }}">
                        
                        <div>
                            <label>Places disponibles</label>
                            <input type="number" name="places_disponibles" value="{{ $seance->places_disponibles }}" class="text-black" required>
                        </div>

                        <br>
                        <button type="submit">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
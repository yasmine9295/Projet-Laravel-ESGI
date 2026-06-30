<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Salle - {{ $salle->nom_salle }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Modifier la salle</h2>

                    <form action="/salle/update" method="POST">
                        @csrf
                        @method('PUT')
                        <input style="color:black" type="hidden" name="id_salle" value="{{ $salle->id_salle }}">

                        <div class="mb-3">
                            <label>Numéro de salle</label>
                            <input style="color:black" type="number" name="numero_salle" class="form-control" value="{{ $salle->numero_salle }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Nom de la salle</label>
                            <input style="color:black" type="text" name="nom_salle" class="form-control" value="{{ $salle->nom_salle }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Étage</label>
                            <input style="color:black" type="number" name="etage_salle" class="form-control" value="{{ $salle->etage_salle }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Nombre de places</label>
                            <input style="color:black" type="number" name="places" class="form-control" value="{{ $salle->places }}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
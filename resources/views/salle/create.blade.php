<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter une salle
        </h2>
    </x-slot>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Créer une salle</h2>

                    <form action="/salle" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Numéro de salle</label>
                            <input style="color:black" type="number" name="numero_salle" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nom de la salle</label>
                            <input style="color:black" type="text" name="nom_salle" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Étage</label>
                            <input style="color:black" type="number" name="etage_salle" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nombre de places</label>
                            <input style="color:black" type="number" name="places" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
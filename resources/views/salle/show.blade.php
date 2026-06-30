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
                    <h2>Détails de la salle</h2>

                    <div class="card mt-3">
                        <div class="card-body">

                            <h4 class="card-title">{{ $salle->nom_salle }}</h4>

                            <p><strong>Numéro de salle :</strong> {{ $salle->numero_salle }}</p>
                            <p><strong>Étage :</strong> {{ $salle->etage_salle }}</p>
                            <p><strong>Nombre de places :</strong> {{ $salle->places }}</p>
                    
                            <br>
                            <br>
                    
                            <a href="/salles" class="btn btn-secondary mt-3">Retour</a> <br>
                            <a href="/salle/{{ $salle->id_salle }}/edit" class="btn btn-primary mt-3">Modifier</a> <br>
                            <form method="POST" action="{{ route('salle.delete', $salle->id_salle) }}">
                                @csrf
                                <button type="submit">Supprimer la salle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
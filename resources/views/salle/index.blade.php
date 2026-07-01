<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Salles
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href='{{ route("salle.create") }}'>Ajouter une Salles</a> 
                    <br>
                    <br>
                    <ul>
                    @foreach ($salles as $salle)
                    <li>
                        <a href="{{ route('salle', $salle->id_salle) }}"><strong>{{ $salle->nom_salle }}</strong></a>
                        </br>
                        <p>Etage : {{ $salle->etage_salle }}</p>
                        <p>Capacité : {{ $salle->places }}</p>
                    </li>
                    <form method="POST" action="{{ route('salle.delete', $salle->id_salle) }}">
                        @csrf
                        <button type="submit">Supprimer la salle</button>
                    </form>
                    <br>
                    @endforeach

                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
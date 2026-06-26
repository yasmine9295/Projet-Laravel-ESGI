<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Mes réservations
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('status'))
                        <p>{{ session('status') }}</p>
                    @endif

                    @if($reservations->isEmpty())
                        <p>Aucune réservation pour le moment.</p>
                    @else
                        <ul>
                            @foreach($reservations as $reservation)
                                <li>
                                    {{ $reservation->film->titre }} - 
                                    {{ $reservation->date_reservation }} - 
                                    {{ $reservation->nombre_places }} places - 
                                    {{ $reservation->statut }}
                                    <form method="POST" action="{{ route('reservations.destroy', $reservation) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Annuler</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

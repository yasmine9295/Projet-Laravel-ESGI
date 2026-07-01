<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Notifications\SystemNotification;
use App\Models\Film;
use App\Models\Reservation;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    // Afficher le formulaire de réservation
    public function create(Request $request)
        {
            $film = Film::findOrFail($request->id);
            $seances = Seance::where('id_film', $film->id_film)->where('places_disponibles', '>', 0)->get();
            return view('reservation.create', ['film' => $film, 'seances' => $seances]);
        }

    // Enregistrer la réservation
    public function store(Request $request)
        {
            $seance = Seance::findOrFail($request->id_seance);
            if ($request->nombre_places > $seance->places_disponibles) {
                Auth::user()->notify(new SystemNotification(
                    'Reservation refusee',
                    'Le nombre de places demande depasse les places disponibles.',
                    'warning'
                ));

                return redirect()->back();
            }
            
            $reservation = new Reservation();
            $reservation->user_id = Auth::id();
            $reservation->id_film = $seance->id_film;
            $reservation->id_seance = $request->id_seance;
            $reservation->date_reservation = $seance->debut_seance;
            $reservation->nombre_places = $request->nombre_places;
            $reservation->save();

            Mail::to(Auth::user()->email)->send(new ReservationMail($reservation));

            Auth::user()->notify(new SystemNotification(
                'Reservation confirmee',
                'Votre reservation a bien ete enregistree.',
                'success'
            ));

            $seance->places_disponibles -= $request->nombre_places;
            $seance->save();

            return redirect()->route('reservations.index');
        }

    // Afficher les réservations de l'utilisateur
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('reservation.index', ['reservations' => $reservations]);
    }
    
    // Annuler une réservation
    public function destroy(Reservation $reservation)
        {
            if ($reservation->user_id !== Auth::id())
                abort(403);

            $seance = $reservation->seance;
            if ($seance) {
                $seance->places_disponibles += $reservation->nombre_places;
                $seance->save();
            }

            $reservation->delete();

            Auth::user()->notify(new SystemNotification(
                'Reservation annulee',
                'Votre reservation a ete annulee avec succes.',
                'success'
            ));

            return redirect('/reservations');
        }
}

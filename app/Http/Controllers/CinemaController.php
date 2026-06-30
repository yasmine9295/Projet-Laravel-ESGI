<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CinemaController extends Controller
{
    public function index(Request $request){
        $films = Film::when($request->id_genre, fn($q) => $q->where('id_genre', $request->id_genre))
            ->when($request->date_seance, function ($q) use ($request) {
                $q->whereIn('id_film', function ($query) use ($request) {
                    $query->select('id_film')
                        ->from('seances')
                        ->whereDate('debut_seance', $request->date_seance)
                        ->where('places_disponibles', '>', 0);
                });
            })
            ->paginate(15)
            ->withQueryString();
        $genres = Genre::all();
        return view('dashboard', ['films' => $films, 'genres' => $genres]);
    }
    public function film(Request $request){
        $film = Film::findOrFail($request->id);
        return view('film', ['film' => $film]);
    }

    public function create(){
        $genres = Genre::all();
        return view('films.create', ['genres' => $genres]);
    }

    public function store(Request $request){
        $film = new Film();
        $film->titre = $request->titre;
        $film->resum = $request->resum;
        $film->id_genre = $request->id_genre;
        $film->date_debut_affiche = $request->date_debut_affiche;
        $film->date_fin_affiche = $request->date_fin_affiche;
        $film->duree_minutes = $request->duree_minutes;
        $film->annee_production = $request->annee_production;
        $film->save();

        return redirect()->route('dashboard')->with('status', 'Film ajoute avec succes.');
    }

    public function edit(Request $request){
        $film = Film::findOrFail($request->id);
        $genres = Genre::all();
        return view('films.edit', ['film' => $film, 'genres' => $genres]);
    }

    public function update(Request $request){
        $film = Film::findOrFail($request->id_film);
        $film->titre = $request->titre;
        $film->resum = $request->resum;
        $film->id_genre = $request->id_genre;
        $film->date_debut_affiche = $request->date_debut_affiche;
        $film->date_fin_affiche = $request->date_fin_affiche;
        $film->duree_minutes = $request->duree_minutes;
        $film->annee_production = $request->annee_production;
        $film->save();

        return redirect()->route('film', $film->id_film)->with('status', 'Film modifie avec succes.');
    }

    public function delete(Request $request){
        $film = Film::findOrFail($request->id);
        $film->delete();

        return redirect()->route('dashboard')->with('status', 'Film supprime avec succes.');
    }

    
}

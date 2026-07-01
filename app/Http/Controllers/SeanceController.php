<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Film;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeanceController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin')
            abort(403);

        $seances = Seance::with('film', 'salle')->get();
        return view('admin.seances', ['seances' => $seances]);
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin')
            abort(403);

        $films = Film::all();
        $salles = Salle::all();
        return view('admin.seancescreate', ['films' => $films, 'salles' => $salles]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin')
            abort(403);

        $request->validate([
            'id_film' => 'required',
            'id_salle' => 'required',
            'debut_seance' => 'required|date',
            'fin_seance' => 'required|date|after:debut_seance'
        ]);

        $salle = Salle::find($request->id_salle);
        if (! $salle)
            return redirect()->back()->with('status', 'Salle introuvable.');

        if ($request->places_disponibles > $salle->places)
            return redirect()->back()->with('status', 'Les places disponibles ne peuvent pas depasser la capacite de la salle.');

        $seance = new Seance();
        $seance->id_film = $request->id_film;
        $seance->id_salle = $request->id_salle;
        $seance->id_personne_ouvreur = 1;
        $seance->id_personne_technicien = 1;
        $seance->id_personne_menage = 1;
        $seance->debut_seance = $request->debut_seance;
        $seance->fin_seance = $request->fin_seance;
        $seance->places_disponibles = $salle->places;
        $seance->save();

        return redirect()->route('admin.seances')->with('status', 'Seance ajoutee avec succes.');
    }

    public function edit(Request $request)
    {
        if (Auth::user()->role !== 'admin')
            abort(403);

        $seance = Seance::findOrFail($request->id);
        $films = Film::all();
        $salles = Salle::all();
        return view('admin.seancesedit', ['seance' => $seance, 'films' => $films, 'salles' => $salles]);
    }

    public function update(Request $request)
    {
        if (Auth::user()->role !== 'admin')
            abort(403);

        $request->validate([
            'id_film' => 'required',
            'id_salle' => 'required',
            'debut_seance' => 'required|date',
            'fin_seance' => 'required|date|after:debut_seance',
            'places_disponibles' => 'required|integer|min:1',
        ]);

        $salle = Salle::find($request->id_salle);
        if (! $salle)
            return redirect()->back()->with('status', 'Salle introuvable.');

        if ($request->places_disponibles > $salle->places)
            return redirect()->back()->with('status', 'Les places disponibles ne peuvent pas depasser la capacite de la salle.');

        $seance = Seance::findOrFail($request->id);
        $seance->id_film = $request->id_film;
        $seance->id_salle = $request->id_salle;
        $seance->places_disponibles = $request->places_disponibles;
        $seance->debut_seance = $request->debut_seance;
        $seance->fin_seance = $request->fin_seance;
        $seance->save();

        return redirect()->route('admin.seances')->with('status', 'Seance modifiee avec succes.');
    }

    public function delete(Request $request)
    {
        if (Auth::user()->role !== 'admin')
            abort(403);

        $seance = Seance::findOrFail($request->id);
        $seance->delete();

        return redirect()->route('admin.seances')->with('status', 'Seance supprimee avec succes.');
    }
}

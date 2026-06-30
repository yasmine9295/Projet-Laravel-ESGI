<?php

namespace App\Http\Controllers;


use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalleController extends Controller
{
    public function index(Request $request){
        if (Auth::user()->role !== 'admin')
            abort(403);
        $salles = Salle::all();
        return view('salle/index', ['salles' => $salles]);
    }
    public function show(Request $request){
        if (Auth::user()->role !== 'admin')
            abort(403);
        $salle = Salle::findOrFail($request->id);
        return view('salle/show', ['salle' => $salle]);
    }

    public function create(){
        if (Auth::user()->role !== 'admin')
            abort(403);
        $salles = Salle::all();
        return view('salle/create', ['salle' => $salles]);
    }

    public function store(Request $request){
        if (Auth::user()->role !== 'admin')
            abort(403);
        $salle = new Salle();
        $salle->numero_salle = $request->numero_salle;
        $salle->nom_salle = $request->nom_salle;
        $salle->etage_salle = $request->etage_salle;
        $salle->places = $request->places;
        $salle->save();

        return redirect('/salles');
    }

    public function edit(Request $request){
        if (Auth::user()->role !== 'admin')
            abort(403);
        $salle = Salle::findOrFail($request->id);
        return view('salle.edit', ['salle' => $salle]);
    }

    public function update(Request $request){
        if (Auth::user()->role !== 'admin')
            abort(403);
        $salle = Salle::findOrFail($request->id_salle);
        $salle->numero_salle = $request->numero_salle;
        $salle->nom_salle = $request->nom_salle;
        $salle->etage_salle = $request->etage_salle;
        $salle->places = $request->places;
        $salle->save();

        return redirect('/salles');
    }

    public function delete(Request $request){
        if (Auth::user()->role !== 'admin')
            abort(403);
        $salle = Salle::findOrFail($request->id);
        $salle->delete();

        return redirect('/salles');
    }
}

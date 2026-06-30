<?php

namespace App\Http\Controllers;


use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalleController extends Controller
{
    public function index(Request $request){
        $salles = Salle::all();
        return view('salle/index', ['salles' => $salles]);
    }
    public function show(Request $request){
        $salle = Salle::findOrFail($request->id);
        return view('salle/show', ['salle' => $salle]);
    }

    public function create(){
        $salles = Salle::all();
        return view('salle/create', ['salle' => $salles]);
    }

    public function store(Request $request){
        $salle = new Salle();
        $salle->numero_salle = $request->numero_salle;
        $salle->nom_salle = $request->nom_salle;
        $salle->etage_salle = $request->etage_salle;
        $salle->places = $request->places;
        $salle->save();

        return redirect('/salles');
    }

    public function edit(Request $request){
        $salle = Salle::findOrFail($request->id);
        return view('salle.edit', ['salle' => $salle]);
    }

    public function update(Request $request){
        $salle = Salle::findOrFail($request->id_salle);
        $salle->numero_salle = $request->numero_salle;
        $salle->nom_salle = $request->nom_salle;
        $salle->etage_salle = $request->etage_salle;
        $salle->places = $request->places;
        $salle->save();

        return redirect('/salles');
    }

    public function delete(Request $request){
        $salle = Salle::findOrFail($request->id);
        $salle->delete();

        return redirect('/salles');
    }
}

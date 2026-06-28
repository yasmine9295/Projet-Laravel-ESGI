<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Film;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::with('film')->get();
        return view('admin.seances', ['seances' => $seances]);
    }

    public function edit(Request $request)
    {
        $seance = Seance::findOrFail($request->id);
        return view('admin.seancesedit', ['seance' => $seance]);
    }

    public function update(Request $request)
    {
        $seance = Seance::findOrFail($request->id);
        $seance->places_disponibles = $request->places_disponibles;
        $seance->save();

        return redirect()->route('admin.seances');
    }
}
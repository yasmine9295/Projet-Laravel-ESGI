<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index(){
        $films = Film::paginate(15);
        return view('dashboard', ['films' => $films]);
    }

    public function film(Request $request){
        $film = Film::findOrFail($request->id);
        return view('film', ['film' => $film]);
    }
}

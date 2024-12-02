<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;


class TeamController extends Controller
{
    //

    public function index() {
    $teams = Team::all();
    return view('teams.index', compact('teams'));
    }

    public function show($id)
    {
        // Buscar el equipo por su ID
        $team = Team::findOrFail($id);

        // Pasar el equipo a la vista
        return view('teams.show', compact('team'));
    }


}

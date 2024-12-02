<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Para interactuar con la base de datos

class DashboardController extends Controller
{
    /**
     * Muestra la vista principal del dashboard con los equipos listados.
     */
    public function index()
    {
        // Recuperar todos los equipos de la base de datos
        $teams = DB::table('teams')->get();

        // Pasar los equipos a la vista
        return view('dashboard', ['teams' => $teams]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index()
    // {
        

    //     return view('administrateurs.dashboard');
    // }

    public function index()
    {
        $idees = Idee::all(); // Récupère toutes les idées de la base de données
        return view('administrateurs.dashboard', compact('idees'));
    }  
}

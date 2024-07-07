<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer toutes les idées
        $idees = Idee::all();
        // Récupérer le nombre total d'idées, de catégories et de commentaires
        $nombreIdees = Idee::count();
        $nombreCategories = Categorie::count();
        $nombreCommentaires = Commentaire::count();
        
        // Renvoyer la vue 'dashboard' avec les nombres d'idées, de catégories et de commentaires
        return view('administrateurs.dashboard', compact('idees', 'nombreIdees', 'nombreCategories', 'nombreCommentaires'));
    }
        
        
}
   


// Renvoyer la vue 'administrateurs.dashboard' avec les idées
        //return view('administrateurs.dashboard', compact('idees'));
    

    // public function dashboard()
    // {
    //     // Récupérer le nombre total d'idées, de catégories et de commentaires
    //     $nombreIdees = Idee::count();
    //     $nombreCategories = Categorie::count();
    //     $nombreCommentaires = Commentaire::count();
        
    //     // Renvoyer la vue 'dashboard' avec les nombres d'idées, de catégories et de commentaires
    //     return view('dashboard', compact('nombreIdees', 'nombreCategories', 'nombreCommentaires'));
    // }
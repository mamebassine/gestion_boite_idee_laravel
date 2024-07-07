<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Idee;
use Illuminate\Http\Request;

class FiltreController extends Controller
{
    public function filtrerParCategorie(Request $request)
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();

        // Filtrer les idées par catégorie
        $idees = Idee::where('categorie_id', $request->categorie_id)->get();

        // Vérifiez si des idées ont été trouvées
        $ideesTrouvees = $idees->isNotEmpty();

        // Retourner la vue avec les variables 'categories', 'idees', et 'ideesTrouvees'
        return view('idees.index', compact('categories', 'idees', 'ideesTrouvees'));
    }
}



// // app/Http/Controllers/FiltreController.php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Idee;
// use App\Models\Categorie; 



// class FiltreController extends Controller
// {
//     //Méthode pour filtrer les idées par catégorie
//     public function filtrerParCategorie(Request $request)
//     {
//         $categorie_id = $request->input('categorie_id');

//         // Filtrer les idées par catégorie si une catégorie est sélectionnée
//         if (!empty($categorie_id)) {
//             $idees = Idee::where('categorie_id', $categorie_id)->get();
//         } else {
//             $idees = Idee::all();
//         }

//         return view('idees.index', compact('idees'));
//     }
// }

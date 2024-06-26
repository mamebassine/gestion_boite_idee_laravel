<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idee;
use App\Models\Categorie;
use App\Mail\IdeeAcceptee;
use App\Mail\IdeeRefusee;
use App\Mail\IdeeEnvoyee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class IdeeController extends Controller
{
    // Afficher toutes les idées
    public function index()
    {
        $idees = Idee::all();
        return view('idees.index', compact('idees'));
    }

    // Afficher le formulaire de création d'une nouvelle idée
    public function create()
    {
        $categories = Categorie::all();
        return view('idees.create', compact('categories'));
    }

    // Enregistrer une nouvelle idée
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|string|email|max:255',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $idee = Idee::create($request->all());

        // Envoi de l'e-mail de confirmation
        Mail::to($idee->auteur_email)->send(new IdeeEnvoyee($idee));

        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès.');
    }

    // Afficher une idée spécifique
    public function show($id)
    {
        $idee = Idee::findOrFail($id);
        return view('idees.show', compact('idee'));
    }

    // Afficher le formulaire de modification d'une idée
    public function edit($id)
    {
        $idee = Idee::findOrFail($id);
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    // Mettre à jour une idée existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|string|email|max:255',
            'date_creation' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|string|in:en attente,approuvée,refusée',
            'categorie_id' => 'required|integer|exists:categories,id',
        ]);

        $idee = Idee::findOrFail($id);
        $idee->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
            'auteur_nom_complet' => $request->auteur_nom_complet,
            'auteur_email' => $request->auteur_email,
            'date_creation' => Carbon::parse($request->date_creation),
            'status' => $request->status,
            'categorie_id' => $request->categorie_id,
        ]);

        // Envoi de la notification si le statut est "approuvée" ou "refusée"
        if (in_array($idee->status, ['approuvée', 'refusée'])) {
            Mail::to($idee->auteur_email)->send($idee->status === 'approuvée' ? new IdeeAcceptee($idee) : new IdeeRefusee($idee));
        }

        return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès');
    }

    // Supprimer une idée
    public function destroy($id)
    {
        $idee = Idee::findOrFail($id);
        $idee->delete();
        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès.');
    }
}






















































// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Idee;
// use App\Models\Categorie;

// class IdeeController extends Controller
// {
//     public function index()
//     {
//         $idees = Idee::all();
//         return view('idees.index', compact('idees'));
//     }

//     public function create()
//     {
//         $categories = Categorie::all();
//         return view('idees.create', compact('categories'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'libelle' => 'required|string|max:255',
//             'description' => 'required|string',
//             'auteur_nom_complet' => 'required|string|max:255',
//             'auteur_email' => 'required|string|email|max:255',
//             'categorie_id' => 'required|exists:categories,id',
//         ]);

//         Idee::create($request->all());
//         return redirect()->route('idees.index')->with('success', 'Idée créée avec succès.');
//     }

//     public function show($id)
//     {
//         $idee = Idee::findOrFail($id);
//         return view('idees.show', compact('idee'));
//     }

//     public function edit($id)
//     {
//         $idee = Idee::findOrFail($id);
//         $categories = Categorie::all();
//         return view('idees.edit', compact('idee', 'categories'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'libelle' => 'required|string|max:255',
//             'description' => 'required|string',
//             'categorie_id' => 'required|exists:categories,id',
//         ]);

//         $idee = Idee::findOrFail($id);
//         $idee->update($request->all());
//         return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès.');
//        // return redirect()->route('idees.edit', ['id' => $idee->id]);
//     }


//     public function someMethod()
// {
//     $idee = Idee::find(1); // Supposons que vous récupérez une idée avec l'ID 1

//     // Générer l'URL
//     $url = route('idees.edit', ['id' => $idee->id]);

//     // Ou rediriger vers cette route
//     return redirect()->route('idees.edit', ['id' => $idee->id]);
// }
//     public function destroy($id)
//     {
//         $idee = Idee::findOrFail($id);
//         $idee->delete();
//         return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès.');
//     }
// }




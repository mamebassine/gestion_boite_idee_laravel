<?php

namespace App\Http\Controllers;

// Importation des classes nécessaires
use Illuminate\Http\Request;
use App\Models\Idee;
use App\Models\Categorie;
use App\Mail\IdeeAcceptee; 
use App\Mail\IdeeRefusee;
use App\Mail\IdeeEnvoyee;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


// Déclaration de la classe IdeeController qui hérite de la classe Controller
class IdeeController extends Controller
{
    //Méthode pour afficher toutes les idées
    public function index()
    {
        // Récupère toutes les idées de la base de données
        $idees = Idee::all();
        // Retourne la vue 'idees.index' avec les idées récupérées
        return view('idees.index', compact('idees'));
    }
// Méthode pour afficher le formulaire de création d'une nouvelle idée
    public function create()
    {
        // Récupère toutes les catégories de la base de données
        $categories = Categorie::all();
        // Retourne la vue 'idees.create' avec les catégories récupérées
        return view('idees.create', compact('categories'));
    }

    // Méthode pour enregistrer une nouvelle idée dans la base de données
    public function store(Request $request)
    {
        // Valide les données envoyées dans la requête
        $request->validate([
            'libelle' => 'required|string|max:255', // Le champ 'libelle' est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères
            'description' => 'required|string', // Le champ 'description' est requis et doit être une chaîne de caractères
            'auteur_nom_complet' => 'required|string|max:255', // Le champ 'auteur_nom_complet' est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères
            'auteur_email' => 'required|string|email|max:255', // Le champ 'auteur_email' est requis, doit être une chaîne de caractères, doit être un e-mail valide et ne doit pas dépasser 255 caractères
            'categorie_id' => 'required|exists:categories,id', // Le champ 'categorie_id' est requis et doit exister dans la table 'categories'
        ]);

        // Crée une nouvelle idée avec les données validées
        $idee = Idee::create($request->all());

        // Envoie un e-mail de confirmation à l'auteur de l'idée
        Mail::to($idee->auteur_email)->send(new IdeeEnvoyee($idee));

        // Redirige vers la route 'idees.index' avec un message de succès
        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès.');
    }

    // Méthode pour afficher une idée spécifique
    public function show($id)
    {
        // Récupère l'idée avec l'identifiant donné, ou échoue si elle n'existe pas
        $idee = Idee::findOrFail($id);
        // Retourne la vue 'idees.show' avec l'idée récupérée
        return view('idees.show', compact('idee'));
    }

    // Méthode pour afficher le formulaire d'édition d'une idée existante
    public function edit($id)
    {
        // Récupère l'idée avec l'identifiant donné, ou échoue si elle n'existe pas
        $idee = Idee::findOrFail($id);
        // Récupère toutes les catégories de la base de données
        $categories = Categorie::all();
        // Retourne la vue 'idees.edit' avec l'idée et les catégories récupérées
        return view('idees.edit', compact('idee', 'categories'));
    }

    // Méthode pour mettre à jour une idée existante dans la base de données
    public function update(Request $request, $id)
    {
        // Valide les données envoyées dans la requête
        $request->validate([
            'libelle' => 'required|string|max:255', // Le champ 'libelle' est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères
            'description' => 'required|string', // Le champ 'description' est requis et doit être une chaîne de caractères
            'categorie_id' => 'required|exists:categories,id', // Le champ 'categorie_id' est requis et doit exister dans la table 'categories'
          'status' => 'in:en attente,approuvée,refusée',
                                                              // Le champ 'status' doit être soit 'approuvee', soit 'refusee'
            'auteur_nom_complet' => 'required|string|max:255', // Le champ 'auteur_nom_complet' est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères
            'auteur_email' => 'required|string|email|max:255', // Le champ 'auteur_email' est requis, doit être une chaîne de caractères, doit être un e-mail valide et ne doit pas dépasser 255 caractères
          'date_creation' => 'nullable|date_format:d/m/Y', // Valider le format de date (optionnel et format selon votre besoin)
        ]);
        $idee = Idee::findOrFail($id);

        // Convertir et formater la date au format 'Y-m-d' pour MySQL
        $dateCreation = Carbon::createFromFormat('d/m/Y', $request->input('date_creation'))->format('Y-m-d');
    

        if ($request->has('date_creation')) {
        
      
            $dateCreation = Carbon::createFromFormat('d/m/Y', $request->input('date_creation'))->format('Y-m-d');
                } else {
                    $dateCreation = null;
                }
        $idee->fill([
            'libelle' => $request->input('libelle'),
            'description' => $request->input('description'),
            'categorie_id' => $request->input('categorie_id'),
            'status' => $request->input('status'),
            'auteur_nom_complet' => $request->input('auteur_nom_complet'),
            'auteur_email' => $request->input('auteur_email'),
            'date_creation' => $dateCreation, // Insérer la date formatée
        ]);
    
        $idee->save();
         // Redirection avec message de succès
    return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès.');
// Envoie un e-mail de notification en fonction du nouveau statut de l'idée
        if ($idee->status === 'approuvee') {
            // Si le statut est 'approuvee', envoie un e-mail d'approbation
            Mail::to($idee->auteur_email)->send(new IdeeAcceptee($idee));
        } elseif ($idee->status === 'refusee') {
            // Si le statut est 'refusee', envoie un e-mail de refus
            Mail::to($idee->auteur_email)->send(new IdeeRefusee($idee));
        }

        // Redirige vers la route 'idees.index' avec un message de succès
        return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès.');
    }

    // Méthode pour supprimer une idée existante de la base de données
    public function destroy($id)
    {
        // Récupère l'idée avec l'identifiant donné, ou échoue si elle n'existe pas
        $idee = Idee::findOrFail($id);
        // Supprime l'idée de la base de données
        $idee->delete();
        // Redirige vers la route 'idees.index' avec un message de succès
        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès.');
    }

//     public function updateDateCreation(Request $request, $id)
// {
//     $idee = Idee::findOrFail($id);

//     // Récupérer et formater la date au format 'Y-m-d'
//     $dateCreation = Carbon::createFromFormat('d/m/Y', $request->input('date_creation'))->format('Y-m-d');

//     // Mettre à jour le modèle avec la nouvelle date
//     $idee->date_creation = $dateCreation;
//     $idee->save();

//     return redirect()->route('idees.index')->with('success', 'Date de création mise à jour avec succès.');
// }
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




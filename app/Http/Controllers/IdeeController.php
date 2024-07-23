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
use App\Notifications\IdeeStatusUpdated; // Ajout de l'importation de la notification



// Déclaration de la classe IdeeController qui hérite de la classe Controller
class IdeeController extends Controller
{
    //Méthode pour afficher toutes les idées
    public function index()
    {
        // Récupère toutes les idées de la base de données
        $idees = Idee::all();

        // Récupère toutes les catégories de la base de données
        $categories = Categorie::all();

        $ideesTrouvees = $idees->isNotEmpty();

        return view('idees.index', compact('idees', 'categories', 'ideesTrouvees'));



        // Retourne la vue 'idees.index' avec les idées récupérées
        //return view('idees.index', compact('idees'));
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
// Méthode pour supprimer une idée existante de la base de données
    public function destroy($id)
    {
        // Récupère l'idée avec l'identifiant donné, ou échoue si elle n'existe pas
        $idee = Idee::findOrFail($id);
        // Supprime l'idée de la base de données
        $idee->delete();
        // Redirige vers la route 'idees.index' avec un message de succès
        return redirect()->route('administrateurs.dashboard')->with('success', 'Idée supprimée avec succès.');
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        $idee = Idee::findOrFail($id);
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    // Mettre à jour l'idée
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|email|max:255',
            'date_creation' => 'required|date',
            'status' => 'required|string|in:en attente,approuvée,refusée',
            'categorie_id' => 'required|integer|exists:categories,id',
        ]);

        $idee = Idee::findOrFail($id);
        $idee->update($request->all());
         // Envoi de la notification si le statut est "approuvée" ou "refusée"
         if (in_array($idee->status, ['approuvée', 'refusée'])) {
            Mail::to($idee->auteur_email)->send($idee->status === 'approuvée' ? new IdeeAcceptee($idee) : new IdeeRefusee($idee));
        }

        return redirect()->route('administrateurs.dashboard')->with('success', 'Idée mise à jour avec succès');
    }

       
   
   
}
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   

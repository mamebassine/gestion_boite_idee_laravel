<?php
namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministrateurController extends Controller
{
    // Afficher le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('administrateurs.register');
    }

    // Gérer l'inscription
    public function register(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'nom' => 'required|string|max:90',
            'prenom' => 'required|string|max:90',
            'telephone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:administrateurs',
            'password' => 'required|string|min:8',
        ]);

        // Création de l'administrateur
        Administrateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirection après inscription réussie
        return redirect()->route('administrateurs.login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }

    // Afficher le formulaire de connexion
    public function login()
    {
        return view('administrateurs.login');
    }

    // Gérer l'authentification
    public function authenticate(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:3',
        ]);

        $credentials = $request->only('email', 'password');

        // Récupérer l'administrateur par email
        $authenticate = Administrateur::where('email', $credentials['email'])->first();

        if ($authenticate && Hash::check($credentials['password'], $authenticate->password)) {
            // Authentification réussie
            Auth::login($authenticate);
            return redirect()->route('dashboard');
        }

        // Authentification échouée, rediriger avec un message d'erreur
        return redirect('login')->with('error', 'Adresse email ou mot de passe incorrect.');
    }
// Gérer la déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('idees.index'); // Rediriger vers la page d'accueil après la déconnexion
    }

// Afficher le tableau de bord
    public function dashboard()
{
    // $idees = Idee::all(); // Assuming Idee is your model
    // return view('administrateurs.dashboard', compact('idees'));




//   // Récupérer toutes les idées
//   $idees = Idee::all(); // En supposant que Idee est votre modèle

//   // Compter le nombre total d'idées
//   $nombreIdees = Idee::count();

//   // Compter le nombre total de catégories
//   $nombreCategories = Categorie::count();

//   // Retourner la vue du tableau de bord en passant les données nécessaires
//   return view('administrateurs.dashboard', compact('idees', 'nombreIdees', 'nombreCategories'));  
// }





// Récupérer toutes les idées
$idees = Idee::all(); // En supposant que Idee est votre modèle

// Compter le nombre total d'idées
$nombreIdees = Idee::count();

// Compter le nombre total de catégories
$nombreCategories = Categorie::count();

// Récupérer le nombre de commentaires (à adapter selon votre modèle et relation)
$nombreCommentaires = Commentaire::count(); // Exemple : Commentaire::count()

// Retourner la vue du tableau de bord en passant les données nécessaires
return view('administrateurs.dashboard', compact('idees', 'nombreIdees', 'nombreCategories', 'nombreCommentaires'));

}
}





























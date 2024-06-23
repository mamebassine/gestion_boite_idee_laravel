<?php





namespace App\Http\Controllers;

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
        return redirect()->route('login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
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
        return redirect('/')->with('error', 'Adresse email ou mot de passe incorrect.');
    }

    // Afficher le tableau de bord
    public function dashboard()
    {
        return view('administrateurs.dashboard');
    }

    // Gérer la déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('idees.index'); // Rediriger vers la page d'accueil après la déconnexion
    }
}




























// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use App\Models\Administrateur;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;


// class AdministrateurController extends Controller
// {
//     public function showRegistrationForm()
//     {
//         return view('administrateurs.register');
//     }

//     public function register(Request $request)
//     {
//         // Validation des données
//         $request->validate([
//             'nom' => 'required|string|max:90',
//             'prenom' => 'required|string|max:90',
//             'telephone' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:administrateurs',
//             'password' => 'required|string|min:8',
//         ]);

//         // Création de l'administrateur
//         Administrateur::create([
//             'nom' => $request->nom,
//             'prenom' => $request->prenom,
//             'telephone' => $request->telephone,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

//         // Redirection après inscription réussie
//         return redirect()->route('login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
//     }




//     public function login()
//     {
//         return view('administrateurs.login');
//     }public function authenticate(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required|string:3',
//         ]);
//         $credentials = $request->only('email', 'password');

//         // Récupérer l'administrateur par email
//         $authenticate = Administrateur::where('email', $credentials['email'])->first();

//         if ($authenticate && Hash::check($credentials['password'], $authenticate->password)) {
//             // Authentification réussie
//             Auth::login($authenticate);
//             return redirect()->route('dashboard');
//         }
// // Authentification échouée, rediriger avec un message d'erreur
//     return redirect('/')->with('error', 'Adresse email ou mot de passe incorrect.');

   

// }

//     public function dashboard()
//     {
        
// return view('administrateurs.dashboard'); // Ensure you have this view created
//     }








//     public function logout()
//     {
//         Auth::logout();
//         return redirect()->route('idees.index'); // Redirige vers la page d'accueil après la déconnexion
//     }
    
//     // public function logout(Request $request)
//     // {
//     //     Auth::logout();
//     //     $request->session()->invalidate();
//     //     $request->session()->regenerateToken();

//     //     return redirect('/')->with('success', 'Vous êtes déconnecté.');
//     }





























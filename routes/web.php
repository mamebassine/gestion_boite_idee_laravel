<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\administrateurController;
use App\Models\Administrateur;

Route::get('/', function () {
    return view('welcome');
});
// Routes pour idees
Route::get('/idees', [IdeeController::class, 'index'])->name('idees.index');
Route::get('/idees/create', [IdeeController::class, 'create'])->name('idees.create');
Route::post('/idees', [IdeeController::class, 'store'])->name('idees.store');
Route::get('/idees/{id}', [IdeeController::class, 'show'])->name('idees.show');
Route::get('/idees/{id}/edit', [IdeeController::class, 'edit'])->name('idees.edit');
Route::put('/idees/{id}', [IdeeController::class, 'update'])->name('idees.update');
Route::delete('/idees/{id}', [IdeeController::class, 'destroy'])->name('idees.destroy');

// Routes pour categories

//Route::resource('categories', CategorieController::class);


Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Routes pour commentaires
// Route::resource('idees.commentaires', CommentaireController::class)->except(['index', 'create', 'show']);

// Route::post('/idees/{idee}/commentaires', [CommentaireController::class, 'store'])->name('idees.commentaires.store');
// Route::get('/idees/{idee}/commentaires/{commentaire}/edit', [CommentaireController::class, 'edit'])->name('idees.commentaires.edit');
// Route::put('/idees/{idee}/commentaires/{commentaire}', [CommentaireController::class, 'update'])->name('idees.commentaires.update');
// Route::delete('/idees/{idee}/commentaires/{commentaire}', [CommentaireController::class, 'destroy'])->name('idees.commentaires.destroy');

// Routes pour commentaires
Route::get('/idees/{idee}/commentaires', [CommentaireController::class, 'index'])->name('idees.commentaires.index');
Route::get('/idees/{idee}/commentaires/create', [CommentaireController::class, 'create'])->name('idees.commentaires.create');
Route::post('/idees/{idee}/commentaires', [CommentaireController::class, 'store'])->name('idees.commentaires.store');
Route::get('/idees/{idee}/commentaires/{commentaire}/edit', [CommentaireController::class, 'edit'])->name('idees.commentaires.edit');
Route::put('/idees/{idee}/commentaires/{commentaire}', [CommentaireController::class, 'update'])->name('idees.commentaires.update');
Route::delete('/idees/{idee}/commentaires/{commentaire}', [CommentaireController::class, 'destroy'])->name('idees.commentaires.destroy');


// AUTHENTIFICATIONS

// Route pour l'inscription
Route::get('/register', [AdministrateurController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AdministrateurController::class, 'register']);

//connexion
Route::get('/login', [AdministrateurController::class, 'login'])->name('administrateurs.login');
Route::post('/authenticate', [AdministrateurController::class, 'authenticate'])->name('authenticate');
//Route pour aller dans le dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// dashbord
// Voir les commentaires sur une idée (nécessite un paramètre {id})
Route::get('/idees/{id}/commentaires', [CommentaireController::class, 'index'])->name('commentaires.index');
// lien menu
Route::get('/administrateurs/dashboard', [AdministrateurController::class, 'dashboard'])->name('administrateurs.dashboard');

// Déconnexion
Route::post('/logout', [AdministrateurController::class, 'logout'])->name('logout');







// Route pour la page d'accueil
//Route::get('/livres', [Controller::class, 'index'])->name('livres.index');

// Route pour la connexion des administrateurs
//Route::get('/administrateurs/login', [AdministrateurController::class, 'login'])->name('administrateurs.login');

// Route pour l'ajout de livre
//Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');

// Route pour afficher les détails d'un livre
//Route::get('/livres/{id}', [LivreController::class, 'show'])->name('livres.show');

// Route pour modifier un livre
//   Route::get('/idees/{id}/edit', [IdeeController::class, 'edit'])->name('idees.edit');
// pour recherche titre livre
//Route::get('/recherche', [LivreController::class, 'recherche'])->name('livres.recherche');

//Route::middleware(['auth'])->group(function () {
 //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');});

//Route::post('/authentification', [AdministrateurController::class, 'authentification'])->name('authentification');

// Route pour la déconnexion
//Route::get('/logout', [AdministrateurController::class, 'logout'])->name('logout');

Route::get('/logout', [AdministrateurController::class, 'logout'])->name('logout');

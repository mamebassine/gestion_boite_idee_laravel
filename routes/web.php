<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;

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



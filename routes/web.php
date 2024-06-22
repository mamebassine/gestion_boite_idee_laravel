<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;

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



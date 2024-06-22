<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idee;
use App\Models\Categorie;

class IdeeController extends Controller
{
    public function index()
    {
        $idees = Idee::all();
        return view('idees.index', compact('idees'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('idees.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|string|email|max:255',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Idee::create($request->all());
        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès.');
    }

    public function show($id)
    {
        $idee = Idee::findOrFail($id);
        return view('idees.show', compact('idee'));
    }

    public function edit($id)
    {
        $idee = Idee::findOrFail($id);
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $idee = Idee::findOrFail($id);
        $idee->update($request->all());
        return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $idee = Idee::findOrFail($id);
        $idee->delete();
        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès.');
    }
}




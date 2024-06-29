<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie; // Assurez-vous que le modèle Categorie est correctement importé

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:categories',
        ]);

        Categorie::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function edit(Categorie $categorie) // Renommer le paramètre à $category
    {
        return view('categories.edit', compact('categorie')); // Renommer la variable compact à 'category'
    }

    public function update(Request $request, Categorie $categorie) // Renommer le paramètre à $category
    {
        $request->validate([
            'libelle' => 'required|string|max:255|unique:categories,libelle,' . $categorie->id,
        ]);

        $categorie->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Categorie $categorie) // Renommer le paramètre à $category
    {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}


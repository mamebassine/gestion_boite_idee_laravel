<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Idee;
use Illuminate\Http\Request;


class CommentaireController extends Controller
{
    public function store(Request $request, $ideeId)
    {
        $request->validate([
            'nom_complet_auteur' => 'required|string|max:255',
            'libelle' => 'required|string',
        ]);

        $idee = Idee::findOrFail($ideeId);

        $commentaire = new Commentaire;
        $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
        $commentaire->libelle = $request->libelle;
        $idee->commentaires()->save($commentaire);

        return redirect()->route('idees.show', $ideeId)->with('success', 'Commentaire ajouté avec succès.');
    }

    public function edit($ideeId, $commentaireId)
{
    $idee = Idee::findOrFail($ideeId);
    $commentaire = Commentaire::findOrFail($commentaireId);

    return view('commentaires.edit', compact('idee', 'commentaire'));
}


    public function update(Request $request, $ideeId, $commentaireId)
    {
        $request->validate([
            'nom_complet_auteur' => 'required|string|max:255',
            'libelle' => 'required|string',
        ]);

        $commentaire = Commentaire::findOrFail($commentaireId);
        $commentaire->nom_complet_auteur = $request->nom_complet_auteur;
        $commentaire->libelle = $request->libelle;
        $commentaire->save();

        return redirect()->route('idees.show', $ideeId)->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy($ideeId, $commentaireId)
    {
        $commentaire = Commentaire::findOrFail($commentaireId);
        $commentaire->delete();

        return redirect()->route('idees.show', $ideeId)->with('success', 'Commentaire supprimé avec succès.');
    }
}





























<?php
namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Idee;
use Illuminate\Http\Request;
class CommentaireController extends Controller

{
    public function index(Idee $idee)
    {
        return view('commentaires.index', compact('idee'));
    }

    public function create(Idee $idee)
    {
        return view('commentaires.create', compact('idee'));
    }

    public function store(Request $request, Idee $idee)
    {
        $request->validate([
            'nom_complet_auteur' => 'required|string|max:255',
            'libelle' => 'required|string',
        ]);

        $commentaire = new Commentaire([
            'nom_complet_auteur' => $request->input('nom_complet_auteur'),
            'libelle' => $request->input('libelle'),
        ]);

        $idee->commentaires()->save($commentaire);

        return redirect()->route('idees.commentaires.index', $idee->id)->with('success', 'Commentaire ajouté avec succès.');
    }

    public function edit($ideeId, $commentaireId)
    {
        $idee = Idee::findOrFail($ideeId);
        $commentaire = Commentaire::findOrFail($commentaireId);
        return view('commentaires.edit', compact('idee', 'commentaire'));
    }

    public function update(Request $request, $ideeId, $commentaireId)
    {
        $commentaire = Commentaire::findOrFail($commentaireId);
        $commentaire->update($request->all());
        return redirect()->route('idees.commentaires.index', $ideeId)->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy($ideeId, $commentaireId)
    {
        $commentaire = Commentaire::findOrFail($commentaireId);
        $commentaire->delete();
        return redirect()->route('idees.commentaires.index', $ideeId)->with('success', 'Commentaire supprimé avec succès.');
    }
}


{{-- @extends('layouts.app') --}}


<div class="container">
    <h2>Modifier le Commentaire</h2>
    <form action="{{ route('idees.commentaires.update', [$idee->id, $commentaire->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom_complet_auteur">Nom complet :</label>
            <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}" required>
        </div>
        <div class="form-group">
            <label for="libelle">Commentaire :</label>
            <textarea class="form-control" id="libelle" name="libelle" required>{{ $commentaire->libelle }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>



<div class="container">
    <h2>Ajouter un Commentaire pour : {{ $idee->libelle }}</h2>
    <form action="{{ route('idees.commentaires.store', $idee->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom_complet_auteur">Nom complet :</label>
            <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" required>
        </div>
        <div class="form-group">
            <label for="libelle">Commentaire :</label>
            <textarea class="form-control" id="libelle" name="libelle" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
    <a href="{{ route('idees.index') }}" class="btn btn-secondary">Retour</a>
</div>


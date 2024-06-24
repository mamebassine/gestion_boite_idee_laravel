{{-- @extends('layouts.app') --}}


<div class="container">
    <h1>Créer une nouvelle idée</h1>
    <form action="{{ route('idees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="libelle">Nom de l'idée</label>
            <input type="text" name="libelle" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="auteur_nom_complet">Nom complet de l'auteur</label>
            <input type="text" name="auteur_nom_complet" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="auteur_email">Email de l'auteur</label>
            <input type="email" name="auteur_email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_creation">Date de création</label>
            <input type="date" name="date_creation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>


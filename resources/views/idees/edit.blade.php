{{-- @extends('layouts.app') --}}


<div class="container">
    <h1>Modifier l'idée</h1>
    <form action="{{ route('idees.update', $idee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="libelle">Nom de l'idée</label>
            <input type="text" name="libelle" class="form-control" value="{{ $idee->libelle }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $idee->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="auteur_nom_complet">Auteur nom complet</label>
            <input type="text" name="auteur_nom_complet" class="form-control" value="{{ $idee->auteur_nom_complet }}" required>
        </div>
        <div class="form-group">
            <label for="auteur_email">Auteur email</label>
            <input type="text" name="auteur_email" class="form-control" value="{{ $idee->auteur_email }}" required>
        </div><div class="form-group">
            <label for="date_creaction">Date de creaction</label>
            <input type="text" name="date_creaction" class="form-control" value="{{ $idee->created_at->format('d/m/Y') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control">
                <option value="en attente" {{ $idee->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="approuvée" {{ $idee->status == 'approuvée' ? 'selected' : '' }}>Approuvée</option>
                <option value="refusée" {{ $idee->status == 'refusée' ? 'selected' : '' }}>Refusée</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ $idee->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>


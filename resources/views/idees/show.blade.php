{{-- resources/views/idees/show.blade.php --}}
{{-- @extends('layouts.app') --}}

{{-- <!DOCTYPE html>
<html>
<head>
    <title>Détails de l'idée</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>{{ $idee->libelle }}</h1>
    <p>{{ $idee->description }}</p>
    <p>Catégorie : {{ $idee->categorie->libelle }}</p>
    <p>Nom de l'auteur : {{ $idee->auteur_nom_complet }}</p>
    <p>Email de l'auteur : {{ $idee->auteur_email }}</p>
    <p>Date de création : {{ $idee->created_at->format('d/m/Y') }}</p>
    <p>Statut : {{ ucfirst($idee->status) }}</p>

    @if (auth()->user() && auth()->user()->isAdmin())
    <form action="{{ route('idees.update_status', $idee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Modifier le statut :</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $idee->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="approved" {{ $idee->status == 'approved' ? 'selected' : '' }}>Approuvé</option>
                <option value="rejected" {{ $idee->status == 'rejected' ? 'selected' : '' }}>Rejeté</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour le statut</button>
    </form>
    @endif

    <a href="{{ route('idees.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
</body>
</html> --}}



{{-- @extends('layouts.app') --}}
<div class="container">
    <h1>{{ $idee->libelle }}</h1>
    <p>{{ $idee->description }}</p>
    <p>Catégorie : {{ $idee->categorie->libelle }}</p>
    <p>Nom de l'auteur : {{ $idee->auteur_nom_complet }}</p>
    <p>Email de l'auteur : {{ $idee->auteur_email }}</p>
    <p>Date de création : {{ $idee->created_at->format('d/m/Y') }}</p>
     <select name="status" id="status" class="form-control">
                <option value="pending" {{ $idee->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="approved" {{ $idee->status == 'approved' ? 'selected' : '' }}>Approuvé</option>
                <option value="rejected" {{ $idee->status == 'rejected' ? 'selected' : '' }}>Rejeté</option>
            </select>
    <p>Statut : {{ $idee->status }}</p>
    <a href="{{ route('idees.index') }}" class="btn btn-secondary">Retour</a>
</div> 







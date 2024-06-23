@extends('layouts.app')

@section('content')
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 12px; /* Réduit le padding */
        margin-bottom: 12px; /* Réduit la marge en bas */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%; /* Pour que les cartes s'étirent sur toute la hauteur */
    }
    .card-title {
        font-size: 1rem; /* Réduit la taille de la police */
        margin-bottom: 6px; /* Réduit la marge en bas */
    }
    .card-text {
        margin-bottom: 6px; /* Réduit la marge en bas */
    }
    .btn-group {
        display: flex;
        gap: 4px;
        flex-wrap: wrap;
    }
    .btn {
        padding: 4px 8px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        text-align: center;
        cursor: pointer;
        font-size: 0.75rem; /* Plus petit pour un meilleur ajustement */
    }
    .btn-primary { background-color: #007bff; }
    .btn-danger { background-color: #dc3545; }
    .btn-default { background-color: #007bff; } /* Couleur verte pour le thème boîte à idées */
    .btn:hover {
        opacity: 0.9;
    }
.btn-danger:hover {
        opacity: 70%;
    }
</style>

<div class="container">
    <h1 class="mb-4">Liste des idées</h1>
    <a href="{{ route('idees.create') }}" class="btn btn-primary mb-3">Ajouter une idée</a>
    <div class="row">
        @foreach($idees as $idee)
        <div class="col-md-4 mb-4">
            <div class="card">
                <h5 class="card-title">{{ $idee->libelle }}</h5>
                <p class="card-text">{{ Str::limit($idee->description, 50) }}</p>
                <p class="card-text"><small class="text-muted">{{ $idee->created_at->format('d/m/Y') }}</small></p>
                <div class="btn-group">
                    <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-default">Voir détail </a>
                    <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-default">Modifier</a>
                    <a href="{{ route('idees.commentaires.create', $idee->id) }}" class="btn btn-default">Ajout commentaire</a>
                    <a href="{{ route('idees.commentaires.index', $idee->id) }}" class="btn btn-default">Voir Commentaires</a>
                    <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection














{{-- @extends('layouts.app')


<div class="container">
    <h1>Liste des idées</h1>
    <a href="{{ route('idees.create') }}" class="btn btn-primary">Ajouter une idée</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de création</th>
               <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($idees as $idee)
            <tr>
                <td>{{ $idee->libelle }}</td>
                <td>{{ Str::limit($idee->description, 50) }}</td>
                <td>{{ $idee->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-info">Voir detail d'une idee</a>
                    <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-warning">Modifier</a>
                    <a href="{{ route('idees.commentaires.create', $idee->id) }}" class="btn btn-secondary">Ajouter un Commentaire</a>
                    <a href="{{ route('idees.commentaires.index', $idee->id) }}" class="btn btn-info">Voir un Commentaires</a>
                    <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

 --}}

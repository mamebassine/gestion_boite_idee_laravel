{{-- 
@extends('layouts.app')

@section('content') --}}
<style>
    .card {
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-color: #f8f9fa;
    }

    .comment-section {
        margin-top: 20px;
    }

    .commentaire {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .commentaire p {
        margin-bottom: 5px;
    }

    .btn-edit {
        margin-right: 10px;
    }

    /* Custom styling for aligning form and comments in a row */
    .row-content {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .details-card {
        flex: 1; /* Take up remaining space */
    }

    .comment-section-card {
        flex: 1; /* Take up remaining space */
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<div class="row-content">
    <div class="card details-card">
        <h1>Détails de l'idée : {{ $idee->libelle }}</h1>
        <table>
            <tr>
                <th>Description</th>
                <td>{{ $idee->description }}</td>
            </tr>
            <tr>
                <th>Catégorie</th>
                <td>{{ $idee->categorie->libelle }}</td>
            </tr>
            <tr>
                <th>Nom de l'auteur</th>
                <td>{{ $idee->auteur_nom_complet }}</td>
            </tr>
            <tr>
                <th>Email de l'auteur</th>
                <td>{{ $idee->auteur_email }}</td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td>{{ $idee->created_at->format('d/m/Y') }}</td>
            </tr>
        </table>
    </div>

    <div class="card comment-section-card">
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

        <div class="comment-section">
            <h2>Commentaires pour : {{ $idee->libelle }}</h2>
            @if($idee->commentaires && $idee->commentaires->count() > 0)
                @foreach ($idee->commentaires as $commentaire)
                    <div class="commentaire">
                        <p>{{ $commentaire->nom_complet_auteur }} : {{ $commentaire->libelle }}</p>
                        @if (Auth::check() && Auth::user()->isAdmin())
                            <a href="{{ route('idees.commentaires.edit', [$idee->id, $commentaire->id]) }}" class="btn btn-primary btn-edit">Modifier</a>
                            <form action="{{ route('idees.commentaires.destroy', [$idee->id, $commentaire->id]) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            @else
                <p>Pas encore de commentaires.</p>
            @endif
            <a href="{{ route('idees.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
{{-- @endsection --}}
























{{-- <div class="card comment-section">
    <h2>Commentaires pour : {{ $idee->libelle }}</h2>
    @if($idee->commentaires && $idee->commentaires->count() > 0)
        @foreach ($idee->commentaires as $commentaire)
            <div class="commentaire">
                <p>{{ $commentaire->nom_complet_auteur }} : {{ $commentaire->libelle }}</p>
                @if (Auth::check() && Auth::user()->isAdmin())
                    <a href="{{ route('idees.commentaires.edit', [$idee->id, $commentaire->id]) }}" class="btn btn-primary btn-edit">Modifier</a>
                    <form action="{{ route('idees.commentaires.destroy', [$idee->id, $commentaire->id]) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            </div>
        @endforeach
    @else
        <p>Pas encore de commentaires.</p>
    @endif
    <a href="{{ route('idees.index') }}" class="btn btn-secondary">Retour</a>
</div> --}}

{{-- @endsection --}}
































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



{{-- @extends('layouts.app')
<div class="container">
    <h1>{{ $idee->libelle }}</h1>
    <p>{{ $idee->description }}</p>
    <p>Catégorie : {{ $idee->categorie->libelle }}</p>
    <p>Nom de l'auteur : {{ $idee->auteur_nom_complet }}</p>
    <p>Email de l'auteur : {{ $idee->auteur_email }}</p>
    <p>Date de création : {{ $idee->created_at->format('d/m/Y') }}</p>
    <a href="{{ route('idees.index') }}" class="btn btn-secondary">Retour</a>
</div> 

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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
    <style>
        .container {
            width: 60%;
            margin: auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .commentaire {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .commentaire p {
            margin: 0;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            margin: 5px 0;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-secondary {
            background-color: #6c757d;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Commentaires pour : {{ $idee->libelle }}</h2>
    @if($idee->commentaires && $idee->commentaires->count() > 0)
        @foreach ($idee->commentaires as $commentaire)
            <div class="commentaire">
                <p>{{ $commentaire->nom_complet_auteur }} : {{ $commentaire->libelle }}</p>
                @if (Auth::check() && Auth::user()->isAdmin())
                    <a href="{{ route('idees.commentaires.edit', [$idee->id, $commentaire->id]) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('idees.commentaires.destroy', [$idee->id, $commentaire->id]) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            </div>
        @endforeach
    @else
        <p>Pas encore de commentaires.</p>
    @endif
    <a href="{{ route('idees.index') }}" class="btn btn-secondary">Retour</a> 
</div>
</body>
</html> --}}










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
</html>

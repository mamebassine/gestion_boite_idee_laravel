
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Détails de l'idée : {{ $idee->libelle }}</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Ajouter un Commentaire pour : {{ $idee->libelle }}</div>

                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">Commentaires pour : {{ $idee->libelle }}</div>

        <div class="card-body">
            @if($idee->commentaires && $idee->commentaires->count() > 0)
                @foreach ($idee->commentaires as $commentaire)
                    <div class="commentaire">
                        <p>{{ $commentaire->nom_complet_auteur }} : {{ $commentaire->libelle }}</p>
                        @if (Auth::check() && Auth::user()->isAdmin())
                            <a href="{{ route('idees.commentaires.edit', [$idee->id, $commentaire->id]) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('idees.commentaires.destroy', [$idee->id, $commentaire->id]) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            @else
                <p>Pas encore de commentaires.</p>
            @endif
        </div>
    </div>
</div>
































{{-- 
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























 --}}

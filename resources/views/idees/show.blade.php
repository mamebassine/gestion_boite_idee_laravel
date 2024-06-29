 @extends('layouts.app')

@section('content')

<div class="container"> {{-- Conteneur personnalisé pour aligner le contenu --}}
    <div class="row">
        <!-- Détails de l'idée -->
        <div class="col-md-8"> {{-- Colonne pour les détails de l'idée --}}
            <div class="card mb-4"> {{-- Carte pour les détails de l'idée avec marge en bas --}}
                <div class="card-header bg-custom text-black">Détails de l'idée : {{ $idee->libelle }}</div> {{-- En-tête de la carte avec style personnalisé --}}
                <div class="card-body"> {{-- Corps de la carte --}}
                    <table class="table table-borderless"> {{-- Tableau sans bordures --}}
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
            
            <!-- Formulaire d'ajout de commentaire -->
            <div class="card">
                <div class="card-header bg-custom text-black">Ajouter un Commentaire pour : {{ $idee->libelle }}</div>
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
                        <button type="submit" class="btn-submit">Soumettre</button> {{-- Bouton de soumission avec style personnalisé --}}
                    </form>
                </div>
            </div>
        </div>

        <!-- Liste des commentaires -->
        <div class="col-md-4"> {{-- Colonne pour la liste des commentaires --}}
            <div class="card"> {{-- Carte pour les commentaires --}}
                <div class="card-header bg-custom text-black">Commentaires pour : {{ $idee->libelle }}</div> {{-- En-tête de la carte --}}
                <div class="card-body"> {{-- Corps de la carte --}}
                    @if($idee->commentaires && $idee->commentaires->count() > 0)
                        @foreach ($idee->commentaires as $commentaire) {{-- Boucle sur les commentaires --}}
                            <div class="commentaire mb-3"> {{-- Conteneur pour chaque commentaire avec marge en bas --}}
                                <p><strong>{{ $commentaire->nom_complet_auteur }}</strong>: {{ $commentaire->libelle }}</p>
                                <div class="d-flex">
                                    <a href="{{ route('idees.commentaires.edit', [$idee->id, $commentaire->id]) }}" class="btn-modify">Modifier</a> {{-- Bouton pour modifier le commentaire --}}
                                    <form action="{{ route('idees.commentaires.destroy', [$idee->id, $commentaire->id]) }}" method="POST">
                                        @csrf {{-- Protection contre les attaques CSRF --}}
                                        @method('DELETE') {{-- Méthode DELETE pour la suppression --}}
                                        <button type="submit" class="btn-delete">Supprimer</button> {{-- Bouton pour supprimer le commentaire --}}
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Pas encore de commentaires.</p> {{-- Message si aucun commentaire n'est présent --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .col-md-8, .col-md-4 {
        padding: 10px;
        box-sizing: border-box;
    }

    .col-md-8 {
        flex: 0 0 66.6667%;
    }

    .col-md-4 {
        flex: 0 0 33.3333%;
    }

    .card {
        border: 1px solid #B7D7B3;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        background-color: #fff;
    }

    .card-header {
        background-color: #B7D7B3;
        padding: 15px;
        font-weight: bold;
        border-bottom: 1px solid #B7D7B3;
    }

    .card-body {
        padding: 15px;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }

    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
    }

    .table-borderless th, .table-borderless td, .table-borderless thead th, .table-borderless tbody + tbody {
        border: 0;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-submit, .btn-modify, .btn-delete {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        border: 1px solid transparent;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-submit, .btn-modify {
        background-color: #B7D7B3;
        border-color: #B7D7B3;
        color: #fff;
    }

    .btn-delete {
        background-color: #dc3545;;
        border-color: #dc3545;;
        color: #fff;
        margin-top: 12%;
    }
.d-flex {
        display: flex;
        align-items: center;
    }

    .d-flex .btn-modify {
        margin-right: 23px;
    }

    .commentaire {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .mb-3 {
        margin-bottom: 15px;
    }
</style>































{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Détails de l'idée -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-custom text-black">Détails de l'idée : {{ $idee->libelle }}</div>
                <div class="card-body">
                    <table class="table table-borderless">
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
            
            <!-- Formulaire d'ajout de commentaire -->
            <div class="card">
                <div class="card-header bg-custom text-black">Ajouter un Commentaire pour : {{ $idee->libelle }}</div>
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
                        <button type="submit" class="btn btn-custom">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Liste des commentaires -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-custom text-black">Commentaires pour : {{ $idee->libelle }}</div>
                <div class="card-body">
                    @if($idee->commentaires && $idee->commentaires->count() > 0)
                        @foreach ($idee->commentaires as $commentaire)
                            <div class="commentaire mb-3">
                                <p><strong>{{ $commentaire->nom_complet_auteur }}</strong>: {{ $commentaire->libelle }}</p>
                                <div class="d-flex">
                                    <a href="{{ route('idees.commentaires.edit', [$idee->id, $commentaire->id]) }}" class="btn btn-custom btn-sm mr-2">Modifier</a>
                                    <form action="{{ route('idees.commentaires.destroy', [$idee->id, $commentaire->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Pas encore de commentaires.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .bg-custom {
        background-color: #B7D7B3;
        color: #000; /* Texte en noir */
    }

    .btn-custom {
        background-color: #B7D7B3;
        border-color: #B7D7B3;
        color: #000; /* Texte en noir */
    }

    .btn-custom:hover {
        background-color: #A3C2A2; /* Couleur au survol */
        border-color: #A3C2A2;
    }

    .btn-primary {
        
        background-color: #B7D7B3;
        border-color: #B7D7B3;
        color: #000; /* Texte en noir */
    }

    .btn-primary:hover {
        background-color: #A3C2A2; /* Couleur au survol */
        border-color: #A3C2A2;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff; /* Couleur du texte */
    }

    .card {
        border: 1px solid #B7D7B3;
        color: #000; /* Texte en noir */
    }

    .card-header {
        font-weight: bold;
    }

    .table th {
        width: 200px;
    }
</style> --}}

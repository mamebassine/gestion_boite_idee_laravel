<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boîte à Idées</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styles spécifiques pour le logo dans la barre de navigation */
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        /* Styles pour la bannière principale */
        .banner {
            position: relative;
            text-align: center;
            color: white;
            height: 540px; /* Hauteur augmentée de la bannière */
            overflow: hidden; /* Cacher le contenu dépassant la bannière */
        }
        /* Styles pour l'image de la bannière */
        .banner img {
            opacity: 70px;
            width: 99%; /* Largeur de l'image à 100% de la largeur du conteneur */
            height: 540px; /* Hauteur fixe de l'image */
            object-fit: cover; /* Ajuster l'image sans la déformer */
            object-position: center; 
            
        }
        /* Styles pour le contenu textuel de la bannière */
        .banner-content {
            position: absolute;
            top: 50%; /* Centrer verticalement */
            left: 50%; /* Centrer horizontalement */
            transform: translate(-50%, -50%); /* Déplacer de -50% de sa propre taille pour le centrage parfait */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Ombre légère pour le texte */
        }
        /* Styles pour le pied de page */
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand logo" href="#">Boîte à Idées</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <!-- Liens de navigation -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('idees.index') }}">Accueil</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Espace catégorie</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('administrateurs.login') }}">Espace Perso</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bannière principale -->
    <div class="banner">


        <img src="{{ asset('images/image9.jpg') }}" alt="ICI PHOTO">

        {{-- <img src="{{('images/image3.jpeg')}}" alt="ICI PHOTO"> --}}
        <!-- Contenu textuel de la bannière -->
        <div class="banner-content">
            <h1>Bienvenue sur la Boîte à Idées de la Commune</h1>
            <p>Partagez vos idées et contribuez à l'amélioration de notre communauté.</p>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="container mt-4">
        @yield('content') <!-- Inclure le contenu de la section 'content' -->
    </div>

    



    








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










<!-- Pied de page -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Mairie de [Lougre thioly]. Tous droits réservés.</p>
    </div>
</footer>

<!-- Scripts JavaScript requis pour Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>























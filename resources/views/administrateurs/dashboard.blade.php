<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <style>
        /* Style global pour le corps de la page */
        body {
            display: flex;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Couleur de fond */
        }

        /* Style pour la barre de navigation verticale */
        .navbar-vertical {
            width: 200px; /* Largeur réduite */
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #2f9ffb;
            padding-top: 10px; /* Espacement réduit en haut */
            color: white;
            overflow-y: auto; /* Permet le défilement si nécessaire */
        }

        /* Style pour les liens de la navbar */
        .navbar-vertical a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
        }

        /* Effet au survol des liens de la navbar */
        .navbar-vertical a:hover {
            background-color: #e9bede;
        }

        /* Style pour le conteneur du contenu principal */
        .content {
            margin-left: 250px; /* Marge ajustée pour laisser de l'espace à la navbar */
            padding: 30px;
            width: calc(100% - 200px);
        }

        
    </style>
</head>
<body>
    <!-- Navbar verticale -->
    <nav class="navbar-vertical">
        <div>
            <!-- Liens de navigation -->
            <a class="navbar-brand" href="#">Notre boite a idee</a>
            <a class="nav-link" href="{{ route('idees.index') }}">Accueil</a>
            <a class="nav-link" href="{{ route('administrateurs.login') }}">Connexion</a>
            <a class="nav-link" href="{{ route('idees.show', ['id' => 1]) }}">Voir detail d'une idee</a> <!-- Remplacez 1 par l'ID approprié -->
            <a class="nav-link" href="{{ route('idees.edit', ['id' => 1]) }}">Mettre à jour une idee</a> <!-- Remplacez 1 par l'ID approprié -->
            <form id="delete-form-1" action="{{ route('idees.destroy', ['id' => 1]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            <a class="nav-link" href="{{ route('commentaires.index', ['id' => 1]) }}">Voir les commentaires sur une idee</a> 
            <!-- Remplacez 1 par l'ID approprié --> 
            <a class="nav-link1" href="{{ route('logout') }}">Déconnexion</a>
        </div>
    </nav>
<!-- Contenu principal -->
    <div class="content">
        <section>
            <h1>Bienvenue dans le tableau de bord</h1>
        </section>
    </div>
            
            
    @extends('layouts.app')

    @section('content')
    <style>
        .container {
            margin-top: 30px;
        }
    </style>
    
    {{-- <div class="container">
        <h1>Liste des idées</h1>
        <a href="{{ route('idees.create') }}" class="btn btn-primary mb-3">Ajouter une idée</a>
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
                        <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-info">Voir détail d'une idée</a>
                        <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('idees.commentaires.create', $idee->id) }}" class="btn btn-secondary">Ajouter un Commentaire</a>
                        <a href="{{ route('idees.commentaires.index', $idee->id) }}" class="btn btn-info">Voir les Commentaires</a>
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
    @endsection --}}





    
             

</body>
</html>

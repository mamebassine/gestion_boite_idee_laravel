<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: #D5EEC6;
            opacity: 93%;
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
            background-color: #a0aa9b;
        }

        /* Style pour le conteneur du contenu principal */
        .content {
            margin-left: 200px; /* Marge ajustée pour laisser de l'espace à la navbar */
            padding: 30px;
            width: calc(100% - 200px);
        }

        .container {
            margin-top: 30px;
        }

        /* Style pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            color: #333333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Style pour les boutons dans le tableau */
        .btn-table {
            margin-right: 5px;
            color: white; /* Couleur du texte en blanc */
        }

        /* Style pour le bouton Voir détail */
        .btn-info {
            background-color: #D5EEC6; /* Couleur de fond verte */
            border-color: #D5EEC6; /* Couleur de la bordure */
        }

        .btn-info:hover {
            background-color: #D5EEC6; /* Couleur de fond verte plus foncée au survol */
            border-color: #D5EEC6; /* Couleur de la bordure au survol */
        }

        /* Style pour le bouton Modifier */
        .btn-warning {
            background-color: #D5EEC6; /* Couleur de fond verte */
            border-color: #D5EEC6; /* Couleur de la bordure */
        }

        .btn-warning:hover {
            background-color: #D5EEC6; /* Couleur de fond verte plus foncée au survol */
            border-color: #D5EEC6; /* Couleur de la bordure au survol */
        }

        /* Style pour le bouton Ajouter une idée */
        .btn-primary {
            background-color: #D5EEC6; /* Couleur de fond verte */
            border-color: #D5EEC6; /* Couleur de la bordure */
            color: white; /* Couleur du texte en blanc */
        }

        .btn-primary:hover {
            background-color: #a8cba0; /* Couleur de fond verte plus foncée au survol */
            border-color: #a8cba0; /* Couleur de la bordure au survol */
        }
    </style>
</head>
<body>
    <!-- Navbar verticale -->
    <nav class="navbar-vertical">
        <div>
            <!-- Liens de navigation -->
            <a class="navbar-brand" href="#">Notre boite à idée</a>
            <a class="nav-link" href="{{ route('idees.index') }}">Accueil</a>
            {{-- <a class="nav-link" href="{{ route('administrateurs.login') }}">Connexion</a>
            <a class="nav-link" href="{{ route('idees.show', ['id' => 1]) }}">Voir détail d'une idée</a>
            <a class="nav-link" href="{{ route('idees.edit', ['id' => 1]) }}">Mettre à jour une idée</a>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('delete-form-1').submit();">Supprimer</a>
            <form id="delete-form-1" action="{{ route('idees.destroy', ['id' => 1]) }}" method="POST" style="display: none;"> --}}
                @csrf
                @method('DELETE')
            </form>
            <a class="nav-link" href="{{ route('commentaires.index', ['id' => 1]) }}">Voir les commentaires sur une idée</a>
            <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="content">
        <div class="container">
            <h1>Liste des idées</h1>
            <a href="{{ route('idees.create') }}" class="btn btn-primary mb-3">Ajouter une idée</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($idees as $idee)
                    <tr>
                        <td>{{ $idee->libelle }}</td>
                        <td>{{ Str::limit($idee->description, 50) }}</td>
                        <td>{{ $idee->created_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Bouton Voir détail stylisé en vert -->
                            <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-info btn-table">Voir détail</a>
                            <!-- Bouton Modifier stylisé en vert -->
                            <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-warning btn-table">Modifier</a>
                            <!-- Bouton Supprimer avec confirmation -->
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $idee->id }}').submit();" class="btn btn-danger btn-table">Supprimer</a>
                            <form id="delete-form-{{ $idee->id }}" action="{{ route('idees.destroy', ['id' => $idee->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Intégration de Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

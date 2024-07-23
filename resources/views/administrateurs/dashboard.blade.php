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
            background: linear-gradient(135deg, #d1c6ee, #78A869);
            /* background-color: #D5EEC6; */
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

        /* Style pour les cartes */
        .card-dashboard {
            margin-bottom: 20px;
            background-color: #D5EEC6;
            color: white;
            border: none;
            /* Dégradé de couleur */
            background: linear-gradient(135deg, #d1c6ee, #78A869);
            /* Opacité */
            opacity: 0.9;
        }

        .card-dashboard .card-body {
            padding: 20px;
        }

        .card-dashboard .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-dashboard .card-text {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Style pour les icônes */
        .card-dashboard .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        /* Style pour les boutons d'action */
        .btn-table {
            padding: 0px 14px;
            font-size: 15px;
            text-align: left;
        }
        
    </style>
</head>
<body>
    <!-- Navbar verticale -->
    <nav class="navbar-vertical">
        <div>
            <!-- Liens de navigation -->
            <a class="navbar-brand" href="#">Midioma do</a>
            <a class="nav-link" href="{{ route('idees.index') }}">Accueil</a>

            <a class="nav-link" href="{{ route('categories.index') }}">Espace catégorie</a>

            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Espace catégorie</a></li> --}}


            {{-- <a class="nav-link" href="{{ route('commentaires.index', ['id' => 1]) }}">Voir les commentaires sur une idée</a> --}}
            <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="content">
        <div class="container">
            <h1>Tableau de Bord</h1>
            <div class="row">
                <!-- Carte pour le nombre d'idées -->
                <div class="col-md-4">
                    <div class="card card-dashboard">
                        <div class="card-body">
                            <i class="icon fas fa-lightbulb"></i>
                            <h5 class="card-title">Nombre d'idées</h5>
                            <p class="card-text">{{ $nombreIdees }}</p>
                        </div>
                    </div>
                </div>
                <!-- Carte pour le nombre de catégories -->
                <div class="col-md-4">
                    <div class="card card-dashboard">
                        <div class="card-body">
                            <i class="icon fas fa-list-alt"></i>
                            <h5 class="card-title">Nombre de catégories</h5>
                            <p class="card-text">{{ $nombreCategories }}</p>
                        </div>
                    </div>
                </div>
                <!-- Carte pour le nombre de commentaires -->
                <div class="col-md-4">
                    <div class="card card-dashboard">
                        <div class="card-body">
                            <i class="icon fas fa-comment"></i>
                            <h5 class="card-title">Nombre de commentaires</h5>
                            <p class="card-text">{{ $nombreCommentaires }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Liste des idées -->
            <h2>Liste des idées</h2>
            <a href="{{ route('idees.create') }}" class="btn btn-primary mb-3" style="background-color: #A3C2A2; border-color: #A3C2A2;">Ajouter une idée</a>
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
                        <td class="d-flex">
                            <!-- Boutons d'action -->
                            <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-info btn-table mr-2" style="background-color: #A3C2A2; border-color: #A3C2A2;">Voir détail</a>
                            <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-warning btn-table mr-2" style="background-color: #A3C2A2; border-color: #A3C2A2; color: #fff;">Modifier</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $idee->id }}').submit();" class="btn btn-danger btn-table">Supprimer</a>
                            <form id="delete-form-{{ $idee->id }}" action="{{ route('idees.destroy', ['id' => $idee->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Intégration de Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

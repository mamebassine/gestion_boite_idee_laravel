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

        /* Style pour le conteneur des cartes */
        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 40px; /* Espacement accru entre les cartes */
            margin-top: 120px;
        }

        /* Style pour chaque carte */
        .card {
            width: 200px;
            height: 150px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
            text-align: center;
        }

        /* Style pour le titre de la carte */
        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Style pour le pourcentage */
        .percentage {
            font-size: 24px;
            font-weight: bold;
            color: #007bff; /* Couleur bleue pour les pourcentages */
        }

        /* Style pour le bouton Ajouter un livre */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        /* Effet au survol du bouton */
        .btn:hover {
            background-color: #0056b3;
        }

        /* Style pour le titre principal */
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .nav-link1{
            margin-top: 340px;
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
            
            <!-- Conteneur des cartes -->
            <div class="card-container">
                <!-- Carte Livres lus -->
                <div class="card">
                    <div class="card-title">Idees donnees</div>
                    <div class="percentage">75%</div>
                </div>
    
                <!-- Carte Livres vendus -->
                <div class="card">
                    <div class="card-title">Commentaires</div>
                    <div class="percentage">60%</div>
                </div>
    
                <!-- Carte Livres empruntés -->
                <div class="card">
                    <div class="card-title">Idees realises</div>
                    <div class="percentage">85%</div>
                </div>
    
                <!-- Carte Autre statistique -->
                <div class="card">
                    <div class="card-title">Autre statistique</div>
                    <div class="percentage">45%</div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

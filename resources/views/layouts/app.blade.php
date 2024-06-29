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
            height: 300px; /* Hauteur augmentée de la bannière */
            overflow: hidden; /* Cacher le contenu dépassant la bannière */
        }
        /* Styles pour l'image de la bannière */
        .banner img {
            opacity: 0.35;
            width: 100%; /* Largeur de l'image à 100% de la largeur du conteneur */
            height: 300px; /* Hauteur fixe de l'image */
            object-fit: cover; /* Ajuster l'image sans la déformer */
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Espace catégorie</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('administrateurs.login') }}">Espace Perso</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bannière principale -->
    <div class="banner">
        <img src="{{('images/image4.jpeg') }}" alt="ICI PHOTO">
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











{{-- <!DOCTYPE html>
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
            height: 300px; /* Hauteur augmentée de la bannière */
            overflow: hidden; /* Cacher le contenu dépassant la bannière */
        }
        /* Styles pour l'image de la bannière */
        .banner img {
            
            background-image: url( <img src="{{ asset('images/image4.jpeg') }}" alt="Logo">);
            opacity: 35%;
            width: 100%; /* Largeur de l'image à 100% de la largeur du conteneur */
            height: 300px; /* Hauteur fixe de l'image */
            /* object-fit: cover; Ajuster l'image sans la déformer */
        object-fit: unset;
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Espace catégorie</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('administrateurs.dashboard') }}">Espace Perso</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bannière principale -->
    <div class="banner">
        <img src="images/image2.jpg" alt="ICI PHOTO">
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
</html> --}}

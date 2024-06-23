
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boîte à Idées - Mairie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background: #2c3e50;
            color: white;
            padding: 10px 0;
            /* Permet à l'entête de prendre toute la largeur */
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000; /* Assure que l'entête est au-dessus de tout */
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        header nav {
            margin-top: 10px;
            /* Centrer les éléments du menu */
            display: flex;
            justify-content: center;
        }
        header nav a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background 0.3s;
        }
        header nav a:hover {
            background: #34495e;
        }
        .banner {
            position: relative;
            text-align: center;
            color: white;
            background: url('images/image2.jpg') no-repeat center center/cover;
            padding: 250px 20px;
            /* Assurer que la bannière ne soit pas masquée par l'entête */
            margin-top: 60px; /* Ajuster en fonction de la hauteur de l'entête */
            z-index: 0; /* Mettre la bannière derrière le contenu principal */
        }
        .banner h1 {
            font-size: 2.5rem;
            margin: 0;
        }
        .banner p {
            font-size: 1.25rem;
            margin-top: 10px;
        }
        .content {
            padding: 20px;
            background-color: #f8f9fa; /* Couleur de fond pour le contenu */
            margin-top: -17px; /* Pour s'assurer que le contenu commence après la bannière */
            position: relative;
            z-index: 1; /* Assurer que le contenu est au-dessus de la bannière */
        }
        .footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <header>
            <div class="container">
                <div class="logo">Boîte à Idées</div>
                <nav>
                    <a href="{{ route('idees.index') }}">Espace pour tous</a>
                    <a href="{{ route('administrateurs.login') }}">Espace Perso</a>
                </nav>
            </div>
        </header>
    </nav>

    <div class="banner">
        <h1>Bienvenue sur la Boîte à Idées de la Commune</h1>
        <p>Partagez vos idées et contribuez à l'amélioration de notre communauté.</p>
    </div>

    <div class="container mt-4">
        <div class="content">
            @yield('content')
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Mairie de [Lougre thioly]. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>



















{{-- 



 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boîte à Idées - Mairie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <header>
            <div class="container">
                <div class="logo">Boîte à Idées</div>
                <nav>
                    <a href="#">Accueil</a>
                    <a href="#">Espace Perso</a>
                    <a href="#">Espace pour Tous</a>
                </nav>
            </div>
        </header>
    </nav>
        <div class="banner">
            <img src="images/image2.jpg" alt="ICI PHOTO">
            <h1>Bienvenue sur la Boîte à Idées de la Commune</h1>
            <p>Partagez vos idées et contribuez à l'amélioration de notre communauté.</p>
        </div>
   
    <div class="container mt-4">
        @yield('content')
    </div>
    <footer>
    </div>
</div>
<div class="footer">
    <p>&copy; 2024 Mairie de [Lougre thioly]. Tous droits réservés.</p>
</div>
    </footer>
</body>
</html>  --}}

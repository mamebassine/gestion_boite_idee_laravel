
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boîte à Idées</title>
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
</html>  

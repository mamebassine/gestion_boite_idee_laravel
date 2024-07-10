{{-- @extends('layouts.app') --}}

<style>
    .btn-primary {
        background-color: #D5EEC6; /* Couleur de fond du bouton */
        border: none;
        color: #fff; /* Couleur du texte du bouton */
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        width: auto;
    }

    .btn-primary:hover {
        background-color: #C5DEB6; /* Couleur de fond du bouton au survol */
    }

    .container {
        
        max-width: 600px; /* Limite la largeur du conteneur */
        margin: 0 auto; /* Centre le conteneur */
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ajoute une ombre au conteneur */
        border-radius: 8px; /* Arrondit les coins du conteneur */
        background-color: #f9f9f9; /* Couleur de fond du conteneur */
        display: flex;
        align-items: center; /* Centre verticalement le contenu */
        justify-content: center; /* Centre horizontalement le contenu */
        text-align: left; /* Aligne le texte à gauche */
    }

    .form-group {
        margin-bottom: 20px; /* Ajoute de l'espace entre les éléments du formulaire */
    }

    .form-control {
        width: 100%; /* Augmente la taille du input */
        padding: 10px 20px; /* Ajoute du padding au input */
        border-radius: 4px; /* Arrondit les coins du input */
        border: 1px solid #ccc; /* Ajoute une bordure au input */
    }

    h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #555;
    }
.image-container {
            flex: 1;
            background-image: url("{{ asset('images/image2.jpg') }}");
            background-size: cover;
            background-position: center;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
</style>

<div class="container">
    <div class="image-container"></div>
    {{-- <img src="images/image4.jpeg" alt="Image de catégorie" style="width: 100px; height: 100px;"> --}}
    <div>
        <h1>Créer une nouvelle catégorie</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="libelle">Libellé de la catégorie</label>
                <input type="text" name="libelle" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>

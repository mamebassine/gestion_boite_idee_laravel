{{-- @extends('layouts.app')

@section('content') --}}
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier le Commentaire pour : {{ $idee->libelle }}</div>
                <div class="card-body">
                    <form action="{{ route('idees.commentaires.update', [$idee->id, $commentaire->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nom_complet_auteur">Nom complet :</label>
                            <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}" required>
                        </div>
                        <div class="form-group">
                            <label for="libelle">Commentaire :</label>
                            <textarea class="form-control" id="libelle" name="libelle" required>{{ $commentaire->libelle }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" >Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}

{{-- @extends('layouts.app') --}}

<style>
    .btn-primary {
        background-color: #D5EEC6; /* Couleur de fond du bouton */
        border: none;
        color: #000; /* Couleur du texte du bouton */
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #C5DEB6; /* Couleur de fond du bouton au survol */
    }
</style>

<div class="container">
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

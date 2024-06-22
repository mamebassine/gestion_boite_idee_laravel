{{-- @extends('layouts.app') --}}

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


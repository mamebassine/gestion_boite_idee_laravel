{{-- @extends('layouts.app') --}}
<div class="container">
    <h1>Modifier la catégorie</h1>
    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="libelle">Libellé de la catégorie</label>
            <input type="text" name="libelle" class="form-control" value="{{ $categorie->libelle }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>


{{-- @extends('layouts.app') --}}


<div class="container">
    <h1>Modifier l'idée</h1>
    <form action="{{ route('idees.update', $idee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="libelle">Nom de l'idée</label>
            <input type="text" name="libelle" class="form-control" value="{{ $idee->libelle }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $idee->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ $idee->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>


{{-- @extends('layouts.app') --}}
<div class="container">
    <h1>Liste des catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
    <table class="table">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->libelle }}</td>
                <td>
                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


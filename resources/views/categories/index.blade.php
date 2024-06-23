@extends('layouts.app')

@section('content')
<style>
    /* Styles CSS pour la mise en page */
    .container {
        margin-top: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        border: 1px solid #dee2e6;
        padding: 8px;
        text-align: center;
    }

    .table th {
        background-color: #f8f9fa; /* Couleur de fond pour les en-têtes */
    }

    .table td {
        vertical-align: middle;
    }

    /* Style pour le bouton "Modifier" */
    .btn-modifier {
        background-color: #007bff; /* Couleur de fond bleue */
        color: #fff; /* Texte blanc */
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
        text-decoration: none;
    }

    .btn-modifier:hover {
        background-color: #0056b3; /* Variation de couleur au survol */
        color: #fff;
        text-decoration: none;
    }

    .btn-action {
        margin-right: 5px;
    }
</style>

<div class="container">
    <h1>Liste des catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Libellé</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->libelle }}</td>
                <td>
                    <!-- Utilisation du style CSS pour le bouton "Modifier" -->
                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-modifier btn-sm btn-action">Modifier</a>
                    <!-- Formulaire pour supprimer une catégorie -->
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


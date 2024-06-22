{{-- @extends('layouts.app') --}}


<div class="container">
    <h1>Liste des idées</h1>
    <a href="{{ route('idees.create') }}" class="btn btn-primary">Ajouter une idée</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de création</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($idees as $idee)
            <tr>
                <td>{{ $idee->libelle }}</td>
                <td>{{ Str::limit($idee->description, 50) }}</td>
                <td>{{ $idee->created_at->format('d/m/Y') }}</td>
                <td>{{ $idee->status }}</td>
                <td>
                    <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('idees.edit', $idee->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('idees.destroy', $idee->id) }}" method="POST" style="display:inline-block;">
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


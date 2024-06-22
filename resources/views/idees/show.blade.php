{{-- @extends('layouts.app') --}}


<div class="container">
    <h1>{{ $idee->libelle }}</h1>
    <p>{{ $idee->description }}</p>
    <p>Catégorie : {{ $idee->categorie->libelle }}</p>
    <p>Nom de l'auteur : {{ $idee->auteur_nom_complet }}</p>
    <p>Email de l'auteur : {{ $idee->auteur_email }}</p>
    <p>Date de création : {{ $idee->created_at->format('d/m/Y') }}</p>
    <p>Statut : {{ $idee->status }}</p>
    <a href="{{ route('idees.index') }}" class="btn btn-secondary">Retour</a>
</div>


{{-- Pour commentaires --}}

{{-- @extends('layouts.app') --}}

{{-- <div class="container">
    <h2>{{ $idee->libelle }}</h2>
    <p>{{ $idee->description }}</p>

    <h3>Commentaires</h3>
    @foreach ($idee->commentaires as $commentaire)
        <div class="commentaire">
            <p>{{ $commentaire->nom_complet_auteur }} : {{ $commentaire->libelle }}</p>
            @if (Auth::check() && Auth::user()->isAdmin())
                <a href="{{ route('idees.commentaires.edit', [$idee->id, $commentaire->id]) }}">Modifier</a>
                <form action="{{ route('idees.commentaires.destroy', [$idee->id, $commentaire->id]) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            @endif
        </div>
    @endforeach

    <h3>Ajouter un Commentaire</h3>
    @include('commentaires._form', ['idee' => $idee])
</div> --}}


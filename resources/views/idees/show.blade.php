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


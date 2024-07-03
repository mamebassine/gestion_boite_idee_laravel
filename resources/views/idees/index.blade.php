@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">La liste des idées</h2> {{-- Titre de la page avec une marge en haut et en bas --}}
    <a href="{{ route('idees.create') }}" class="btn btn-primary mb-3" style="background-color: #A3C2A2; border-color: #A3C2A2;">Ajouter une idée</a> {{-- Bouton pour ajouter une nouvelle idée, avec style personnalisé --}}

    <div class="row">
        @foreach($idees as $idee)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm"> {{-- Retrait de la classe h-100, pour ajuster la taille de la carte dynamiquement --}}
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $idee->libelle }}</h5>
                    <p class="card-text">{{ Str::limit($idee->description, 50) }}</p>
                    <p class="card-text"><small class="text-muted">{{ $idee->created_at->format('d/m/Y') }}</small></p>
                    <div class="mt-auto text-center">
                        <a href="{{ route('idees.show', $idee->id) }}" class="btn btn-info btn-sm btn-custom">Voir détail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .btn-custom {
        background-color: #B7D7B3;
        border-color: #B7D7B3;
        color: #fff;
    }

    .btn-custom:hover {
        background-color: #A3C2A2;
        border-color: #A3C2A2;
    }

    .card {
        /* Ajoutez ici vos styles personnalisés pour les cartes si nécessaire */
        border-radius: 8px; /* Arrondi les coins des cartes */
        border: 1px solid #ddd; /* Ajoute une bordure fine autour des cartes */
    }

    .card-title {
        font-size: 1.25rem; /* Taille du titre de la carte */
        margin-bottom: 0.5rem; /* Marge inférieure du titre */
    }

    .card-text {
        font-size: 0.875rem; /* Taille du texte de la carte */
    }
</style>

@endsection

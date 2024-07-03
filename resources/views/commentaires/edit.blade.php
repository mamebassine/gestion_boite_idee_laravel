{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier le Commentaire pour : {{ $idee->libelle }}</div>
                <div class="card-body">
                    <form action="{{ route('idees.commentaires.update', [$idee->id, $commentaire->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nom_complet_auteur">Nom complet :</label>
                            <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" value="{{ $commentaire->nom_complet_auteur }}" required>
                        </div>
                        <div class="form-group">
                            <label for="libelle">Commentaire :</label>
                            <textarea class="form-control" id="libelle" name="libelle" required>{{ $commentaire->libelle }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}

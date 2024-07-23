





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-custom text-black">Modifier le Commentaire pour : {{ $idee->libelle }}</div>
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
                        <button type="submit" class="btn-submit">Mettre à jour</button> {{-- Bouton de soumission avec style personnalisé --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 160px;
        align-items: center; /* Centre verticalement le contenu */
            justify-content: center; /* Centre horizontalement le contenu */


            margin-left: 25%;
            
        
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .col-md-8, .col-md-4 {
        padding: 10px;
        box-sizing: border-box;
    }

    .col-md-8 {
        flex: 0 0 66.6667%;
    }

    .col-md-4 {
        flex: 0 0 33.3333%;
    }

    .card {
        border: 1px solid #B7D7B3;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        background-color: #fff;
    }

    .card-header {
        background-color: #B7D7B3;
        padding: 15px;
        font-weight: bold;
        border-bottom: 1px solid #B7D7B3;
    }

    .card-body {
        padding: 15px;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }

    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
    }

    .table-borderless th, .table-borderless td, .table-borderless thead th, .table-borderless tbody + tbody {
        border: 0;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-submit, .btn-modify, .btn-delete {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        border: 1px solid transparent;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-submit, .btn-modify {
        background-color: #B7D7B3;
        border-color: #B7D7B3;
        color: #fff;
    }

    .btn-delete {
        background-color: #dc3545;;
        border-color: #dc3545;;
        color: #fff;
        margin-top: 12%;
    }
.d-flex {
        display: flex;
        align-items: center;
    }

    .d-flex .btn-modify {
        margin-right: 23px;
    }

    .commentaire {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        background-color: #f8f9fa;
    }

    .mb-3 {
        margin-bottom: 15px;
    }
</style>

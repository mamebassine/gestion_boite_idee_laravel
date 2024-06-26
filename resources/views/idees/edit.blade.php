<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'idée</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
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
                <label for="auteur_nom_complet">Auteur nom complet</label>
                <input type="text" name="auteur_nom_complet" class="form-control" value="{{ $idee->auteur_nom_complet }}" required>
            </div>
            <div class="form-group">
                <label for="auteur_email">Auteur email</label>
                <input type="email" name="auteur_email" class="form-control" value="{{ $idee->auteur_email }}" required>
            </div>
            <div class="form-group">
                <label for="date_creation">Date de création</label>
                <input type="text" name="date_creation" class="form-control" value="{{ $idee->date_creation }}" required>
            </div>
            <div class="form-group">
                <label for="status">Statut</label>
                <select name="status" id="status" class="form-control">
                    <option value="en attente" {{ $idee->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                    <option value="approuvée" {{ $idee->status == 'approuvée' ? 'selected' : '' }}>Approuvée</option>
                    <option value="refusée" {{ $idee->status == 'refusée' ? 'selected' : '' }}>Refusée</option>
                </select>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

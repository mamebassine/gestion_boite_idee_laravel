<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle idée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            display: flex;
            background-color: #ffffff;
            padding: 18px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        

           
        }
        .image-container {
            flex: 1;
            background-image: url("{{ asset('images/image4.jpeg') }}");
            background-size: cover;
            background-position: center;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            
        }
.form-container {
            flex: 1;
            padding: 18px;
        }
        .form-container h1 {
            margin-bottom: 20px;
        }
        .form-container .form-group {
            margin-bottom: 15px;
        }
        .form-container .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container .form-group input,
        .form-container .form-group textarea,
        .form-container .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #B7D7B3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #e1ebe0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container"></div>
        <div class="form-container">
            <h1 class="text-center">Créer une nouvelle idée</h1>
            <form action="{{ route('idees.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="libelle">Nom de l'idée</label>
                    <input type="text" name="libelle" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categorie_id">Catégorie</label>
                    <select name="categorie_id" class="form-control" required>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="auteur_nom_complet">Nom complet de l'auteur</label>
                    <input type="text" name="auteur_nom_complet" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="auteur_email">Email de l'auteur</label>
                    <input type="email" name="auteur_email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date_creation">Date de création</label>
                    <input type="date" name="date_creation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

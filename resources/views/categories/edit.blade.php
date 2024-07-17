<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        /* Styles CSS pour centrer le formulaire */
        body{
            height: 100%;
            background-color: #C5DEB6; 
        }
    
        .container {
            display: flex;
            justify-content: center; /* Centre horizontalement */
            align-items: center; /* Centre verticalement */
            height: 100%; /* Hauteur de la vue */
            
        }
    
        .form-container {
            background-color: #fff; /* Couleur de fond du formulaire */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
            width: 22%; /* Largeur du formulaire */
        }
    
        .form-container h1 {
            margin-bottom: 20px;
        }
    
        .form-group {
            margin-bottom: 20px;
        }
    
        label {
            font-weight: bold;
        }
    
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
    
        button[type="submit"] {
            background-color: #D5EEC6; /* Couleur de fond bleue */
            color: #fff; /* Texte blanc */
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    
        
    </style>
</head>
<body>
   <div class="container">
    <div class="form-container">
        <h1>Modifier la catégorie</h1>
        <!-- resources/views/categories/edit.blade.php -->
        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="libelle">Libellé:</label>
                <input type="text" name="libelle" value="{{ old('libelle', $categorie->libelle) }}">
                @error('libelle')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Mettre à jour</button>
        </form>

    </div>
</div>
</body>
</html>
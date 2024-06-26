
<style>
    /* Styles CSS pour centrer le formulaire */
    body, html {
        height: 100%;
        margin: 0;
    }

    .container {
        display: flex;
        justify-content: center; /* Centre horizontalement */
        align-items: center; /* Centre verticalement */
        height: 100%; /* Hauteur de la vue */
        background-color: #f8f9fa; /* Couleur de fond de la page */
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
        background-color: #007bff; /* Couleur de fond bleue */
        color: #fff; /* Texte blanc */
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3; /* Variation de couleur au survol */
    }
</style>

<div class="container">
    <div class="form-container">
        <h1>Modifier la catégorie</h1>
        <!-- resources/views/categories/edit.blade.php -->
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="libelle">Libellé:</label>
                <input type="text" name="libelle" value="{{ old('libelle', $category->libelle) }}">
                @error('libelle')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Mettre à jour</button>
        </form>

    </div>
</div>

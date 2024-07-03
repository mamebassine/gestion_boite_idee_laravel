<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }
        .image-container {
            flex: 1;
            background-image: url('https://via.placeholder.com/400');
            background-size: cover;
            background-position: center;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        .form-container {
            flex: 1;
            padding: 20px;
        }
        .form-container h1 {
            margin-bottom: 20px;
        }
        .form-container form div {
            margin-bottom: 15px;
        }
        .form-container form label {
            display: block;
            margin-bottom: 5px;
        }
        .form-container form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-container form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container form button:hover {
            background-color: #0056b3;
        }
        .form-container p {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container"></div>
        <div class="form-container">
            <h1 class="text-center">Connexion</h1>
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf
                @method('POST')
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="mot_passe" name="password" required>
                </div>
                <button type="submit">Connexion</button>
                <p>Vous n'avez pas de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

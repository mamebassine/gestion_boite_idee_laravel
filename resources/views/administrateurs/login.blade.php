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

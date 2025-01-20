<section class ="Inscription">

    <div class="left-section">
        <h2>Connexion</h2>
        <form method="POST" action="index.php?action=Inscription">

                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" minlength="3" maxlength="320" required>

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" minlength="12" maxlength="72" required>

                <input type="submit" value="S'inscrire">
        </form>
        <p class="login-or-inscription-link">Pas de compte ? <a href="index.php?action=showInscription">Inscrivez-vous</a></p>
    </div>

    <div class="right-section">
        <img src="images/librarybook.png" alt="Image d'une armoire remplie de livres">
    </div>

</section>
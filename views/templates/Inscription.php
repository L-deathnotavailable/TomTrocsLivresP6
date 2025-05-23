<section class ="Inscription">

    <div class="left-section">
        <h2>Inscription</h2>
        <form method="POST" action="index.php?action=inscription">
                <label for="username">Pseudo</label>
                <input type="text" id="username" name="username">

                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email">

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">

                <input type="submit" value="S'inscrire">
        </form>
        <p class="login-or-inscription-link">Déjà inscrit ? <a href="index.php?action=showConnexion">Connectez-vous</a></p>
    </div>

    <div class="right-section">
        <img src="images/librarybook.png" alt="Image d'une armoire remplie de livres">
    </div>

</section>
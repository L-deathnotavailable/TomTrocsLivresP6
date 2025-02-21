<section class="user-account">
    <h2>Mon compte</h2>
        <div class="account">
            <div class="left-section">
                <div class="user-account-details">
                    <div class="user-informations">
                        <div class="user-informations-image">
                            <img src="images/darwin-vegher.jpg" alt="image_défaut">
                            <form method="POST" action="#"  enctype="">
                                <input type="file" name="imageToUpload" id="imageToUpload" style="display: none;">
                                <a href="#" id="new-user-image-link">modifier</a>
                                <input type="submit" id="submit-new-image" style="display: none;" >
                            </form>
                        </div>
                        <div class="user-informations-details">
                            <p class="user-informations-username">Nathalire</p>
                            <p class="user-informations-seniority">Membre depuis 2020</p>
                            <p class="user-informations-library">BIBLIOTHÈQUE</p>
                            <p class="user-informations-nb-book">Nbre livres</p> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-section">
                <div class="user-update-form">
                    <form method="POST" action="">
                        <p>Vos informations personnelles</p>
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" minlength="3" maxlength="320" required value="example@gmail.com">

                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" minlength="12" maxlength="72" required>

                        <label for="username">Pseudo</label>
                        <input type="text" id="username" name="username" minlength="3" maxlength="32" required value="TATATA">

                        <input type="submit" value="Enregistrer" >
                    </form>
                </div>
            </div>
        </div>
        <div class="user-library tab-active">
            <table>
                <thead>
                    <tr>
                        <th>PHOTO</th>
                        <th>TITRE</th>
                        <th>AUTEUR</th>
                        <th>DESCRIPTION</th>
                        <th>DISPONIBILITÉ</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="user-library-details-image"><img src="Books/images/EstherBook.png" alt="Titre du livre"></th>
                        <th class="user-library-details-title">Titre du livre</th>
                        <th class="user-library-details-author">Auteur</th>
                        <th class="user-library-details-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</th>
                        <th class="user-library-details-available"><div class="available">disponible</div></th>
                        <th class="user-library-details-actions"><a class="action-edit" href="#">Éditer</a> <a class="action-delete" href="#">Supprimer</a></th>
                    </tr>
                    <tr class="light">
                        <th class="user-library-details-image"><img src="Books/images/MilkAndHoney.png" alt="Titre du livre"></th>
                        <th class="user-library-details-title">Titre du livre 2</th>
                        <th class="user-library-details-author">Auteur 2</th>
                        <th class="user-library-details-description">Suspendisse potenti. Nulla facilisi...</th>
                        <th class="user-library-details-available"><div class="not-available">non dispo.</div></th>
                        <th class="user-library-details-actions"><a class="action-edit" href="#">Éditer</a> <a class="action-delete" href="#">Supprimer</a></th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="user-library card-active">
            <div class="user-library-details-card">
                <div class="user-library-details-card-top">
                    <img src="book_image.jpg" alt="Titre du livre">
                    <div class="user-library-details-card-top-text">
                        <div class="user-library-details-title">Titre du livre</div>
                        <div class="user-library-details-author">Auteur</div>
                        <div class="available">disponible</div>
                    </div>
                </div>

                <div class="user-library-details-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
                <div class="user-library-details-actions">
                    <a class="action-edit" href="#">Éditer</a> <a class="action-delete" href="#">Supprimer</a>
                </div>
            </div>

            <div class="user-library-details-card">
                <div class="user-library-details-card-top">
                    <img src="book_image.jpg" alt="Titre du livre 2">
                    <div class="user-library-details-card-top-text">
                        <div class="user-library-details-title">Titre du livre 2</div>
                        <div class="user-library-details-author">Auteur 2</div>
                        <div class="not-available">non disponible</div>
                    </div>
                </div>

                <div class="user-library-details-description">Suspendisse potenti. Nulla facilisi...</div>
                <div class="user-library-details-actions">
                    <a class="action-edit" href="#">Éditer</a> <a class="action-delete" href="#">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="user-account">
    <h2>Mon compte</h2>
        <div class="account">
            <div class="left-section">
                <div class="user-account-details">
                    <div class="user-informations">
                        <div class="user-informations-image">
                            <img src="Userimages/<?= $user->getAccountPicture() ?: 'default.png' ?>" alt="image utilisateur">
                            <form method="POST" action="index.php?action=updateUserImage" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?= $user->getId() ?>">
                                <input type="file" name="imageToUpload" id="imageToUpload" accept="image/*" style="display: none;">
                                <a href="#" id="new-user-image-link">modifier</a>
                                <input type="submit" id="submit-new-image" style="display: none;">
                            </form>
                        </div>
                        <div class="user-informations-details">
                            <p class="user-informations-username"><?= htmlspecialchars($user->getUsername()) ?></p>
                            <p class="user-informations-seniority">
                                <?php
                                    $now = new DateTime();
                                    $creationDate = $user->getCreationDate();
                                    $diff = $creationDate->diff($now);

                                    if ($diff->y >= 1) {
                                        $years = $diff->y;
                                        echo "Membre depuis $years " . ($years === 1 ? "an" : "ans");
                                    } else {
                                        $months = $diff->m;
                                        echo "Membre depuis $months " . ($months === 1 ? "mois" : "mois");
                                    }
                                ?>
                            </p>
                            <p class="user-informations-library">BIBLIOTHÈQUE</p>
                            <div class="number-Books">
                                <img src="images/library.svg" width="10.41" height="13.71" alt="livre" style="vertical-align: middle; margin-right: 5px;">
                                <p class="user-informations-nb-book"><?= count($books) ?> livre(s)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="right-section">
                <div class="user-update-form">
                    <form method="POST" action="index.php?action=updateUser">
                        <p>Vos informations personnelles</p>

                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" minlength="3" maxlength="320" required 
                            value="<?= htmlspecialchars($user->getEmail()) ?>">

                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" minlength="12" maxlength="72" 
                            placeholder="•••••••••" autocomplete="new-password">

                        <label for="username">Pseudo</label>
                        <input type="text" id="username" name="username" minlength="3" maxlength="32" required 
                            value="<?= htmlspecialchars($user->getUsername()) ?>">

                        <input type="submit" value="Enregistrer">
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
                    <?php foreach ($books as $index => $book): ?>
                        <tr class="<?= $index % 2 === 1 ? 'light' : '' ?>">
                            <th class="user-library-details-image">
                                <img src="Books/images/<?= htmlspecialchars($book->getImage()) ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>">
                            </th>
                            <th class="user-library-details-title"><?= htmlspecialchars($book->getTitle()) ?></th>
                            <th class="user-library-details-author"><?= htmlspecialchars($book->getAuthor()) ?></th>
                            <th class="user-library-details-description"><?= htmlspecialchars($book->getShortDescription() ?? 'Pas de description.') ?></th>
                            <th class="user-library-details-available">
                                <div class="<?= $book->getAvailable() ? 'available' : 'not-available' ?>">
                                    <?= $book->getAvailable() ? 'disponible' : 'non dispo.' ?>
                                </div>
                            </th>
                            <th class="user-library-details-actions">
                                <a class="action-edit" href="index.php?action=editBook&id=<?= $book->getId() ?>">Éditer</a>
                                <a class="action-delete" href="index.php?action=deleteBook&id=<?= $book->getId() ?>">Supprimer</a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</section>
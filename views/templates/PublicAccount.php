<section class="PublicUser-account">
    <div class="PublicAccount">
        <div class="left-section">
            <div class="user-account-details">
                <div class="user-informations">
                    <div class="user-informations-image">
                        <img src="Userimages/<?= $user->getAccountPicture() ?: 'default.png' ?>" alt="image utilisateur">
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
                        <div class="send-message">
                            <a href="index.php?action=showChat&receiverId=<?= htmlspecialchars($user->getId()) ?>" class="btn-send-message">Écrire un message</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="public-user-library">
        <table>
            <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

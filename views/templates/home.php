<section class="join-readers">
    <div class="left-section">
        <h1 class="content-title">Rejoignez nos lecteurs passionnés</h1>
        <p class="content-text">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la
            lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
        <a class="green-button" href="index.php?action=showBooks">Découvrir</a>
    </div>
    <div class="right-section">
        <img class="content-img" src="images/hamza-nouasria.jpg" alt="Photo d'Hamza Nousaria">
        <p class="content-autor">Hamza
    </div>
</section>
<section class="homepage">
    <section class="last-added-books">
        <h2>Les derniers livres ajoutés</h2>

        <div class="cards-container">

            <?php /**@var Book $book */
            foreach ($books as $book): ?>
                <div class="book-card">
                    <a href="index.php?action=showSingleBook&id=<?= $book->getId() ?>">
                        <img src="books/images/<?= htmlspecialchars($book->getImage()) ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>">
                        <div class="text-card">
                            <p class="title-book-card"><?= htmlspecialchars($book->getTitle()) ?></p>
                            <p class="author-book-card"><?= htmlspecialchars($book->getAuthor()) ?></p>
                            <p class="seller-book-card">Vendu par : <?= htmlspecialchars($book->getSellerName()) ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            
        </div>
        <a href="index.php?action=showBooks" class="green-button">Voir tous les livres</a>
    </section>

    <section class="how-it-work">
        <h2>Comment ça marche ?</h2>
        <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>

        <div class="cards-container">
            <div class="how-it-work-card">
                <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
            </div>
            <div class="how-it-work-card">
                <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
            </div>
            <div class="how-it-work-card">
                <p>Parcourez les livres disponibles chez d'autres membres.</p>
            </div>
            <div class="how-it-work-card">
                <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
            </div>
        </div>
        <a href="index.php?action=showBooks" class="green-button transparent">Voir tous les livres</a>
    </section>

    <section class="our-values">
        <img src="images/darwin-vegher.png" alt="Femme devant une mur de livres" class="information__banner">

        <div class="our-values-text-container">
            <h2>Nos valeurs</h2>
            <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. 
            Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. 
            Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.<br><br>
            Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.<br><br>
            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, 
            de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.<br><br></p>
            <p class="our-values-tomtroc">L’équipe Tom Troc</p>
        </div>

        <img class="our-values-coeur" src="images/coeur.svg" alt="coeur vert">
    </section>
</section>
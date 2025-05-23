<section class="last-added-books">
    <div class="header-exchanges">
        <h2>Nos livres à l'échange</h2>

        <div class="search-container">
            <form method="POST" action="index.php?action=searchBooks">
                <label for="search"></label>
                <span><i class="fas fa-search"></i><input type="search" id="search" name="search" minlength="3" maxlength="144" placeholder="Rechercher un livre" onkeyup="searchBooks()"></span>
            </form>
        </div>
    </div>
    <div class="cards-container">
        <?php foreach ($books as $book): ?>
            <div class="book-card">
                <a href="index.php?action=showSingleBook&id=<?= htmlspecialchars($book['id']) ?>">
                    <img src="books/images/<?= htmlspecialchars($book['image']) ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                    <div class="text-card">
                        <p class="title-book-card"><?= htmlspecialchars($book['title']) ?></p>
                        <p class="author-book-card"><?= htmlspecialchars($book['author']) ?></p>
                        <p class="seller-book-card">Vendu par : <?= htmlspecialchars($book['username']) ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="#" class="green-button">Voir tous les livres</a>
</section>
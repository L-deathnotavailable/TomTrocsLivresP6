<div class = "edit-book-title">
    <a href="index.php?action=showMyAccount" class="back-link">
        <i class="fas fa-arrow-left"></i>
        <p class="back-user-account grey-text">retour</p>
    </a>
    <h2>Modifier les informations</h2>
</div>

<section class="edit-book">
    <div class="edit-book-container">
        <div class="book-photo">
            <p class="grey-text">Photo</p>
            <img src="Books/images/<?= htmlspecialchars($book->getImage()) ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>">
            <input type="file" name="book_image" id="book_image" accept="image/*">
            <label for="book_image">Modifier la photo</label>
        </div>
        <div class="book-details">
            <form method="POST" action="index.php?action=updateBook" enctype="multipart/form-data">
                <input type="hidden" name="book_id" value="<?= $book->getId() ?>">

                <label for="title">Titre</label>
                <input type="text" id="title grey-text" name="title" value="<?= htmlspecialchars($book->getTitle()) ?>" required>

                <label for="author">Auteur</label>
                <input type="text" id="author" name="author" value="<?= htmlspecialchars($book->getAuthor()) ?>" required>

                <label for="description">Commentaire</label>
                <textarea id="description" name="description" required><?= htmlspecialchars($book->getDescription()) ?></textarea>

                <label for="availability">Disponibilité</label>
                <select id="availability" name="availability" required>
                    <option value="1" <?= $book->getAvailable() ? 'selected' : '' ?>>Disponible</option>
                    <option value="0" <?= !$book->getAvailable() ? 'selected' : '' ?>>Non disponible</option>
                </select>

                <input type="submit" value="Valider">
            </form>
        </div>
    </div>
</section>

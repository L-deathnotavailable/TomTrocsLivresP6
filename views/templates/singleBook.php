<?php /**@var Book $book */ ?>
<section class="SingleBook_details">

    <div class="book-details-illustration">
        <img src="books/images/<?php echo $book->getImage(); ?>" alt="<?php echo $book->getTitle(); ?>">
    </div>

    <div class="book-details-text">
        <div class="header-book-details-text">
            <h2 class="book-details-title"><?php echo $book->getTitle(); ?></h2>
            <p class="book-details-author">par <?php echo $book->getAuthor(); ?></p>
            <div class="book-details-separator">___</div>
        </div>

        <div class="book-details-description">
            <p class="book-details-subtitle">DESCRIPTION</p>
            <p class="book-details-description-text"><?php echo $book->getDescription(); ?></p>
        </div>

        <div class="book-details-owner">
            <p class="book-details-subtitle">PROPRIÉTAIRE</p>
            <a class="book-details-owner-photo" href="#">
                <img src="UserImages/<?= $user->getAccountPicture()?>" alt="User image">
                <p><?php echo $book->getSellerName(); ?></p>
            </a>
        </div>
        <details class="book-details-contact">
            <summary><div class="green-button">Envoyer un message</div></summary>
        </details>
    </div>
</section>
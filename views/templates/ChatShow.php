<div class="ChatShow">
    <div class="left-section">
        <?php if (isset($lastMessages)) {
            ?>
            <div class="messages-last">
                <h2 class="messages-title">Messagerie</h2>
                <?php
                /** @var Message[] $lastMessages */
                foreach ($lastMessages as $message) {
                    $id = $userId === $message->getIdSender() ? $message->getIdRecipient() : $message->getIdSender();
                    $isActive = ($id == $receiverId) ? 'active' : '';
                    ?>
                    <a href="index.php?action=showChat&receiverId=<?php echo $id ?>" class="conversation-link <?php echo $isActive; ?>">
                        <div class="bloc">
                            <div class="user-image"><img src="UserImages/<?php echo $message->getUserImage(); ?>" alt="Photo de profil" class="user-image"></div>
                            <div class="bloc-name-date">
                                <div class="user-name"><?php echo $message->getUsername() ?></div>
                                <div class="message-date"><?php echo $message->getListDateString() ?></div>
                            </div>
                        </div>    
                        <div class="message-content"><?php echo mb_strimwidth($message->getContent(), 0, 30, "..."); ?></div>
                    </a>

                <?php } ?>

            </div>
        <?php } ?>
    </div>
    <div class="right-section">
        <?php if (isset($contact)) { ?>
            <div class="chat-header">
                <div class="receiver-image">
                    <img src="UserImages/<?php echo htmlspecialchars($contact['account_picture']); ?>" alt="Photo de profil" class="user-image">
                </div>
                <div class="receiver-username">
                    <h3><?php echo htmlspecialchars($contact['username']); ?></h3>
                </div>
            </div>
        <?php } ?>

        <?php if (isset($messages)) { ?>
            <div class="messages-wrapper">
                <?php
                /** @var Message[] $messages */
                foreach ($messages as $message) {
                    $class = $userId === $message->getIdSender() ? "message-to-user" : "message-from-user";
                    ?>
                    <div class="heure <?= $class ?>">
                        <div class="user-little-image"><img src="UserImages/<?php echo $message->getUserImage(); ?>" alt="Photo de profil" class="user-image"></div>
                        <?php echo $message->getCreationDate() ? $message->getCreationDateString("d.m H:i") : 'Non lu'; ?>
                    </div>
                    <div class="<?= $class ?>"><?php echo $message->getContent() ?></div>
                <?php } ?>
            
                <?php if (isset($receiverId) && $receiverId > 0) { ?>
                    <form action="index.php?action=sendMessage&receiverId=<?php echo $receiverId ?>" method="POST">
                        <input type="text" name="message" placeholder="Tapez votre message ici" id="message">
                        <input type="submit" value="Envoyer" id="submit">
                    </form>
                <?php } else { ?>
                    <div class="no-conversation">
                        <p>Parcours nos livres pour échanger avec d'autres utilisateurs fans de livres comme toi.</p>
                        <a href="index.php?action=showBooks" class="green-button">Découvrir les livres à l'échange</a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
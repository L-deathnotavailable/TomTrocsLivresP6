<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <nav>
        <!-- logo TomTroc à mettre ici  -->
        <a href="index.php?action=home" class="navbar-link"><img src="images/logo.svg"alt="Logo officiel de TomTroc" class=""></a>
        <div class ="HomeExgangeBook">
            <a href="index.php?action=home">Accueil</a>
            <a href="index.php?action=showBooks">Nos livres à l'échange</a>
        </div>
        <div class ="MessageAccountConnex"></div>
            <?php $unreadCount = $_SESSION['unreadCount'] ?? 0; ?>
            <a href="index.php?action=showChat">Messagerie<?php if ($unreadCount > 0): ?><span class="unread-badge"><?= $unreadCount ?></span><?php endif; ?></a>            
            <a href="index.php?action=showMyAccount">Mon compte</a>
            <?php 
                // Si on est connecté, on affiche le bouton de déconnexion, sinon, on affiche le bouton de connexion : 
                if (isset($_SESSION['user'])) {
                    echo '<a href="index.php?action=disconnectUser">Déconnexion</a>';
                } else {
                    echo '<a href="index.php?action=showConnexion">Connexion</a>';
                }
            ?>
        </div>
    </nav>
</header>


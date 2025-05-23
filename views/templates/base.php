<?php 
/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.  
 * 
 * Les variables qui doivent impérativement être définie sont : 
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page. 
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tom Troc - <?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="images/icone.ico">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/InscriptionAndConnexion.css">
    <link rel="stylesheet" href="./css/MyAccount.css">
    <link rel="stylesheet" href="./css/SingleBook.css">
    <link rel="stylesheet" href="./css/Chat.css">
    <link rel="stylesheet" href="./css/PublicAccount.css">
    <link rel="stylesheet" href="./css/EditBook.css">
    <link rel="stylesheet" href="./css/TradeBooks.css">
    <script src="/js/userAccount.js"></script>
</head>

<body>
    <?php include ('header.php');?>
    <main>    
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error">
                <?php echo $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); // Supprimer le message après affichage ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="success">
                <?php echo $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); // Supprimer le message après affichage ?>
            </div>
        <?php endif; ?>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>
    
    <?php include ('footer.php');?>

</body>
</html>
<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    // Pour chaque action, on appelle le bon contrôleur et la bonne méthode.
    switch ($action) {
        // Pages accessibles à tous.

        case 'home':
            $homeController = new HomeController();
            $homeController->showHome();
        break;

        // Books part

        case 'showBooks': 
            $booksController = new BooksController();
            $booksController->showBooks();
        break;

        case 'showSingleBook': 
            $booksController = new BooksController();
            $booksController->showSingleBook();
        break;

        // User part

        case 'showInscription': 
            $userController = new UserController();
            $userController->showInscription();
        break;

        case 'inscription':
            $userController = new UserController();
            $userController->inscription();
        break;

        case 'showConnexion': 
            $userController = new UserController();
            $userController->showConnexion();
        break;

        case 'Connexion':
            $userController = new UserController();
            $userController->Connexion();
        break;

        case 'disconnectUser':
            $adminController = new UserController();
            $adminController->disconnectUser();
        break;

        //Account part

        case 'showMyAccount': 
            $userController = new UserController();
            $userController->showMyAccount();
        break;

        case 'searchBooks':
            $bookController = new BooksController();
            $bookController->searchBooks();
        break;
        
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}

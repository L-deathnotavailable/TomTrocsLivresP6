<?php

class UserController {
    public function showInscription() {
        $view = new View('Inscription');
        $view->render('Inscription');
    }
    public function inscription(): void
    {
        $formData = [
            'username' => strip_tags(Utils::request('username')),
            'email' => strip_tags(Utils::request('email')),
            'password' => strip_tags(Utils::request('password')),
        ];

        // Vérification des doublons avec username et email
        $userManager = new UserManager();
        if ($userManager->userExists($formData['username'], $formData['email'])) {
            // Stocker le message d'erreur dans une variable de session
            $_SESSION['error'] = 'Un utilisateur avec ce nom d\'utilisateur ou cet email existe déjà.';
            Utils::redirect('showInscription');
            return;
        }

        $password = password_hash($formData['password'], PASSWORD_DEFAULT);

        $user = new User([
            'username' => htmlspecialchars($formData['username']),
            'email' => htmlspecialchars($formData['email']),
            'password' => $password,
            'creation_date' => new DateTime(),
        ]);

        $userManager = new UserManager();
        $userManager->addUser($user);

        // Stocker le message de succès dans une variable de session
        $_SESSION['success'] = 'Compte créé avec succès.';
        Utils::redirect('showConnexion');
    }
    public function showConnexion() {
        $view = new View('Connexion');
        $view->render('Connexion');
    }

    /**
     * Connexion de l'utilisateur.
     * @return void
     */
    public function Connexion() : void 
    {
        // On récupère les données du formulaire.
        $email = Utils::request("email");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 1");
        }

        // On vérifie que l'utilisateur existe.
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        // On vérifie que le mot de passe est correct.
        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Le mot de passe est incorrect : $hash");
        }

        // On connecte l'utilisateur.
        $_SESSION['user'] = $user;
        $_SESSION['idUser'] = $user->getId();

        // Stocker le message de succès dans une variable de session
        $_SESSION['success'] = 'Connexion effectuée avec succès.';
        // On redirige vers la page d'administration.
        Utils::redirect("showConnexion");
    }

    /**
     * Déconnexion de l'utilisateur.
     * @return void
     */
    public function disconnectUser() : void 
    {
        if (isset($_SESSION['user'])) {
            // On déconnecte l'utilisateur.
            unset($_SESSION['user']);
        }
        // On redirige vers la page d'accueil.
        Utils::redirect("home");
    }

    public function showMyAccount() {
        if (!isset($_SESSION['idUser'])) {
            Utils::redirect('showConnexion');
            return;
        }
    
        $userId = $_SESSION['idUser'];
    
        $userManager = new UserManager();
        $bookManager = new BookManager();
    
        $user = $userManager->getUserById($userId);
        $books = $bookManager->getBooksByUser($userId);
    
        $view = new View('myAccount');
        $view->render('myAccount', [
            'user' => $user,
            'books' => $books
        ]);
    }
}

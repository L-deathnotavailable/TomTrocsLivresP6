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
    public function showMyAccount() {
        $view = new View('myAccount');
        $view->render('myAccount');
    }
}

<?php

class UserController {
    public function showInscription() {
        $view = new View('Inscription');
        $view->render('Inscription');
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

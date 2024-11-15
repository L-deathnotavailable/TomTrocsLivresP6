<?php

class HomeController {
    public function showHome() {
        $view = new View('Accueil');
        $view->render('home');
    }
}
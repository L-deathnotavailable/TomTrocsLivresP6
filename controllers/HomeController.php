<?php

class HomeController {
    public function showHome() {

        $BookManager = new BookManager();
        $books = $BookManager->getFourBooksWithSeller();

        $view = new View('Accueil');
        $view->render('home',['books' => $books]);
    }
}
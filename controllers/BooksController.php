<?php

class BooksController {
    public function showBooks() {
        $view = new View('Exchanges Books');
        $view->render('Books');
    }
}
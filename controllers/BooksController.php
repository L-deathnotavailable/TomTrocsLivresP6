<?php

class BooksController {
    public function showBooks() {
        $view = new View('Exchanges Books');
        $view->render('Books');
    }
    public function showSingleBook() {
        $view = new View('Single Book');
        $view->render('singleBook');
    }
}

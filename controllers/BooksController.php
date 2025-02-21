<?php

class BooksController {
    public function showBooks() {
        $view = new View('Exchanges Books');
        $view->render('Books');
    }
    public function showSingleBook() {

        $id = Utils::request("id", -1);
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("Le bouquin demandé n'existe pas.");
        }

        $view = new View($book -> getTitle());
        $view->render('singleBook', ['book' => $book]);
    }
}

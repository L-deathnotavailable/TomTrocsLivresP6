<?php

class BooksController {
    public function showBooks() {
        $bookManager = new BookManager();
        $books = $bookManager->getLastBooks(8); // Récupérer les 8 derniers livres

        $view = new View("Nos livres à l'échange");
        $view->render('Books', ['books' => $books]); 
        
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
    public function searchBooks(){
        $bookManager = new BookManager();
        if (!isset($_POST['search']) || empty($_POST['search'])) {
            $books = $bookManager->getLastBooks(8);
        }
        $query = trim($_POST['search']);
        $books = $bookManager->searchBooks($query);

        $view = new View("Nos livres à l'échange");
        $view->render('Books', ['books' => $books]); 
    }
}

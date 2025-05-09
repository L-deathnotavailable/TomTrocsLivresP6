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
    private function checkIfUserIsConnected(): ?int
    {
        if (!isset($_SESSION['user'])) {
            Utils::redirect("showConnexion");
        }
        return $_SESSION['idUser'];
    }
    /**
     * Suppression d'un livre.
     * @return void
     */
    public function deleteBook() : void
    {
        $this->checkIfUserIsConnected();

        $id = Utils::request("id", -1);

        // On supprime le livre
        $BookManager = new BookManager();
        $BookManager->deleteBook($id);
       
        Utils::redirect("showMyAccount");
    }

    public function showEditBook() {
        $bookId = Utils::request('id');
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);

        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }

        $view = new View('EditBook');
        $view->render('EditBook', ['book' => $book]);
    }

    public function updateBook() {
        $bookId = Utils::request('book_id');
        $title = Utils::request('title');
        $author = Utils::request('author');
        $description = Utils::request('description');
        $availability = Utils::request('availability');
        $bookManager = new BookManager();

        // Vérification du fichier téléchargé
        if (isset($_FILES['book_image']) && $_FILES['book_image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = 'Books/images/';
            $targetFile = $targetDir . basename($_FILES['book_image']['name']);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['book_image']['tmp_name']);
            if ($check !== false) {
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($imageFileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES['book_image']['tmp_name'], $targetFile)) {
                        $image = basename($_FILES['book_image']['name']);
                    } else {
                        $_SESSION['error'] = 'Désolé, il y a eu une erreur lors du téléchargement de votre fichier.';
                        Utils::redirect('showEditBook&id=' . $bookId);
                        return;
                    }
                } else {
                    $_SESSION['error'] = 'Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.';
                    Utils::redirect('showEditBook&id=' . $bookId);
                    return;
                }
            } else {
                $_SESSION['error'] = 'Le fichier n\'est pas une image.';
                Utils::redirect('showEditBook&id=' . $bookId);
                return;
            }
        }

        $bookManager->updateBook($bookId, $title, $author, $description, $availability, $image ?? null);
        $_SESSION['success'] = 'Livre mis à jour avec succès.';
        Utils::redirect('showMyAccount');
    }

}

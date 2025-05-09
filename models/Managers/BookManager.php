<?php
class BookManager extends AbstractEntityManager 
{
    /**
     * Récupère tous les articles avec leur nombre de vues, de commentaires et la date de publication.
     * @return array : un tableau d'objets Article avec stats.
     */

    public function getFourBooksWithSeller (){
        
        $sql = "SELECT books.*, users.username AS seller_name FROM books 
                JOIN users ON books.seller_id = users.id 
                ORDER BY books.creation_date DESC 
                LIMIT 4";

        $result = $this->db->query($sql);
        $articles = [];

        while ($article = $result->fetch()) {
            $articles[] = new Book($article);
        }
        return $articles;
    }

    public function getBookById($id) {
        $sql = "SELECT books.*, users.username AS seller_name, users.account_picture FROM `books` JOIN users ON books.seller_id = users.id  WHERE books.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            $return =  new Book($book); 
            $return ->setAccountPicture($book['account_picture']);
            return $return;
        }
        return null;
    }

    public function getLastBooks(int $limit): array {
        $limit = intval($limit);

        $sql = "SELECT books.id, books.title, books.author, books.image, users.username 
                FROM books 
                JOIN users ON books.seller_id = users.id 
                ORDER BY books.creation_date DESC 
                LIMIT $limit";

        $result = $this->db->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchBooks(string $query): array {
        $query = "%".addslashes($query)."%"; // Ajout des % pour la recherche partielle + sécurisation

        $sql = "SELECT books.id, books.title, books.author, books.image, users.username
                FROM books
                JOIN users ON books.seller_id = users.id
                WHERE books.title LIKE '$query' 
                OR books.author LIKE '$query' 
                OR users.username LIKE '$query'
                ORDER BY books.creation_date DESC";

        $result = $this->db->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBooksByUser(int $userId): array {
        $sql = "SELECT * FROM books WHERE seller_id = :userId ORDER BY creation_date DESC";
        $result = $this->db->query($sql, ['userId' => $userId]);
    
        $books = [];
        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
    
        return $books;
    }
    public function deleteBook(int $id) : void
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    public function updateBook(int $id, string $title, string $author, string $description, int $availability, ?string $image): void {
        $sql = "UPDATE books SET title = :title, author = :author, description = :description, available = :availability";
        if ($image) {
            $sql .= ", image = :image";
        }
        $sql .= " WHERE id = :id";

        $params = [
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'availability' => $availability,
            'id' => $id
        ];

        if ($image) {
            $params['image'] = $image;
        }

        $this->db->query($sql, $params);
    }
}
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
        $sql = "SELECT books.*, users.username AS seller_name FROM `books` JOIN users ON books.seller_id = users.id  WHERE books.id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }
}
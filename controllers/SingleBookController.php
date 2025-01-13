<?php

class SingleBookController {
    public function showSingleBook() {
        $view = new View('Single Book');
        $view->render('singleBook');
    }
}
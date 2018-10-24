<?php

class Posts {

    private $db;

    private $postQ = "SELECT p.id, p.title, p.picture, p.date, p.content, p.author_id, u.name FROM posts AS p, users AS u WHERE p.author_id = u.id AND p.id = ?";
    private $postsQ = "SELECT p.id, p.title, p.picture, p.date, p.content, p.author_id, u.name FROM posts AS p, users AS u WHERE p.author_id = u.id ORDER BY date DESC LIMIT ?, ?";
    private $createPostQ = "INSERT INTO posts (id, title, picture, date, content, author_id) VALUES (NULL, ?, ?, NOW(), ?, ?)";

    function __construct() {
        $this->db = new Database();
    }

    function getPost($id) {
        $this->db->query($this->postQ);
        $this->db->bind("i", $id);
        return $this->db->singleResult();
    }

    /*function getPostByUser($userID) {

    }*/

    function getPosts($start = 0, $count = 3) {
        $this->db->query($this->postsQ);
        $this->db->bind("ii", $start, $count);
        return $this->db->allResults();
    }

    function createPost($title, $picture, $content, $author_id) {
        $this->db->query($this->createPostQ);
        $this->db->bind("sssi", $title, $picture, $content, $author_id);
        $this->db->execute();
        return $this->db->getInsertID();
    }

}

?>
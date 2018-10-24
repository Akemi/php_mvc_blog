<?php

class Comments {

    private $db;

    private $commentsQ = "SELECT id, name, url, content, date FROM comments WHERE post_id = ?";
    private $commentsCountsQ = "SELECT COUNT(ID) as count FROM comments WHERE post_id = ?";
    private $createCommentQ = "INSERT INTO comments (id, name, url, content, date, post_id) VALUES (NULL, ?, ?, ?, NOW(), ?)";
    private $deleteCommentQ = "DELETE FROM comments WHERE id = ?";

    function __construct() {
        $this->db = new Database();
    }

    /*function getComment($id) {

    }*/

    function getComments($post_id) {
        $this->db->query($this->commentsQ);
        $this->db->bind("i", $post_id);
        return $this->db->allResults();
    }

    function commentsCounts($post_id) {
        $this->db->query($this->commentsCountsQ);
        $this->db->bind("i", $post_id);
        return $this->db->singleResult()['count'];
    }

    function createComment($name, $url, $content, $post_id) {
        $this->db->query($this->createCommentQ);
        $this->db->bind("sssi", $name, $url, $content, $post_id);
        $this->db->execute();
        return $this->db->getInsertID();
    }

    function deleteComment($id) {
        $this->db->query($this->deleteCommentQ);
        $this->db->bind("i", $id);
        $this->db->execute();
    }

}

?>
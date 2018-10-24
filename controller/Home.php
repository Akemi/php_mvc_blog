<?php

class Home {

    private $postsModel;
    private $commentsModel;


    function __construct() {
        $this->postsModel = new Posts();
        $this->commentsModel = new Comments();
    }

    function posts() {
        $posts = $this->postsModel->getPosts();

        foreach($posts as &$post) {
            $post['comments'] = $this->commentsModel->commentsCounts($post['id']);
        }

        return $posts;
    }

    function pageCount() {

    }

}

?>
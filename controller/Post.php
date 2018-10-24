<?php

class Post {

    private $postsModel;
    private $commentsModel;


    function __construct() {
        $this->postsModel = new Posts();
        $this->commentsModel = new Comments();
    }

    function post($id) {
        $post = $this->postsModel->getPost($id);

        if(!empty($post)) {
            $post['comments'] = $this->commentsModel->getComments($id);
        }

        return $post;
    }

    function addComment($name, $url, $content, $post_id) {
        $this->commentsModel->createComment($name, $url, $content, $post_id);
    }

    function onLoad() {
        echo "onload";
        echo isset($_POST['deleteComment']) ? "true" : "false";
        echo isset($_POST['comment_id']) ? "true" : "false";
        if(isset($_POST['createComment'])) {
            $name = $_POST['name'];
            $url = isset($_POST['createComment']) ? $_POST['url'] : "";
            $text = $_POST['text'];

            $this->addComment($name, $url, $text, $_GET["id"]);
        } if(isset($_POST['deleteComment'])) {
            $id = $_POST['comment_id'];
            $this->commentsModel->deleteComment($id);
            echo $id;
        }

    }

}

?>
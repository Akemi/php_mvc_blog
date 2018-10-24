<?php

include "../header.php";

$id = empty($_GET["id"]) ? -1 : $_GET["id"];
$post = new Post();
?>

<?php if($id === -1) : ?>
    <div class="post">No Post available</div>
<?php elseif(empty($post->post($id))) : ?>
    <div class="post">No Post available</div>
<?php else: ?>

<?php
$post->onLoad();
$postContent = $post->post($id);
?>

<div class="post">
    <h1><?php echo $postContent['title']; ?></h1>
    <a href="<?php echo $postContent['author_id']; ?>"><?php echo $postContent['name']; ?></a> - <?php echo $postContent['date']; ?><br>
    <img src="<?php echo $postContent['picture']; ?>"><br>
    <?php echo $postContent['content'] ?><br>
</div>

<script>
function submitForm(name) {
    if(confirm('Are you sure you want to delete that comment?')) {
        document.getElementById(name).submit();
    }
}

</script>

<ul class="posts">
<?php foreach($postContent['comments'] as $comment) : ?>
    <li>
        <?php echo $comment['name']." - ".$comment['date'].": ".$comment['content']; ?>
        <a href="#" onclick="submitForm('com_<?php echo $comment['id']; ?>');">[X]</a>
        <form method="post" class="hidden_form" id="com_<?php echo $comment['id']; ?>"><input type="text" name="comment_id" value="<?php echo $comment['id']; ?>"><input type="text" name="deleteComment"></form>
    </li>
<?php endforeach; ?>
</ul>

<?php endif; ?>

<div class="post">
    <form method="post">
        Name: <input type="text" name="name" required><br>
        URL: <input type="text" name="url"><br>
        Text: <br><textarea rows="4" cols="50" name="text" required></textarea><br>
        <input type="submit" name="createComment">
    </form>
</div>

<?php
include "../footer.php";
?>
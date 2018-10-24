<?php

include "../header.php";

$home = new Home()
?>

<ul class="posts">
<?php foreach($home->posts() as $post) : ?>


    <li>
        <h1><a href="/blog/views/posts/?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h1>
        <a href="<?php echo $post['author_id']; ?>"><?php echo $post['name']; ?></a> - <?php echo $post['date']; ?><br>
        <img src="<?php echo $post['picture']; ?>"><br>
        <?php echo strlen($post['content']) > 200 ? substr($post['content'],0,200)."..." : $post['content'] ?><br>
        Comments: <a href="<?php echo $post['id']; ?>"><?php echo $post['comments']; ?></a>
    </li>


<?php endforeach; ?>
</ul>


<?php
include "../footer.php";
?>

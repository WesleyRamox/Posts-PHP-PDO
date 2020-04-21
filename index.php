<?php
    require 'Utils/functions.php';

    $posts = search_posts(0);
?>
    <?php include 'Layout/header.php'; ?>

    <h1 style="margin: 20px;">POSTS</h1>
    <?php foreach($posts as $post) { ?>
        <div class="card" style="width: 18rem; margin: 10px;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post['title']; ?></h5>
                <p class="card-text"><?php echo $post['description']; ?></p>
                Tag: <span class="badge badge-primary"><?php echo strtoupper($post['tag']); ?></span>
            </div>
        </div>
    <?php } ?>

    <a href="Pages/new_post.php" class="btn btn-primary" style="margin: 10px;">Add new Post</a>

    <?php include 'Layout/footer.php'; ?>

<?php
    require '../Utils/functions.php';

    // var_dump($_SERVER);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['title'])) {
            $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        } else {
            $title = '';
        }

        if(isset($_POST['description'])) {
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
        } else {
            $description = '';
        }

        if(isset($_POST['tag'])) {
            $tag = htmlspecialchars($_POST['tag'], ENT_QUOTES);
        } else {
            $tag = '';
        }
    }

    if(isset($_POST['send'])) {
        create_posts($title, $description, $tag);

        header('location: ../index.php');
    }
?>

<?php include '../Layout/header.php'; ?>

<form action="new_post.php" method="POST">
    <div class="container-md" style="margin-top: 70px;">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="description-text">Description</label>
            <textarea class="form-control" id="description-text" rows="3" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="tag-input">Tag</label>
            <input type="text" class="form-control" id="tag-input" name="tag">
        </div>

        <input type="submit" name="send" class="btn btn-primary" value="Adicionar">
    </div>
</form>

<?php include '../Layout/footer.php'; ?>

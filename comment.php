<h4>Comments</h4>

<div class="comment-container">

    <div class="comment-input">
        <form action="./includes/comment.inc.php?projid=<?php echo $project_id?>" method="post">
            <textarea name="content" type="text" placeholder="Add a comment..."></textarea>
            <br>
            <input type="hidden" name="taskidcomment" value="<?= $taskId ?>" />
            <?php
                if($_GET['error'] === 'emptycomment') {
                    echo "<p style=color:red>Comment cannot be empty</p>";
                }
            ?>
            <button type="submit" name="submit">Comment</button>
        </form>
    </div>

    <?php
    include_once 'includes/displaycomment.inc.php';
    ?>



</div>
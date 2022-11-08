

<h4>Comments</h4>

<div class="comment-conatiner">
    
    <div class="comment-input">
        <form action="includes/comment.inc.php" method="post">
        <textarea name="content" type="text" placeholder="Add a comment..."></textarea>
        <br>
        <button type="submit" name="submit">comment</button>
        </form>
    </div>

    <?php
    include_once 'includes/displaycomment.inc.php';
    ?>

    

</div>
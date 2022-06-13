<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            <?php echo $data->theme ?>
        </h1>
        <div class="card-img zoomed-image">
            <img src="../../assets/blogImages/<?php echo $data->imageLink ?>" onerror="this.src=&#39;../../assets/placeholderImage.png&#39;">
        </div>

        <div class="card card-text m-2">
            <?php echo $data->content ?>
        </div>

        <p class=""><small class="text-muted"><?php echo $data->date ?></small></p>

        <div id="CommentariesId">
            <p>Комментарии:</p>
            <?php foreach ($additionalData as $comment) {
                echo '  <div class="card mb-3">';
                echo '      <div class="card-title">' . $comment->authorName . '</div>';
                echo '      <div class="card-text">' . $comment->content . '</div>';
                echo '  </div>';
            } ?>
        </div>
    </div>
</div>
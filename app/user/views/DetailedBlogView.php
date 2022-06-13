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

        <!-- Button trigger modal -->
        <?php if (isset($_SESSION['user'])) {
            echo '  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">';
            echo '      Оставить комментарий';
            echo '  </button>';
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="AddComment" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class=" form-group mb-3">
                                <label for="ContentId">Введите комментарий</label>
                                <input id="ContentId" type="text" class="form-control" placeholder="Ваш комментарий" name="content">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Отправить" data-toggle="">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="CommentariesId">
            <p>Комментарии:</p>
            <?php foreach ($additionalData as $comment) {
                echo '  <div class="card mb-3">';
                echo '      <div class="card-title">' . $comment->authorName . '</div>';
                echo '      <div class="card-text">' . $comment->content . '</div>';
                echo '  </div>';
            } ?>
        </div>

        <script>
            $("#AddComment").submit(async function(event) {
                event.preventDefault();
                var contentInput = $("#ContentId");
                let response = await fetch('/Blog/sendComment', {
                    method: 'POST',
                    body: JSON.stringify({
                        content: contentInput.val(),
                        blogId: "<?php echo $data->id; ?>"
                    })
                });

                if (response.ok) {
                    let jsonData = await response.json();
                    console.log(jsonData);
                    if (jsonData['content'] != '') {
                        $('#CommentariesId').append('<div class="card mb-3"><div class="card-title">' + jsonData['authorName'] +
                            '</div><div class="card-text">' + jsonData['content'] +
                            '</div></div>');
                        console.log($('#exampleModalCenter'));
                        $('#exampleModalCenter').modal('hide');
                    }
                }
            });
        </script>
    </div>
</div>
<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Блог
        </h1>

        <?php
        $records = $data->getRecords(3);
        foreach ($records as $value) {
            echo '<div class="card mb-3">';
            if (trim($value->imageLink)) {
                echo '  <div  class="card-img zoomed-image">';
                echo '  <img src="../' . $data->directory . $value->imageLink . '"  onerror="this.src=&#39;../../assets/placeholderImage.png&#39;">';
                echo '</div>';
            }
            echo '  <div class="card-body">';
            echo '      <h5 class="card-title">' . $value->theme . '</h5>';
            echo '      <p class="card-text">' . $value->content . '</p>';
            echo '      <p class="card-text d-flex justify-content-between"><small class="text-muted">' . $value->date . '</small>';
            echo '      <img style="width:20px;" src="../assets/icons/Chat.png" onclick="location=\'/Blog/detailedBlog?id=' . ($value->id) . '\'" />';
            echo '      </p>';
            echo '  </div>';
            echo '</div>';
        } ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item<?php if ($data->currentPage - 1 < 0) echo ' disabled'; ?>">
                    <a class="page-link" type="button" tabindex="-1" onclick="<?php echo '"location=\'/Blog/index?pageNumber=' . ($data->currentPage - 1) . '\''; ?>">Предыдущая</a>
                </li>
                <?php
                for ($i = 0; $i <= $data->size; $i++) {
                    if ($i == $data->currentPage) {
                        echo '<li class="page-item  active" aria-current="page">';
                    } else {
                        echo '<li class="page-item" aria-current="page">';
                    }
                    echo '<a class="page-link" type="button" onclick="location=\'/Blog/index?pageNumber=' . $i . '\'">' . ($i + 1) . '</a></li>';
                } ?>
                <li class="page-item<?php if ($data->currentPage + 1 > $data->size) echo ' disabled'; ?>">
                    <a class="page-link" type="button" onclick="<?php echo '"location=\'/Blog/index?pageNumber=' . ($data->currentPage + 1) . '\''; ?>">Следующая</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
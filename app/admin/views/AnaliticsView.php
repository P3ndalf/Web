<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Посещаемость
        </h1>
        <?php

        $analitics = $data->getAnalitics(3);
        foreach ($analitics as $value) {
            echo '<div class="card mb-3">';
            echo '  <div class="card-body" style="font-size: 10px;">';
            echo '      <p class="card-text">Login: ' . $value->userName . '</p>';
            echo '      <p class="card-text">IP: ' . $value->ip . '</p>';
            echo '      <p class="card-text">Host: ' . $value->host . '</p>';
            echo '      <p class="card-text">Browser: ' . $value->browser . '</p>';
            echo '      <p class="card-text">Page: ' . $value->controller . '</p>';
            echo '      <p class="card-text"><small class="text-muted">' . $value->date . '</small></p>';
            echo '  </div>';
            echo '</div>';
        }
        ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item<?php if ($data->currentPage - 1 < 0) echo ' disabled'; ?>">
                    <a class="page-link" type="button" onclick="location='/Analitics/index?pageNumber=<?php echo $data->currentPage - 1 ?>'">Предыдущая</a>
                </li>
                <?php
                for ($i = 0; $i <= $data->size; $i++) {
                    if ($i == $data->currentPage) {
                        echo '<li class="page-item  active" aria-current="page">';
                    } else {
                        echo '<li class="page-item" aria-current="page">';
                    }
                    echo '<a class="page-link" type="button" onclick="location=\'/Analitics/index?pageNumber=' . $i . '\'">' . ($i + 1) . '</a></li>';
                } ?>
                <li class="page-item<?php if ($data->currentPage + 1 > $data->size) echo ' disabled'; ?>">
                    <a class="page-link" type="button" onclick="location='/Analitics/index?pageNumber=<?php echo $data->currentPage + 1 ?>'">Следующая</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
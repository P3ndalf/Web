<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Блог
        </h1>

        <?php
        $records = $data->getRecords(3);
        foreach ($records as $value) :
            echo '<div id="Blog' . $value->id . '" class="card mb-3">';
            if (trim($value->imageLink)) {
                echo '  <div  class="card-img zoomed-image">';
                echo '  <img src="../' . $data->directory . $value->imageLink . '"  onerror="this.src=&#39;../../assets/placeholderImage.png&#39;">';
                echo '</div>';
            }
            echo '  <div class="card-body">';
            echo '      <h5 id="Blog' . $value->id . 'Theme" class="card-title">' . $value->theme . '</h5>';
            echo '      <p id="Blog' . $value->id . 'Content"  class="card-text">' . $value->content . '</p>';
            echo '      <p class="card-text d-flex justify-content-between"><small class="text-muted">' . $value->date . '</small>';
            echo '      <img style="width:20px;" src="../assets/icons/Settings.png" data-toggle="modal" data-target="#exampleModalCenter' . ($value->id) . '" type="button" />';
            echo '      <img style="width:20px;" src="../assets/icons/Chat.png" onclick="location=\'/Blog/detailedBlog?id=' . ($value->id) . '\'" />';
            echo '      </p>';
            echo '  </div>';
            echo '</div>';
            echo '<div class="modal fade" id="exampleModalCenter' . $value->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">';
            echo '    <div class="modal-dialog modal-dialog-centered" role="document">';
            echo '        <div class="modal-content">';
            echo '            <form id="EditBlog" method="post" enctype="multipart/form-data">';
            echo '                <div class="modal-body">';
            echo '                        <input type="hidden" class="form-control" id="blogId" name="blog" value="' . $value->id . '">';
            echo '                        <input type="hidden" class="form-control" id="blogImageLinkId" name="blogImageLink" value="' . $value->imageLink . '">';
            echo '                    <div class="mb-3">';
            echo '                        <label for="blogThemeId">Введите тему блога</label>';
            echo '                        <input type="text" class="form-control" id="blogThemeId" name="blogTheme" placeholder="Придумайте интересную тему для блога" value="' . $value->theme . '">';
            echo '                    </div>';
            echo '                    <div class="mb-3">';
            echo '                        <label for="blogContent">Текст блога</label>';
            echo '                        <textarea class="form-control" placeholder="Укажите здесь все, о чем вы хотите поделиться с читателями" rows="5" name="blogContent">' . $value->content . '</textarea>';
            echo '                    </div>';
            echo '                </div>';
            echo '                <div class="modal-footer">';
            echo '                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>';
            echo '                    <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Отправить">';
            echo '                </div>';
            echo '            </form>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>'; ?>

            <script>
                function buildXmlFromForm(form) {
                    var xml = $('<XMLDocument />');
                    xml.append(
                        $('<data-section />').append(
                            $('<id />').text(form.find("input[name='blog']").val())
                        ).append(
                            $('<imageLink />').text(form.find("input[name='blogImageLink']").val())
                        ).append(
                            $('<theme />').text(form.find("input[name='blogTheme']").val())
                        ).append(
                            $('<content />').text(form.find("textarea[name='blogContent']").val())
                        )
                    );

                    return xml.html();
                }

                $("#exampleModalCenter<?php echo $value->id ?>").submit(function(event) {
                    event.preventDefault();
                    var xmlString = buildXmlFromForm($(this));

                    $.ajax({
                        type: "POST",
                        url: '/Blog/editBlog',
                        data: xmlString,
                        success: function(respData) {
                            console.log(respData);
                            if (respData && respData.replace(/\s/g, '').length !== 0) {
                                var result = JSON.parse(respData);
                                console.log('#Blog<?php echo $value->id ?>Theme');
                                $('#Blog<?php echo $value->id ?>Theme').html(result["theme"]);
                                $('#Blog<?php echo $value->id ?>Content').html(result["content"]);
                                $('exampleModalCenter<?php echo $value->id ?>').modal('hide');
                            }
                        }
                    });
                });
            </script>

        <?php endforeach; ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item<?php if ($data->currentPage - 1 < 0) echo ' disabled'; ?>">
                    <a class="page-link" type="button" tabindex="-1" onclick="location='/Blog/index?pageNumber=<?php echo $data->currentPage - 1 ?>'">Предыдущая</a>
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
                    <a class="page-link" type="button" onclick="location='/Blog/index?pageNumber=<?php echo $data->currentPage + 1 ?>'">Следующая</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="main-center justify-content-center">
    <div class="container-md">
        <h3>Гостевая книга</h3>
        <hr>
        <form method="post">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nameId">Введите имя</label>
                    <input type="text" class="form-control" id="nameId" name="name" value="<?php echo $data->fields['name'] ?>" placeholder="Ваше имя">
                    <?php echo $data->validator->errMessages['name'] ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastNameId">Введите фамилию</label>
                    <input type="text" class="form-control" id="lastNameId" name="lastName" value="<?php echo $data->fields['lastName'] ?>" placeholder="Ваша фамилия">
                    <?php echo $data->validator->errMessages['lastName'] ?>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col">
                    <label for="inputEmailId">Введите почтовый адрес</label>
                    <input class="form-control" id="inputEmailId" name="email" placeholder="Ваш email" value="<?php echo $data->fields['email'] ?>">
                    <?php echo $data->validator->errMessages['email'] ?>
                </div>
            </div>

            <div class="form-group">
                <div for="commentId" class="mb-1">Ваш отзыв:</div>
                <textarea class="form-control" placeholder="Ваш отзыв необычайно важен для нас" rows="5" id="commentId" name="comment"><?php echo $data->fields['comment'] ?></textarea>
                <?php echo $data->validator->errMessages['comment'] ?>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Отправить">
                <button class="btn btn-outline-danger  mr-3" type="reset" value="reset">Очистить форму</button>
            </div>
        </form>

        <form enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="uploadedFileId">Загрузите файл с отзывами</label>
                <input type="file" name="uploadedFile" class="form-control-file" id="uploadedFileId">
            </div>
            <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Загрузить">
        </form>

        <hr>

        <?php
        for ($i = 0; $i < sizeof($data->commentaries); $i++) {
                echo '<div class="card">';
                echo '    <div class="card-body">';
                echo '        <h5 class="card-title">' . $data->commentaries[$i]['name'] . ' ' . $data->commentaries[$i]['lastName'] . '</h5>';
                echo '        <h6 class="card-subtitle mb-2 text-muted">' . $data->commentaries[$i]['email'] . '</h6>';
                echo '        <div class="card-text" style="font-size: 20px;">' . $data->commentaries[$i]['comment'] . '</div>';
                echo '        <p class="card-text"><small class="text-muted">' . $data->commentaries[$i]['date'] . '</small> </p>';
                echo '    </div>';
                echo '</div>';
        }
        ?>

    </div>
</div>
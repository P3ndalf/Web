<div class="main-center justify-content-center">
    <div class="container-lg">
        <h1 class="text-center mb-3">
            Создание блога
        </h1>

        <form method="post">

            <div class="mb-3">
                <label for="blogThemeId">Введите тему блога</label>
                <input type="text" class="form-control" id="blogThemeId" name="blogTheme" value="<?php echo $data->fields['blogTheme'] ?>" placeholder="Придумайте интересную тему для блога">
                <?php echo $data->validator->errMessages['blogTheme'] ?>
            </div>

            <div class="mb-3">
                <label for="blogImage">Выберите картинку</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Картинка</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="blogImage">
                        <label class="custom-file-label" for="inputGroupFile01">Выберите подходящую запоминающуюся картинку</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="blogContent">Текст блога</label>
                <textarea class="form-control" placeholder="Укажите здесь все, о чем вы хотите поделиться с читателями" rows="5" name="blogContent"><?php echo $data->fields['blogContent'] ?></textarea>
                <?php echo $data->validator->errMessages['blogContent'] ?>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Отправить">
                <button class="btn btn-outline-danger" type="button" value="reset">Очистить форму</button>
            </div>

        </form>
    </div>
</div>
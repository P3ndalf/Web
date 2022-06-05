<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Вход
        </h1>
        <form  method="post">
            <div class="form-group mb-3">
                <label for="inputNameId">Введите имя</label>
                <input type="text" class="form-control" value="<?php echo $data->fields['name'] ?>" placeholder="Ваше имя" name="name">
                <?php echo $data->validator->errMessages['name'] ?>
            </div>
            <div class="form-group mb-3">
                <label for="inputPasswordId">Введите пароль</label>
                <input type="text" class="form-control" value="<?php echo $data->fields['password'] ?>" placeholder="Ваш пароль" name="password">
                <?php echo $data->validator->errMessages['password'] ?>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Войти">
                <button class="btn btn-outline-danger" type="reset" value="reset">Очистить форму</button>
            </div>
        </form>
    </div>
</div>
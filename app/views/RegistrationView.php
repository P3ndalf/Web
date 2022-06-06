<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Регистрация
        </h1>
        <a href="/Login/login">Переход на авторизацию</a>
        <form method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="NameId">Введите имя</label>
                    <input type="text" class="form-control" value="<?php echo $data->fields["name"] ?>" placeholder="Ваше имя" name="name">
                    <?php echo $data->validator->errMessages['name'] ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="LastNameId">Введите фамилию</label>
                    <input type="text" class="form-control" value="<?php echo $data->fields['lastName'] ?>" placeholder="Ваша фамилия" name="lastName">
                    <?php echo $data->validator->errMessages['lastName'] ?>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="inputEmailId">Введите почтовый адрес</label>
                <input type="email" class="form-control" value="<?php echo $data->fields['email'] ?>" placeholder="Ваш email" name="email">
                <?php echo $data->validator->errMessages['email'] ?>
            </div>
            <div class="form-group mb-3">
                <label for="inputPasswordId">Введите пароль</label>
                <input type="text" class="form-control" value="<?php echo $data->fields['password'] ?>" placeholder="Ваш пароль" name="password">
                <?php echo $data->validator->errMessages['password'] ?>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Зарегестрироваться">
                <button class="btn btn-outline-danger" type="reset" value="reset">Очистить форму</button>
            </div>
        </form>
    </div>
</div>
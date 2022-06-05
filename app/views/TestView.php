<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>

<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Тест
        </h1>
        <h3>Дисциплина: Основы электротехники и электронники</h3>
        <hr>
        <form method="post">
            <div>
                <div class="form-group">
                    <div class="mb-1">1) Что из списка изображено на картинке.</div>
                    <img src="../../assets/L.jpg" alt="А картинки-то, нет" width="400" height="300" class="border">
                    <div class="custom-radio">
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answ1" name="qstn1" value="likvidity" <?php if (isset($data->fields['qstn1']) && ($data->fields['qstn1'] == "likvidity")) echo "checked"; ?>>
                            <label class="custom-control-label" for="answ1">Катушка ликвидности</label>
                        </div>
                        <div class="custom-control ">
                            <input type="radio" class="custom-control-input" id="answ2" name="qstn1" value="effectivity" <?php if (isset($data->fields['qstn1']) && ($data->fields['qstn1'] == "effectivity")) echo "checked"; ?>>
                            <label class="custom-control-label" for="answ2">Катушка эффективности</label>
                        </div>
                        <div class="custom-control ">
                            <input type="radio" class="custom-control-input" id="answ3" name="qstn1" value="inductivity" <?php if (isset($data->fields['qstn1']) && ($data->fields['qstn1'] == "inductivity")) echo "checked"; ?>>
                            <label class="custom-control-label" for="answ3">Катушка индуктивности</label>
                            <?php echo $data->validator->errMessages['qstn1'] ?>
                        </div>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <div class="mb-1">2) Выберите правильные единцы измерения для сопротивления.</div>
                    <select id="answState" class="form-control" name="qstn2">
                        <option <?php if ($data->fields['qstn2'] == "") echo "selected" ?> selected disabled value="">Выберите из списка</option>
                        <option <?php if ($data->fields['qstn2'] == "1answState") echo "selected" ?> value="1answState">Q, Им</option>
                        <option <?php if ($data->fields['qstn2'] == "2answState") echo "selected" ?> value="2answState">W, Ум</option>
                        <option <?php if ($data->fields['qstn2'] == "3answState") echo "selected" ?> value="3answState">E, Ем</option>
                        <option <?php if ($data->fields['qstn2'] == "4answState") echo "selected" ?> value="4answState">R, Ом</option>
                        <option <?php if ($data->fields['qstn2'] == "5answState") echo "selected" ?> value="5answState">F, Ым</option>
                    </select>
                    <?php echo $data->validator->errMessages['qstn2'] ?>
                </div>

                <br>

                <div class="form-group">
                    <div class="mb-1">3) Введите формулировку закона Ома.(Ответ должен содержать больше 19 слов)</div>
                    <textarea class="form-control" placeholder="Введите Ваш ответ" rows="5" name="qstn3"><?php echo $data->fields['qstn3'] ?></textarea>
                    <?php echo $data->validator->errMessages['qstn3'] ?>
                </div>

                <br>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="NameId">Введите имя</label>
                        <input type="text" class="form-control" value="<?php echo $data->fields['name'] ?>" placeholder="Ваше имя" name="name">
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
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Отправить">
                <button class="btn btn-outline-danger" type="reset" value="reset">Очистить форму</button>
            </div>
        </form>

        <?php if (isset($_SESSION['user'])) {
            echo '<div class="mb-5">';
            echo '<table class="table table-sm">';
            echo '    <thead>';
            echo '        <tr>';
            echo '            <th scope="col">Id</th>';
            echo '            <th scope="col">Имя</th>';
            echo '            <th scope="col">Фамилия</th>';
            echo '            <th scope="col">Ответ</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($data->answers as $value) {
                $answer = (array)$value;
                echo '<tr>';
                echo '  <th scope="row">' . $answer['id'] . '</th>';
                echo '  <td>' . $answer['name'] . '</td>';
                echo '  <td>' . $answer['lastName'] . '</td>';
                echo '  <td>' . $answer['percent'] . '</td>';
                echo '<tr>';
            }
            echo '    </tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>

    </div>
</div>
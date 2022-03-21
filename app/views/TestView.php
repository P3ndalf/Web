<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Тест
        </h1>
        <h3>Дисциплина: Основы электротехники и электронники</h3>
        <hr>
        <form class="needs-validation" novalidate action="mailto:vaniok46black@gmail.com">
            <div>
                <div class="form-group">
                    <div class="mb-1">1) Что из списка изображено на картинке.</div>
                    <img src="../../assets/L.jpg" alt="А картинки-то, нет" width="400" height="300" class="border">
                    <div class="custom-radio">
                        <div class="custom-control">
                            <input type="radio" class="custom-control-input" id="answ1" name="radio-stacked" required>
                            <label class="custom-control-label" for="answ1">Катушка ликвидности</label>
                            <div class="valid-feedback">
                                Отлично
                            </div>
                            <div class="invalid-feedback">
                                Пожалуйста, введите свое имя
                            </div>
                        </div>
                        <div class="custom-control ">
                            <input type="radio" class="custom-control-input" id="answ2" name="radio-stacked" required>
                            <label class="custom-control-label" for="answ2">Катушка эффективности</label>
                            <div class="valid-feedback">
                                Отлично
                            </div>
                            <div class="invalid-feedback">
                                Пожалуйста, введите свое имя
                            </div>
                        </div>
                        <div class="custom-control ">
                            <input type="radio" class="custom-control-input" id="answ3" name="radio-stacked" required>
                            <label class="custom-control-label" for="answ3">Катушка индуктивности</label>
                            <div class="valid-feedback">
                                Отлично
                            </div>
                            <div class="invalid-feedback">
                                Пожалуйста, введите свое имя
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <div class="mb-1">2) Выберите правильные единцы измерения для сопротивления.</div>
                    <select id="answState" class="form-control" required>
                        <option selected disabled value="">Выберите из списка</option>
                        <option id="1answState">Q, Им</option>
                        <option id="2answState">W, Ум</option>
                        <option id="3answState">E, Ем</option>
                        <option id="4answState">R, Ом</option>
                        <option id="5answState">F, Ым</option>
                    </select>
                </div>

                <br>

                <div class="form-group">
                    <div class="mb-1">3) Введите формулировку закона Ома.(Ответ должен содержать больше 19 слов)</div>
                    <textarea class="form-control" placeholder="Введите Ваш ответ" rows="5" required></textarea>
                    <div class="valid-feedback">
                        Отлично
                    </div>
                    <div class="invalid-feedback">
                        Пожалуйста, введите ответ корректно
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="NameId">Введите имя</label>
                        <input type="text" class="form-control" id="NameId" placeholder="Ваше имя" required>
                        <div class="valid-feedback">
                            Отлично
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста, введите свое имя
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="LastNameId">Введите фамилию</label>
                        <input type="text" class="form-control" id="LastNameId" placeholder="Ваша фамилия" required>
                        <div class="valid-feedback">
                            Отлично
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста, введите свое свою фамилию
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="inputEmailId">Введите почтовый адрес</label>
                    <input type="email" class="form-control" id="inputEmailId" placeholder="Ваш email" required>
                    <div class="valid-feedback">
                        Отлично
                    </div>
                    <div class="invalid-feedback">
                        Пожалуйста, введите корректную почту
                    </div>
                </div>
            </div>

            <div class="d-flex mb-3">
                <button class="btn btn-outline-dark mr-3" type="submit" value="submit">Отправить данные</button>
                <button class="btn btn-outline-danger" type="reset" value="reset">Очистить форму</button>
            </div>
        </form>
    </div>
</div>
<script>
    seedCookie('Тест');
</script>

<script src="../../js/TestValidation.js"></script>
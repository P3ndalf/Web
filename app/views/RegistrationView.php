<div class="main-center justify-content-center">
    <div class="container-md">
        <h1 class="text-center mb-3">
            Регистрация
        </h1>
        <a href="/Login/login">Переход на авторизацию</a>
        <form id="registrationForm" method="post" enctype="application/x-www-form-urlencoded" action="/Registration/registrate">
            <div class="form-row">
                <div id="nameFieldId" class="col-md-6 mb-3">
                    <label for="NameId">Введите имя</label>
                    <input id="NameId" type="text" class="form-control" placeholder="Ваше имя" name="name">
                    <div id="NameErrorId"></div>
                </div>
                <div id="lastNameFieldId" class="col-md-6 mb-3">
                    <label for="LastNameId">Введите фамилию</label>
                    <input id="LastNameId" type="text" class="form-control" placeholder="Ваша фамилия" name="lastName">
                    <div id="LastNameErrorId"></div>
                </div>
            </div>

            <div id="emailFieldId" class="form-group mb-3">
                <label for="EmailId">Введите почтовый адрес</label>
                <input id="EmailId" class="form-control" placeholder="Ваш email" name="email">
                <div id="EmailErrorId"></div>
            </div>

            <div id="passwordFieldId" class="form-group mb-3">
                <label for="PasswordId">Введите пароль</label>
                <input id="PasswordId" type="text" class="form-control" placeholder="Ваш пароль" name="password">
                <div id="PasswordErrorId"></div>
            </div>

            <div class="d-flex mb-3">
                <input class="btn btn-outline-dark mr-3" type="submit" name="submit" value="Зарегестрироваться">
                <button class="btn btn-outline-danger" type="reset" value="reset">Очистить форму</button>
            </div>
        </form>
        <script>
            $("#registrationForm").submit(function(event) {
                event.preventDefault();
                var http = new XMLHttpRequest();
                var url = '/Registration/registrate';
                http.open('POST', url, true);
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                http.onreadystatechange = function() {
                    if (http.readyState === 4 && http.status === 200) {
                        if (http.responseText) {
                            var result = JSON.parse(http.responseText);

                            $('#NameId').val(result['fields']['name']);
                            $('#LastNameId').val(result['fields']['lastName']);
                            $('#EmailId').val(result['fields']['email']);
                            $('#PasswordId').val(result['fields']['password']);

                            $('#NameErrorId').html(result['errors']['name']);
                            $('#LastNameErrorId').html(result['errors']['lastName']);
                            $('#EmailErrorId').html(result['errors']['email']);
                            $('#PasswordErrorId').html(result['errors']['password']);

                            if (result['saved'] == true) {
                                window.location.href = '/Home/';
                            }
                        }
                    }
                }
                http.send($('#registrationForm').serialize());
            });
        </script>
    </div>
</div>
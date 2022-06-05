<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="../../css/styles.css" rel="stylesheet" type="text/css">
  <meta charset="utf-8">
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../../js/SeedCookie.js"></script>
  <title>Главная</title>
</head>

<body>
  <header class="border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/Home/">Kalmykov</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/AboutMe/">Обо мне</a>
            </li>
            <li class="nav-item">
              <div id="dropDownMenu">
                <a class="nav-link" href="/MyInterests/">Мои интересы</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Education/">Учеба</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Gallery/">Фотоальбом</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Contacts/">Контакты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Test/">Тест</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Медиа</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/CreateBlog/">Создание блога</a>
                <a class="dropdown-item" href="/Blog/">Блог</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/GuestBook/">Для гостей</a>
            </li>
            <li class="nav-item">
              <span class="nav-link" id="date"></span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Registration/registration">Регистрация</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Login/login">Войти</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <?php include 'app/views/' . $content_view; ?>

</body>

<footer class="border-top footer bg-light">
  <div class="container text-muted d-flex justify-content-center">
    Прав нет и не будет
  </div>
</footer>
<script src="../../js/Date.js"></script>
<script src="../../js/Interests.js"></script>
<script src="../../js/DropDownMenu.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</html>
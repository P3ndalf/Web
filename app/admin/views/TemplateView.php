<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js'></script>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet" type="text/css">
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
              <a class="nav-link" href="/Test/">Тест</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Медиа</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/Analitics/">Аналитика сайта</a>
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
              <span class="nav-link">Hello, admin</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/User/logout">Выйти</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <?php
  if (file_exists('app/' . $_SESSION['user']['role'] . '/views/' . $content_view)) {
    include 'app/' . $_SESSION['user']['role'] . '/views/' . $content_view;
  } else {
    include 'app/views/' . $content_view;
  }
  ?>

</body>

<script src="../../js/Date.js"></script>
<script src="../../js/Interests.js"></script>
<script src="../../js/DropDownMenu.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

</html>
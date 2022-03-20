<!DOCTYPE html>
<html lang="ru">

<head>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="../css/styles.css" rel="stylesheet" type="text/css">
  <meta charset="utf-8">
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Главная</title>
</head>

<body>
  <header class="border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../html/Index.html">Kalmykov</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="">Обо мне</a>
            </li>
            <li class="nav-item">
              <div id="dropDownMenu">
                <a class="nav-link" href="">Мои интересы</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Учеба</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Фотоальбом</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Контакт</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Тест</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">История</a>
            </li>
            <li class="nav-item">
              <span class="nav-link" id="date"></span>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <?php include 'app/views/' . $content_view; ?>

</body>

<footer class="border-top footer  bg-light">
  <div class="container text-muted d-flex justify-content-center">
    Прав нет и не будет
  </div>
</footer>

</html>
<?php
session_start();
?>
<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Статьи</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/adf0fcd0ed.js" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Меню</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="wad.html">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile.php">Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/articles.php">Статьи</a>
                </li>
            </ul>
            <a href="login.php" class="btn btn-outline-success mx-2">Авторизация</a>
            <a href="reg.php" class="btn btn-outline-success">Регистрация</a>
        </div>
    </div>
</nav>


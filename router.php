<?php
session_start();
$path  = explode("/", $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];
$mysqli = new mysqli("localhost", "root", "", "php1901");
require_once('php/classes/ArticleControler.php');
require_once('php/classes/UserController.php');

if ($path[1] == "login" && $method == "GET"){
    $content =  file_get_contents("view/login.html");
}elseif ($path[1] == "reg" && $method == "GET"){
    $content =  file_get_contents("view/reg.html");
}elseif ($path[1] == 'getAuthUserData'){
    exit(UserController::getAuthUserData());
}elseif ($path[1] == 'profile' && $method == "GET"){
    $content = file_get_contents('view/profile.html');
}elseif ($path[1] == "articles"){
    $content =  file_get_contents("view/articles.html");
}elseif ($path[1] == "article" && $method == "GET"){
    $content = file_get_contents("view/article.html");
}elseif ($path[1] == "updateArticle" && $method == 'GET'){
    ArticleControler::updateArticle();
    $content = file_get_contents("view/updateArticle.html");
}elseif ($path[1] == "addArticle" && $method == "GET"){
    $content = file_get_contents("view/addArticle.html");
}elseif ($path[1] == "getArticles" ){
    exit(ArticleControler::getArticles());
}elseif ($path[1] == "article" && $method == 'POST'){
    exit(ArticleControler::getArticleById());
}elseif ($path[1] == "addArticle" && $method == 'POST'){
    ArticleControler::addArticle();
}elseif ($path[1] == "updateArticle1" && $method == 'POST'){
    ArticleControler::updateArticle1();
}elseif ($path[1] == "deleteArticle"){
    ArticleControler::deleteArticle();
}elseif ($path[1] == "login" && $method == 'POST'){
    exit(UserController::login());
}elseif ($path[1] == "reg" && $method == 'POST'){
    exit(UserController::reg());
}elseif ($path[1] == "avatar"){
    UserController::avatar();
}elseif ($path[1] == "getCommentByArticleId"){
    ArticleControler::getCommentByArticleId($_POST['article_id']);
}elseif ($path[1] == "addComment"){
    ArticleControler::addComment();
}else{
    $content = "Страница не найдена 404";
}
require_once('template.php');
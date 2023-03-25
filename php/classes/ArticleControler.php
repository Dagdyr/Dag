<?php
class ArticleControler{
    public static function getArticles(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles");
        $articles = [];
        while (($row = $result->fetch_assoc()) != null){
            $articles[] = $row;
        }
        return json_encode($articles);
    }
    public static function getArticleById(){
        global $mysqli;
        $articleId = $_POST['article_id'];
        $result = $mysqli->query("SELECT * FROM articles WHERE id='$articleId'");
        $row = $result->fetch_assoc();
        return json_encode($row);
    }
    public static function addArticle(){
        global $mysqli;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $mysqli->query("INSERT INTO `articles`(`title`, `content`, `author`) VALUES ('$title','$content','$author')");
        header("Location: /articles");
    }
    public static function deleteArticle(){
        global $mysqli;
        $id = $_GET['id'];
        $mysqli->query("DELETE FROM `articles` WHERE id='$id'");
        $mysqli->query("DELETE FROM `coments` WHERE article_id='$id'");
        header("Location: /articles");
    }
    public static function updateArticle(){
        global $mysqli;
        $id=$_GET['id'];
        $result=$mysqli->query("SELECT * FROM articles WHERE id='$id'");
        $row=$result->fetch_assoc();
        return json_encode($row);
    }
    public static function updateArticle1(){
        global $mysqli;
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $author = $_POST['author'];
        $id = $_POST['id'];
        $mysqli->query("UPDATE `articles` SET `title`='$title',`content`='$content',`author`='$author' WHERE id='$id'");

    }
    public static function addComment(){
        global $mysqli;
        $userId = $_SESSION['id'];
        $articleId = $_POST['article_id'];
        $comment = $_POST['comment'];
        $mysqli->query("INSERT INTO `coments`(`user_id`, `article_id`, `comment`) VALUES ('$userId', '$articleId', '$comment')");
        exit(json_encode(['result'=>'success']));
    }
    public static function getCommentByArticleId($articleId){
        global $mysqli;
        $result = $mysqli->query("SELECT coments.comment, users.name, users.lastname FROM coments, users WHERE article_id='$articleId' AND users.id = coments.user_id");
        $comments = [];
        while (($row = $result->fetch_assoc()) != null){
            $comments[] = $row;
        }
        exit(json_encode($comments));
    }
}